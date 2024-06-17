<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
}
