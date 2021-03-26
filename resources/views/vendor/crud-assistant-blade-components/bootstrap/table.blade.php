{{-- table --}}
<div class="table-responsive">
  <table class="table">
    <thead>
      @if(isset($head) && is_iterable($head) && !empty($head))
      <tr>
        @foreach ($head as $headKey => $headValue)
        <th scope="col" class="header_{!! $headKey !!}">{!! $headValue !!}</th>
        @endforeach
      </tr>
    </thead>
    @endif
    
    <tbody>
      @foreach ($body as $row)
      <tr>
        @foreach ($row as $name => $rowValue)
            @if(is_iterable($rowValue))
                @if(isset($rowValue->template) && isset($rowValue->type))
                    <td class="cel_{{ $name }}">@include(CACHelper()->component($rowValue->type), $rowValue->toArray())</td>
                @elseif(is_array($rowValue))
                     <td class="cel_{{ $name }}">
                    @foreach($rowValue as $templateContainer)
                        @if(isset($templateContainer->template) && isset($templateContainer->type))
                          @include(CACHelper()->component($templateContainer->type), $templateContainer->toArray())
                        @else
                          {!! $rowValue !!}
                        @endif
                    @endforeach
                    </td>
                @endif
            @else
            <td class="cel_{{ $name }}">{!! $rowValue !!}</td>
            @endif
        @endforeach
      </tr>
      @endforeach
    </tbody>
    
  </table>
</div>

{{-- pagination links --}}
@if(isset($pagination))
<div class="pagination">
  @if(isset($pagination->template) && $pagination->template)
    @include(CACHelper()->component($pagination->type), $pagination->all())
  @else
    {!! $pagination !!}
  @endif
</div>
@endif