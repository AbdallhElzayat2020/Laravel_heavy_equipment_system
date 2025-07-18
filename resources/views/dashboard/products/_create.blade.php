<!-- Modal -->
<div class="modal fade" style="-webkit-overflow-scrolling: touch;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('dashboard.create_brand') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('dashboard.products.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name_ar') }}</label>
                        <input type="text" name="name[ar]" class="form-control" id="name"
                            placeholder="{{ __('dashboard.name_ar') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.name_en') }}</label>
                        <input name="name[en]" type="text" class="form-control" id="name"
                            placeholder="{{ __('dashboard.name_en') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.description_ar') }}</label>
                        <textarea class="form-control" name="description[ar]"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('dashboard.description_en') }}</label>
                        <textarea class="form-control" name="description[en]"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="name">{{ __('dashboard.category') }}</label>
                        <select name="category_id" class="form-control" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">{{ __('dashboard.images') }}</label>
                        <input type="file" multiple  name="images[]" class="form-control" id="product_images"
                            placeholder="{{ __('dashboard.image') }}">
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
