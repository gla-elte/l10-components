@extends('app')
@section('main')
<article class="category">
  <x-form action="{{ route('categories.update', $category->id) }}" method="put">
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev" value="{{ $category->name }}">
    </p>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('categories.destroy', $category->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
</article>
@endsection
