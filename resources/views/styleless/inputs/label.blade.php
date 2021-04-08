@php
    $attributes = $input->labelAttributes ?? [];
    $inputAttributes = $input->attributes ?? [];
@endphp
<label 
    @if(!isset($attributes['for']))
        for="{{ $inputAttributes['id'] ?? $input->name }}"
    @endif
    @if(!isset($attributes['class']) && isset($class))
        class="{{ $class }}"
    @endif

    @include(CACHelper()->partial('attributes'), [
        'attributes' => $attributes
    ]) >
    {{ $input->label }}
</label>