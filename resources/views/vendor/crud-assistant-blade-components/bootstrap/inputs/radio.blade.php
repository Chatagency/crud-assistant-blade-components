@php
  $class = $class ?? '';
  $id = $input->name;
@endphp
<input
  name="{{$radioName}}"
  type="{{ $input->type }}"
  value="{{ $input->name }}"
  @foreach($input->attributes as $key => $attrValue)
    @if($key == 'class')
      @php
        $class .= $attrValue;
      @endphp
    @elseif($key == 'id')
      @php
        $id = $attrValue;
      @endphp
    @else
    {{$key}} = "{{ $attrValue }}"
    @endif
  @endforeach
  class="{{ $class }}"
  id="{{ $id }}"
  @if($value == $input->name)
    checked
  @endif >