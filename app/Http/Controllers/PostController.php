<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.posts', [
            'posts' => $posts,
        ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::get()->where('post_id', '=', $id);
        return view('posts.detail', ['post' => $post, 'comments' => $comments]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $post = new Post();
        $post->title = request('postTitle');
        $post->body = request('postBody');
        auth()->user()->publishPost($post);
        return redirect('/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

    public function postsByAuthor($id)
    {
        $user = User::findOrFail($id);
        $posts = $user->posts();
        return view('posts.posts', ['posts' => $posts, 'user' => $user]);
    }


}
