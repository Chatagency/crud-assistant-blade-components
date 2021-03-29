@php
  $attributes = $input->attributes ?? [];
@endphp
<input
  @if(!isset($attributes['type']))
    type="{{ $input->type }}"
  @endif
  @if(!isset($attributes['name']))
    name="{{ $radioName }}"
  @endif
  @if(!isset($attributes['value']))
    value="{{ $input->name }}"
  @endif
  @if(!isset($attributes['class']))
    class="{{ $class ?? 'form-check-inpu' }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  
  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) >