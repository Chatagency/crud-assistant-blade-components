{{-- table --}}
<div class="overflow-auto">
  <table class="w-full rounded-t-lg mb-5 bg-gray-200 text-gray-800">
    <thead class="bg-gray-300 text-left border-b-2 border-gray-400">
      @if(isset($head) && is_iterable($head) && !empty($head))
      <tr>
        @foreach ($head as $headKey => $headValue)
        <th scope="col" class="px-4 py-2 header_{!! $headKey !!}">{!! $headValue !!}</th>
        @endforeach
      </tr>
    </thead>
    @endif
    
    <tbody>
      @foreach ($body as $row)
      <tr class="text-left border-b-2 border-gray-300">
        @foreach ($row as $name => $rowValue)
            @if(is_iterable($rowValue))
                @if(isCACTemplate($rowValue))
                    <td class="px-4 py-2 cel_{{ $name }}">@include(CACHelper()->component($rowValue->type), $rowValue->all())</td>
                @elseif(is_array($rowValue))
                    <td class="px-4 py-2 cel_{{ $name }}">
                    @foreach($rowValue as $value)
                        @if(isCACTemplate($value))
                          @include(CACHelper()->component($value->type), $value->all())
                        @else
                          {!! $rowValue !!}
                        @endif
                    @endforeach
                    </td>
                @endif
            @else
            <td class="px-4 py-2 cel_{{ $name }}">{!! $rowValue !!}</td>
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
  @if(isCACTemplate($pagination))
    @include(CACHelper()->component($pagination->type), $pagination->all())
  @else
    {!! $pagination !!}
  @endif
</div>
@endif