<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index()
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $messages = DB::table('messages')
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->select([
                'messages.id as message_id',
                'messages.objet',
                'users.firstname',
                'users.lastname'
            ])
            ->where('messages.recipient_id', $this->user->id)
            ->get();

        return view('messages.index')->with(['users' => $users, 'messages' => $messages]);
    }

    public function read(int $message_id)
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $message = DB::table('messages')
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->where('messages.id', $message_id)
            ->first();


        // $message_sender = $messages = DB::table('messages')
        //     ->join('users', 'messages.sender_id', '=', 'users.id')
        //     ->where('messages.id', $this->user->id)
        //     ->get();

        // $message_recipient = $messages = DB::table('messages')
        //     ->join('users', 'messages.recipient_id', '=', 'users.id')
        //     ->where('messages.id', $id)
        //     ->get();

        return view('messages.read')->with(['users' => $users, 'message' => $message]);
    }

    public function reply(Request $request, Int $answer_id)
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $reply = User::where('id', $answer_id)->first();
        return view('messages.reply')->with(['users' => $users, 'reply' => $reply]);
    }

    public function store(Request $request, Int $recipient_id)
    {
        Messages::create([
            'sender_id' => $this->user->id,
            'recipient_id' => $recipient_id,
            'objet' => $request->object,
            'body' => $request->content
        ]);
        return back();
    }
}
