<?php

namespace App\Http\Requests\V1;

use App\Http\Requests\StorePostRequest as WebStorePostRequest;

class StorePostRequest extends WebStorePostRequest
{
  public function prepareForValidation()
  {
    $this->merge([
      'published_at' => $this->publishedAt,
      'category_id' => $this->categoryId,
    ]);
  }
}
