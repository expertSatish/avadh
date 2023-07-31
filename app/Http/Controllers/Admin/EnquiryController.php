<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use App\Models\Contact;
use App\Models\OnlineForm;



class EnquiryController extends Controller
{
    public function admissionEnquiry()
    {
       $enquiry_data = Enquiry::admissionEnquiry();
       return view('admin.enquiry.admissionEnquiryForm',compact('enquiry_data'));
    }
    public function onlineAdmission()
    {
        $online_form = OnlineForm::OnlineFormData();
       return view('admin.enquiry.onlineAdmission',compact('online_form'));
    }

    public function viewCompleteForm($id)
    {
        $complete_form = OnlineForm::where('id',$id)->first();
        return view('admin.enquiry.viewFormDetails',compact('complete_form'));
        
    }
    public function conactForm()
    {
        $contact_data = Contact::contactData();
       return view('admin.enquiry.conactForm',compact('contact_data'));
    }
}
