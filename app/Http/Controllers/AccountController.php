<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function get()
    {
        return view('account.edit');
    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city' => 'nullable|string',
            'street' => 'nullable|string',
            'postcode' => 'nullable|integer',
            'number' => 'nullable|integer',
            'company' => 'nullable|string',
            'post' => 'nullable|string',
            'password' => 'nullable|min:8|confirmed',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        $user->update([
            'city' => $request->city ? $request->city : $user->city,
            'street' => $request->street ? $request->street : $user->street,
            'postcode' => $request->postcode ? $request->postcode : $user->postcode,
            'number' => $request->number ? $request->number : $user->number,
            'company' => $request->company ? $request->company : $user->company,
            'post' => $request->post ? $request->post : $user->post,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);
        return back()->with('message', 'Les modifications de votre profil ont bien été prises en compte.');
    }
}
