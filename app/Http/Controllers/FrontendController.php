<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Package\App\Models\Page;
use Modules\Package\App\Models\Destination;
use Modules\Contact\App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Session;

class FrontendController extends Controller
{
    public function pages($slug=null)
    {
        $indexData = Page::where('slug', $slug)->first();

        if (!$indexData) {
            return redirect()->back();
        }     
        return view('frontend.pages', compact('indexData'));
    }
    
    public function location()
    {
        return view('frontend.destination');
    }

    public function destination($id=null)
    {
        $indexData = Destination::where('id', $id)->first();

        if (!$indexData) {
            return redirect()->back();
        }
        return view('frontend.destination_details', compact('indexData'));
    }

    public function contact()
    {   
        $indexData = Contact::all();
        return view('frontend.contact', compact('indexData'));
    }

    public function contactSend(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $maildata = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ];

        try {
            Mail::to('alihasan.seoexpate@gmail.com')->send(new ContactFormMail($maildata));
            Session::flash('success', 'Message sent successfully!');
        } catch (\Exception $e) {
            Session::flash('error', 'Message could not be sent. Please try again later.');
        }

        return redirect()->back();
    }

  
  
}
