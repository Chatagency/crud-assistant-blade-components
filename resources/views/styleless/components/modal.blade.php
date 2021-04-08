<div class="modal-body {{ $modalBodyClass }}">
    @if(isCACTemplate($value))
        @include(CACHelper()->component($value->type), $value->toArray())
    @else
        {{ $value }}
    @endif
</div>