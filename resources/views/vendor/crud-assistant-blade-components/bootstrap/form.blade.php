<form 
    method="{{ strtolower($method) == 'get' ? 'get' : 'post' }}" 
    action="{{ $action }}" 
    class="d-inline-block" 
    @isset($title) title="{{ $title }}"  @endisset >
    @csrf
    @if(isset($method) && $method) @method($method) @endif
    <button
      class="{{ isset($class) && $class ? ' '.$class : null}}"
      @if(isset($confirm) ?? $confirm) onClick="if(!confirm('{{ $confirm }}')) return false;" @endif>
        {{ isset($icon) && $icon ? svg($icon, 'icon') : null }} @if(isset($label) && $label) <span class="">{{ $label }}</span>@endif
    </button>
</form>