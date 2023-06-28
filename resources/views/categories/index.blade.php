<h1>Kategóriák</h1>
<a href="/categories/create">Létrehozás</a>
<table>
  <thead>
    <tr>
      <th>Név</th>
      <th>Funkciók</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
      <tr>
        <td><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></td>
        <td><a href="/categories/{{ $category->id }}/edit">Szerkesztés</a></td>
      </tr>
    @endforeach
  </tbody>
</table>
