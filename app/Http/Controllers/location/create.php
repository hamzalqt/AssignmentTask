<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class create extends Controller
{
    public function createLocation(Request $request){
        $data=$request->all();
        $location = location::create($data);

        return response()->json($location);


    }
}
