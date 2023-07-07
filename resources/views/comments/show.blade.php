<h1>{{ $comment->username }}</h1>
<h2>Létrehozása: {{ $comment->created_at }} | Módosítása: {{ $comment->updated_at }}</h2>
<h3>Tartalma:</h3>
<p>{{ $comment->content }}</p>
<h3>Kapcsolódó blogbejegyzés:</h3>
<p><a href="{{ route('posts.show', $comment->post->id) }}">{{ $comment->post->title }}</a></p>
<p><a href="{{ route('comments.index') }}">Vissza a listára</a></p>
