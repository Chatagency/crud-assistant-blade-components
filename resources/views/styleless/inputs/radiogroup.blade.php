@foreach($input->subElements as $radio)
  
    <span class="d-inline-block">

        @include(CACHelper()->input('radio'), [
            'input' => $radio,
            'radioName' => $input->name,
            'value' =>  $input->value,
        ])

        @caInput('label', $radio)

    </span>
  
@endforeach