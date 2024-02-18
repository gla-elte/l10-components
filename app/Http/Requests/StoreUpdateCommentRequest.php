<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCommentRequest extends FormRequest
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
      'username' => 'required|max:255',
      'content' => 'required',
      'post_id' => 'required|exists:posts,id',
    ];
  }

  public function messages() : array {
    return [
      'post_id.exists' => 'Missing :attribute in posts table'
    ];
  }

  public function attributes() : array {
    return [
      'post_id' => 'post identification'
    ];
  }
}
