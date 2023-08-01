<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PostPublishedAt implements ValidationRule
{
  /**
   * Run the validation rule.
   *
   * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    if(date('Y-m-d', strtotime($value)) > now()->format('Y-m-d')) {
      $fail('validation.before_or_equal')->translate([
        'attribute' => $attribute
      ], 'de');
    }
  }
}
