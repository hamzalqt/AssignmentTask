<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\template;
use Illuminate\Http\Request;

class updateController extends Controller
{
    public function update($id , Request $request){

       $template = template::find($id);

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
