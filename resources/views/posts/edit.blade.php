<form action="{{ route('posts.update', $post->id) }}" method="post">
  @csrf
  @method('put')
  <div>
    <label for="title">Blogbejegyzés címe:</label>
    <input type="text" name="title" id="title" value="{{ $post->title }}"/>
  </div>
  <div>
    <label for="slug">Útvonal elérése:</label>
    <input type="text" name="slug" id="slug" value="{{ $post->slug }}" />
  </div>
  <div>
    <label for="body">Tartalma:</label>
    <textarea name="body" id="body" cols="30" rows="10">{{ $post->body }}</textarea>
  </div>
  <div>
    <label for="category">Kategória:</label>
    <select name="category_id" id="category">
    @foreach ($categories as $category)
      <option value="{{ $category->id }}" @if($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
    @endforeach
    </select>
  </div>
  <div>
    <label for="score">Értékelés:</label>
    <input type="number" id="score" name="score" min="1.0" max="10.0" step="0.1" value="{{ $post->rating->score }}" />
  </div>
  <div>
    <label for="published_at">Publikálás:</label>
    <input type="datetime-local" name="published_at" id="published_at" value="{{ $post->published_at }}">
  </div>
  <input type="submit" value="Frissítés">
</form>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Törlés">
</form>
