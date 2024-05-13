<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Programme;
use App\Models\Intake;
use App\Models\Center;
use App\Models\EducationStudent;
use App\Models\Application;
use App\Models\Employment;
use App\Helpers\DatetimeHelper;
use App\Helpers\NotificationHelper;
use Exception;
class ApplicationHelper
{
    public static function getApplication($status)
    {
        DB::beginTransaction();
        try {
            $application = Application::orderBy('created_at','asc')->where('status',$status)->get();
            $sr=0;
            $applicationList= [];
            if(count($application) > 0) {
                foreach ($application as $key => $list) {
                    $sr++;

                    $applicationList[$key] = new \stdClass();
                    $applicationList[$key]->sr = $sr;
                    $applicationList[$key]->id = $list->id;
                    $applicationList[$key]->surname = $list->surname;
                    $applicationList[$key]->name = $list->name;
                    $applicationList[$key]->email = $list->curr_email;
                    $applicationList[$key]->nationality = $list->nationality;
                    $applicationList[$key]->created_at = $list->created_at;
                }
            }
            DB::commit();
            return $applicationList;
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
   
    

    public static function storeApplication($request)
    {
        DB::beginTransaction();
        try {

            $profilefile = null;
            if($request->file('profile_pic')) {
                $file= $request->file('profile_pic');
                $profilefile= time().'profile_pic.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/profile_pics/', $profilefile);
            }
            $passportfile = null;
            if($request->file('passport_copy')) {
                $file= $request->file('passport_copy');
                $passportfile= time().'passport_copy.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/copy_passport/', $passportfile);
            }
           
            $qualifications = null;
            if($request->file('qualifications')) {
                $file= $request->file('qualifications');
                $qualifications= time().'qualifications.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/qualifications/',$qualifications);
            }
            $resume = null;
            if($request->file('resume')) {
                $file= $request->file('resume');
                $resume= time().'cv.'.$file->getClientOriginalExtension();
                $file->move('public/uploads/resume/',$resume);
            }

            $application = new Application();   
            $application->surname = $request->surname;
            $application->name = $request->given_name;
            $application->name_on_certificate = $request->name_on_certificate;
            $application->title = $request->title;
            $application->gender = $request->gender;
            $application->profile_pic = 'public/uploads/profile_pics/'. $profilefile;
            $application->dob = $request->dob;
            $application->nationality = $request->nationality;
            $application->passport_no = $request->passport_no;
            $application->passport_copy = 'public/uploads/copy_passport/'. $passportfile;
            $application->permanent_address = $request->per_address;
            $application->per_postcode = $request->postcode_per;
            $application->per_country = $request->country_pre;
            $application->per_phone = $request->phone_per;
            $application->per_email = $request->email_per;
            $application->current_address = $request->curr_address;
            $application->curr_postcode = $request->post_code_curr;
            $application->curr_country = $request->person_country;
            $application->curr_phone = $request->phone_curr;
            $application->curr_email = $request->email_curr;
            $application->name_persone = $request->name_person;
            $application->persone_relationship = $request->person_relationship;
            $application->persone_occupation = $request->person_occupation;
            $application->persone_address = $request->person_address;
            $application->persone_post_code = $request->person_postcode;
            $application->persone_country = $request->person_country;
            $application->persone_phone = $request->persone_phone;
            $application->persone_email = $request->person_email;
            $application->program_id = $request->program;
            $application->qualifications =  'public/uploads/qualifications/'. $qualifications;
            $application->resume =  'public/uploads/resume/'. $resume;
            $application->activities = $request->activity;
            $application->activities_year = $request->year_activity;
          
            $application->resources = $request->resources;
            $application->accommodation = $request->accommodation;
            $application->declaration_date	 = $request->accepte_date;
            $application->save();

            // $files = [];
            // if($request->hasfile('degree'))
            //  {
            //     foreach($request->file('degree') as $file)
            //     {
            //         $degree= time().'degree.'.$file->getClientOriginalExtension();
            //         $file->move('public/uploads/degree/', $degree);
            //         $files[] = $degree;  
            //     }
            //  }
            // $files = [];
            // if($request->hasfile('degree'))
            //  {
            //     foreach($request->file('degree') as $file)
            //     {
            //         $degree = time().rand(1,100).'.'.$file->extension();
            //         $file->move('public/uploads/degree/', $degree);
            //         $files[] = $degree;  
            //     }
            //  }
            if($request->hasfile('degree')){
                foreach($request->file('degree') as $key=> $file){
                    $degree = time().rand(1,100).'.'.$file->extension();
                    $file->move('public/uploads/degree/', $degree);
                    $education = new EducationStudent();
                    $education->app_id = $application->id;
                    $education->qualifications_year =  $request->quali_year[$key];
                    $education->school = $request->school_name[$key];
                    $education->examination_taken = $request->examination_taken[$key];
                    $education->garde = $request->grade[$key];
                    $education->degree = 'public/uploads/degree/'.$degree;
                    $education->save();
                }
            }
        
            if(!empty($request->job_title)){
                foreach($request->job_title as $jkey =>$job){
                    $employment = new Employment();
                    $employment->app_id = $application->id;
                    $employment->job_title = $job;
                    $employment->company = $request->company[$jkey];
                    $employment->date_commenced = $request->date_commenced[$jkey];
                    $employment->date_ended = $request->date_end[$jkey];
                    $employment->save();
                }
            }
            $programme = Programme::where('id',$application->program_id)->first();
            NotificationHelper::save([
                'triggered_by' => $application->id,
                'triggered_for' => $application->id,
                'post_type' => 'application',
                'post_details' => json_encode([
                    'admission'=>'application',
                    'programme' => $programme->name,
                    'by' => $request->name_on_certificate
                ]),
                'ip_address'=>'unknown',
                'is_read' => 0,
                'checked_by' => -1
            ]);
            DB::commit();
            return ReturnToastHelper::Custom('success','Application Submitted.');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return ReturnToastHelper::Failed();
        }
    }

    public static function viewApplication($id)
    {
        DB::beginTransaction();
        try {
            $application = Application::where('id',$id)->first();
            
            $education = EducationStudent::where('app_id',$application->id)->get();
            $employment = Employment::where('app_id',$application->id)->get();
            $pro = Programme::where('id',$application->program_id)->first();
            $applicationList = new \stdClass();
            $applicationList->application = $application;
            $applicationList->education = $education;
            $applicationList->employment = $employment;
            $applicationList->pro_name = $pro->name;
            DB::commit();
            return $applicationList;
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
            return ReturnToastHelper::Failed();
        }
    }
    public static function updateApplication($request)
    {
        DB::beginTransaction();
        try {
            $application = Application::findOrFail($request->id);
            $application->status = $request->status;
            $application->save();
            $programme = Programme::where('id',$application->program_id)->first();
            NotificationHelper::save([
                'triggered_by' => Auth::user()->id,
                'triggered_for' => $application->id,
                'post_type' => 'application_status',
                'post_details' => json_encode([
                    'action' => $application->status,
                    'admission'=>'application',
                    'programme' => $programme->name,
                    'by' => Auth::user()->name,
                    'for' => $application->name_on_certificate
                ]),
                'ip_address'=>'unknown',
                'is_read' => 0,
                'checked_by' => 0
            ]);  
            DB::commit();
            return ReturnToastHelper::Custom('success','Student Application ' . $request->status . ' successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return ReturnToastHelper::Failed();
        }
    }
}