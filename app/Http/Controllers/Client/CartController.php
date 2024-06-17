<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceVariant;
use App\Models\Package;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

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
        } else {
            return response()->json(['message' => 'Invalid item type'], 400);
        }

        $cartItem = new CartItem([
            'item_id' => $item->id,
            'item_type' => get_class($item),
        ]);

        $cart->items()->save($cartItem);
    }
}
