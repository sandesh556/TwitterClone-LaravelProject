<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profile.show',compact('user'));
    }
    public function edit(User $user){


        return view ('profile.edit',compact('user'));
    }
}
