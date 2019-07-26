<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function get()
    {
        return view('admin.admin')->with('users', User::orderBy('id', 'asc')->get());
    }
    public function deleteUser(int $userId)
    {
        $userToSupress = User::where('id', $userId)->first();
        $userToSupress->delete();
        return back();
    }
}
