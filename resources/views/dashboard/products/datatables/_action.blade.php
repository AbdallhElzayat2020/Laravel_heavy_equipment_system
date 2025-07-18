<div class="form-group">
    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-outline-success" product-id="{{ $product->id }}">
            {{ __('dashboard.edit') }} <i class="la la-edit"></i>
        </a>

        <button id="btnGroupDrop2" type="button" product-id={{ $product->id }}
            class="delete_confirm_btn btn btn-outline-danger">
            {{ __('dashboard.delete') }}<i class="la la-trash"></i>
        </button>


    </div>
</div>
