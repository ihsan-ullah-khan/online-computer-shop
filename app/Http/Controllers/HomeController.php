<?php

namespace App\Http\Controllers;

use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->user()->is_admin())
        {
            return view('admin.home');
        }else
        {
            return view('user.home');
        }
    }

    public function show_users()
    {
        $users = User::where('user_type', 'U')->get();
        return view('admin.user.index', compact('users'));
    }
}
