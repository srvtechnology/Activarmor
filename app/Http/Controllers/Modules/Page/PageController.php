<?php

namespace App\Http\Controllers\Modules\Page;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Empower;
use App\Models\What;
use App\Models\WhatContent;
use App\Models\Why;
use App\Models\WhyContent;
use App\Models\Uses;
use App\Models\DoctorWhy;
use App\Models\CommonUse;
use App\Models\Provider;
use App\Models\ContactPage;
use App\Models\Suggestion;
use App\Models\Prescription;
use App\Models\Pdf;
use App\Mail\SuggestionMail;
use App\Mail\PrescriptionMail;
use App\Heading;
use App\SubHeading;
use App\Doctoruse;
use Mail;
class PageController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['banner'] = Banner::where('id',1)->first();
    	$data['what'] = What::where('id',1)->first();
    	$data['what_content'] = WhatContent::get();
    	$data['why'] = Why::where('id',1)->first();
    	$data['why_content'] = WhyContent::get();
        $data['heading'] = Heading::where('type','B')->get();
        $data['sub_heading'] = SubHeading::where('type','B')->get();
        $data['contact'] = ContactPage::where('id',1)->first();
    	return view('welcome',$data);
    }

    public function patient()
    {
        $data = [];
        $data['banner'] = Banner::where('id',2)->first();
        $data['empower'] = Empower::get();
        $data['uses'] = Uses::get(); 
        $data['heading'] = Heading::where('type','P')->get();
        $data['sub_heading'] = SubHeading::where('type','P')->get();
        $data['contact'] = ContactPage::where('id',1)->first();
        return view('pages.patient',$data);
    }


    public function doctor()
    {
        $data = [];
        $data['banner'] = Banner::where('id',3)->first();
        $data['why'] = DoctorWhy::where('id',1)->first();
        $data['provider'] = Provider::get();
        $data['common'] = CommonUse::where('id',1)->first();
        $data['pdf'] = Pdf::get();
        $data['heading'] = Heading::where('type','D')->get();
        $data['sub_heading'] = SubHeading::where('type','D')->get();
        $data['contact'] = ContactPage::where('id',1)->first();
        $data['uses'] = Doctoruse::get(); 
        return view('pages.doctor',$data);
    }


    public function contact()
    {
        $data = [];
        $data['data'] = ContactPage::where('id',1)->first();
        // return $data['data'];
        $data['contact'] = ContactPage::where('id',1)->first();
        $data['heading'] = Heading::where('type','C')->get();
        $data['sub_heading'] = SubHeading::where('type','C')->get();
        return view('pages.contact',$data);
    }


    public function suggestions(Request $request)
    {
        $ins = [];
        $ins['suggestion'] = $request->suggestion;
        $ins['user_id'] = auth()->user()->id;
        Suggestion::create($ins);
        $data = [
           'suggestion'=>$request->suggestion,
        ];
        Mail::send(new SuggestionMail($data));
        return redirect()->back()->with('suggestion','Thank You For your suggestion.');
    }


    public function prescription(Request $request)
    {
        $contact  = new Prescription;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->user_id = auth()->user()->id;
        if ($request->hasFile('prescription')) {
            $attach = $request->prescription;
            $filename_attach = time() . '-' . rand(1000, 9999) . '.' . $attach->getClientOriginalExtension();
            $attach->move("storage/app/public/prescription",$filename_attach);
            $contact->file = $filename_attach;
         }

        $contact->save();
        $data = [
                'email'=>$request->email,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'phone_number'=>$request->phone_number,
                'comment'=>$request->comment,
        ];
        Mail::send(new PrescriptionMail($data));
        return redirect()->back()->with('prescription','Thank You.We will get back to you soon.');
    }


    public function download($id)
    {
        $file_path = @storage_path() . "/app/public/pdf/".$id;
        return response()->download( $file_path);
    }
}
