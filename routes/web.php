<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RedirectIfAuthenticatedToDashboard;
use App\Http\Controllers\Admin\SalonController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\RequirementSubmissionController;
use App\Http\Controllers\BusinessAdmin\BusinessAdminSalonController;
use App\Http\Controllers\BusinessAdmin\PackageController;
use App\Http\Controllers\BusinessAdmin\ServiceController;
use App\Http\Controllers\BusinessAdmin\ServiceVariantController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\ClientController;

Route::get('/', function () {
    return view('index');
})->name('dashboard');


// Route::get('/salon_try', function () {
//     return view('salon');
// })->name('salon_try');

Route::get('/test',[HomeController::class,'displayBusiness'])->name('test');
Route::get('/view_salon/{business}',[HomeController::class,'viewSalon'])->name('view_salon');
Route::get('/view_service/{service}',[HomeController::class,'viewService'])->name('view_service');

Route::get('/package_inclusion/{package}',[HomeController::class,'viewPackage'])->name('package_inclusion');


Route::get('/map', function () {
    return view('map');
})->name('map');


Route::get('/cart_number',[CartController::class,'clientCartCount'])->name('cart_number');


// Route::get('/login', [LoginController::class, 'index'])->name('login');

//need to be login before can access to the user page, admin page and business_admin page
Route::middleware(['auth'])->group(function () {
    //user
    Route::get('/user', function () {
        $user = Auth::user();
        if($user->user_type != 'user'){
            abort('403');
        }
        return view('user.index');
    })->name('user.index');

    Route::get('/user_cart', [CartController::class, 'viewCart'])->name('user_cart');
    Route::delete('/remove_cart_item/{cartItem}',[CartController::class,'removeCartItem'])->name('remove_cart_item');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');

    Route::get('/user_profile',[ClientController::class,'userProfile'])->name('user_profile');
    Route::post('/update_user_details',[ClientController::class,'updateUserDetails'])->name('update_user_details');

    Route::get('/user_booking_list',[ClientController::class,'userBookingList'])->name('user_booking_list');
    Route::post('/booking',[BookingController::class,'storeBooking'])->name('booking');
    Route::post('/reschedule_booking/{id}',[BookingController::class,'rescheduleBooking'])->name('reschedule_booking');


    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');


    //Admin
    Route::get('/admin',[DashboardController::class,'index'])->name('admin.index');
    Route::get('/user_list',[UserController::class,'index'])->name('admin.user_list');

    Route::get('/requirement_list',[RequirementController::class,'index'])->name('admin.requirement_list');
    Route::get('/create_requirement',[RequirementController::class,'create'])->name('admin.create_requirement');
    Route::post('/create_requirement',[RequirementController::class,'store'])->name('admin.store_requirement');

    Route::get('/requirement_submission/{id}',[RequirementSubmissionController::class,'show'])->name('requirement_submission');
    Route::patch('/requirement_submission/{requirement_submission}',[RequirementSubmissionController::class,'update'])->name('update_requirement_submission');

   

    Route::get('/requirement/edit/{requirement}',[RequirementController::class,'edit'])->name('admin.edit_requirement');
    Route::patch('/update_requirement/{requirement}',[RequirementController::class,'update'])->name('admin.update_requirement');


    Route::get('/salon_list',[SalonController::class,'index'])->name('admin.salon_list');
    Route::get('/admin_salon/{business}',[SalonController::class,'show'])->name('admin.show_salon');

    Route::get('/business_admin', function () {
        $user = Auth::user();
        if($user->user_type != 'business_admin'){
            abort('403');
        }
        return view('business_admin.index');
    })->name('business_admin.index');

    Route::get('/salon',[BusinessAdminSalonController::class,'index'])->name('business_admin.salon');
    Route::get('/create_salon',[BusinessAdminSalonController::class,'create'])->name('business_admin.create_salon');
    Route::post('/create_salon',[BusinessAdminSalonController::class,'store'])->name('business_admin.store_business');

    Route::get('/salon/{business}',[BusinessAdminSalonController::class,'show'])->name('show_business');
    Route::get('/user/{id}/transactions', [BusinessAdminSalonController::class, 'getUserTransactions'])->name('user.transactions');
    Route::get('/booking/{booking}', [BusinessAdminSalonController::class, 'viewBooking'])->name('client_booking');

    Route::get('/create_package/{business}',[PackageController::class,'create'])->name('create_package');
    Route::post('/store_package',[PackageController::class,'store'])->name('store_package');
    Route::get('/view_package/{package}',[PackageController::class,'show'])->name('view_package');
    Route::get('/edit_package/{package}',[PackageController::class,'edit'])->name('edit_package');
    Route::patch('/update_package/{package}',[PackageController::class,'update'])->name('update_package');


    Route::get('/create_service/{business}',[ServiceController::class,'create'])->name('create_service');
    Route::get('/edit_service/{service}',[ServiceController::class,'edit'])->name('edit_service');
    Route::patch('/update_service/{service}',[ServiceController::class,'update'])->name('update_service');
    Route::post('/store/{business}',[ServiceController::class,'store'])->name('store_service');

    Route::get('/service_variant_list/{service}',[ServiceVariantController::class,'show'])->name('service_variant_list');
    Route::get('/create_service_variant/{service}',[ServiceVariantController::class,'create'])->name('create_service_variant');
    Route::post('/store_service_variant/{service}',[ServiceVariantController::class,'store'])->name('store_service_variant');
    Route::get('/edit_service_variant/{serviceVariant}',[ServiceVariantController::class,'edit'])->name('edit_service_variant');
    Route::patch('/update_service_variant/{serviceVariant}',[ServiceVariantController::class,'update'])->name('update_service_variant');



});

Route::get('/register',[RegisterController::class, 'create'])->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');

Route::post('/login', [LoginController::class, 'store'])->name('login.store');


Route::middleware([RedirectIfAuthenticatedToDashboard::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');
    
    // Login route
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    // Register route
    Route::get('/register', [RegisterController::class, 'create'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});
