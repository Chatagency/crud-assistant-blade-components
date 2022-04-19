@php
    $vars = array_merge( get_defined_vars(), [
        'formClass' => "inline",
    ]);
@endphp

@include(CACHelper('styleless')->component('form'), $vars)