<?php

namespace App\Http\Controllers\BusinessAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\RequirementSubmission;
use App\Models\Booking;
use App\Models\Package;
use App\Models\ServiceVariant;
use Carbon\Carbon;
use App\Models\Business;

class SalesController extends Controller
{
    //

    public function index()
    {
        $user = User::with('businesses')->find(Auth::id());

        return view('business_admin.sales.index', [
            'user' => $user
        ]);
    }

    public function viewSales(Business $business)
    {
        $user = User::with('businesses')->find(Auth::id());
        $businessData = $user->businesses->find($business);

        // Load the services and their variants for the business
        $business->load('services.variants');

        // Collect all variant IDs for the business's services
        $serviceVariantIds = $business->services->flatMap(function ($service) {
            return $service->variants->pluck('id');
        });

        // Fetch bookings with the related items and payments
        $bookings = Booking::with(['items', 'payments'])
            ->whereHas('items', function ($query) use ($serviceVariantIds) {
                $query->whereHasMorph('item', [Package::class, ServiceVariant::class], function ($query) use ($serviceVariantIds) {
                    $query->whereIn('id', $serviceVariantIds);
                });
            })
            ->where('status', 'approved')
            ->get();

        // Aggregate payments by daily, weekly, monthly, and yearly
        $dailySales = $this->aggregateSales($bookings, 'day');
        $weeklySales = $this->aggregateSales($bookings, 'week');
        $monthlySales = $this->aggregateSales($bookings, 'month');
        $yearlySales = $this->aggregateSales($bookings, 'year');

        // Calculate the highest sales for service variants and packages
        $highestServiceVariantSales = $this->getHighestSales($bookings, 'service_variant');
        $highestPackageSales = $this->getHighestSales($bookings, 'package');
        
   
        $dailySales = $dailySales->map(function ($value, $key) {
            return [
                'date' => $key,
                'amount' => $value
            ];
        });

        //retrieve the sales only current day
        $dailySales = $dailySales->filter(function ($value, $key) {
            return $value['date'] == Carbon::now()->format('Y-m-d');
        });

        $totalWeeklySales = $weeklySales->map(function ($value, $key) {
            return [
                'date' => $key,
                'amount' => $value
            ];
        });

        //retrieve the sales only current week
        $totalWeeklySales = $totalWeeklySales->filter(function ($value, $key) {
            return $value['date'] == Carbon::now()->format('o-W');
        });

        $totalMonthlySales = $monthlySales->map(function ($value, $key) {
            return [
                'date' => $key,
                'amount' => $value
            ];
        });

        //retrieve the sales only current month
        $totalMonthlySales = $totalMonthlySales->filter(function ($value, $key) {
            return $value['date'] == Carbon::now()->format('Y-m');
        });

        //calculate the total sales of current year
        $totalYearSales = $yearlySales->map(function ($value, $key) {
            return [
                'date' => $key,
                'amount' => $value
            ];
        });

        $totalYearSales = $totalYearSales->filter(function ($value, $key) {
            return $value['date'] == Carbon::now()->format('Y');
        });

        //calculate the total sales of current year
        $totalYearSales = $totalYearSales->sum('amount');

        $totalToadySales = $dailySales->sum('amount');
        $totalWeeklySales = $totalWeeklySales->sum('amount');
        $totalMonthlySales = $totalMonthlySales->sum('amount');

        return view('business_admin.sales.view_sales', [
            'user' => $user,
            'businessData' => $businessData,
            'dailySales' => $dailySales,
            'weeklySales' => $weeklySales,
            'monthlySales' => $monthlySales,
            'yearlySales' => $yearlySales,
            'highestServiceVariantSales' => $highestServiceVariantSales,
            'highestPackageSales' => $highestPackageSales,
            'totalToadySales' => $totalToadySales,
            'totalWeeklySales' => $totalWeeklySales,
            'totalMonthlySales' => $totalMonthlySales,
            'totalYearSales' => $totalYearSales
        ]);
    }

    // public function sales(Business $business)
    // {


    //     return response()->json([
    //         'daily_sales' => $dailySales,
    //         'weekly_sales' => $weeklySales,
    //         'monthly_sales' => $monthlySales,
    //         'yearly_sales' => $yearlySales,
    //     ]);
    // }

    private function aggregateSales($bookings, $interval)
    {
        return $bookings->flatMap(function ($booking) {
            return $booking->payments;
        })->groupBy(function ($payment) use ($interval) {
            return Carbon::parse($payment->payment_date)->format($this->getDateFormat($interval));
        })->map(function ($payments, $date) {
            return $payments->sum('amount');
        });
    }

    private function getDateFormat($interval)
    {
        switch ($interval) {
            case 'day':
                return 'Y-m-d';
            case 'week':
                return 'o-W'; // Year-Week number
            case 'month':
                return 'Y-m';
            case 'year':
                return 'Y';
            default:
                throw new \InvalidArgumentException("Invalid interval: $interval");
        }
    }

    private function getHighestSales($bookings, $itemType)
    {
        // Flatten bookings to get all items
        $items = $bookings->flatMap(function ($booking) {
            return $booking->items;
        })->filter(function ($item) use ($itemType) {
            // Check if item_type matches the provided $itemType string
            return $item->item_type === $itemType;
        });

        // Group items by ID and sum their amounts
        $sales = $items->groupBy('item_id')->map(function ($items) {
            return $items->sum(function ($item) {
                return $item->booking->payments->sum('amount');
            });
        });

        // Find the item with the highest sales
        $highestSaleItemId = $sales->sortDesc()->keys()->first();
        $highestSaleAmount = $sales->max();

        // Determine the model class based on the item_type string
        $itemClass = ($itemType == 'service_variant') ? ServiceVariant::class : Package::class;

        // Return the item and its sales amount
        $item = $itemClass::find($highestSaleItemId);
        return [
            'item' => $item,
            'amount' => $highestSaleAmount
        ];
    }
}
