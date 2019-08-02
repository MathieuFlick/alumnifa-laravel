<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
{
    public function showView()
    {
        $users = User::orderBy('lastname', 'asc')->get();
        $years = DB::table('users')->select('promo')->get()->toArray();
        return view('directory')->with(["users" => $users, "years" => $years]); 
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

    public function search(Request $request)
    {
        if($request->name) {
            $search = explode(" ", $request->name);
            $users = User::where('firstname', 'like', '%'.$search[0].'%')->orWhere('lastname', 'like', '%'.$search[0].'%');
            if(count($search) > 1) {
                $users = $users->where('firstname', 'like', '%'.$search[1].'%')->orWhere('lastname', 'like', '%'.$search[1].'%');
            }
        }

        if($request->promo) {
            if(isset($users)) {
                $users = $users->where('formation', $request->promo);
            } else {
                $users = User::where('formation', $request->promo);
            }
        }
        if($request->year) {
            if(isset($users)) {
                $users = $users->where('promo', $request->year);
            } else {
                $users = User::where('promo', $request->year);
            }
        }
        
        if(isset($users)) {
            $users = $users->get();
        } else {
            $users = User::all();
        }
        return view('directory')->with(['users' => $users]);
    }

    public function getYears()
    {
        $years = DB::table('users')->select('promo')->get();
        for ($i=0; $i < count($years); $i++) { 
            $data[] = $years[$i]->promo;
        }
        $data = array_unique($data);
        sort($data);
        return response()->json($data);
    }

    public function getPromo()
    {
        $promo = DB::table('users')->select('formation')->get();
        for ($i = 0; $i < count($promo); $i++) {
            $data[] = $promo[$i]->formation;
        }
        $data = array_unique($data);
        sort($data);
        return response()->json($data);
    }
}