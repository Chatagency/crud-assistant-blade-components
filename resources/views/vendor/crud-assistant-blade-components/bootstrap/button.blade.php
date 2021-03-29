@php
  $attributes = $attributes ?? [];
@endphp
<button
  @if(!isset($attributes['type']))
    type="{{ $type ?? "button" }}"
  @endif
  @if(!isset($attributes['class']) && isset($class))
    class="{{ $class }}"
  @endif
  @if(!isset($attributes['title']) && isset($title))
    title="{{ $title }}"
  @endif 
  @include(CACHelper()->partial('attributes'), [
    'attributes' => $attributes
  ]) 
  @if(isset($confirm) ?? $confirm) onClick="if(!confirm('{{ $confirm }}')) return false;" @endif>
  {{ $icon ? svg_image($icon, 'icon') : null }} @if($label) <span class="pl-1">{{ $label }}</span> @endif
</button>