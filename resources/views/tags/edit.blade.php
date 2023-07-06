<form action="{{ route('tags.update', $tag->id) }}" method="post">
  @csrf
  @method('put')
  <div>
    <label for="name">Cimke neve:</label>
    <input type="text" name="name" id="name" value="{{ $tag->name }}"/>
  </div>
  <div>
    <label for="posts">Blogbejegyzései:</label>
    <select name="posts[]" id="posts" multiple>
      @forelse ($posts as $post)
        <option value="{{ $post->id }} @selected($tag->posts->pluck('id')->contains($post->id))">{{ $post->title }}</option>
      @empty
        <option value="0">Nincs még olyan blogbejegyzés, ami ehhez a címkéhez tartozna a blogon</option>
      @endforelse
    </select>
  </div>
  <input type="submit" value="Frissítés">
</form>

<form action="{{ route('tags.destroy', $tag->id) }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Törlés">
</form>
