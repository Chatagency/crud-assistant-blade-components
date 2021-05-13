@php
    $vars = array_merge([
        'formClass' => "d-inline-block",
    ], get_defined_vars());
@endphp

@include(CACHelper('styleless')->component('form'), $vars)