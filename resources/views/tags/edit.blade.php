@extends('app')
@section('main')
<article class="tag">
  <header>
    <div class="title">
      <h1>Edit/Delete tag</h1>
    </div>
  </header>
  <x-form action="{{ route('tags.update', $tag->id) }}" method="put" novalidate>
    <p>
      <label for="name">Tag's name:</label>
      <input type="text" name="name" id="name" value="{{ old('name') ?? $tag->name }}" required maxlength="255" />
      <x-input-error for="name" />
    </p>
    <p>
      <label for="posts">Related posts:</label>
      <x-select name="posts[]" id="posts" :options="$posts" multiple size="10" style="height: 100%" required :selectedValues="old('posts') ? collect(old('posts')) : $tag->posts->pluck('id')"/>
      <x-input-error for="posts" />
    </p>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('tags.destroy', $tag->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
@endsection
