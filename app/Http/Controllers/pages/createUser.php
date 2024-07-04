<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class createUser extends Controller
{
    public function create(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);

       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        $role = Role::find($request->role_id);
        if(!empty($role)){
         $user->assignRole($role);
        }

        return response()->json($user);


    }
}
