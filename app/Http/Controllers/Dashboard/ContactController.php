<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        Contact::where('is_read', 0)->update(['is_read' => 1]);
        return view('dashboard.contacts.index');
    }
    public function getAll()
    {
        $contacts = Contact::latest()->get();
        return DataTables::of($contacts)
            ->addIndexColumn()
            ->addColumn('action', function ($contact) {
                return view('dashboard.contacts.datatables._action', compact('contact'));
            })
            ->addColumn('created_at', function ($contact) {
                return $contact->created_at->diffForHumans();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            return response()->json(['status' => 'error','message'=>__('dashboard.not_fount')]);
        }
        $contact->delete();
        return response()->json(['status' => 'success','message'=>__('dashboard.success_msg')]);
    }

}
