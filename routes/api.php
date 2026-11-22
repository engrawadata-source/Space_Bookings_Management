<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\CenterController;
use App\Http\Controllers\Api\SpaceController;
use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


##register  auth customer
Route::post('/customer/create' , [CustomerController::class , 'register']);

##login auth customer
Route::post('customer/login', [CustomerController::class , 'login']);


 // only accessable for authenticated customers
 Route::middleware(['auth:sanctum', 'customer'])->group(function () {


 Route::delete('/logout', [CustomerController::class, 'logout']);
 Route::get('/customer/my-profile' , [CustomerController::class , 'myProfile']) ;



##CENTERS
 ##get active centers only forauth customer
 Route::get('activeCenters/', [CenterController::class , 'getActiveCenters']);

 ##get  ACTIVE center's details
Route::get('activeCenter/{id}/details' , [CenterController::class , 'getCenterDetails']);




##SPACES

##get all spaces in active center
Route::get('activeCenter/{centerId}/spaces' , [ SpaceController::class , 'getSpacesByCenter']);

##get space'details
Route::get('space/{id}' , [SpaceController::class , 'getSpaceDetails']);





##BOOKING
#create booking
Route::post('booking/create/', [BookingController::class , 'store']);

##get customer's bookings
Route::get('/bookings', [BookingController::class, 'getCustomerBookings']);

##get booking details
Route::get('booking/{id}/details', [BookingController::class , 'getCustomerBookingDetails']);

##cancel booking
Route::put('/booking/{id}/cancel', [BookingController::class, 'cancelBooking']);


 });


