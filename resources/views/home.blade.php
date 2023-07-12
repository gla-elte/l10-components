@extends('app')
@section('main')
@foreach ($posts as $post)
  @include('includes._post')
@endforeach
{{-- {!! $posts->links() !!} --}}
<!-- Pagination -->
<ul class="actions pagination">
  @if ($posts->onFirstPage())
    <li><a href="" class="disabled button large previous">Previous Page</a></li>
  @else
    <li><a href="{{ $posts->previousPageUrl() }}" class="button large previous">Previous Page</a></li>
  @endif

  @for ($page = 1; $page <= $posts->lastPage(); $page++)
    <li><a href="{{ $posts->url($page) }}" class="@if($page == $posts->currentPage()) disabled @endif button large">{{ $page }}</a></li>
  @endfor

  @if ($posts->hasMorePages())
    <li><a href="{{ $posts->nextPageUrl() }}" class="button large next">Next Page</a></li>
  @else
    <li><a href="" class="disabled button large next">Next Page</a></li>
  @endif
</ul>
<div>Showing {{ $posts->currentPage() }} to {{ $posts->lastPage() }} of {{ $posts->total() }}</div>
@endsection
