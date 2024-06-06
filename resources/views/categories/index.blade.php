@extends('app')
@section('main')
<article class="category">
  <header>
    <div class="title">
      <h1>Categories</h1>
      @auth
        <a href="{{ route('categories.create') }}">Create</a>
      @endauth
    </div>
  </header>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        @auth
          <th>Operations</th>
        @endauth
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
        @auth
          <td><a href="{{ route('categories.edit', $category->id) }}">Edit</a></td>
        @endauth
      </tr>
    @endforeach
    </tbody>
  </table>
</article>
@endsection
