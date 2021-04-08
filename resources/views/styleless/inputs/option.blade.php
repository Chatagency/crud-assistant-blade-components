@php
    $attributes = $input->attributes ?? [];
@endphp
<option 
    @if(!isset($attributes['value']))
        value="{{ $input->name }}"
    @endif

    @include(CACHelper()->partial('attributes'), [
        'attributes' => $attributes
    ])

  @if($value == $input->name) selected @endif >
    {{ $input->label }}
</option>