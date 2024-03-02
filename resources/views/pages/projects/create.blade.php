<?php
  use function Laravel\Folio\name;

  name('projects.create');
?>
@extends('app')
@section('main')
<article class="project">
  <header>
    <div class="title">
      <h1>New project</h1>
    </div>
  </header>
  <x-form
    method="post"
    action="{{ route('projects.store') }}"
    >
    <p>
      <label for="title">Project's title:</label>
      <input type="text" name="title" id="title" required maxlength="255" value="{{ old('title') }}">
      <x-input-error for="title" />
    </p>
    <input type="submit" value="Save">
  </x-form>
</article>
@endsection
