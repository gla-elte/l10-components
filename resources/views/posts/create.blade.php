<form action="{{ route('posts.store') }}" method="post">
  @csrf
  <div>
    <label for="title">Blogbejegyzés címe:</label>
    <input type="text" name="title" id="title" />
  </div>
  <div>
    <label for="slug">Útvonal elérése:</label>
    <input type="text" name="slug" id="slug" />
  </div>
  <div>
    <label for="body">Tartalma:</label>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
  </div>
  <div>
    <label for="category">Kategória:</label>
    <select name="category_id" id="category">
      @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>
  </div>
  <div>
    <label for="score">Értékelés:</label>
    <input type="number" id="score" name="score" min="1.0" max="10.0" step="0.1" value="1.0" />
  </div>
  <div>
    <label for="published_at">Publikálás:</label>
    <input type="datetime-local" name="published_at" id="published_at" value="{{ now()->format('Y-m-d\TH:i') }}">
  </div>
  <input type="submit" value="Mentés">
</form>
