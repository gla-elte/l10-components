<form action="/categories/{{ $category->id }}" method="post">
  @csrf
  @method('put')
  <p>
    <label for="nev">Kategória neve:</label>
    <input type="text" name="name" id="nev" value="{{ $category->name }}">
  </p>
  <input type="submit" value="Frissítés">
</form>

<form action="/categories/{{ $category->id }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Törlés">
</form>
