<form action="/categories" method="post">
  @csrf
  <p>
    <label for="nev">Kategória neve:</label>
    <input type="text" name="name" id="nev">
  </p>
  <input type="submit" value="Mentés">
</form>
