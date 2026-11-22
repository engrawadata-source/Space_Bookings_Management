<?php

namespace App\services;

use App\Models\Center;
use App\Models\Space;

class SpaceService
{
    /**
     * Create a new class instance.
     */
    public function __construct(){}
##API
##get ONLY spaces if center status=active
    public function getSpacesByCenter($centerId){
         $center= Center::query()
        ->where('id', $centerId)
        ->where('status', 'active')
        ->first();

      if ($center == null) {
        return null;
                             }

       $spaces= $center->spaces()
       ->select('id', 'name', 'description', 'type')
        ->get();;
       return $spaces;




    }

##get ONLY space details if center status=active
    public function getSpaceDetails($id){
         $space=Space::query()->find($id);


          if ( !$space ||$space->center->status != 'active')##here relation will load all info of center+space into $space
            {
         return null ;
             }

        $space->unsetRelation('center');##remove the loaded relation in $spaces so will return ONLY info of sapce without center info
        return $space;
    }


##WEB

    public function store(array $data){
        $space= Space::query()->create([
            'name'=> $data['name'],
            'description'=> $data['description'],
            'type'=> $data['type'],
            'center_id'=> $data['center_id'],
            'max_capacity'=> $data['max_capacity'],
            'hourly_price'=>$data['hourly_price'],
            'status'=> $data['status']

        ]);
        return $space;
    }



    public function index(){
        $spaces= Space::query()->get();
        return $spaces;
    }


    public function update($id , array $data){
         $space= Space::query()->find($id);

        $space->update([
          'name'=> $data['name'],
            'description'=> $data['description'],
            'type'=> $data['type'],
            // 'center_id'=> $data['center_id'],
            'max_capacity'=> $data['max_capacity'],
            'hourly_price'=>$data['hourly_price'],
            'status'=> $data['status']
        ]);
        return $space;
    }


      public function destroy($id){
        $space= Space::query()->find($id);
        $space->delete();
        return true;
    }


     public function getAllSpacesByCenter($centerId){
        $center= Center::query()
        ->where('id', $centerId)
        ->first();

      if ($center == null) {
        return null;
                             }

       $spaces= $center->spaces;
       return $spaces;


    }


##get  space details if center status=active OR INACTIVE
    public function getAllSpaceDetails($id){
        $space=Space::query()->find($id);

        return $space;
    }
}
