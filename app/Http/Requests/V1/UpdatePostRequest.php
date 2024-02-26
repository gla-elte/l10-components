<?php

namespace App\Http\Requests\V1;

use App\Rules\Lowercase;
use App\Rules\PostPublishedAt;
use App\Http\Requests\V1\StorePostRequest;

class UpdatePostRequest extends StorePostRequest
{
  public function rules(): array
  {
    $method = $this->method;

    if ($method == 'PUT')
    {
      return parent::rules();
    }
    else
    { // 'PATCH'
      return [
        'title' => 'sometimes|required|min:5|max:100',
        'slug' => ['sometimes', 'required', 'max:255', 'regex:/^[a-z]+[-]{1}[a-z]+$/', new Lowercase],
        'body' => 'sometimes|required',
        'published_at' => ['sometimes', 'required', new PostPublishedAt], // before_or_equal:today vagy before:tomorrow
        'score' => 'sometimes|required|numeric|between:1.0,10.0',
        'category_id' => 'sometimes|required|exists:categories,id',
        'tags' => 'sometimes|required|exists:tags,id',
      ];
    }
  }

  public function prepareForValidation()
  {
    if($this->publishedAt)
    {
      $this->merge([
        'published_at' => $this->publishedAt
      ]);
    }
    if($this->categoryId)
    {
      $this->merge([
        'category_id' => $this->categoryId,
      ]);
    }
  }
}
