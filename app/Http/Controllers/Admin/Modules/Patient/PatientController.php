<?php

namespace App\Http\Controllers\Admin\Modules\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Empower;
use App\Models\Uses;
use Image;

class PatientController extends Controller
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

    public function banner()
    {
    	$data = [];
    	$data['data'] = Banner::where('id',2)->first();	
    	return view('admin.patient.banner',$data);
    }

    public function bannerUpdate(Request $request)
    {
        $banner = Banner::where('id',2)->first();
    	$upd = [];
    	$upd['heading_one'] = $request->heading_one;
    	$upd['heading_two'] = $request->heading_two;
    	
    	if ($request->image) {
           @unlink('storage/app/public/banner_min/'.$banner->image);
           @unlink('storage/app/public/banner/'.$banner->image);
    	   $image = $request->image;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(1000, 1000, function($constraint){
                $constraint->aspectRatio();
            })->save("storage/app/public/banner_min" . '/' . $filename);
            //real image
            $image->move("storage/app/public/banner",$filename);	
            $upd['image'] = $filename;
    	}
        Banner::where('id',2)->update($upd);
        return redirect()->back()->with('success','Banner Data Updated Succesfully');
    }

    public function empower()
    {
    	$data = [];
    	$data['data'] = Empower::paginate(10);
    	return view('admin.patient.empower',$data); 
    }

    public function empowerEdit($id)
    {
    	$data = [];
    	$data['data'] = Empower::where('id',$id)->first();
    	return view('admin.patient.empower_edit',$data);
    }

    public function empowerUpdate(Request $request)
    {
    	$empower = Empower::where('id',$request->id)->first();
    	$upd = [];
    	$upd['heading'] = $request->heading;
    	$upd['description'] = $request->description;
    	
    	if ($request->image) {
           @unlink('storage/app/public/empower_min/'.$empower->image);
           @unlink('storage/app/public/empower/'.$empower->image);
    	   $image = $request->image;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(300, 300, function($constraint){
                $constraint->aspectRatio();
            })->save("storage/app/public/empower_min" . '/' . $filename);
            //real image
            $image->move("storage/app/public/empower",$filename);	
            $upd['image'] = $filename;
    	}
        Empower::where('id',$request->id)->update($upd);
        return redirect()->back()->with('success','Data Updated Succesfully');
    }

    public function manageUses()
    {
    	$data = [];
    	$data['data'] = Uses::orderBy('id','desc')->paginate(10);
    	return view('admin.patient.manage_uses',$data);
    }

    public function manageUsesAdd(Request $request)
    {
    	return view('admin.patient.add_uses');
    }

    public function manageUsesInsert(Request $request)
    {
    	$uses = new Uses;
    	$uses->title = $request->title;
    	$uses->save();
    	return redirect()->back()->with('success','Uses Added Successfully');
    }

    public function manageUsesDelete($id)
    {
        Uses::where('id',$id)->delete();
        return redirect()->back()->with('success','Uses Deleted Successfully');
    }

    public function manageUsesEdit($id)
    {
        $data = [];
        $data['data'] = Uses::where('id',$id)->first();
        return view('admin.patient.edit_uses',$data);
    }

    public function manageUsesUpdate(Request $request)
    {
        Uses::where('id',$request->id)->update(['title'=>@$request->title]);
        return redirect()->back()->with('success','Uses Updated Successfully');
    }
}
