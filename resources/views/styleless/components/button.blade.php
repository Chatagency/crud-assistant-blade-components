@php
    $attributes = $attributes ?? [];
@endphp
<button
    @if(!isset($attributes['type']) && isset($type))
        type="{{ $type }}"
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
    @if(isset($confirm) && $confirm) onClick="if(!confirm('{{ $confirm }}')) return false;" @endif>
    
        @if(isset($icon))
            @if(isCACTemplate($icon))
                @include(CACHelper()->component($icon->type), $icon->toArray())
            @else
                {{ $icon }}
            @endif
        @endif
        {!! $label !!}
   
</button>