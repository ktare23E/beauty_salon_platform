<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ServiceVariant;
use App\Models\Package;

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

    public function userBookingList()
    {
        // Retrieve the user with their bookings and eager load related data
        $user = User::with([
            'bookings' => function ($query) {
                $query->with(['items.item' => function ($morphTo) {
                    $morphTo->morphWith([
                        ServiceVariant::class => ['service.business'],
                        Package::class => ['serviceVariants.service.business']
                    ]);
                }, 'payments']);
            }
        ])->findOrFail(auth()->id());

        // Separate bookings into pending and approved groups
        $userBookingPending = $user->bookings->where('status', 'pending');
        $userBookingApproved = $user->bookings->where('status', 'approved');

        //userData
        $userData = $user->only(['first_name','last_name','email']);
        
   
        return view('booking_list', [
            'userBookingPending' => $userBookingPending,
            'userBookingApproved' => $userBookingApproved,
            'userData' => $userData
        ]);
    }
    
    
    
}
