<?php

namespace App\Http\Controllers\headquarters;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class show extends Controller
{
    public function show(){

        $headQ=headquarter::all();

        return view('headQuarter.show',[
            'headquarters'=>$headQ,
        ]);
    }
}
