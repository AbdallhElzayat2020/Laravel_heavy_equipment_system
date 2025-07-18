<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categories.index');
    }
    public function getAll()
    {
        $categories = Category::all();
        return DataTables::of($categories)

            ->addIndexColumn()
            ->addColumn('name_translated', function ($category) {
                return $category->getTranslation('name', app()->getLocale());
            })
            ->addColumn('action', function ($category) {
                return view('dashboard.categories.datatables._action', compact('category'));
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name.*' => ['required', 'string', 'min:3', 'max:400'],
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category dose not created',
            ], 500);
        } else {
            return response()->json([
                'status' => 'success',
                'message' => 'Category created successfully',
            ], 201);
        }
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name.*' => ['required', 'string', 'min:3', 'max:400'],
        ]);
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        }

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
        ], 200);
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'Category not found',
            ], 404);
        }

        $category->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
        ], 200);
    }
}
