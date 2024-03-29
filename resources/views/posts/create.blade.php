@extends('app')
@section('main')
<article class="post">
  <header>
    <div class="title">
      <h1>New post</h1>
    </div>
  </header>
  <x-form action="{{ route('posts.store') }}" method="post" name="post-create" novalidate>
    <div>
      <label for="title">Title:</label>
      <input type="text" name="title" id="title" required minlength="5" maxlength="100" value="{{ old('title') }}" />
      <x-input-error for="title" />
    </div>
    <div>
      <label for="slug">Slug:</label>
      <input type="text" name="slug" id="slug" required pattern="[a-z]+[-]{1}[a-z]+" placeholder="first-post" value="{{ old('slug') }}" />
      <x-input-error for="slug" />
    </div>
    <div>
      <label for="body">Body:</label>
      <textarea name="body" id="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
      <x-input-error for="body" />
    </div>
    <div>
      <label for="category_id">Category:</label>
      <x-select name="category_id" id="category_id" :options="$categories" required :selectedValues="collect(old('category_id'))" />
      <x-input-error for="category_id" />
    </div>
    <div>
      <label for="score">Score:</label>
      <input type="number" id="score" name="score" min="1.0" max="10.0" step="0.1" value="1.0" required value="{{ old('score') }}" />
      <x-input-error for="score" />
    </div>
    <div>
      <label for="published_at">Published at:</label>
      <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') ?? now()->format('Y-m-d H:i') }}" required >
      <x-input-error for="published_at" />
    </div>
    <div>
      <label for="tags">Tags:</label>
      <x-select name="tags[]" id="tags" :options="$tags" multiple size="10" style="height: 100%" required :selectedValues="collect(old('tags'))" />
      <x-input-error for="tags" />
    </div>
    <input type="submit" value="Save" dusk="save-button">
  </x-form>
</article>
@endsection

@push('validation-scripts')
<script>
// Step 1.: required attribute
const myform = document.forms["post-create"];
field = Array.from(myform.elements);
field.forEach(i => {
  if (i.validity.valueMissing) {
    i.setCustomValidity('There must be a value to the field.');
  } else {
    i.setCustomValidity('');
  }
});


// Step 2.: other specific validation attributes
// -------------- title --------------
const title = document.getElementById("title");

title.addEventListener("input", (event) => {
  if (title.validity.tooLong || title.validity.tooShort) {
    title.setCustomValidity("The title must be at least 5 and no more than 100 characters long!");
  } else {
    title.setCustomValidity("");
  }
});

// -------------- slug --------------
const slug = document.getElementById("slug");

slug.addEventListener("input", (event) => {
  if (slug.validity.patternMismatch) {
    slug.setCustomValidity("Follow the pattern: the slug should consist of two lower case words separated by a hyphen!");
  } else {
    slug.setCustomValidity("");
  }
});

// -------------- score --------------
const score = document.getElementById("score");

score.addEventListener("input", (event) => {
  if (score.validity.rangeOverflow || score.validity.rangeUnderflow) {
    score.setCustomValidity("The score must be between 1.0 and 10.0!");
  } else {
    score.setCustomValidity("");
  }
});
</script>
@endpush
