@php
  $class = $class ?? 'mr-1 ';
  $id = $input->name;
  $name = $input->name;
  $valueAttribute = 1;
@endphp
<input
  type="{{ $input->type }}"
   @foreach($input->attributes as $key => $attribute)
    @if($key == 'class')
      @php
        $class .= $attribute;
      @endphp
    @elseif($key == 'id')
      @php
        $id = $attribute;
      @endphp
    @elseif($key == 'name')
      @php
        $name = $attribute;
      @endphp
    @elseif($key == 'value')
      @php
        $valueAttribute = $attribute;
      @endphp
    @else
    {{ $key }} = "{{ $attribute }}"
    @endif
  @endforeach
  value="{{ $valueAttribute }}"
  name="{{ $name }}"
  class="{{ $class }}"
  id="{{ $id }}"
  @if($input->value == 1)
    checked
  @endif >