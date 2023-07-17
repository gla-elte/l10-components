@extends('app')
@section('main')
<article class="category">
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
