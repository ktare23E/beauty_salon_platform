<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    //

    public function userProfile(){
        $user = User::with(['latestBooking.items.item.service.business'])->find(auth()->id());
        
        return view('profile',[
            'user' => $user
        ]);
    }
}
