@extends('app')
@section('main')
<article class="category">
  <form action="{{ route('categories.update', $category->id) }}" method="post">
    @csrf
    @method('put')
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev" value="{{ $category->name }}">
    </p>
    <input type="submit" value="Update">
  </form>

  <form action="{{ route('categories.destroy', $category->id) }}" method="post">
    @csrf
    @method('delete')
    <input type="submit" value="Delete">
  </form>
</article>
@endsection
