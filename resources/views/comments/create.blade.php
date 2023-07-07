<form action="{{ route('comments.store') }}" method="post">
  @csrf
  <div>
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" id="username" />
  </div>
  <div>
    <label for="content">Tartalma:</label>
    <textarea name="content" id="body" cols="30" rows="10"></textarea>
  </div>
  <div>
    <label for="post_id">Blogbejegyzés:</label>
    <select name="post_id" id="post_id">
    @foreach ($posts as $post)
        <option value="{{ $post->id }}">{{ $post->title }}</option>
    @endforeach
    </select>
  </div>
  <input type="submit" value="Mentés">
</form>
