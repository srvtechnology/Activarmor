<?php

namespace App\Http\Controllers\Modules\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Mail;
use App\Mail\ContactMail;
use App\Mail\Confirm;
class ContactController extends Controller
{
    public function submit(Request $request)
    {
    	$contact  = new Contact;
    	$contact->first_name = $request->first_name;
    	$contact->last_name = $request->last_name;
    	$contact->phone_number = $request->phone_number;
    	$contact->email = $request->email;
    	$contact->comment = $request->comment;
        $contact->country = $request->country;
        $contact->user_type = $request->type;
    	$contact->save();
        $data = [
                'id'=>$contact->id,
                'email'=>$request->email,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                ];
        Mail::send(new Confirm($data));
    	// $data = [
     //            'email'=>$request->email,
     //            'first_name'=>$request->first_name,
     //            'last_name'=>$request->last_name,
     //            'phone_number'=>$request->phone_number,
     //            'comment'=>$request->comment,
     //    ];
     //    Mail::send(new ContactMail($data));
        return redirect()->back()->with('success','Thanks for contacting us.Please check your email for activation.');
    }



    public function verify($id)
    {
        Contact::where('id',$id)->update(['verified'=>'Y']);
        $mail = Contact::where('id',$id)->first();
        $data = [
                'email'=>$mail->email,
                'first_name'=>$mail->first_name,
                'last_name'=>$mail->last_name,
                'phone_number'=>$mail->phone_number,
                'comment'=>$mail->comment,
                'country'=>$mail->coutry,
                'type'=>$mail->user_type,
        ];
        Mail::send(new ContactMail($data));
        return redirect()->route('index')->with('success','Thank you for verifying your message.We will contact you soon.');
    }
}
