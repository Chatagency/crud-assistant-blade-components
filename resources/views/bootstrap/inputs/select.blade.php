@php
  $attributes = $input->attributes ?? [];
  $placeholder = $attributes['placeholder'] ?? false;
@endphp

<select 
  @if(!isset($attributes['name']))
    name="{{ $input->name }}"
  @endif
  @if(!isset($attributes['class']))
    class="form-input form-control {{ $class ?? null }}"
  @endif
  @if(!isset($attributes['id']))
    id="{{ $input->name }}"
  @endif
  
  @include(CACHelper()->partial('attributes'), [
    'attributes' => $input->attributes,
    'ignore' => 'placeholder',
  ]) >
    @if($placeholder)
      @include(CACHelper()->input('option'), [
        'input' => new \Chatagency\CrudAssistant\DataContainer([
          'name' => '',
          'label' => $placeholder,
          'attributes' => [],
        ]),
        'value' => '',
      ])
    @endif
    @foreach($input->subElements as $key => $option)
      @include(CACHelper()->input('option'), [
        'input' => $option,
        'value' => $input->value,
      ])
    @endforeach
</select>