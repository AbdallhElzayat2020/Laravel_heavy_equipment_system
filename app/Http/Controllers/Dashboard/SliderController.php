<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slider;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller
{
    protected $imageManager;
    public function __construct(ImageManger $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.settings.slider',compact('sliders'));
    }
    public function store(Request $request)
    {
        $request->validate(['images' => ['required', 'array', 'min:1'], ]);
        
        foreach($request->images as $image){
            $file_name = $this->imageManager->uploadSingleImage('/',$image,'sliders');
            Slider::create([
                'file_name'=>$file_name,
            ]);
        }
     
        Session::flash('success',__('dashboard.success_msg'));
        return redirect()->back();

    }
    public function deleteImage(Request $request ,$id)
    {
        $image = Slider::find($request->key);
        if(!$image){
            return response()->json([
                'status'=>'error',
                'message'=>__('dashboard.error_msg'),
            ],404);
        }
        $this->imageManager->deleteImageFromLocal('uploads/sliders/'.$image->file_name);
        $image->delete();
        return true;
    }
}
