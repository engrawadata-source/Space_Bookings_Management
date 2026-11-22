<?php

namespace App\services;

use App\Models\Booking;
use App\Models\Center;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Space;

class DashboardService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function getStatistics()
    {
        return [
            'centers_count' => Center::query()->count(),

            'spaces_count' => Space::query()->count(),

            'employees_count' => Employee::query()->count(),

            'customers_count' => Customer::query()->count(),

            'pending_bookings' => Booking::query()
                ->where('status', 'pending')
                ->count(),

            'confirmed_bookings' => Booking::query()
                ->where('status', 'confirmed')
                ->count(),

            'cancelled_bookings' => Booking::query()
                ->where('status', 'cancelled')
                ->count(),

            'rejected_bookings' => Booking::query()
                ->where('status', 'rejected')
                ->count(),
        ];
    }
}
