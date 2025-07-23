<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <button class="edit_category btn btn-outline-success" category-id="{{ $category->id }}"
                category-name-ar="{{ $category->getTranslation('name', 'ar') }}"
                category-name-en="{{ $category->getTranslation('name', 'en') }}">
            {{ __('dashboard.edit') }} <i class="la la-edit"></i>
        </button>

        <button id="btnGroupDrop2" type="button" category-id="{{ $category->id }}"
                class="delete_confirm_btn btn btn-outline-danger">
            {{ __('dashboard.delete') }}<i class="la la-trash"></i>
        </button>


    </div>
</div>
