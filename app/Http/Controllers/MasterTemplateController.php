<?php

namespace App\Http\Controllers;

use App\Models\master_template;
use Illuminate\Http\Request;

class MasterTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
        $master_templates=master_template::with('templates')->get();
        return response()->json($master_templates);
    }else{
       return view('tool.master');
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $master_temp= new master_template();
        $master_template =  master_template::create([
            'type'=>$request->type,
            'size'=>$request->size,
            'method'=>$request->method,
            'serial'=>$request->serial,
            'master'=>$request->master,
            'uid'=>$master_temp->uid,
        ]);
        return response()->json($master_template);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $master_temp= new master_template();

        $master_template =  master_template::create([
            'type'=>$request->type,
            'size'=>$request->size,
            'method'=>$request->method,
            'serial'=>$request->serial,
            'master'=>$request->headquarter_id,
            'uid'=>$master_temp->uid,
        ]);

        return response()->json($master_template);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {


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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $template = master_template::find($id);

        if($template){
         $template->delete();
        }else{
         return response()->json($template);
        }
    }
}
