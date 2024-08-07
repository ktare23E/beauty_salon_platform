<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\AdminFee;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceVariant;
use App\Models\Package;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function viewCart(){
    // Retrieve the user's cart with items and their details
        $userCart = Auth::user()->cart()->with('items.item')->first();
        // return $userCart;

        $totalPrice = 0;
        $admin_fee = AdminFee::all();

        if ($userCart) {
            // Calculate the total price of items in the cart
            foreach ($userCart->items as $items) {
                $totalPrice += $items->item->price;
            }
        }


        $totalPrice = ($admin_fee->first()->fee/100) * $totalPrice + $totalPrice;

        return view('checkout', [
            'userCart' => $userCart,
            'totalPrice' => $totalPrice,
            'admin_fee' => $admin_fee
        ]);
    }

    public function clientCartCount(){
        $userId = auth()->id();
        $user = User::with(['cart' => function($query) {
            $query->withCount('items');
        }])->find($userId);

        // Access the cart items count
        if ($user->cart) {
            $cartItemsCount = $user->cart->items_count;
        } else {
            $cartItemsCount = 0; // Or handle the case where the user has no cart
        }

        return $cartItemsCount;
    }

    public function addToCart(Request $request){
        $cart = Auth::user()->cart()->firstOrCreate([]);

        // Determine the item type and add to cart
        if ($request->has('service_variant_id')) {
            $item = ServiceVariant::findOrFail($request->service_variant_id);

        } elseif ($request->has('package_id')) {
            $item = Package::findOrFail($request->package_id);

            // Retrieve the first service variant related to the package
            $serviceVariant = $item->serviceVariants()->first();
            if ($serviceVariant) {
                $businessId = $serviceVariant->service->business->id;
            } else {
                return response()->json(['message' => 'Package has no associated service variants'], 400);
            }
        } else {
            return response()->json(['message' => 'Invalid item type'], 400);
        }

        $cartItem = new CartItem([
            'item_id' => $item->id,
            'item_type' => get_class($item),
        ]);

        $cart->items()->save($cartItem);

        //dynamic redirect 

        //retrieve certain business id


        if($request->has('service_variant_id')){
            return redirect()->route('view_service', ['service' => $item->service_id])->with('success','Item added to cart');
        }else{
            return redirect()->route('view_salon', ['business' => $businessId])->with('success','Item added to cart');
        }
    }

    public function removeCartItem(CartItem $cartItem){
        $cartItem->delete();

        return redirect()->back();
    }
}
