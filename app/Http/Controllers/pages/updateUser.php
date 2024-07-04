<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class updateUser extends Controller
{
    public function update(Request $request){

        try{

          $user =  User::find($request->id);

          if($user){
              DB::beginTransaction();
             $user->name=$request->name;
             $user->email=$request->email;
             $user->save();

             $user->roles()->sync([$request->role_id]);
             return response()->json($user);
          }

        }catch(\Exception $e){
            return response()->json('An error occurred'. $e->getMessage());
        }


    }
}
