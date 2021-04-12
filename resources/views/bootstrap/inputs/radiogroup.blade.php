@foreach($input->subElements as $radio)
  
  <span class="d-inline-block">

    @include(CACHelper()->input('radio'), [
      'input' => $radio,
      'radioName' => $input->name,
      'value' =>  $input->value,
    ])

    @cacInput('label', $radio)

  </span>
  
@endforeach