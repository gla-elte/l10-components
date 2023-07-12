@extends('app')
@section('main')
<article class="category">
  <form action="{{ route('categories.store') }}" method="post">
    @csrf
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev">
    </p>
    <input type="submit" value="Save">
  </form>
</article>
@endsection
