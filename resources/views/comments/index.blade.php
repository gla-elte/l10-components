<h1>Kommentek</h1>
<a href="{{ route('comments.create') }}">Létrehozás</a>
<table>
  <thead>
    <tr>
      <th>Szerző</th>
      <th>Tartalma</th>
      <th>Funkciók</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($comments as $comment)
    <tr>
      <td>{{ $comment->username }}</td>
      <td><a href="{{ route('comments.show', $comment->id) }}">{{ $comment->content }}</a></td>
      <td><a href="{{ route('comments.edit', $comment->id) }}">Szerkesztés</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
