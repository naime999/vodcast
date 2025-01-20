<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;

class ContactController extends Controller
{
    public function index()
    {
        return view('frontend.contact.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required',
            'email'     => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        // try{
            $contact = new Contact();

            $contact->name = $request->full_name;
            if(auth()->check()){
                $contact->user_id = auth()->user()->id;
            }
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->message = $request->message;
            if($contact->save()){
                return redirect()->back()->with('success','Successful your contact.');
            }else{
                return redirect()->back()->with('error','Filed your contact.');
            }
        // } catch (\Throwable $th) {
        //     // Rollback and return with Error
        //     DB::rollBack();
        //     return redirect()->back()->withInput()->with('error', $th->getMessage());
        // }
    }
}
