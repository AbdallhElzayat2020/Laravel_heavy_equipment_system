<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Catalog;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CatalogController extends Controller
{

    public $imageManger;
    public function __construct(ImageManger $imageManger)
    {
        $this->imageManger = $imageManger;
    }
    public function index()
    {
        return view('dashboard.settings.catalog');
    }
    public function store(Request $request)
    {
        $request->validate([
            'pdf' => 'required|mimes:pdf|max:20480', // PDF only, max 20MB
        ]);

        $catalog = Catalog::first();
        if($catalog){
            $this->imageManger->deleteImageFromLocal('uploads/settings/'.$catalog->file_path);
            $catalog->delete();
        }

        // Store the PDF
        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $name = time().'catalog'.rand(1,20).'.pdf';
            $file_name = $file->storeAs('/', $name, ['disk'=>'settings']);

            Catalog::create([
                'file_path' => $file_name,
            ]);
            Session::flash('success', __('dashboard.success_msg'));
            return redirect()->back();

        }

    }
}
