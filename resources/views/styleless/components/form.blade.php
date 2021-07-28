@php
    $attributes = $attributes ?? [];
@endphp
<form 
    @if(!isset($attributes['method']))
      method="{{ strtolower($method) == 'get' ? 'get' : 'post' }}" 
    @endif
    @if(!isset($attributes['action']))
      action="{{ $action }}" 
    @endif
    @if(!isset($attributes['class']) && isset($formClass))
      class="{{ $formClass }}"
    @endif
    @if(!isset($attributes['title']) && isset($title))
      title="{{ $title }}"
    @endif 
    @include(CACHelper()->partial('attributes'), [
      'attributes' => $attributes
    ])>

    @if(isset($button) && isCACTemplate($button))
      @include(CACHelper()->component($button->type), $button->toArray())
    @else
      <button
        class="{{ isset($buttonClass) && $buttonClass ? ' '.$buttonClass : null }}"
        @if(isset($confirm) ?? $confirm) onClick="if(!confirm('{{ $confirm }}')) return false;" @endif>
          {{ isset($icon) ? $icon : null }} @if(isset($label) && $label) <span>{!! $label !!}</span>@endif
      </button>
    @endif

    @csrf

    @include(CACHelper()->input('hidden'), [
        'input' => CACHelper()->container([
            'name' => '_method',
            'type' => 'hidden',                   
            'value' => $method ?? 'post',
            'attributes' => [],
        ]),
    ])
</form>