@php
  $attributes = $input->attributes ?? [];
  $defaultValue = 1;
@endphp
<input
  @if(!isset($attributes['type']))
    type="{{ $input->type }}"
  @endif
  @if(!isset($attributes['name']))
    name="{{ $input->name }}"
  @endif
  @if(!isset($attributes['class']))
    class="{{ $class ?? 'mr-1' }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  @if(!isset($attributes['value']))
    value="{{ $defaultValue }}"
  @endif

  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) 
  @if($input->value == $defaultValue || (isset($attributes['value']) && $input->value = $attributes['value']))
    checked
  @endif >

