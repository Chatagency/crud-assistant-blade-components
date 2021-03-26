@php
  $class = $class ?? 'col-form-label ';
  $id = $input->name;
@endphp
<legend 
   @foreach($input->labelAttributes as $key => $value)
    @if($key == 'class')
      @php
        $class .= $value;
      @endphp
    @elseif($key == 'id')
      @php
        $id = $value;
      @endphp
    @else
    {{$key}} = "{{ $value }}"
    @endif
  @endforeach
  class="{{ $class }}"
  id="{{ $id }}">
    {{ $input->label }}
</legend>