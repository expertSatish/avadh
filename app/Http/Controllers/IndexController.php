<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutCollege;
use App\Models\AdvisorMessage;
use App\Models\Banner;
use App\Models\DirectorMessage;
use App\Models\Faculty;
use App\Models\GalleryVideo;
use App\Models\Gallery;
use App\Models\HodMessage;
use App\Models\ManagerMessage;
use App\Models\VisionMission;
use App\Models\Academic;
use App\Models\CareerDevelopment;
use App\Models\City;
use App\Models\Contact;
use App\Models\Enquiry;
use App\Models\State;
use App\Models\Facility;
use App\Models\Event;
use App\Models\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\EventCategory;
use App\Models\Faq;
use App\Models\News;
use App\Models\BoardMember;
use App\Models\OnlineForm;


class IndexController extends Controller
{
    public function index()
    {
        $banner = Banner::get();
        $facility = Facility::get();
        $about = AboutCollege::first();
        $vision = VisionMission::first();
        $academic = Academic::get();
        $date = date('Y-m-d');
        $news = News::where('expiry_date','>=',$date)->get();
        return view('frontPages.index',compact('banner','facility','about','vision','academic','news'));
    }
     public function facility($slug)
    {
        $facility = Facility::where('slug',$slug)->first();
        return view('frontPages.facility-detail',compact('facility'));
    }
    public function aboutCollege()
    {
        $aboutCollege = AboutCollege::first();
        return view('frontPages.about-college', compact('aboutCollege'));
    }
    public function visionMission()
    {
        $data = VisionMission::first();
        return view('frontPages.vision_mission',compact('data'));
    }
    public function managerMessage()
    {
        $data =  ManagerMessage::first();
        return view('frontPages.manager_message',compact('data'));
    }
    public function directorMessage()
    {
        $data =  DirectorMessage::first();
        return view('frontPages.director_message',compact('data'));
    }
    public function hodMessage()
    {
        $data =  HodMessage::first();
        return view('frontPages.hod_message', compact('data'));
    }
    public function advisorMessage()
    {
        $data =  AdvisorMessage::first();
        return view('frontPages.advisor_message',compact('data'));
    }
    public function whyUs()
    {
        return view('frontPages.why_us');
    }

    public function contact()
    {
        return view('frontPages.contact');
    }
    public function imageGallery()
    {
         $galleryItems = Gallery::get();
        return view('frontPages.image-gallery',compact('galleryItems'));
    }
    public function  videoGallery()
    {
        $videogallery = GalleryVideo::get();
        return view('frontPages.video-gallery',compact('videogallery'));
    }
    public function antiragging()
    {
        return view('frontPages.anti-rangging');
    }

    public function genderSensitization()
    {
        return view('frontPages.gender-sensitization');
    }

    public function placementCell()
    {
        return view('frontPages.placement-cell');
    }
    public function careerDevelopmant()
    {
        return view('frontPages.career-developmant');
    }
    public function saveCareerForm(Request $request)
    {
        if ($request->hasFile('resume')) {
            $resumeFile = $request->file('resume'); // Get the uploaded file
    
            if ($resumeFile->isValid()) {
                $resume = random_int(1000000, 9999999) . '-' . time() . '.' . $resumeFile->getClientOriginalExtension();
                $filePath = public_path('resume/');
                $resumeFile->move($filePath, $resume);
    
                CareerDevelopment::saveData($request, $resume);
    
                return redirect()->back()->with('success', 'Thank You For Contacting Us!');
            }
        }

    }
    public function forRecruiters()
    {
        $banner = Banner::get();
        return view('frontPages.for-recruiters',compact('banner'));
    }

    public function placementInternship()
    {
        return view('frontPages.placement-internship');
    }

    public function pharmaceuticsDepartment($slug)
    {
        $faculty = Faculty::where('slug',$slug)->get();
        $department_name = Faculty::where('slug',$slug)->first();
        return view('frontPages.departments',compact('slug','faculty','department_name'));
    }

    public function academicDetails($slug)
    {
        $academic = Academic::where('slug',$slug)->get();
        $academicname = Academic::where('slug',$slug)->first('academic_name');
        $academic_name = $academicname->academic_name;
        
        return view('frontPages.academicDetails',compact('academic','academic_name'));

    }
    public function studentServiceData($slug)
    {
        $service_data = StudentService::where('slug',$slug)->first();
        return view('frontPages.student_service',compact('service_data'));
    }
     public function event()
    {
        $eventCategory = EventCategory:: eventCategoryData();
        return view('frontPages.event',compact('eventCategory'));
    }
    public function eventDetailsData($slug)
    {
        $eventdata= Event::where('slug',$slug)->first();
        return view('frontPages.event_details',compact('eventdata'));


    }
    
    
    public function dpharm()
    {
        return view('frontPages.d-pharm');
    }
    
    public function bpharm()
    {
        return view('frontPages.b-pharm');
    }
    public function freeEnglish()
    {
        return view('frontPages.free-english-speaking-classes');
    }
  

    public function faq()
    {
        $data = Faq::orderBy('id', 'asc')->get();

        return view('frontPages.faq',compact('data'));
    }

    public function privacyPolicy()
    {
        return view('frontPages.privacy-policy');
    }
    public function termCondition()
    {
        return view('frontPages.terms-and-condition');
    }
    public function feedback()
    {
        return view('frontPages.feedback');
    }

    public function enquiry()
    {
        $states = State::where('status', 'Active')->get();
        return view('frontPages.enquiry',compact('states'));
    }

