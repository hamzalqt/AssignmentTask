<?php

namespace App\Http\Controllers\headquarters;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class getHq extends Controller
{
    public function getHq($id){

        $hq=headquarter::find($id);

        if($hq){
            return response()->json($hq);
        }else{
            return response()->json('headquarter not found',404);
        }



    }
}
