<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCategoryDependent extends Component
{
    public $categories;
    public $categoryId = null;
    public $products;

    public function mount($categories)
    {
        $this->categories = $categories;
        $this->products = Product::with('images')->get();
    }
    public function changeCategoryId($id = null)
    {
        $this->categoryId = $id;

        $this->products = Product::with('images')
            ->when($id, fn($query) => $query->where('category_id', $id))
            ->get();

        $this->dispatch('$refresh'); // Force Livewire to re-render
    }
    public function render()
    {

        return view('livewire.product-category-dependent');
    }
}