    public function getCities(Request $request)
    {
        $stateId = $request->query('stateId');
        $cities = City::where('state_id', $stateId)->get();
    
        return response()->json($cities);
    }

    public function enquirySave(Request $request)
    {
       Enquiry::saveData($request);
       return redirect()->back()->with('success', 'Thank You For Contact Us!');
    }

    public function postData(Request $request)
    {
        $sts = true;
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|between:3,50|email|regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/',
                'name' => 'required',
                'message' => 'required',
                'subject' => 'required',
            ],
            [
                'mobile.regex' => 'Please enter a valid Mobile Number',
                'required' => ':attribute is required.',
                'unique' => ':attribute already exists.',
                'exists' => ':attribute is not exists.',
                'regex' => ':attribute is invalid.',
                'between' => ':attribute must be between :min to :max.',
            ],
            ['name' => 'Name', 'subject' => 'Subject', 'email' => 'Email',  'message' => 'Message']
        );

        if ($validator->fails()) {
            $msg = $validator->errors();
            $sts = false;
            return response(compact('sts', 'msg'), 200);
        } else {
            Contact::saveData($request);
            $msg = 'Thank You for Contact Us.';
            return response(compact('sts', 'msg'), 200);
        }
    }

    public function annualDay()
    {
        return view('frontPages.annual_day');
    }
    public function sportsday()
    {
        return view('frontPages.sports_day');
    }

    public function onlineForm(){
        return view('frontPages.online_form');
    }
    
    public function saveOnlineFrom(Request $request)
    {
        $qualificationData = $request->qualification;
        $qualifications = [];    
        $request->validate([
            'user_picture' =>'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'guardian_phone' => 'required',
            'catagory' => 'required',
            'physically_handicapped' => 'required',
            'father_occupation' => 'required',
            'mother_occupation' => 'required',
            'thumb_print' => 'required',
            'user_sign' => 'required',
        ]);



        if ($files = $request->file('user_picture')) {
            $image_name = md5(rand(100, 1000));
            $ext = strtolower($files->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload_document/';
            $image_url = $upload_path . $image_full_name;
            $files->move($upload_path, $image_full_name);
        }

        if ($files = $request->file('thumb_print')) {
            $image_name = md5(rand(100, 1000));
            $ext = strtolower($files->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload_document/';
            $image_url1 = $upload_path . $image_full_name;
            $files->move($upload_path, $image_full_name);
        }

        if ($files = $request->file('user_sign')) {
            $image_name = md5(rand(100, 1000));
            $ext = strtolower($files->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'upload_document/';
            $image_url2 = $upload_path . $image_full_name;
            $files->move($upload_path, $image_full_name);
        }
        if ($qualificationData) {
            foreach ($qualificationData as $index => $qualification) {
                
                if (isset($qualification['uploadfile'])) {
                    $file = $qualification['uploadfile'];
                    $file_name = md5(rand(100, 1000)) . '.' . $file->getClientOriginalExtension();
                    $upload_path = 'qualification_files/';
                    $file->move($upload_path, $file_name);
    
                    // Add qualification data to the qualifications array
                    $qualifications[] = [
                        'board' => $qualification['board'],
                        'subject' => $qualification['subject'],
                        'marks_obtained' => $qualification['marks_obtained'],
                        'total_marks' => $qualification['total_marks'],
                        'file_url' => $upload_path . $file_name,
                    ];
                }
            }
        }

        $online_form = new OnlineForm;
        $online_form->course =  $request->course;
        $online_form->user_picture = $image_url;
        $online_form->name = $request->name;
        $online_form->father_name = $request->father_name;
        $online_form->mother_name = $request->mother_name;
        $online_form->dob = $request->dob;
        $online_form->address = $request->address;
        $online_form->phone = $request->mobile;
        $online_form->guardian_phone = $request->guardian_phone;
        $online_form->physically_handicapped = $request->physically_handicapped;
        $online_form->father_occupation = $request->father_occupation;
        $online_form->mother_occupation = $request->mother_occupation;
        $online_form->family_income = $request->family_income;
        $online_form->thumb_print =  $image_url1;
        $online_form->signature = $image_url2;
        $online_form->qulifications = json_encode($qualifications);
        $online_form->save();
         return redirect()->back()->with('success', 'Your admimission form submitted successfully!');   
    }
    
     public function eventDetails($slug){
        $eventData = Event::where('slug',$slug)->first();
        return view('frontPages.event',compact('eventData'));

    }

    public function academicProgramme()
    {
        $academic = Academic::get();
        return view('frontPages.academic-programme',compact('academic'));
    }
    public function academicFacilities()
    {
        return view('frontPages.academic-facilities');
    }
    public function campusFacilities()
    {
        return view('frontPages.campus-facilities');
    }
    public function studentWelfareServices()
    {
        return view('frontPages.student-welfare-services');
    }
    public function sportsFacilities(){
        return view('frontPages.sports-facilities');

    }
    public function culturalFacility(){
        return view('frontPages.Cultural-facility');
    }
    public function collegeHeiglights(){
        return view('frontPages.college-heiglite');
    }
    public function governingBody(){
        return view('frontPages.governing-body');
    }
    
    public function bordMember(){
    $member = BoardMember::get();
    return view('frontPages.bord-member',compact('member'));
    }
    public function news($slug)
    {
        $news = News::where('slug',$slug)->first();
        return view('frontPages.news',compact('news'));
    }
    
}
