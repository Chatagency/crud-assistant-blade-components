{{-- table --}}
<table class="cac-table {{ $tableClass ?? null }}">
    <thead>
        @if(isset($head) && is_iterable($head) && !empty($head))
        <tr>
        @foreach ($head as $headKey => $headValue)
        <th scope="col" class="cac-header-{{ $headKey }} {{ $headClass ?? null }}">{!! $headValue !!}</th>
        @endforeach
        </tr>
    </thead>
    @endif

    <tbody>
        @foreach ($body as $row)
        <tr class="{{ $trClass ?? null }}">
        @foreach ($row as $name => $rowValue)
            @if(is_iterable($rowValue))
                @if(isCACTemplate($rowValue))
                    <td class="cac-cel-{{ $name }} {{ $tdClass ?? null }}">@include(CACHelper()->component($rowValue->type), $rowValue->toArray())</td>
                @elseif(is_array($rowValue))
                        <td class="cac-cel-{{ $name }} {{ $tdClass ?? null }}">
                    @foreach($rowValue as $value)
                        @if(isCACTemplate($value))
                            @include(CACHelper()->component($value->type), $value->toArray())
                        @elseif(is_string($value))
                            {!! $value !!}
                        @endif
                    @endforeach
                    </td>
                @endif
            @else
            <td class="cac-cel-{{ $name }} {{ $tdClass ?? null }}">{!! $rowValue !!}</td>
            @endif
        @endforeach
        </tr>
        @endforeach
    </tbody>

</table>

{{-- pagination links --}}
@if(isset($pagination))
    <div class="cac-pagination {{ $paginationClass ?? null }}">
        @if(isCACTemplate($pagination))
            @include(CACHelper()->component($pagination->type), $pagination->toArray())
        @else
            {!! $pagination !!}
        @endif
    </div>
@endif