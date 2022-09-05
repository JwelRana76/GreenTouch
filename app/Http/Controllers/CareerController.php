<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Circular;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserPersonalDetails;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function personalDetails()
    {
        $id = Auth::guard('web')->user()->id;
        $userdetails = UserPersonalDetails::where('user_id',$id)->first();
        return view('frontend.career.personal_details',compact('userdetails'));
    }

    public function EducationalInfo()
    {
        return view('frontend.career.educational-info');
    }

    public function EmploymentInfo()
    {
        return view('frontend.career.employment-info');
    }
    public function Referance()
    {
        return view('frontend.career.referance');
    }

    public function ComputerSkill()
    {
        return view('frontend.career.computer-skill');
    }

    public function PhotoSignature()
    {
        return view('frontend.career.photo_signature');
    }

    public function userProfileView()
    {
        // $user = Auth::user();
        // $personaldetails = UserPersonalDetails::where('user_id',$user->id)->first();
        // dd($personaldetails->computer_skill);
        return view('frontend.career.profile');
    }

    public function cvdownload()
    {
        $pdf = Pdf::loadView('invoice');
        return $pdf->stream();
    }

    public function cvdoprint()
    {
        return view('frontend.career.curriculumvitae');
    }

    public function viewCircularDetails($id)
    {
        $circular = Circular::find($id);
        if($circular !== null){
            $path = Storage::path("public/uploads/circular/$circular->file");
            // dd($path);
            $content = file_get_contents($path);
            return response($content)->withHeaders([
                'Content-Type' => mime_content_type($path),
            ]);
        }else{
            return redirect('/404');
        }
    }

    public function jobApplication($id)
    {
        $circular = Circular::find($id);
        $user = Auth::guard('web')->user();
        if ($user->personalDetails && $user->educationinfo && $user->userreferance) {
            if ($user->personalDetails->career_objective !== null && $user->personalDetails->computer_skill !== null) {
                $alreadyapplied = Application::where('user_id',$user->id)->where('post',$circular->post)->first();
                if ($alreadyapplied) {
                    return back()->with('error','You are Already Apply for this post');
                }else {
                    Application::create([
                        'user_id' => $user->id,
                        'post' => $circular->post,
                    ]);
                    return back()->with('success','Your Application Submitted Successfully');
                }
            }else{
                return back()->with('error','Please fill all Career details Form');
            }
        }else{
            return back()->with('error','Please fill all Career details Form');
        }
    }

}
