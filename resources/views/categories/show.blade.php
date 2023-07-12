@extends('app')
@section('main')
<article class="category">
  <h1>{{ $category->name }}</h1>
  <p>Created at: {{ $category->created_at }}</p>
  <p>Updated at: {{ $category->updated_at }}</p>
  <p>Related posts:</p>
  <ul>
  @forelse ($category->posts as $post)
    <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
  @empty
    <li>There are not any blog posts.</li>
  @endforelse
  </ul>
  <a href="{{ route('categories.index') }}">Back to the list</a>
</article>
@endsection
