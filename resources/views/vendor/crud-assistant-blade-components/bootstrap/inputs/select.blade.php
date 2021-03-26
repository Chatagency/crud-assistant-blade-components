@php
  $paceholder = false;
  $class = $class ?? 'form-input-with-appearance form-control ';
  $id = $input->name;
  $emptyAr = [];
@endphp

<select 
  name="{{ $input->name }}"
  @foreach($input->attributes as $key => $value)
    @if($key == "placeholder")
      @php
        $paceholder = $value;
      @endphp
    @elseif($key == 'class')
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
    @if($paceholder)
      {{-- <x-inputs.option value="" label="{{ $paceholder }}" :attributes="$emptyAr"   /> --}}
      @include(CACHelper()->input('option'), [
        'input' => new \Chatagency\CrudAssistant\DataContainer([
          'name' => '',
          'label' => $paceholder,
          'attributes' => [],
        ]),
        'value' => '',
      ])
    @endif
    
    @foreach($input->subElements as $key => $option)
      {{-- <x-inputs.option value="{{ $option->name }}" label="{{ $option->label }}" :attributes="$attributes"  /> --}}
      @include(CACHelper()->input('option'), [
        'input' => $option,
        'value' => $input->value,
      ])
    @endforeach
</select>
