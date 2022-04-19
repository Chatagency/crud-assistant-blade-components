@php
    $attributes = $input->attributes ?? [];
    $value = isset($input->parent) ? $input->parent->value : null;
@endphp
<input
    @if(!isset($attributes['type']))
        type="{{ $input->type }}"
    @endif
    @if(!isset($attributes['name']))
        name="{{ isset($input->parent) ? $input->parent->name : null }}"
    @endif
    @if(!isset($attributes['value']))
        value="{{ $input->name }}"
    @endif
    @if(!isset($attributes['class']) && isset($class))
        class="{{ $class }}"
    @endif
    @if(!isset($attributes['id']))
        id="{{ $input->name }}"
    @endif

    @include(CACHelper()->partial('attributes'), [
        'attributes' => $attributes
    ]) 
  
  @if((isset($attributes['value']) && $value == $attributes['value']) || ($value == $input->name)) checked @endif>