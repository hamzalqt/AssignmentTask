<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class getLocController extends Controller
{
    public function getLoc($id){

        $location = location::find($id);

        if($location){
          return response()->json($location);
        }else{
            return response()->json("location not found",404);
        }




    }
}
