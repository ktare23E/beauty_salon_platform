<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingItem;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    //

    public function storeBooking(Request $request)
    {
        $user = Auth::user();
    
        // Validate request data
        $validatedData = $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'items.*.id' => 'required|integer',
            'items.*.type' => 'required|string|in:service_variant,package',
            'total_price' => 'required|numeric|min:0',
        ]);
    
        // Create the booking
        $booking = Booking::create([
            'user_id' => $user->id,
            'booking_date' => "{$validatedData['date']} {$validatedData['time']}",
            'total_price' => $validatedData['total_price'],
            'status' => 'pending',
        ]);
    
        // Add items to the booking
        foreach ($validatedData['items'] as $item) {
            $bookingItem = new BookingItem([
                'item_id' => $item['id'],
                'item_type' => $item['type'],
            ]);
            $booking->items()->save($bookingItem);
        }
    
        // Clear the cart
        $user->cart->items()->delete();
    
        // return redirect()->route('booking.success', ['booking' => $booking->id]);
    }

    public function rescheduleBooking(Request $request,$id){
        $validatedData = $request->validate([
            'id' => 'required|exists:bookings,id',  // Assuming there's a bookings table
            'date' => 'required|date_format:Y-m-d', // Validate date format
            'time' => 'required|date_format:H:i'    // Validate time format
        ]);

        // Concatenate date and time
        $dateTime = $request->input('date') . ' ' . $request->input('time');

        // Optionally, parse and format the datetime to ensure it's correct
        $dateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i', $dateTime);

        $booking = Booking::findOrFail($id);
        $booking->update([
            'booking_date' => $dateTime
        ]);

        return response()->json(['success' => true, 'message' => 'Booking rescheduled successfully.']);
    }

    public function cancelBooking(Booking $booking){
        $booking->update([
            'status' => 'declined'
        ]);

        return redirect()->back()->with('success', 'Booking canceled successfully.');
    }
    
}
