<h1>Blogbejegyzések</h1>
<a href="/posts/create">Létrehozás</a>
<table>
  <thead>
    <tr>
      <th>Cím</th>
      <th>Funkciók</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
        <td><a href="/posts/{{ $post->id }}/edit">Szerkesztés</a></td>
      </tr>
    @endforeach
  </tbody>
</table>
