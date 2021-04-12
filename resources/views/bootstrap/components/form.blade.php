@php
    $vars = array_merge( get_defined_vars(), [
        'formClass' => "d-inline-block",
    ]);
@endphp

@include(CACHelper('styleless')->component('form'), $vars)