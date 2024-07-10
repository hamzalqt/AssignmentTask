<?php

namespace App\Http\Controllers\masterTemplate;

use App\Http\Controllers\Controller;
use App\Models\master_template;
use Illuminate\Http\Request;

class deleteMasterTemplate extends Controller
{
    public function delete($id){
        $template = master_template::find($id);

        if($template){
         $template->delete();
        }else{
         return response()->json($template);
        }


    }
}
