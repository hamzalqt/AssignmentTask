<?php

namespace App\Http\Controllers\masterTemplate;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use Illuminate\Http\Request;

class createMaterTemplate extends Controller
{
    public function create(Request $request){


        try{

            $master_template = master_template::create([
                'type'=>$request->type,
                 'size'=>$request->size,
                 'method'=>$request->method,
                 'serial'=>$request->serial,
              ]);
       return response()->json($master_template);

        }catch(\Exception $e){
            return response()->json('An error occurred'. $e->getMessage());
        }



    }
}
