<?php

namespace App\Http\Controllers\headquarters;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class updateHq extends Controller
{
    public function update(Request $request){

        // $headQuarter = headquarter::find($request->id);
        $headQuarterId = $request->input('id');



    }
}
