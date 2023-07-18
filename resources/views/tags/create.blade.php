@extends('app')
@section('main')
<article class="tag">
  <header>
    <div class="title">
      <h1>New tag</h1>
    </div>
  </header>
  <x-form action="{{ route('tags.store') }}" method="post">
    <p>
      <label for="name">Tag's name:</label>
      <input type="text" name="name" id="name" />
    </p>
    <p>
      <label for="posts">Related posts:</label>
      <x-select name="posts[]" id="posts" :options="$posts" multiple size="10" style="height: 100%"/>
    </p>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
