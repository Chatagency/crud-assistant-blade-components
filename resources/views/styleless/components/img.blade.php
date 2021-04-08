@php
    $attributes = $attributes ?? [];
@endphp
<img  
  @if(!isset($attributes['class']) && isset($class))
    class="{{ $class }}"
  @endif
  @if(!isset($attributes['title']) && isset($title))
    title="{{ $title }}"
  @endif 
  src="{{ $value }}"
@include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes ?? null
]) />