<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function get()
    {
        return view('account.edit');
    }
    public function editPassword(Request $request)
    {
        if (auth()->guest()) {
            flash("Vous devez être connecté pour accéder à cette page.")->error();
            return redirect("auth.login");
        }
        if (!empty($request->input('password'))) {
            $validator = Validator::make($request->all(), [
                'password' => 'min:8|confirmed',
                'password_confirmation' => 'min:8',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);
            return back()->with('message', 'Les modifications de votre profil ont bien été prises en compte.');
        } else {
            return back()->with("message", "Vous n'avez effectué aucun changement sur votre profil.");
        }
    }
}
