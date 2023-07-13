@extends('app')
@section('main')
<article class="tag">
<form action="{{ route('tags.store') }}" method="post">
  @csrf
  <p>
    <label for="name">Tag's name:</label>
    <input type="text" name="name" id="name" />
  </p>
  <p>
    <label for="posts">Related posts:</label>
    <select name="posts[]" id="posts" multiple style="height: 100%" size="10">
      @forelse ($posts as $post)
        <option value="{{ $post->id }}">{{ $post->title }}</option>
      @empty
        <option value="0">-</option>
      @endforelse
    </select>
  </p>
  <input type="submit" value="Save">
</form>
</article>
@endsection
