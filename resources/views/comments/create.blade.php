@extends('app')
@section('main')
<article class="comment">
  <header>
    <div class="title">
      <h1>New comment</h1>
    </div>
  </header>
  <x-form action="{{ route('comments.store') }}" method="post" novalidate>
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required maxlength="255" value="{{ old('username') }}" />
      <x-input-error for="username" />
    </div>
    <div>
      <label for="content">Content:</label>
      <textarea name="content" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
      <x-input-error for="body" />
    </div>
    <div>
      <label for="post_id">Blog post:</label>
      <x-select name="post_id" id="post_id" :options="$posts" required :selectedValues="collect(old('post_id'))" />
      <x-input-error for="post_id" />
    </div>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
