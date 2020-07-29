@extends('layouts.layout')

@section('content')
    <h1>Add comment to {{$post->title}}</h1>
    <form action="/posts/{{$post->id}}/comment" method="POST">
        @csrf
        <div class="form-group">
            <label for="commentBody">Body</label>
            <input type="text" class="form-control" id="commentBody" name="commentBody" placeholder="Body">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
