<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class getUser extends Controller
{
    public function getUser($id){

        $user = User::with('roles')->find($id);
       $userRoles = Role::all();
        if($user){
         return response()->json([
          'user' => $user,
          'roles'=>$userRoles
        ]);
        }else{
            throw new \Exception("User Not Found", 404);

        }

    }
}
