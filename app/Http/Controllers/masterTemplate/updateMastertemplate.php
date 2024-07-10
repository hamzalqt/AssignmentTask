<?php

namespace App\Http\Controllers\masterTemplate;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use Illuminate\Http\Request;

class updateMastertemplate extends Controller
{


    public function edit($id){

        $template=master_template::find($id);

        if(!empty($template)){
         return response()->json($template);
        }else{
         return response()->json('template not found',404);
        }
    }


    public function update($id , Request $request){

        $template = master_template::find($id);

        $template->type=$request->type;
        $template->size=$request->size;
        $template->method=$request->method;
        $template->serial=$request->serial;
        $template->save();

        if(!empty($template)){
         return response()->json($template);
        }else{
         return response()->json('template not found',404);
        }



     }



}
