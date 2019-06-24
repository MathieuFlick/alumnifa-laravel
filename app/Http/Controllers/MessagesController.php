<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as IlluminateUser;

class MessagesController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('messages.index', ['users' => $users]);
    }

    public function show(User $user)
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();
        return view('messages.show', compact('users', 'user'));
    }
}
