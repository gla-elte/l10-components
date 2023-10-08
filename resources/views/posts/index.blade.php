@extends('app')
@section('main')
    <article class="post">
        <header>
            <div class="title">
                <h1>Posts</h1>
                <a href="{{ route('posts.create') }}">Create</a>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>No. of tags</th>
                    <th>No. of comments</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->tags->count() }}</td>
                        <td>{{ $post->comments->count() }}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
@endsection
