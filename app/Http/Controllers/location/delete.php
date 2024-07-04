<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use App\Models\location;
use Illuminate\Http\Request;

class delete extends Controller
{
    public function deleteLoc($id){


       $loc = location::find($id);

       if(!empty($loc)){
        $loc->delete();
       }else{
        return response()->json('location not found');
       }
    }
}
