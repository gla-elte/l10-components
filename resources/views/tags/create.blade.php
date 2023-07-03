<form action="{{ route('tags.store') }}" method="post">
  @csrf
  <div>
    <label for="name">Cimke neve:</label>
    <input type="text" name="name" id="name" />
  </div>
  <input type="submit" value="Mentés">
</form>
