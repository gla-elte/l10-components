@extends('app')
@section('main')
<article class="post">
  <header>
    <div class="title">
      <h1>New post</h1>
    </div>
  </header>
  <x-form action="{{ route('posts.store') }}" method="post">
    <div>
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" />
    </div>
    <div>
      <label for="slug">Slug:</label>
      <input type="text" name="slug" id="slug" />
    </div>
    <div>
      <label for="body">Body:</label>
      <textarea name="body" id="body" cols="30" rows="10"></textarea>
    </div>
    <div>
      <label for="category_id">Category:</label>
      <x-select name="category_id" id="category_id" :options="$categories" />
    </div>
    <div>
      <label for="score">Score:</label>
      <input type="number" id="score" name="score" min="1.0" max="10.0" step="0.1" value="1.0" />
    </div>
    <div>
      <label for="published_at">Published at:</label>
      <input type="datetime-local" name="published_at" id="published_at" value="{{ now()->format('Y-m-d H:i') }}">
    </div>
    <div>
      <label for="tags">Tags:</label>
      <x-select name="tags[]" id="tags" :options="$tags" multiple size="10" style="height: 100%"/>
    </div>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
