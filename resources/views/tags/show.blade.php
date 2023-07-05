<h1>{{ $tag->name }}</h1>
<h2>Létrehozása: {{ $tag->created_at }} | Módosítása: {{ $tag->updated_at }}</h2>
<h3>Kapcsolódó blogbejegyzések:</h3>
<ul>
  @forelse ($tag->listOfPosts() as $post)
  <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
  @empty
  <li>Nincs hozzárendelve blogbejegyzés a címkéhez.</li>
  @endforelse
</ul>
<a href="{{ route('tags.index') }}">Vissza a listára</a>
