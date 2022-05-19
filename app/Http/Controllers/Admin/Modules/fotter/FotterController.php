<?php

namespace App\Http\Controllers\Admin\Modules\Fotter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fotter;
class FotterController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['data'] = Fotter::where('id',1)->first();
    	return view('admin.footer.index',$data);
    }

    public function update(Request $request)
    {
    	$upd = [];
    	$upd['facebook'] = $request->facebook;
    	$upd['twitter'] = $request->twitter;
    	$upd['insta'] = $request->insta;
    	$upd['youtube'] = $request->youtube;
    	$upd['wp'] = $request->wp;
    	$upd['description'] = $request->description;
    	$upd['copyright'] = $request->copyright;
    	Fotter::where('id',1)->update($upd);
    	return redirect()->back()->with('success','Details Updated Successfully');
    }
}
