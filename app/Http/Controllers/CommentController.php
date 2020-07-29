<?php


namespace App\Http\Controllers;


use App\Comment;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($postId)
    {
        $post = Post::findOrFail($postId);
        return view('comment.create', ['post' => $post]);
    }

    public function store($postId)
    {
        $comment = new Comment();
        $comment->author_id = Auth::user()->id;
        $comment->body = request('commentBody');
        $post = Post::findOrFail($postId);
        $post->addComment($comment);
        return redirect('/posts/' . $postId);
    }


}
