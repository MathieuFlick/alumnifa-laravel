<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function showView()
    {
        return view('directory');
    }
}
