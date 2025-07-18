<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.create_coupon') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- validations error --}}
                <div class="alert alert-danger" id="error_div" style="display: none;">
                    <ul id="error_list"></ul>
                </div>


                <form action="" id="createCategory" class="form" method="POST" >
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name') }}</label>
                        <input type="text" name="name[ar]" class="form-control" id="name"
                            placeholder="{{ __('dashboard.name_ar') }}">
                        <strong class="text-danger" id="error_name"></strong>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name') }}</label>
                        <input type="text" name="name[en]" class="form-control" id="name"
                            placeholder="{{ __('dashboard.name_en') }}">
                        <strong class="text-danger" id="error_name"></strong>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal"><i class="ft-x"></i>{{ __('dashboard.close') }}</button>
                        <button type="submit" class="btn btn-primary">  <i class="la la-check-square-o"></i> {{ __('dashboard.save') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
