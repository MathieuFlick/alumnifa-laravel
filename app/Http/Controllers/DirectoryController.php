<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DirectoryController extends Controller
{
    public function showView()
    {
        return view('directory')->with("users", User::orderBy('lastname', 'asc')->get());
    }

    public function getAutocomplete()
    {
        $users = User::all();
        $data = [];

        for ($i = 0; $i < count($users); $i++) {
            $data[$i]['label'] = $users[$i]->firstname . " " . $users[$i]->lastname;
            $data[$i]['value'] = $users[$i]->id;
        }

        return response()->json($data);
    }

}

