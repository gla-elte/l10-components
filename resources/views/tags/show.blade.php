@extends('app')
@section('main')
    <article class="tag">
        <header>
            <div class="title">
                <h1>{{ $tag->name }}</h1>
            </div>
        </header>
        <h2>Created at: {{ $tag->created_at }}</h2>
        <h2>Updated at: {{ $tag->updated_at }}</h2>
        <h3>Related posts:</h3>
        <ul>
            @forelse ($tag->listOfPosts() as $post)
                <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
            @empty
                <li>There are not any blog posts.</li>
            @endforelse
        </ul>
        <a href="{{ route('tags.index') }}">Back to the list</a>
    @endsection
