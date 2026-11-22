<?php

namespace App\services;

use App\Models\Center;

class CenterService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
##API
    public function getActiveCenters(){
        $centers= Center::query() ->where('status', 'active')->get(['id' ,'name' , 'description' , 'country']);
        return $centers;

    }

    public function getActiveCenterDetails($id){
         $center= Center::query()
         ->where('id', $id)
         ->where('status' , 'active')
         ->first();

     return $center;

    }





##WEB
    public function store(array $data){
        $center = Center::query()->create([
          'name'=>$data['name'],
          'description'=>$data['description'],
          'address'=>$data['address'] ,
          'city'=>$data['city'],
          'country'=>$data['country'],
          'latitude'=>$data['latitude'],
          'longitude'=>$data['longitude'],
          'contact_number'=>$data['contact_number'],
          'status'=>$data['status']
          ]);


          return $center;
    }


    public function update($id , array $data){
         $center= Center::query()->find($id);

        $center->update([
          'name'=>$data['name'],
          'description'=>$data['description'],
          'address'=>$data['address'] ,
          'city'=>$data['city'],
          'country'=>$data['country'],
          'latitude'=>$data['latitude'],
          'longitude'=>$data['longitude'],
          'contact_number'=>$data['contact_number'],
          'status'=>$data['status'] ,
        ]);
        return $center;

    }



    public function getCenterDetails($id){
         $center= Center::query()
         ->find($id);

     return $center;

    }

     public function index(){
        $centers= Center::query()->get();
        return $centers;

    }

     public function destroy($id){
        $center= Center::query()->find($id);
        $center->delete();
        return true;
    }





}
