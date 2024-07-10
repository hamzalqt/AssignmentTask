<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use App\Models\template;
use Illuminate\Http\Request;

class deleteController extends Controller
{
    public function delete($id){

       $template = template::find($id);

       if($template){
        $template->delete();
       }else{
        return response()->json($template);
       }


    }
}
