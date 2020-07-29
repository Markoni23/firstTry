@extends('layouts.layout')

@section('content')
        <div class="card text-center my-2">
            <div class="card-header">
                {{$post->author->name}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->body}}</p>
            </div>
        </div>
        @if(Auth::user() == $post->author)
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning">Delete post</button>
            </form>
        @endif
        <a href="/posts/{{$post->id}}/comment" class="btn btn-primary">Add comment</a>

        <div class="container mt-1">
            <h1>Comments:</h1>
        @foreach($comments as $comment)
                <div class="card w-50">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p class="card-text">{{$comment->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
