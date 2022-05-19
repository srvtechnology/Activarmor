<?php

namespace App\Http\Controllers\Admin\Modules\Image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Image;
use App\Navbar;
class ImageController extends Controller
{
    public function logo()
    {
    	$data = [];
    	$data['data'] = Image::where('id',1)->first();
    	return view('admin.logo.index',$data);	
    }

    public function update(Request $request)
    {
    	$banner = Image::where('id',1)->first();
    	if ($request->image) {
           @unlink('storage/app/public/logo/'.$banner->logo);
           @unlink('storage/app/public/logo/'.$banner->logo);
    	   $image = $request->image;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           //real image
           $image->move("storage/app/public/logo",$filename);	
           $upd['logo'] = $filename;
           
    	}

    	if ($request->footer_logo) {
           @unlink('storage/app/public/footer_logo/'.$banner->footer_logo);
           @unlink('storage/app/public/footer_logo/'.$banner->footer_logo);
    	   $image = $request->footer_logo;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           //real image
           $image->move("storage/app/public/footer_logo",$filename);	
           $upd['footer_logo'] = $filename;
           
    	}

    	Image::where('id',1)->update($upd);
    	return redirect()->back()->with('success','Logo Updated Successfully');

    }


    public function navbar()
    {
       $data = [];
       $data['data'] = Navbar::get();
       return view('admin.navbar.index',$data);
    }

    public function status($id)
    {
      $check = Navbar::where('id',$id)->first();
      if (@$check->status=="A") {
        Navbar::where('id',$id)->update(['status'=>'I']);
        return redirect()->back()->with('success','Navbar Deactivated Successfully');
      }else{
        Navbar::where('id',$id)->update(['status'=>'A']);
        return redirect()->back()->with('success','Navbar Activated Successfully');
      }
    }


    public function edit($id)
    {
      $data = [];
      $data['data'] = Navbar::where('id',$id)->first();
      return view('admin.navbar.edit',$data);
    }


    public function updateNvabr(Request $request)
    {
      Navbar::where('id',$request->id)->update(['name'=>$request->title]);
      return redirect()->back()->with('success','Title Updated Successfully');
    }
}
