<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = ['name' , 'description', 'type', 'center_id','max_capacity',
           'hourly_price' , 'status'
    ];


    public function center(){
        return $this->belongsTo(Center::class );
    }

    public function customers(){
        return $this->belongsToMany(Customer::class ,'booking');

    }
}
