<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use App\Models\template;
use Illuminate\Http\Request;

class createTemplateController extends Controller
{
    protected $masterId =0;
    public function create(Request $request){

        if($request->master == 1){
          $master_template =  master_template::create([
                'type'=>$request->type,
                'size'=>$request->size,
                'method'=>$request->method,
                'serial'=>$request->serial,
                'master'=>$request->headquarter_id,
            ]);

            $this->masterId=$master_template->id;
        }

       $template = template::create([
          'type'=>$request->type,
           'size'=>$request->size,
           'method'=>$request->method,
           'serial'=>$request->serial,
           'headquarter_id'=>$request->headquarter_id,
           'master'=>$this->masterId,
        ]);




    return response()->json($template);

    }
}
