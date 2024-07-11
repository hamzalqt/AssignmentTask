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

    public function toggleToTemplate(Request $request){

        $checked_templates=$request->checked;
        $unchecked_templates=$request->unchecked;

        $added_templates=[];
        $deleted_templates=[];
        if(!empty($checked_templates)){
        try{
            foreach($checked_templates as $checked){
            $master_template = master_template::find($checked);

            $temp=template::where('master',$checked)->where('headquarter_id',$request->headquarter_id)->exists();

            if(!$temp){
                $template = template::create([
                       'type'=>$master_template->type,
                       'size'=>$master_template->size,
                       'method'=>$master_template->method,
                       'serial'=>$master_template->serial,
                       'headquarter_id'=>$request->headquarter_id,
                       'master'=>$master_template->id,
                        ]);
                        $added_templates[] = $template;
            }
        }
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }

    }


    if(!empty($unchecked_templates)){

        foreach($unchecked_templates as $unchecked){

           $template = template::where('master',$unchecked)->first();
if($template){
           $template->delete();

           $deleted_templates[]=$template;
}
        }
    }

    return response()->json([
        'added'=>$added_templates,
        'deleted'=>$deleted_templates,
    ]);


        // $master_template = master_template::find($id);

        // if(!empty($master_template)){

        //    $template = template::create([
        //    'type'=>$master_template->type,
        //    'size'=>$master_template->size,
        //    'method'=>$master_template->method,
        //    'serial'=>$master_template->serial,
        //    'headquarter_id'=>$request->headquarter_id,
        //    'master'=>$master_template->id,
        //     ]);



        //     return response()->json($template);

        // }else{
        //     return response()->json('master template not found',404);
        // }




    }






}
