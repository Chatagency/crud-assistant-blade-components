@php 
    $class = "form-input form-control ";
    $vars = get_defined_vars();
    $input = $vars['input'];
    $input->class = $class.($input->class ?? null);
@endphp

@include(CACHelper('styleless')->input('select', $vars))
