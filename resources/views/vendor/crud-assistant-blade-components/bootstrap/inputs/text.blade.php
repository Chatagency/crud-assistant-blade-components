@php
  $attributes = $input->attributes ?? [];
@endphp
<input 
  @if(!isset($attributes['type']))
    type="{{ $input->type }}"
  @endif
  @if(!isset($attributes['name']))
    name="{{ $input->name }}"
  @endif
  @if(!isset($attributes['class']))
    class="form-input form-control {{ $class ?? null }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  @if(!isset($attributes['value']) && $input->type !== 'file')
    value="{{ $input->value ?? null }}"
  @endif
  @include(CACHelper()->partial('attributes'), [
    'attributes' => $input->attributes
  ]) >
