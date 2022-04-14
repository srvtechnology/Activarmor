<?php

namespace App\Http\Controllers\Admin\Modules\Suggestion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use App\Models\Prescription;
class SuggestionController extends Controller
{
   protected $redirectTo = '/admin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.auth:admin');
    }

    public function index()
    {
    	$data = [];
    	$data['data'] = Suggestion::orderBy('id','desc')->paginate(10);
    	return view('admin.suggestion.manage',$data);
    }

    public function delete($id)
    {
    	Suggestion::where('id',$id)->delete();
    	return redirect()->back()->with('success','Suggestion Deleted Successfully');
    }


    public function managePrescription()
    {
    	$data = [];
    	$data['data'] = Prescription::orderBy('id','desc')->paginate(10);
    	return view('admin.prescription.manage_prescription',$data);
    }

    public function downloadPrescription($id)
    {
    	$file_path = @storage_path() . "/app/public/prescription/".$id;
    	return response()->download( $file_path);
    }

    public function viewPrescription($id)
    {
    	$data = [];
    	$data['data'] = Prescription::where('id',$id)->first();
    	return view('admin.prescription.view',$data);
    }

    public function deletePrescription($id)
    {
    	Prescription::where('id',$id)->delete();
    	return redirect()->back()->with('success','Prescription Deleted Successfully');
    }
}
