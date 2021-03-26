<img
class="{{ $class }}"
@if($id)
id="{{ $id }}"
@endif
src="{{ $value }}"
@if($title)
title="{{ $title }}"
@endif 
@if($width)
width="{{ $width }}"
@endif 
@if($height)
height="{{ $height }}"
@endif 
@include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes ?? null
])
/>