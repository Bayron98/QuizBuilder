<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index () {
        return view('home.index');
    }

    public function dashboard () {
        $user = Auth::user();

        $name = $user->name;
        $email = $user->email;

        return view('home.dashboard', compact('name', 'email'));
    }
}
