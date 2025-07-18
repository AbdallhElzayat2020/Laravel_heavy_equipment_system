<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use App\Utils\ImageManger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    protected $imageManager;
    public function __construct(ImageManger $imageManager)
    {
        $this->imageManager = $imageManager;
    }
    public function index()
    {
        return view('dashboard.settings.index');
    }
    public function update(SettingRequest $request,$id)
    {
        $data = $request->all();
        $setting = Setting::first();

        if(array_key_exists('site_logo', $data) && $data['site_logo'] != null){
            $data['site_logo'] = $this->updateFile('site_logo',$data,$setting);
        }
        if(array_key_exists('about_us_image', $data) && $data['about_us_image'] != null){
            $data['about_us_image'] = $this->updateFile('about_us_image',$data,$setting);
        }
        if(array_key_exists('site_favicon', $data) && $data['site_favicon'] != null){
            $data['site_favicon'] = $this->updateFile('site_favicon',$data,$setting);
        }


        if(!$setting->update($data)){
            Session::flash('error',__('dashboard.error_msg'));
            return redirect()->back();
        };
        Session::flash('success',__('dashboard.success_msg'));
        return redirect()->back();

    }

    public function updateFile($key,$data,$setting)
    {
            $this->imageManager->deleteImageFromLocal($setting->$key);
            $file_name = $this->imageManager->uploadSingleImage('/' , $data[$key] , 'settings');
            return $file_name;
    }

}
