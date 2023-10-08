@extends('app')
@section('main')
<article class="category">
  <header>
    <div class="title">
      <h1>Edit/Delete category</h1>
    </div>
  </header>
  <x-form
    action="{{ route('categories.update', $category->id) }}"
    method="put"
    novalidate
  >
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev" required maxlength="255" value="{{ old('name') ?? $category->name }}">
      <x-input-error for="name" />
    </p>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('categories.destroy', $category->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
</article>
@endsection
