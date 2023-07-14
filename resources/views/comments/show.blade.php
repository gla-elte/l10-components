@extends('app')
@section('main')
<article class="comment">
<h1>{{ $comment->username }}</h1>
<h2>Created at: {{ $comment->created_at }} | Updated at: {{ $comment->updated_at }}</h2>
<h3>Content:</h3>
<p>{{ $comment->content }}</p>
<h3>Related post:</h3>
<p><a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a></p>
<p><a href="{{ route('comments.index') }}">Back to the list</a></p>
</article>
@endsection
