<?php
namespace App\Repository;

use App\User;
use Illuminate\Support\Facades\Auth;

class ConversationRepository
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function getConversation($userId)
    {
        return $this->user->newQuery()
            ->where('id', '!=', $userId)
            ->get();
    }
}
