<!-- Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.edit_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {{-- validations error --}}
                <div class="alert alert-danger" id="error_div_edit" style="display: none;">
                    <ul id="error_list_edit"></ul>
                </div>


                <form action="" id="updateCategory" class="form" method="POST" >
                    @csrf
                    @method('PUT')
                    <input id="category_id" hidden name="id" value="">
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name_ar') }}</label>
                        <input id="category_name_ar" type="text" name="name[ar]" class="form-control"
                            placeholder="{{ __('dashboard.name_ar') }}">
                    </div>

                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name_en') }}</label>
                        <input id="category_name_en" type="text" name="name[en]" class="form-control"
                            placeholder="{{ __('dashboard.name_en') }}">
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
