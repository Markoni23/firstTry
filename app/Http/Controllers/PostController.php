<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->get();

        return view('posts.posts', [
            'posts' => $posts,
        ]);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.detail', ['post' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $post = new Post();
        $post->title = request('postTitle');
        $post->body = request('postBody');
        auth()->user()->publishPost($post);
        return redirect('/posts');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }
}
