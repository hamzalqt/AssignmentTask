<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class updateController extends Controller
{
    public function update(Request $request){

    $loc =  location::find($request->id);

    if(!empty($loc)){
       $loc->name=$request->name;
       $loc->address=$request->address;
       $loc->status=$request->status;

       $loc->save();
       return response()->json($loc);

    }else{
        return response()->json('location not found',404);
    }

    }
}
