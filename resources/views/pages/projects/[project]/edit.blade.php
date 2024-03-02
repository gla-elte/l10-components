<?php
  use function Laravel\Folio\name;

  name('projects.edit');
?>
@extends('app')
@section('main')
<article class="project">
  <header>
    <div class="title">
      <h1>Edit/Delete project</h1>
    </div>
  </header>
  <x-form
    action="{{ route('projects.update', $project->id) }}"
    method="put"
    {{-- novalidate --}}
  >
    <p>
      <label for="title">Projects's title:</label>
      <input type="text" name="title" id="title" required maxlength="255" value="{{ old('title') ?? $project->title }}">
      <x-input-error for="title" />
    </p>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('projects.destroy', $project->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
</article>
@endsection

