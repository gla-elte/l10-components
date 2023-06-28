<h1>{{ $category->name }}</h1>
<p>Létrehozása: {{ $category->created_at }}</p>
<p>Módosítása: {{ $category->updated_at }}</p>
<p>Kategóriához tartozó blogbejegyzések:</p>
<ul>
  @forelse ($category->posts as $post)
    <li><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></li>
  @empty
    <li>Nem tartozik még a kategóriához blogbejegyzés.</li>
  @endforelse
</ul>
<a href="/categories">Vissza a listára</a>
