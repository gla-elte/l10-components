@extends('app')
@section('main')
<article class="category">
  <header>
    <div class="title">
      <h1>New category</h1>
    </div>
  </header>
  @include('includes._errors')
  <x-form
    method="post"
    action="{{ route('categories.store') }}"
    {{-- style="background-color: lightgray" --}}
    novalidate
    >
    <p>
      <label for="nev">Category's name:</label>
      <input type="text" name="name" id="nev" required maxlength="255" value="{{ old('name') }}">
      {{-- @error('name')
        <span style="color: red;">{{ $message }}</span>
      @enderror --}}
      <x-input-error for="name" />
    </p>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
