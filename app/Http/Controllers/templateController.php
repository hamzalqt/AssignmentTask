<?php

namespace App\Http\Controllers;

use App\Models\master_template;
use App\Models\template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    protected $masterId=0;
    public function create(Request $request)
    {
        $temp =new template();

        if($request->master == 1){
            $master_template =  master_template::create([
                  'type'=>$request->type,
                  'size'=>$request->size,
                  'method'=>$request->method,
                  'serial'=>$request->serial,
                  'master'=>$request->headquarter_id,
                  'uid'=>$temp->uid,
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
             'uid'=>$temp->uid,
          ]);

          return response()->json($template);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $temp =new template();

       if($request->master == 1){
            $master_template =  master_template::create([
                  'type'=>$request->type,
                  'size'=>$request->size,
                  'method'=>$request->method,
                  'serial'=>$request->serial,
                  'master'=>$request->headquarter_id,
                  'uid'=>$temp->uid,
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
             'uid'=>$temp->uid,
          ]);

          return response()->json($template);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $templates=template::where('headquarter_id',$id)->get();
        return response()->json($templates);


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $uid)
    {

        $template = template::where('uid',$uid)->first();
        if(!empty($template)){
         $template->type=$request->type;
        $template->size=$request->size;
        $template->method=$request->method;
        $template->serial=$request->serial;
        $template->save();

         return response()->json($template);
        }else{
         return response()->json('template not found',404);
        }
 }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uid)
    {
        $template = template::where('uid',$uid)->first();
        $template->delete();

        return response()->json('sucessfully Deleted');
    }
}
