<?php

namespace App\Http\Controllers\headquarters;

use App\Http\Controllers\Controller;
use App\Models\headquarter;
use Illuminate\Http\Request;

class createHQ extends Controller
{
    public function create(Request $request){

        $logoPath = $request->file('logo')->store('public/logos');

        $headQuarter = new headquarter();
        $headQuarter->name = $request->name;
        $headQuarter->address = $request->address;
        $headQuarter->logo = $logoPath;
        $headQuarter->status = $request->status;
        $headQuarter->save();


        return response()->json($headQuarter);

    }
}
