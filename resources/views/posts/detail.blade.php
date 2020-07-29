@extends('layouts.layout')

@section('content')
        <div class="card text-center my-2">
            <div class="card-header">
                {{$post->author->name}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{$post->body}}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        @if(Auth::user() == $post->author)
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-warning">Delete post</button>
            </form>
        @endif

@endsection
