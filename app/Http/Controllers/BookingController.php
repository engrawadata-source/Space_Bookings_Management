<?php

namespace App\Http\Controllers;

use App\services\BookingService;


class BookingController extends Controller
{
public function __construct(protected BookingService $bookingService){}

##get all bookings
public function index(){

    $bookings = $this->bookingService->index();

    return view('bookings.index' , compact('bookings'));
}


public function getBookingsByStatus($status)
{
    if (!in_array($status, ['pending', 'confirmed', 'cancelled', 'rejected'])) {
        abort(404);
    }

    $bookings = $this->bookingService->getBookingsByStatus($status);

    return view('bookings.index', compact('bookings'));
}



##get booking's details
public function getBookingDetails($id)
{
    $booking = $this->bookingService->getBookingDetails($id);

    if ($booking == null ){
        return response()->json([
        'message' => 'Booking not found'
    ], 400);
    }
    return view('bookings.show' , compact('booking'));
}

public function confirmBooking($id)
{
    $booking = $this->bookingService->confirmBooking($id);

    if (isset($booking['error'])) {
        return redirect()->back()
            ->with('error', $booking['error']);
    }

    return redirect()->back()
        ->with('success', 'Booking confirmed successfully');
}


public function rejectBooking($id)
{
    $booking = $this->bookingService->rejectBooking($id);

    if (isset($booking['error'])) {
        return redirect()->back()
            ->with('error', $booking['error']);
    }

    return redirect()->back()
        ->with('success', 'Booking rejected successfully');
}



}
