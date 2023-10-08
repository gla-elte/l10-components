@extends('app')
@section('main')
    <article class="tag">
        <header>
            <div class="title">
                <h1>Tags</h1>
                <a href="{{ route('tags.create') }}">Create</a>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th>Tag</th>
                    <th>No. of posts</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
                        <td>{{ $tag->numberOfPosts() }}</td>
                        <td><a href="{{ route('tags.edit', $tag->id) }}">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
@endsection
