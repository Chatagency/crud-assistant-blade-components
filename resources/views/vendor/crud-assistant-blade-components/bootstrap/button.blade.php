<button
type="{{ $type ?? "button" }}"
class="{{ $class }}"
@if(isset($title))
title="{{ $title }}"
@endif 

@include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes ?? null
]) >
  {{ $icon ? svg_image($icon, 'icon') : null }} @if($label) <span class="pl-1">{{ $label }}</span> @endif
</button>