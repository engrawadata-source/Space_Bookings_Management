<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpaceRequest;
use App\Http\Requests\UpdateSpaceRequest;
use App\services\SpaceService;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function __construct(protected SpaceService $spaceService){}


public function store(StoreSpaceRequest $request){
    $space= $this->spaceService->store($request->validated());
    return redirect()->route('spaces.index');
}



public function index(){
    $spaces = $this->spaceService->index();
    return view('spaces.index' , compact('spaces'));
}

public function update($id , UpdateSpaceRequest $request){

    $space= $this->spaceService->update( $id, $request->validated());
        return redirect()->route('spaces.index');
}


#delete space
public function destroy($id){
    $this->spaceService->destroy($id);
    return redirect()->route('spaces.index');

}


//  public function getAllSpacesByCenter($centerId){
//      $spaces= $this->spaceService->getAllSpacesByCenter($centerId);
//     return view('spaces.indexByCenter' , compact('spaces'));
// }


public function getAllSpacesByCenter(Request $request)
{
    $request->validate([
        'center_id' => ['required', 'integer', 'min:1']
    ]);

    $centerId = $request->query('center_id');

    $spaces = $this->spaceService->getAllSpacesByCenter($centerId);

 if ($spaces === null) {
        return view('spaces.index', [
            'spaces' => collect(), ##predefined fun give us empty collection instead of null value
            'message' => 'Center not found'
        ]);
    }
    return view('spaces.index', compact('spaces'));
}


public function getAllSpaceDetails($id){
     $space= $this->spaceService->getAllSpaceDetails($id);


    return view('spaces.show' , compact('space'));
                                    }

}






