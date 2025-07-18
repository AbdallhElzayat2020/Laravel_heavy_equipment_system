<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    public function index()
    {
          return view('dashboard.profile.index');
    }
    public function update(Request $request,$id)
    {
         $request->validate($this->filterData());
         $user = User::findOrFail(auth('web')->user()->id);

         if(!Hash::check($request->password, $user->password)){
            Session::flash('error' , __('dashboard.credentials_not_match'));
            return redirect()->back();
         }
         $user->update($request->except(['password' , '_token']));
         Session::flash('success' , __('dashboard.success_msg'));
         return redirect()->back();

    }

    private function filterData():array
    {
        return [
            'name'=>['required' , 'min:2' , 'max:60'],
            'email'=>['required' , 'email' , 'unique:users,email,'.Auth::guard('web')->user()->id],
            'password'=>['required'],
        ];
    }
}
