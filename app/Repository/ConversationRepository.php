<?php
namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\Messages;

class ConversationRepository
{
    public function __construct(User $user, Messages $message)
    {
        $this->user = $user;
    }

    public function createMessage($content, $sender_id, $recipient_id)
    {
        return $this->message->newQuery()->create([
            'content' => $content,
            'sender_id' => $sender_id,
            'recipient_id' => $recipient_id

        ]);
    }
}
