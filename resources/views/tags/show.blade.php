<h1>{{ $tag->name }}</h1>
<h2>Létrehozása: {{ $tag->created_at }} | Módosítása: {{ $tag->updated_at }}</h2>
<a href="{{ route('tags.index') }}">Vissza a listára</a>
