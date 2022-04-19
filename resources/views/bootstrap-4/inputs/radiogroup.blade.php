@foreach($input->subElements as $radio)
  
  <span class="d-inline-block">

    @include(CACHelper()->input('radio'), [
      'input' => $radio,
    ])

    @cacInput('label', $radio)

  </span>
  
@endforeach