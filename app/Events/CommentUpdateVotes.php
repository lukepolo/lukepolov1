<?php

namespace App\Events;

use App\Models\Mongo\Comment;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class CommentUpdateVotes extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $comment;
    public $upVotes;
    public $downVotes;
    public $rooms = [];

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
        $this->upVotes = $comment->getUpVotes();
        $this->downVotes = $comment->getDownVotes();
        $this->rooms = [
            route('blog/view', $comment->blog->link_name),
            env('ADMIN_ROOM')
        ];
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [
            'update_votes'
        ];
    }
}
