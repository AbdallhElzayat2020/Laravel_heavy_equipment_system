<?php

namespace App\Http\Controllers\Website;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact');
    }
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|max:1000',
        ]);

        $contact = Contact::create($request->all());
        if(!$contact){
            Session::flash('error', __('dashboard.error_msg') );
            return redirect()->back();
        }
         Session::flash('success', __('dashboard.success_msg') );
         return redirect()->back();

    }
}
