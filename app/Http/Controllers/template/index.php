<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class index extends Controller
{
    public function redirect($id){

        $hq=headquarter::all();

        return view('tool.template',[
            'headquarters'=>$hq,
        ]);


    }
}
