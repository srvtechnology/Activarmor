<?php

namespace App\Http\Controllers\Admin\Modules\Why;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Why;
use App\Models\WhyContent;
class WhyController extends Controller
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
    	$data['data'] = Why::where('id',1)->first();
    	$data['content'] = WhyContent::get();
    	return view('admin.why.manage',$data);
    }

    public function whyUpdate(Request $request)
    {
    	$upd = [];
    	$upd['heading'] = $request->heading;
    	$upd['description'] = $request->description;
    	Why::where('id',1)->update($upd);
    	return redirect()->back()->with('success','Data Updated Successfully');
    }

    public function content($id)
    {
    	$data = [];
    	$data['data'] = WhyContent::where('id',$id)->first();
    	return view('admin.why.edit',$data);
    }

    public function update(Request $request)
    {
    	$upd = [];
    	$upd['heading'] = $request->heading;
    	$upd['description'] = $request->description;
    	WhyContent::where('id',$request->id)->update($upd);
    	return redirect()->back()->with('success','Content Updated Successfully');
    }
}
