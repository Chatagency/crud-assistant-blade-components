@php
  $class = $class ?? 'form-input form-control ';
  $id = $input->name;
  $name = $input->name;
@endphp
<input 
  type="{{ $input->type }}"
  @if($input->value && $input->type !== 'file')
  value="{{ $input->value }}"
  @endif
  @foreach($input->attributes as $key => $value)
    @if($key == 'class')
      @php
        $class .= $value;
      @endphp
    @elseif($key == 'id')
      @php
        $id = $value;
      @endphp
    @elseif($key == 'name')
      @php
        $name = $value;
      @endphp
    @else
    {{$key}} = "{{ $value }}"
    @endif
  @endforeach
  name="{{ $name }}"
  class="{{ $class }}"
  id="{{ $id }}">