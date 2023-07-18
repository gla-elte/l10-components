@extends('app')
@section('main')
<article class="category">
  <header>
    <div class="title">
      <h1>New category</h1>
    </div>
  </header>
  <x-form
    method="post"
    action="{{ route('categories.store') }}"
    {{-- style="background-color: lightgray" --}}
    >
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev">
    </p>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
