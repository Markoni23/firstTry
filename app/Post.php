<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class); // ????
    }

    public function addComment($comment)
    {
        $comment->post_id = $this->id;
        $comment->save();
    }
}
