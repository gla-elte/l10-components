@props(['for'])

@error($for)
  <span {{ $attributes->merge(['style' => 'color: red;']) }}>{{ $message }}</span>
@enderror
