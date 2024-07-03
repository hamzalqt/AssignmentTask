<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class manageUsers extends Controller
{
    public function index(){

        $fetchUsers = User::whereNotIn('id', [Auth::id()])->with('roles')->get();
            // dd($fetchUsers);
       return view('Pages.manage-users',[
        'users'=>$fetchUsers,
       ]);

    }
}
