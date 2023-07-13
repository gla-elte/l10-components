@extends('app')
@section('main')
<article class="tag">
<form action="{{ route('tags.update', $tag->id) }}" method="post">
  @csrf
  @method('put')
  <p>
    <label for="name">Tag's name:</label>
    <input type="text" name="name" id="name" value="{{ $tag->name }}"/>
  </p>
  <p>
    <label for="posts">Related posts:</label>
    <select name="posts[]" id="posts" multiple style="height: 100%" size="10">
      @forelse ($posts as $post)
        <option value="{{ $post->id }}" @selected($tag->posts->pluck('id')->contains($post->id)) >{{ $post->title }}</option>
      @empty
        <option value="0">-</option>
      @endforelse
    </select>
  </p>
  <input type="submit" value="Update">
</form>

<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Delete">
</form>
@endsection
