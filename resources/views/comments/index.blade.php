@extends('app')
@section('main')
<article class="comment">
    <header>
        <div class="title">
            <h1>Comments</h1>
            <a href="{{ route('comments.create') }}">Create</a>
        </div>
    </header>
    <table>
        <thead>
            <tr>
            <th>User</th>
            <th>Content</th>
            <th>Operations</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($comments as $comment)
            <tr>
            <td>{{ $comment->username }}</td>
            <td><a href="{{ route('comments.show', $comment->id) }}">{{ $comment->content }}</a></td>
            <td><a href="{{ route('comments.edit', $comment->id) }}">Edit</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</article>
@endsection
