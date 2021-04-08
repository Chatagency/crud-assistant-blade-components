@if($attributes)
  @foreach($attributes as $key => $value)
    @unless((isset($ignore) && $ignore == $key) || (isset($ignore) && is_array($ignore) && in_array($key, $ignore)))
      {{$key}} = "{{ $value }}"
    @endunless
    
  @endforeach
@endif