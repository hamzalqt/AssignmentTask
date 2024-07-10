<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use App\Models\template;
use Illuminate\Http\Request;

class masterController extends Controller
{
    public function toggleToMaster($id){

        $template = template::find($id);
        if(!empty($template)){
          $template->master=1;
          $template->save();

          return response()->json($template);
        }else{
            return response()->json('template not found',404);
        }

    }

    public function toggleToTemplate(Request $request,$id){

        $master_template = master_template::find($id);

        if(!empty($master_template)){

           $template = template::create([
           'type'=>$master_template->type,
           'size'=>$master_template->size,
           'method'=>$master_template->method,
           'serial'=>$master_template->serial,
           'headquarter_id'=>$request->headquarter_id,
           'master'=>$master_template->id,
            ]);



            return response()->json($template);

        }else{
            return response()->json('master template not found',404);
        }




    }






}
