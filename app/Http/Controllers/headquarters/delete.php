<?php

namespace App\Http\Controllers\headquarters;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class delete extends Controller
{
    public function delete(Request $request){

        $hq=headquarter::find($request->id);

        if(!empty($hq)){
            $hq->delete();
        }else{
            return response()->json('headquarter not found');
        }

    }
}
