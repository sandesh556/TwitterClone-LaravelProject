<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user){
        return view('profile.show',compact('user'));
    }
    public function edit(User $user){


        return view ('profile.edit',compact('user'));
    }
    public function update(User $user){


        $attribute = request()->validate([
            'name' => 'required|max:255|string',
            'username' => "required|unique:users,username,{$user->id}|max:255|alpha_dash",
            'avatar'=> "file",
            'email'=>"string|email|required|max:255|unique:users,email,{$user->id}",
            'password' => 'string|min:8|max:255|confirmed|nullable'

        ]);
        $attribute['avatar']=request('avatar')->store('avatars');

        $user->update($attribute);
        return redirect($user->path());
    }

}
