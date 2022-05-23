<?php

namespace App\Http\Controllers\Admin\Modules\Fotter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Fotter;
use App\Font;
use App\Template;
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

    public function fontIndex()
    {
        $data = [];
        $data['data'] = Font::where('id',1)->first();
        return view('admin.font.index',$data);
    }

    public function fontUpdate(Request $request)
    {
        Font::where('id',1)->update(['name'=>$request->name]);
        return redirect()->back()->with('success','Font Updated Successfully');
    }

    public function template()
    {
        $data = [];
        $data['data'] = Template::where('id',1)->first();
        return view('admin.template.index',$data);
    }

    public function templateUpdate(Request $request)
    {
        Template::where('id',1)->update([
            'verify'=>$request->verify,
        ]);
        return redirect()->back()->with('success','Data Updated Successfully');
    }
}
