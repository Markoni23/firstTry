@extends('layouts.layout')

@section('content')

@foreach($posts as $post)
    <div class="card text-center my-2">
        <div class="card-header">
            {{ $post->author->name}}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->body}}</p>
            <a href="/posts/{{$post->id}}" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endforeach
@endsection
