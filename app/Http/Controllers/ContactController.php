<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessageCreated;

class ContactController extends Controller
{
    public function create() {
        return view("contacts.create");
    }
    public function store(Request $request) {
       $mailable = new ContactMessageCreated($request->name, $request->mail, $request->message);
       Mail::to("thibault.jamin@gmx.com")->send($mailable);
       return "Votre ùessage a été envoyé avec succès !";
    }
}
