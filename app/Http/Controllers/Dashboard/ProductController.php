<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Utils\ImageManger;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    protected $imageManager;
    public function __construct(ImageManger $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.products.index', compact('categories'));
    }
    public function getAll()
    {
        $products = Product::latest()->get();
        return DataTables::of($products)
            ->addIndexColumn()
            ->addColumn('name_translated', function ($product) {
                return $product->getTranslation('name', app()->getLocale());
            })
            ->addColumn('description_translated', function ($product) {
                return view('dashboard.products.datatables._description',compact('product'));
            })
            ->addColumn('category_name', function ($product) {
                return $product->category->name;
            })
            ->addColumn('product_images', function ($product) {
                return view('dashboard.products.datatables._images', compact('product'));
            })
            ->addColumn('action', function ($product) {
                return view('dashboard.products.datatables._action', compact('product'));
            })
            ->rawColumns(['product_images','action','description_translated'])
            ->make(true);
    }
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($request->except('images'));
            if ($request->hasFile('images')) {
                $this->imageManager->uploadImages($request->images, $product, 'products');
            }
            DB::commit();

            Session::flash('success', __('dashboard.success_msg'));
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', __('dashboard.error_msg'));
            return redirect()->back();
        }
    }
    public function edit($id)
    {
        $categories = Category::all();
        $product    = Product::with('images')->findOrFail($id);
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(ProductRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $product = Product::findOrFail($id);
            $product->update($request->except('images'));

            if ($request->hasFile('images')) {
                $this->imageManager->uploadImages($request->images, $product, 'products');
            }
            DB::commit();

            Session::flash('success', __('dashboard.success_msg'));
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('error', __('dashboard.error_msg'));
            return redirect()->back();

        }
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.product_not_found'),
            ], 404);
        }

        // delete images from local
        foreach ($product->images as $image) {
            $this->imageManager->deleteImageFromLocal('uploads/products/' . $image->file_name);
        }

        $product->delete();
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.success_msg'),
        ], 200);
    }
    public function deleteImage(Request $request, $id)
    {
        $image = ProductImage::find($request->key);
        if (!$image) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.error_msg'),
            ], 404);
        }
        $this->imageManager->deleteImageFromLocal('uploads/products/' . $image->file_name);
        $image->delete();
        return true;
    }
}
