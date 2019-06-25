<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DirectoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showView()
    {
        return view('directory')->with("users", User::all());
    }
}
