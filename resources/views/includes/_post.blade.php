@php
  $published_at = new DateTimeImmutable($post->published_at);
@endphp
<!-- Post -->
<article class="post">
  <header>
    <div class="title">
      <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
      <p>
        @foreach ($post->tags as $tag)
        <a href="{{ route('tags.show', $tag->id) }}">#{{ $tag->name }}</a>
        @endforeach
      </p>
    </div>
    <div class="meta">
      <time class="published" datetime="{{ $published_at->format('Y-m-d') }}">{{ $published_at->format('F d, Y') }}</time>
      <a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ Vite::asset('resources/images/avatar.jpg') }}" alt="" /></a>
    </div>
  </header>
  <a href="{{ route('posts.show', $post->id) }}" class="image featured"><img src="{{ Vite::asset('resources/images/pic01.jpg') }}" alt="" /></a>
  <p>{{ $post->body }}</p>
  <footer>
    <ul class="actions">
      <li><a href="{{ route('posts.show', $post->id) }}" class="button large">Continue Reading</a></li>
    </ul>
    <ul class="stats">
      <li><a href="#">{{ $post->category->name }}</a></li>
      <li><a href="#" class="icon solid fa-heart">28</a></li>
      <li><a href="#" class="icon solid fa-comment">{{ $post->comments->count() }}</a></li>
    </ul>
  </footer>
</article>
