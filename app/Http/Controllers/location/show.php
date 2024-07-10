<?php

namespace App\Http\Controllers\location;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use App\Models\location;
use Illuminate\Http\Request;

class show extends Controller
{
    public function show(){

        $hq=headquarter::all();


        return view('Locations.show',[
            'headquarters'=>$hq,
        ]);

    }
}
