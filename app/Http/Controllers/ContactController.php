<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageCreated;
use Illuminate\Support\Facades\Validator;
use App\Contact;

class ContactController extends Controller
{
    public function create()
    {
        return view("contacts.create");
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'object' => 'required|max:100',
            'mail' => 'email',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            Contact::create([
                'sender' => $request->mail,
                'objet' => $request->object,
                'body' => $request->content
            ]);

            $mailable = new ContactMessageCreated($request->name, $request->mail, $request->message);
            Mail::to("thibault.jamin@gmx.com")->send($mailable);
            return "Votre message a été envoyé avec succès !";
        }
    }
}
