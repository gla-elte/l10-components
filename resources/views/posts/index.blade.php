<h1>Blogbejegyzések</h1>
<a href="{{ route('posts.create') }}">Létrehozás</a>
<table>
  <thead>
    <tr>
      <th>Cím</th>
      <th>Címkék száma</th>
      <th>Funkciók</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($posts as $post)
    <tr>
      <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
      <td>{{ $post->tags->count() }}</td>
      <td><a href="{{ route('posts.edit', $post->id) }}">Szerkesztés</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
