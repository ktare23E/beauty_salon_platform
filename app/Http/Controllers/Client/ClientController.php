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

    public function updateUserDetails(Request $request){
    
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
        ]);
    
        $user = User::find(auth()->id());
        $user->update($validatedData);

        return redirect()->back()->with('success','Profile updated successfully');
    }

    public function userBookingList(){
        // $user = User::with(['bookings.items.item.service.business'])->find(auth()->id());

        return view('booking_list');
    }
}
