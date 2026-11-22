<?php

namespace App\Http\Controllers;

use App\services\CenterService;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;

class CenterController extends Controller
{
public function __construct(protected CenterService $centerService){}

##create center
 public function store(StoreCenterRequest $request){

$this->centerService->store($request->validated());
    return redirect()->route('centers.index');
}

##update center
public function update($id, UpdateCenterRequest $request){
    $employee= $this->centerService->update( $id, $request->validated());
        return redirect()->route('centers.index');
}

##get center details{if active or inactive}
public function getCenterDetails($id){
        $center= $this->centerService->getCenterDetails($id);
         return view('centers.show', compact('center'));
    }

    ##get all centers
     public function index(){
    $centers= $this->centerService->index();
        return view('centers.index', compact('centers'));
}



#delete center
public function destroy($id){
    $this->centerService->destroy($id);
    return redirect()->route('centers.index');

}







}
