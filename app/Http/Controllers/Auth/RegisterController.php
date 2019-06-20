<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show registration form.
     *
     * @return View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'pseudo' => ['required', 'string', 'max:255', 'unique:users'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dob' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validation->fails()) {
            return back()->withErrors($validation);
        }

        $checkStudent = User::checkStudent([
            "firstname" => $request['firstname'],
            "lastname" => $request['lastname'],
            "dob" => $request['dob']
        ]);

        if ($checkStudent) {
            return User::create([
                'pseudo' => $request->pseudo,
                'firstname' => $request['firstname'],
                'lastname' => $request['lastname'],
                'email' => $request['email'],
                'dob' => $request['dob'],
                'password' => Hash::make($data['password']),
            ]);
        } else {
            return back()->with('error', 'Votre compte étudiant n\'existe pas')->withInput();
        }
    }
}
