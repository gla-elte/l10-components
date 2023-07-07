<form action="{{ route('comments.update', $comment->id) }}" method="post">
  @csrf
  @method('put')
  <div>
    <label for="username">Felhasználónév:</label>
    <input type="text" name="username" id="username" value="{{ $comment->username }}" />
  </div>
  <div>
    <label for="content">Tartalma:</label>
    <textarea name="content" id="body" cols="30" rows="10">{{ $comment->content }}</textarea>
  </div>
  <div>
    <label for="post_id">Blogbejegyzés:</label>
    <select name="post_id" id="post_id">
    @foreach ($posts as $post)
        <option value="{{ $post->id }}" @selected($comment->post_id == $post->id) >{{ $post->title }}</option>
    @endforeach
    </select>
  </div>
  <input type="submit" value="Frissítés">
</form>

<form action="{{ route('comments.destroy', $comment->id) }}" method="post">
  @csrf
  @method('delete')
  <input type="submit" value="Törlés">
</form>
