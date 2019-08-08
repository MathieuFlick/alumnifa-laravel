<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

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
            'avatar' => ['nullable', 'image']
        ]);

        if($validation->fails()) {
            return back()->withErrors($validation);
        }

        $checkStudent = User::checkStudent([
            "firstname" => $request->firstname,
            "lastname" => $request->lastname,
            "dob" => $request->dob
        ]);

        if (isset($request->avatar)) {
            // $path = $request->file('avatar')->store('public/avatars');
            $name = str_random(40) . '.jpg';
            Image::make($request->avatar)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(500, 500, 0, 0)->encode('jpg')->save(storage_path('app/public/avatars/') . $name);
            $path = url('storage/avatars/'.$name);
        } else {
            $path = url('storage/avatars/placeholder.gif');
        }
        if ($checkStudent) {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'pseudo' => $request->pseudo,
                'email' => $request->email,
                'dob' => $request->dob,
                'password' => Hash::make($request->password),
                'avatar' => $path
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user->sendEmailVerificationNotification();
                return redirect()->intended('account');
            }

        } else {
            return back()->with('error', 'Votre compte étudiant n\'existe pas')->withInput();
        }
    }
}
