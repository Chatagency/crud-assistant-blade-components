@php
  $attributes = $input->attributes ?? [];
@endphp
<textarea 
  
  @if(!isset($attributes['name']))
    name="{{ $input->name }}"
  @endif
  @if(!isset($attributes['class']))
    class="{{ $class ?? 'form-control' }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  @if(!isset($attributes['rows']))
    rows="{{ $input->rows ?? '5' }}"
  @endif
  @if(!isset($attributes['columns']))
    columns="{{ $input->columns ?? '10' }}"
  @endif

  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) >{{ $attributes['value'] ?? $input->value }}</textarea>