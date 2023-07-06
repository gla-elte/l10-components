<form action="{{ route('tags.store') }}" method="post">
  @csrf
  <div>
    <label for="name">Cimke neve:</label>
    <input type="text" name="name" id="name" />
  </div>
  <div>
    <label for="posts">Blogbejegyzései:</label>
    <select name="posts[]" id="posts" multiple>
      @forelse ($posts as $post)
        <option value="{{ $post->id }}">{{ $post->title }}</option>
      @empty
        <option value="0">Nincs még olyan blogbejegyzés, ami ehhez a címkéhez tartozna a blogon</option>
      @endforelse
    </select>
  </div>
  <input type="submit" value="Mentés">
</form>
