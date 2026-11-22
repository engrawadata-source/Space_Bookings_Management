<?php

namespace App\Http\Controllers\Api;

use App\services\SpaceService;
use App\Http\Controllers\Controller;


class SpaceController extends Controller
{
    public function __construct(protected SpaceService $spaceService){}


public function getSpacesByCenter($centerId){
    $spaces= $this->spaceService->getSpacesByCenter($centerId);
    return response()->json([
        'data' =>$spaces
        ], 200);

}


  public function getSpaceDetails($id){
    $space= $this->spaceService->getSpaceDetails($id);

      if (!$space) {
        return response()->json([
            'message' => 'Space not found or it is maintanance , or center of space is inactive'
        ], 404);
                   }


    return response()->json([
        'data' =>$space
        ], 200);
                                    }


}
