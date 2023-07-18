@extends('app')
@section('main')
<article class="comment">
  <header>
    <div class="title">
      <h1>New comment</h1>
    </div>
  </header>
  <x-form action="{{ route('comments.store') }}" method="post">
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" />
    </div>
    <div>
      <label for="content">Content:</label>
      <textarea name="content" id="body" cols="30" rows="10"></textarea>
    </div>
    <div>
      <label for="post_id">Blog post:</label>
      <x-select name="post_id" id="post_id" :options="$posts" />
    </div>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
