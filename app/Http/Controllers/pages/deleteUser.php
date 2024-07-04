<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class deleteUser extends Controller
{
    public function delete($id){

        try{
          $user =User::find($id);

          $user->delete();

        }catch(\Exception $e){
            return response()->json('An error occurred'. $e->getMessage());
        }


    }
}
