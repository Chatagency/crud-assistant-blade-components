@php
  $attributes = $input->labelAttributes ?? [];
  $inputAttributes = $input->attributes ?? [];
@endphp
<label 
  @if(!isset($attributes['for']))
    for="{{ $inputAttributes['id'] ?? $input->name}}"
  @endif
  @if(!isset($attributes['class']))
    class="{{ $class ?? 'form-label' }}"
  @endif

  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) >
    {{ $input->label }}
</label>