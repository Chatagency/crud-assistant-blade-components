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
    @if(!isset($attributes['class']) && isset('class'))
        class="{{ $class }}"
    @endif
    @if(!isset($attributes['id']))
        id="{{ $input->name }}"
    @endif

    @include(CACHelper()->partial('attributes'), [
        'attributes' => $attributes
    ]) 
  
  @if((isset($attributes['value']) && $value == $attributes['value']) || ($value == $input->name)) checked @endif>