<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @foreach ($product->images as  $key=>$image)
        <div class="carousel-item @if($key == 0) active @endif">
            <img src="{{ asset('uploads/products/'.$image->file_name) }}" style="min-height: 8ch;max-height:8ch;min-width:15ch;max-width:15ch" class="d-block w-100" alt="...">
        </div>
      @endforeach
    </div>
   <a href="#carouselExampleControls" class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">{{ __('dashboard.previous') }}</span>
    </a>
    <a href="#carouselExampleControls" class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">{{ __('dashboard.next') }}</span>
    </a>
  </div>
  <div class="mt-1">
    <button class="btn btn-outline-primary" data-toggle="modal"
        data-target="#fullscreenModal_{{ $product->id }}">
        <i class="fa fa-expand"></i> {{ __('dashboard.fullscreen') }}
    </button>
</div>


{{-- fullscreen modal --}}

    <!-- Fullscreen Modal -->
    <div class="modal fade" id="fullscreenModal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="fullscreenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreenModalLabel">{{ __('dashboard.fullscreen') }} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="fullscreenCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($product->images as $key => $image)
                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                    <img style="min-height: 57ch;max-height:57ch;min-width:100ch;max-width:100ch" src="{{ asset('uploads/products/'.$image->file_name) }}" class="d-block w-100" alt="Fullscreen Image">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#fullscreenCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{ __('dashboard.previous') }}</span>
                        </a>
                        <a class="carousel-control-next" href="#fullscreenCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">{{ __('dashboard.next') }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
