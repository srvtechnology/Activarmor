<?php

namespace App\Http\Controllers\Admin\Modules\Heading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Heading;
use App\SubHeading;
class HeadingController extends Controller
{
    public function index()
    {
    	$data = [];
    	$data['data'] = Heading::where('type','B')->paginate(10);
    	$data['type']='B';
    	return view('admin.heading.list',$data);
    }

    public function doctorHeading()
    {
    	$data = [];
    	$data['data'] = Heading::where('type','D')->paginate(10);
    	$data['type']='D';
    	return view('admin.heading.list',$data);
    }

    public function patientHeading()
    {
    	$data = [];
    	$data['data'] = Heading::where('type','P')->paginate(10);
    	$data['type']='P';
    	return view('admin.heading.list',$data);
    }

    public function contactHeading()
    {
        $data = [];
        $data['data'] = Heading::where('type','C')->paginate(10);
        $data['type']='C';
        return view('admin.heading.list',$data);
    }

    public function addView()
    {
    	$data = [];
    	$data['type'] = 'B';
    	return view('admin.heading.add',$data);
    }

    public function doctorHeadingAdd()
    {
    	$data = [];
    	$data['type'] = 'D';
    	return view('admin.heading.add',$data);
    }

    public function patientHeadingAdd()
    {
    	$data = [];
    	$data['type'] = 'P';
    	return view('admin.heading.add',$data);
    }

    public function contactHeadingAdd()
    {
        $data = [];
        $data['type'] = 'C';
        return view('admin.heading.add',$data);
    }

    

    public function add(Request $request)
    {
    	$heading = new Heading;
    	$heading->name = $request->name;
    	$heading->type = $request->type;
    	$heading->save();
    	return redirect()->back()->with('success','Heading Added Successfully');
    }

    public function edit($id)
    {
    	$data = [];
    	$data['data'] = Heading::where('id',$id)->first();
    	return view('admin.heading.edit',$data);
    }

    public function doctorHeadingEdit($id)
    {
    	$data = [];
    	$data['data'] = Heading::where('id',$id)->first();
    	return view('admin.heading.edit',$data);
    }

    public function patientHeadingEdit($id)
    {
    	$data = [];
    	$data['data'] = Heading::where('id',$id)->first();
    	return view('admin.heading.edit',$data);
    }

    public function contactHeadingEdit($id)
    {
        $data = [];
        $data['data'] = Heading::where('id',$id)->first();
        return view('admin.heading.edit',$data);
    }


    public function update(Request $request)
    {
    	Heading::where('id',$request->id)->update([
    		'name'=>$request->name,
    	]);
    	return redirect()->back()->with('success','Heading Updated Successfully');

    }

    public function delete($id)
    {
    	Heading::where('id',$id)->delete();
    	return redirect()->back()->with('success','Heading Deleted Successfully');
    }



    // sub-heading 
    public function subHeading()
    {
    	$data = [];
    	$data['data'] = SubHeading::where('type','B')->paginate(10);
    	$data['type']='B';
    	return view('admin.sub_heading.index',$data);
    }

    public function doctorSubHeading()
    {
    	$data = [];
    	$data['data'] = SubHeading::where('type','D')->paginate(10);
    	$data['type']='D';
    	return view('admin.sub_heading.index',$data);
    }

    public function patientSubHeading()
    {
    	$data = [];
    	$data['data'] = SubHeading::where('type','P')->paginate(10);
    	$data['type']='P';
    	return view('admin.sub_heading.index',$data);
    }

    public function contactSubHeading()
    {
        $data = [];
        $data['data'] = SubHeading::where('type','C')->paginate(10);
        $data['type']='C';
        return view('admin.sub_heading.index',$data);
    }

    public function subHeadingaddView()
    {
    	$data = [];
    	$data['type'] = 'B';
    	return view('admin.sub_heading.add',$data);
    }

    public function doctorSubHeadingAdd()
    {
    	$data = [];
    	$data['type'] = 'D';
    	return view('admin.sub_heading.add',$data);
    }

    public function patientSubHeadingAdd()
    {
    	$data = [];
    	$data['type'] = 'P';
    	return view('admin.sub_heading.add',$data);
    }

    public function contactSubHeadingAdd()
    {
        $data = [];
        $data['type'] = 'C';
        return view('admin.sub_heading.add',$data);
    }

    

    public function subHeadingadd(Request $request)
    {
    	$heading = new SubHeading;
    	$heading->name = $request->name;
    	$heading->type = $request->type;
    	$heading->save();
    	return redirect()->back()->with('success','Sub Heading Added Successfully');
    }


    public function subHeadingedit($id)
    {
    	$data = [];
    	$data['data'] = SubHeading::where('id',$id)->first();
    	return view('admin.sub_heading.edit',$data);
    }

    public function doctorSubHeadingEdit($id)
    {
    	$data = [];
    	$data['data'] = SubHeading::where('id',$id)->first();
    	return view('admin.sub_heading.edit',$data);
    }

    public function patientSubHeadingEdit($id)
    {
    	$data = [];
    	$data['data'] = SubHeading::where('id',$id)->first();
    	return view('admin.sub_heading.edit',$data);
    }

    public function contactSubHeadingEdit($id)
    {
        $data = [];
        $data['data'] = SubHeading::where('id',$id)->first();
        return view('admin.sub_heading.edit',$data);
    }

    public function updateSubHeading(Request $request)
    {
    	SubHeading::where('id',$request->id)->update([
    		'name'=>$request->name,
    	]);
    	return redirect()->back()->with('success','Sub Heading Updated Successfully');
    }

    public function deleteSubHeading($id)
    {
    	SubHeading::where('id',$id)->delete();
    	return redirect()->back()->with('success','Heading Deleted Successfully');
    }




}
