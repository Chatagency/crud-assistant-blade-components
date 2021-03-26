<a
class="{{ isset($class) && $class ? ' '.$class : null }}"
href="{{ $action }}"
@if(isset($title))
title="{{ $title }}"
@endif
@if(isset($target) && $target) target="{{ $target }}" @endif
@include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes ?? null
]) >
  
  {{ isset($icon) && $icon ? svg($icon, 'icon') : null }} @if(isset($label) && $label) <span class="pl-1">{{ $label }}</span> @endif
</a>