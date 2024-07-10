<?php

namespace App\Http\Controllers;

use App\Models\headquarter;
use App\Models\location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->ajax()){
       $locations = location::with('headQuarter')->get();
          return response()->json($locations);
        }else{
            $hq=headquarter::all();


            return view('Locations.show',[
                'headquarters'=>$hq,
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data=$request->all();
        $location = location::create($data);

        $locationData=$location->load('headQuarter');


        return response()->json($locationData);
       }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $location = location::create($data);

        $locationData=$location->load('headQuarter');


        return response()->json($locationData);
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

        $loc =  location::find($request->id);

    if(!empty($loc)){
       $loc->name=$request->name;
       $loc->address=$request->address;
       $loc->status=$request->status;
       $loc->save();

       $locData=$loc->load('headQuarter');

       return response()->json($locData);

    }else{
        return response()->json('location not found',404);
    }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $location = location::findOrFail($id);
        $location->delete();

        return response()->json('sucessfully Deleted');
    }
}
