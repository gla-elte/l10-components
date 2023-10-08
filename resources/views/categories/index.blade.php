@extends('app')
@section('main')
<article class="category">
  <header>
    <div class="title">
      <h1>Categories</h1>
      <a href="{{ route('categories.create') }}">Create</a>
    </div>
  </header>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Operations</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
        <td><a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
      </tr>
    @endforeach
    </tbody>
  </table>
</article>
@endsection
