<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthManager;
use App\Messages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Symfony\Component\Mime\Message;

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
                'messages.read',
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
            ->where('messages.id', $message_id);

        $message->update([
            'read' => 1
        ]);


        return view('messages.read')->with(['users' => $users, 'message' => $message->first()]);
    }

    public function reply(Request $request, Int $answer_id)
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $reply = User::where('id', $answer_id)->first();
        return view('messages.reply')->with(['users' => $users, 'reply' => $reply]);
    }

    public function store(Request $request, Int $recipient_id)
    {
        $validator = Validator::make($request->all(), [
            'object' => 'required|max:100',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            Messages::create([
                'sender_id' => $this->user->id,
                'recipient_id' => $recipient_id,
                'objet' => $request->object,
                'body' => $request->content
            ]);
            return back()->with('message', 'Votre message a bien été envoyé !');
        }
    }

    public function deleteMessage(int $messageId)
    {
        $message = Messages::where('id', $messageId)->first();
        $message->delete();
        return back();
    }

    public function writeMessage(Request $request)
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        return view('messages.write')->with(['users' => $users]);
    }
    public function storeWriteMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'destinataire' => 'required',
            'object' => 'required|max:100',
            'content' => 'required',
            'recipient_id' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Messages::create([
            'sender_id' => $this->user->id,
            'recipient_id' => $request->recipient_id,
            'objet' => $request->objet,
            'body' => $request->content
        ]);
        return back()->with('message', 'Votre message a bien été envoyé !');
    }

    public function getAutocomplete()
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $data = [];

        for ($i = 0; $i < count($users); $i++) {
            $data[$i]['label'] = $users[$i]->firstname . " " . $users[$i]->lastname;
            $data[$i]['value'] = $users[$i]->id;
        }

        return response()->json($data);
    }
    public function sent()
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $messages = DB::table('messages')
            ->join('users', 'messages.recipient_id', '=', 'users.id')
            ->select([
                'messages.id as message_id',
                'messages.objet',
                'messages.read',
                'users.firstname',
                'users.lastname'
            ])
            ->where('sender_id', $this->user->id)
            ->get();

        return view('messages.sent')->with(['messages' => $messages, 'users' => $users]);
    }
    public function sentRead(int $message_id)
    {
        $users = User::where('id', '!=', $this->user->id)->get();
        $message = DB::table('messages')
            ->join('users', 'messages.sender_id', '=', 'users.id')
            ->where('messages.id', $message_id);

        return view('messages.sentRead')->with(['users' => $users, 'message' => $message->first()]);
    }

    public function sentDelete(int $message_id)
    {
        $message = Messages::where('id', $message_id)->first();
        $message->delete();
        return back();
    }
}
