<button type="button" class="btn" data-toggle="modal" data-target="#fullscreenModalDesc_{{ $product->id }}">
    <i class="fa fa-expand"></i> {{ Str::limit($product->getTranslation('description', app()->getLocale()), 60) }}
</button>

<!-- Modal -->
<div class="modal fade" id="fullscreenModalDesc_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.fullscreen') }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{ $product->getTranslation('description', app()->getLocale()) }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
