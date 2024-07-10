<?php

namespace App\Http\Controllers\masterTemplate;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use Illuminate\Http\Request;

class getMasterTemplate extends Controller
{
    public function getTemplate($id){

       $master_template = master_template::with('templates')->get();

       return response()->json($master_template);



    }


    public function getAllMasterTemplates(){

      try{
       $masterTemplates = master_template::select('id','type','size','method','serial')->get();
       return response()->json($masterTemplates);
      }catch(\Exception $e){
        return response()->json('An error occurred'.$e->getMessage());
      }

    }

}
