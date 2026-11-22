<?php

namespace App\services;

use App\Models\Booking;
use App\Models\Space;

class BookingService
{
    /**
     * Create a new class instance.
     */
    public function __construct(){}

##API
    ##create booking
    public function store(array $data)
    {
        $space = Space::query()->find($data['space_id']);


        if ($space->center->status !== 'active') {
            return [
                'error' => 'Center is not active'
            ];
        }


        if ($space->status === 'maintenance') {
            return [
                'error' => 'Space is under maintenance'
            ];
        }


        if ($data['num_of_people'] > $space->max_capacity) {
            return [
                'error' => 'Number of people exceeds maximum capacity'
            ];
        }

        // Calculate duration in hours
        $start = strtotime($data['start_time']);
        $end = strtotime($data['end_time']); // هاد برجع الوقت بالثواني لهيك تحت قسمنا على 3600

        $hours = ($end - $start) / 3600;

        // total price
        //تقريب السعر النهائي الى رقمين بعد الفاصلة يعني 133.335=133.36
        $totalPrice = round(
            $hours * $space->hourly_price,
            2
        );


        $customerId = auth()->user()->customer->id;


        $booking = Booking::query()->create([
            'customer_id' => $customerId,
            'space_id' => $space->id,
            'booking_date' => now()->toDateString(),
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'num_of_people' => $data['num_of_people'],
            'total_price' => $totalPrice,
            'status' => 'pending'
        ]);

        return [
            'booking' => $booking
        ];
    }


    ##Get Customer Bookings
    public function getCustomerBookings(){
        $customerId = auth()->user()->customer->id;

    $bookings= Booking::query()
        ->where('customer_id', $customerId)
        ->where('status', '!=', 'cancelled')
        ->get(['id' , 'space_id' , 'booking_date' ,'status']);

        return $bookings;
    }



    ##get booking's details
    public function getCustomerBookingDetails($id)
{
    $customerId = auth()->user()->customer->id;

    $booking= Booking::query()
        ->where('id', $id)
        ->where('customer_id', $customerId)
        ->first();
        return  $booking;
}



##cancel booking ONLY if it's confirmed or pending
public function cancelBooking($id)
{
    $customerId = auth()->user()->customer->id;

    $booking = Booking::query()
        ->where('id', $id)
        ->where('customer_id', $customerId)
        ->first();

    if (!$booking) {
        return ['error' => 'Booking not found'];
    }

    if ($booking->status != 'pending' && $booking->status != 'confirmed') {
        return ['error' => 'This booking cannot be cancelled'];
    }

    $booking->update([
        'status' => 'cancelled'
    ]);

    return $booking;

    }









##WEB

##get all bookings
public function index(){

    $bookings= Booking::query()
        ->get(['id' , 'space_id' , 'booking_date' ,'status']);

        return $bookings;
}

##get  bookings  by status
public function getBookingsByStatus($status)
{
    return Booking::query()
        ->where('status', $status)
        ->get();
}


 ##get any booking's details
    public function getBookingDetails($id)
{

    $booking= Booking::query()
        ->where('id', $id)
        ->first();
        return  $booking;
}



##confirm booking if status= pendeing ONLY
public function confirmBooking($id)
{
    $booking = Booking::query()->find($id);

    if (!$booking) {
        return ['error' => 'Booking not found'];
    }

    if ($booking->status != 'pending') {
        return ['error' => 'Only pending bookings can be confirmed'];
    }

    $conflict = Booking::query()
        ->where('space_id', $booking->space_id)
        ->where('status', 'confirmed')
        ->where('start_time', '<', $booking->end_time)
        ->where('end_time', '>', $booking->start_time)
        ->exists();

    if ($conflict) {
        return ['error' => 'This booking conflicts with another confirmed booking'];
    }

    $booking->update([
        'status' => 'confirmed'
    ]);

    return $booking;
}

##reject booking
public function rejectBooking($id)
{
    $booking = Booking::query()->find($id);

    if (!$booking) {
        return ['error' => 'Booking not found'];
    }

    if ($booking->status != 'pending') {
        return ['error' => 'Only pending bookings can be rejected'];
    }

    $booking->update([
        'status' => 'rejected'
    ]);

    return ['booking' => $booking];
}

}

