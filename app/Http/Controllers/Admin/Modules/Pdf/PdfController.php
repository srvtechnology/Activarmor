<?php

namespace App\Http\Controllers\Admin\Modules\Pdf;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pdf;
class PdfController extends Controller
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
    	$data['data'] = Pdf::get();
    	return view('admin.pdf.manage',$data);
    }

    public function edit($id)
    {	
    	$data = [];
    	$data['data'] = Pdf::where('id',$id)->first();
    	return view('admin.pdf.edit',$data);
    }


    public function update(Request $request)
    {
    	$check = Pdf::where('id',$request->id)->first();
        if ($request->pdf) {
           @unlink('storage/app/public/pdf/'.$check->pdf);
           $image = $request->pdf;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           //real image
           $image->move("storage/app/public/pdf",$filename);	
           $upd['pdf'] = $filename;
    	}

    	Pdf::where('id',$request->id)->update($upd);
    	return redirect()->back()->with('success','Pdf Updated Successfully');
    }


    public function downloadPdf($id)
    {
    	$file_path = @storage_path() . "/app/public/pdf/".$id;
    	return response()->download( $file_path);
    }

}
