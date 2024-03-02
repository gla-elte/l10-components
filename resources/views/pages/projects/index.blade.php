<?php
  use function Laravel\Folio\name;

  name('projects.index');

  $projects = \App\Models\Project::all();
?>

@extends('app')
@section('main')
  <article class="project">
    <header>
      <div class="title">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}">Create</a>
      </div>
    </header>
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <td><a href="{{ route('projects.show', ['project' => $project]) }}">{{ $project->title }}</a></td>
            <td><a href="{{ route('projects.edit', ['project' => $project]) }}">Edit</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </article>
@endsection
