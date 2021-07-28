<!-- Button trigger modal -->
@if(isset($button) && isCACTemplate($button))
  @include(CACHelper()->component($button->type), $button->toArray())
@else
  <button type="button" class="{{ $buttonClass ?? 'btn btn-link p-0' }}" data-toggle="modal" data-target="#{{ $modalId }}">
    {{ $buttonLabel ?? "Button" }}
  </button>
@endif
<!-- Modal -->
<div class="modal {{ $modalClass ?? 'fade' }}" id="{{ $modalId }}" tabindex="-1" @if($modalTitle)) aria-labelledby="{{ $modalId }}Label" @endif aria-hidden="true">
<div class="modal-dialog {{ $modalDialogClass ?? null }}">
  <div class="modal-content">
    <div class="modal-header">
      @if($modalTitle)
        <h5 class="modal-title" id="{{ $modalId }}Label">{{ $modalTitle }}</h5>
      @endif
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body {{ $modalBodyClass }}">
      @if(isCACTemplate($value))
        @include(CACHelper()->component($value->type), $value->toArray())
      @else
        {{ $value }}
      @endif
    </div>
    @if($modalFooter)
    <div class="modal-footer">
      @if($modalButtonClose)
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ $modalButtonClose ?? "Close" }}</button>
      @endif
    </div>
    @endif
  </div>
</div>
</div>