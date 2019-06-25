<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as IlluminateUser;
use Illuminate\Auth\AuthManager;
use App\Repository\ConversationRepository;

class MessagesController extends Controller
{
    public function __construct(ConversationRepository $conversationRepository, AuthManager $auth)
    {
        $this->cr = $conversationRepository;
        $this->auth = $auth;
    }
    public function index()
    {
        return view('messages.index', [
            'users' => $this->cr->getConversation($this->auth->user()->id)
        ]);
    }

    public function show(User $user)
    {
        return view('messages.show', [
            'users' => $this->cr->getConversation($this->auth->user()->id),
            'user' => $user
        ]);
    }
    public function store(User $user, $request)
    {
        $this->cr->createMessage(
            $resquest->get('content'),
            $this->auth->user()->id,
            $user->id
        );
        return redirect(route('conversation', ['id' => $user->id]));
    }
}
