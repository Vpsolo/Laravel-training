<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;
use App\Article;

class onAddArticleEvent extends Event
{
    use SerializesModels;

    public $user_name;
    public $article_name;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Article $article, User $user)
    { 
      $this->user_name = $user->name;
      $this->article_name = $article->name;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
