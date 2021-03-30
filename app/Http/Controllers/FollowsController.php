<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Followable;


class FollowsController extends Controller
{

    public function store(User $user){

        auth()->user()->ToggleFollow($user);
        return back();
    }
}
