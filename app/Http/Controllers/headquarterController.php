<?php

namespace App\Http\Controllers;

use App\Models\headquarter;
use Illuminate\Http\Request;

class HeadquarterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if($request->ajax()){
       $headquarters = headquarter::all();
       return response()->json($headquarters);
         }else{
            return view('headquarter.show');
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


        $logoPath = $request->file('logo')->store('public/logos');

        $headQuarter = new headquarter();
        $headQuarter->name = $request->name;
        $headQuarter->address = $request->address;
        $headQuarter->logo = $logoPath;
        $headQuarter->status = $request->status;
        $headQuarter->save();


        return response()->json($headQuarter);



    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $logoPath = $request->file('logo')->store('public/logos');

            $headQuarter = new headquarter();
            $headQuarter->name = $request->name;
            $headQuarter->address = $request->address;
            $headQuarter->logo = $logoPath;
            $headQuarter->status = $request->status;
            $headQuarter->save();


            return response()->json($headQuarter);


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
 // Validate incoming request data
 $validatedData = $request->validate([
    'name' => 'required|string|max:255',
    'address' => 'required|string|max:255',
    // 'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'status' => 'required|string|in:Active,Inactive',
]);

$headquarter = Headquarter::findOrFail($id);

$headquarter->name = $validatedData['name'];
$headquarter->address = $validatedData['address'];
$headquarter->status = $validatedData['status'];

if ($request->hasFile('logo')) {
    $logoPath = $request->file('logo')->store('public/logos');
    $headquarter->logo = $logoPath;
}

$headquarter->save();

return response()->json($headquarter);





    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $headQuarter = headquarter::findOrFail($id);
        $headQuarter->delete();

        return response()->json('sucessfully Deleted');
    }
}
