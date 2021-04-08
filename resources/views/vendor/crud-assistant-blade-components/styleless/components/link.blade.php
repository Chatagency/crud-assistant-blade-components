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
    @if(isset($icon))
    @if(isCACTemplate($icon))
        @include(CACHelper()->component($icon->type), $icon->toArray())
    @else
        {{ $icon }}
    @endif
    @endif
    @if(isset($label) && $label) <span
        @include(CACHelper()->partial('attributes'), [
            'attributes' => $labelAttributes ?? null
        ])>{{ $label }}</span> @endif
</a>