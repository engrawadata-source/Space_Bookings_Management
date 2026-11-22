<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['customer_id','space_id','booking_date',
                            'start_time','end_time','num_of_people',
                            'total_price','status' ];





}
