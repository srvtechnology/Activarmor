<?php

namespace App\Http\Controllers\Admin\Modules\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactPage;
use Image;
class ContactController extends Controller
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
    	$data['data'] = Contact::orderBy('id','desc')->where('verified','Y')->paginate(10);
    	return view('admin.contact.manage',$data);
    }

    public function view($id)
    {
    	$data = [];
    	$data['data'] = Contact::where('id',$id)->first();
    	return view('admin.contact.view',$data);
    }

    public function delete($id)
    {
        Contact::where('id',$id)->delete();
        return redirect()->back()->with('success','Data Deleted Successfully');
    }

    public function contact()
    {
        $data = [];
        $data['data'] = ContactPage::where('id',1)->first();
        return view('admin.contact_page.manage',$data);
    }

    public function contactUpdate(Request $request)
    {
        $contact = ContactPage::where('id',1)->first();
        $upd = [];
        $upd['email'] = $request->email;
        $upd['address'] = $request->address;
        
        if ($request->image) {
           @unlink('storage/app/public/contact_min/'.$contact->image);
           @unlink('storage/app/public/contact/'.$contact->image);
           $image = $request->image;
           $filename = time() . '-' . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
           $resize_image = Image::make($image->getRealPath());
           $resize_image->resize(1000, 1000, function($constraint){
                $constraint->aspectRatio();
            })->save("storage/app/public/contact_min" . '/' . $filename);
            //real image
            $image->move("storage/app/public/contact",$filename);    
            $upd['image'] = $filename;
        }
        ContactPage::where('id',1)->update($upd);
        return redirect()->back()->with('success','Data Updated Succesfully');
    }
}
