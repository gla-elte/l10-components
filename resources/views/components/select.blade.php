@props([
  'name' => '',
  'id' => '',
  'options' => [],
  'selectedValues' => collect()
])

<select name="{{ $name }}" id="{{ $id }}" {{ $attributes }}>
@foreach ($options as $key => $value)
  <option value="{{ $key }}" @selected( $selectedValues->contains($key) ) >{{ $value }}</option>
@endforeach
</select>
