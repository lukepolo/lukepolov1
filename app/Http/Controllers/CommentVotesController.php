<?php

namespace App\Http\Controllers;

use App\Models\Mongo\Comment;
use App\Models\Mongo\CommentVote;

class CommentVotesController extends Controller
{
    public function store()
    {
        $comment = Comment::with(['votes' => function($query)
        {
            $query->where('user_id', \Auth::user()->id);
        }])
        ->find(\Request::get('comment'));

        if(empty($comment) === false)
        {
            if(\Auth::user()->id != $comment->user_id)
            {
                if(\Request::get('vote') == 1)
                {
                    $vote = 1;
                }
                else if(\Request::get('vote') == 0)
                {
                    $vote = -1;
                }
                else
                {
                    return response('Unauthorized.', 401);
                }

                if($comment->votes->count() != 0)
                {
                    $comment_vote = $comment->votes[0];

                    if($comment_vote->vote != $vote)
                    {
                        // update it
                        $comment->votes[0]->vote = $vote;

                        $comment->vote = $comment->vote + ($vote * 2);
                        $comment->push();
                        return response('Success');
                    }
                    else
                    {
                        return response('Unauthorized.', 401);
                    }
                }
                else
                {
                    CommentVote::create([
                        'user_id' => \Auth::user()->id,
                        'comment_id' => \Request::get('comment'),
                        'vote' => $vote
                    ]);
                    $comment->vote = $comment->vote + $vote;
                    $comment->save();
                    return response('Success');
                }
            }
        }
        return response('Unauthorized.', 401);
    }
}