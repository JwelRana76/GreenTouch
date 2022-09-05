<?php

namespace App\Http\Controllers\frontend;

use App\Models\Slider;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Circular;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class frontendController extends Controller
{
    public function index()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        $sliders = Slider::all();
        return view('frontend.index',compact('sliders','generalSetting'));
    }

    public function about()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        $employee = Employee::all();
        return view('frontend.about',compact('employee','generalSetting'));
    }
    public function mission()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        return view('frontend.mission',compact('generalSetting'));
    }
    public function vision()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        return view('frontend.vision',compact('generalSetting'));
    }
    public function our_project()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        return view('frontend.our_project',compact('generalSetting'));
    }
    public function contact()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        $contact = Contact::where('id',1)->first();
        return view('frontend.contact',compact('contact','generalSetting'));
    }
    public function gallery()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        $galleries = Gallery::orderBy('id','DESC')->paginate(9);
        return view('frontend.gallery',compact('galleries','generalSetting'));
    }
    public function career()
    {
        $generalSetting = GeneralSetting::where('id',1)->first();
        $dn = date('Y-m-d');  
        $jobCircular = Circular::where('is_active','=',1)->orderBy('id','desc')->whereDate('death_line', '>=',$dn)->get();
        return view('frontend.career.index',compact('generalSetting','jobCircular'));
    }

}
