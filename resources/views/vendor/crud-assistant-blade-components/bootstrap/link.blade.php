@php
  $attributes = $attributes ?? [];
@endphp
<a
  href="{{ $action }}"
  @if(!isset($attributes['class']) && isset($class))
    class="{{ $class }}"
  @endif
  @if(!isset($attributes['title']) && isset($title))
    title="{{ $title }}"
  @endif 
  @if(!isset($attributes['target']) && isset($target))
    target="{{ $target }}"
  @endif 
  @include(CACHelper()->partial('attributes'), [
      'attributes' => $attributes ?? null
  ]) >
  {{ isset($icon) && $icon ? svg($icon, 'icon') : null }} @if(isset($label) && $label) <span class="pl-1">{{ $label }}</span> @endif
</a>