@extends('app')
@section('main')
    <article class="post">
        <h1>{{ $post->title }}</h1>
        <h2>{{ $post->slug }}</h2>
        <h3>Created at: {{ $post->created_at }} | Updated at: {{ $post->updated_at }}</h3>
        <h3>Post's category:</h3>
        <a href="{{ route('categories.show', $post->category_id) }}">{{ $post->category->name }}</a>
        <p>{{ $post->body }}</p>
        <h3>Score: {{ $post->rating->score }}</h3>
        <h3>Related tags:</h3>
        <ul>
            @forelse ($post->tags as $tag)
                <li><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></li>
            @empty
                <li>No tags.</li>
            @endforelse
        </ul>
        <h3>Related comments:</h3>
        <ul>
            @forelse ($post->comments as $comment)
                <li>{{ $comment->username . ': ' . $comment->content }}</li>
            @empty
                <li>There are no comments to this blog post.</li>
            @endforelse
        </ul>
        <a href="{{ route('posts.index') }}">Back to the list</a>
    </article>
@endsection
