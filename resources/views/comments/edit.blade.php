@extends('app')
@section('main')
<article class="comment">
  <header>
    <div class="title">
      <h1>Edit/Delete comment</h1>
    </div>
  </header>
  <x-form action="{{ route('comments.update', $comment->id) }}" method="put">
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" value="{{ $comment->username }}" />
    </div>
    <div>
      <label for="content">Content:</label>
      <textarea name="content" id="body" cols="30" rows="10">{{ $comment->content }}</textarea>
    </div>
    <div>
      <label for="post_id">Blog post:</label>
      <x-select name="post_id" id="post_id" :options="$posts" :selectedValues="collect($comment->post_id)" />
    </div>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('comments.destroy', $comment->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
</article>
@endsection
