<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Model
{
    use HasApiTokens;
    protected $fillable = ['user_id' ,'date_of_birth' ,'gender'];


    public function user(){
        return $this->belongsTo(User::class);

    }

     public function spaces(){
        return $this->belongsToMany(Space::class , 'booking');

    }
}
