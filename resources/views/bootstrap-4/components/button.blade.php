@php
    $vars = array_merge([
        'class' => "btn btn-primary",
    ], get_defined_vars());
@endphp
@include(CACHelper('styleless')->component('button', $vars))