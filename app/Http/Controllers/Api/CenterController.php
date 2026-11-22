<?php

namespace App\Http\Controllers\Api;

use App\services\CenterService;
use App\Http\Controllers\Controller;


class CenterController extends Controller
{
    public function __construct(protected CenterService $centerService){}

    public function getActiveCenters(){

        $centers = $this->centerService->getActiveCenters();

        return response()->json([
            'data' => $centers
        ], 200);

    }


    public function getCenterDetails($id){
        $center= $this->centerService->getActiveCenterDetails($id);
        return response()->json([
            'data'=> $center
        ], 200);
    }
}
