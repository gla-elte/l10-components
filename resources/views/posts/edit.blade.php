@extends('app')
@section('main')
<article class="post">
  <header>
    <div class="title">
      <h1>Edit/Delete post</h1>
    </div>
  </header>
  <x-form
    action="{{ route('posts.update', $post->id) }}"
    method="put"
    name="post-edit"
    onsubmit="return validateForm();"
    novalidate
  >
    <div>
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" value="{{ old('title') ?? $post->title }}" required minlength="5" maxlength="100"/>
      <x-input-error for="title" />
    </div>
    <div>
      <label for="slug">Slug:</label>
      <input type="text" name="slug" id="slug" value="{{ old('slug') ?? $post->slug }}" required pattern="[a-z]+[-]{1}[a-z]+" placeholder="first-post" />
      <x-input-error for="slug" />
    </div>
    <div>
      <label for="body">Body:</label>
      <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body') ?? $post->body }}</textarea>
      <x-input-error for="body" />
    </div>
    <div>
      <label for="category_id">Category:</label>
      <x-select name="category_id" id="category_id" :options="$categories" required :selectedValues="collect(old('category_id') ?? $post->category_id)" />
      <x-input-error for="category_id" />
    </div>
    <div>
      <label for="score">Score:</label>
      <input type="number" id="score" name="score" min="1.0" max="10.0" step="0.1" required value="{{ old('score') ?? $post->rating->score }}" />
      <x-input-error for="score" />
    </div>
    <div>
      <label for="published_at">Published at:</label>
      <input type="datetime-local" name="published_at" id="published_at" required value="{{ old('published_at') ?? $post->published_at }}">
      <x-input-error for="published_at" />
    </div>
    <div>
      <label for="tags">Tags:</label>
      <x-select name="tags[]" id="tags" :options="$tags" multiple size="10" style="height: 100%" required :selectedValues="old('tags') ? collect(old('tags')) : $post->tags->pluck('id')"/>
      <x-input-error for="tags" />
    </div>
    <input type="submit" value="Update">
  </x-form>

  <x-form-button action="{{ route('posts.destroy', $post->id) }}" method="delete" style="background-color: red">
    Delete
  </x-form-button>
</article>
@endsection

@push('validation-scripts')
<script>
function validateForm() {
  const title = document.forms["post-edit"]["title"].value;
  if (title == "") {
    alert("The title field is required.");
    return false;
  }

  const tags = document.forms["post-edit"]["tags[]"].selectedOptions;
  if(tags.length < 1) {
    alert("Minimum 1 selected tag is required.");
    return false;
  }
}
</script>
@endpush
