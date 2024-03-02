<?php
  use function Laravel\Folio\name;

  name('projects.show');
?>
@extends('app')
@section('main')
<article class="project">
  <h1>{{ $project->title }}</h1>
  <p>Created at: {{ $project->created_at }}</p>
  <p>Updated at: {{ $project->updated_at }}</p>
  <a href="{{ route('projects.index') }}">Back to the list</a>
</article>
@endsection
