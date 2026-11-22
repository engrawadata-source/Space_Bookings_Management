<?php

namespace App\Http\Controllers\Api;

use App\services\BookingService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;

class BookingController extends Controller
{

    public function __construct(protected BookingService $bookingService){}


##create booking
    public function store(StoreBookingRequest $request)
    {
        $booking = $this->bookingService->store($request->validated());

        if (isset($booking['error'])) {
            return response()->json([
                'message' => $booking['error']
            ], 422);
        }

        return response()->json([
            'message' => 'Booking created successfully',
            'data' => $booking
        ], 201);
    }


    ##get customer's bookings
    public function getCustomerBookings(){

    $bookings = $this->bookingService->getCustomerBookings();

    return response()->json([
        'message' => 'Bookings retrieved successfully',
        'data' => $bookings
    ], 200);
}

##get booking's details
public function getCustomerBookingDetails($id)
{
    $booking = $this->bookingService->getCustomerBookingDetails($id);

    if ($booking == null ){
        return response()->json([
        'message' => 'Booking not found'
    ], 400);
    }
    return response()->json([
        'message' => 'Booking details retrieved successfully',
        'data' => $booking
    ], 200);
}

public function cancelBooking($id)
{
    $booking = $this->bookingService->cancelBooking($id);

    if (isset($booking['error'])) {
        return response()->json([
            'message' => $booking['error']
        ], $booking['error'] === 'Booking not found' ? 404 : 422);
    }

    return response()->json([
        'message' => 'Booking cancelled successfully',
        'data' => $booking
        ], 200);
}

}
