@php
  $class = $class ?? 'form-label ';
  $for = $input->attributes['id'] ?? $input->name;
@endphp
<label 
  
  @foreach($input->labelAttributes as $key => $value)
    @if($key == 'class')
      @php
        $class .= $value;
      @endphp
    @elseif($key == 'for')
      @php
        $for = $value;
      @endphp
    @else
    {{$key}} = "{{ $value }}"
    @endif
  @endforeach
  class="{{ $class }}"
  for="{{ $for }}">
    {{ $input->label }}
</label>