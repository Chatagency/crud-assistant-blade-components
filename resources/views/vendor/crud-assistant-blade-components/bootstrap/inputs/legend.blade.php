@php
  $attributes = $input->labelAttributes ?? [];
  $inputAttributes = $input->attributes ?? [];
@endphp
<legend 
  @if(!isset($attributes['class']))
    class="{{ $class ?? 'col-form-label' }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  
  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) >
    {{ $input->label }}
</legend>