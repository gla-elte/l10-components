<h1>{{ $post->title }}</h1>
<h2>{{ $post->slug }}</h2>
<h3>Létrehozása: {{ $post->created_at }} | Módosítása: {{ $post->updated_at }}</h3>
<h3>Kategória:</h3>
<a href="{{ route('categories.show', $post->category_id) }}">{{ $post->category->name }}</a>
<p>{{ $post->body }}</p>
<h3>Értékelése: {{ $post->rating->score }}</h3>
<a href="/posts">Vissza a listára</a>
