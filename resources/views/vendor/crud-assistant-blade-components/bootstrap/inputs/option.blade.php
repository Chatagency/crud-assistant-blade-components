<option 
  value="{{ $input->name }}"
  @foreach($input->attributes as $key => $value)
    {{$key}} = "{{ $value }}"
  @endforeach 
  @if($value == $input->name)
  selected
  @endif
  >{{ $input->label }}</option>