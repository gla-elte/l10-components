<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
      'slug' => $this->slug,
      'body' => $this->body,
      'publishedAt' => $this->published_at,
      'ratingId' => $this->rating_id,
      'categoryId' => $this->category_id,
    ];
  }
}
