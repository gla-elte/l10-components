<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategoryRequest extends FormRequest
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
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name' => 'required|max:255|unique:categories',
    ];
  }

  public function messages()
  {
    return [
      'required' => 'The Category\'s name is required.',
      'max' => 'The Category\'s name could be maximum :max characters.',
      'unique' => 'The Category\'s name must be unique in categories table.',
    ];
  }
}
