<?php

namespace App\Http\Requests;

use App\Rules\Lowercase;
use App\Rules\PostPublishedAt;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePostRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
      return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
   */
  public function rules(): array
  {
    return [
      'title' => 'required|min:5|max:100',
      'slug' => ['required', 'max:255', 'regex:/^[a-z]+[-]{1}[a-z]+$/', new Lowercase],
      'body' => 'required',
      'published_at' => ['required', new PostPublishedAt], // before_or_equal:today vagy before:tomorrow
      'score' => 'required|numeric|between:1.0,10.0',
      'category_id' => 'required|exists:categories,id',
      'tags' => 'required|exists:tags,id',
    ];
  }
}
