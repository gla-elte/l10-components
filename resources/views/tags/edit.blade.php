<form action="{{ route('tags.update', $tag->id) }}" method="post">
  @csrf
  @method('put')
  <div>
    <label for="name">Cimke neve:</label>
    <input type="text" name="name" id="name" value="{{ $tag->name }}"/>
  </div>
  <input type="submit" value="Frissítés">
</form>

<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Törlés">
</form>
