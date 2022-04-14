<?php

namespace App\Http\Controllers\Admin\Modules\What;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\What;
use App\Models\WhatContent;
use Image;
class WhatController extends Controller
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
    	$data['data'] = What::where('id',1)->first();
    	$data['content'] = WhatContent::get();
    	return view('admin.what.manage',$data);
    }

    public function whatUpdate(Request $request)
    {	
        $what = What::where('id',1)->first();
    	$upd = [];
    	$upd['heading'] = $request->heading;
    	$upd['description'] = $request->description;
        if ($request->image) {
           @unlink('storage/app/public/what_min/'.$what->image);
           @unlink('storage/app/public/what/'.$what->image);
           $image = $request->image;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(504, 689, function($constraint){
                $constraint->aspectRatio();
            })->save("storage/app/public/what_min" . '/' . $filename);
            //real image
            $image->move("storage/app/public/what",$filename);    
            $upd['image'] = $filename;
        }
    	What::where('id',1)->update($upd);
    	return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function content($id)
    {
    	$data = [];
    	$data['data'] = WhatContent::where('id',$id)->first();
    	return view('admin.what.edit',$data);
    }

    public function update(Request $request)
    {
    	$upd = [];
    	$upd['heading'] = $request->heading;
    	$upd['description'] = $request->description;
    	WhatContent::where('id',$request->id)->update($upd);
    	return redirect()->back()->with('success','Content Updated Successfully');
    }
}
