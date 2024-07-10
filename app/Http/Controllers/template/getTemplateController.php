<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\template;
use Illuminate\Http\Request;

class getTemplateController extends Controller
{


    public function getTemplatesByHeadquarter($id){

        $templates=template::where('headquarter_id',$id)->get();
        return response()->json($templates);
    }

    public function getTemplate(){
        $template = template::where('master',0)->get();
        return response()->json($template);
    }

    public function getTemplateMaster(){
        $template = template::where('master',1)->get();
        return response()->json($template);
    }


    public function getTemplateById($id){
        $template=template::find($id);

   if(!empty($template)){
    return response()->json($template);
   }else{
    return response()->json('template not found',404);
   }


    }

}
