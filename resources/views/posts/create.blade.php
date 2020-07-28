@extends('layouts.layout')

@section('content')
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="postTitle">Post title</label>
            <input type="text" class="form-control" id="postTitle" name="postTitle" aria-describedby="postTitleHelp" placeholder="Post title">
            <small id="postTitleHelp" class="form-text text-muted">Choose carefully!</small>
        </div>
        <div class="form-group">
            <label for="postBody">Body</label>
            <input type="text" class="form-control" id="postBody" name="postBody" placeholder="Body">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
