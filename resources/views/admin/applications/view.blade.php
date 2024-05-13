@extends('admin.layouts.main')
@section('Content')
@section('Title','Application Detail | ORIGIN INTERNATIONAL COLLEGE')
@section('Styles')
<link rel="stylesheet" href="{{asset('form_assets/css/form.css')}}">
{{-- <link rel="stylesheet" href="{{asset('form_assets/css/form-elements.css')}}"> --}}
<style>
    .form-control {
        height: 50px;
        margin: 0;
        padding: 0 20px;
        vertical-align: middle;
        background: #f8f8f8;
        border: 2px solid #ddd;
        font-family: 'Roboto', sans-serif;
        font-size: 16px;
        font-weight: 300;
        line-height: 50px;
        color: #888;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        -moz-box-shadow: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        -o-transition: all .3s;
        -moz-transition: all .3s;
        -webkit-transition: all .3s;
        -ms-transition: all .3s;
        transition: all .3s;
    }

    label {
        font-size: 14px;
        font-weight: 600;
    }

    .status {
        background-color: #357eb9;
        display: block;
        padding: 15px;
        color: #fff;
        font-size: 15px;
        font-weight: 600;
        text-transform: capitalize;
    }

    hr {
        width: 100%;
        height: 5px;
        border-top: 2px solid #000;
    }

</style>
@endsection
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="page-title-box  d-flex justify-content-between align-items-center">
                <h4>Application</h4>
                <span class="status">Status: {{$application->application->status}}</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 ">
                            <div class="mb-4" style="float:right">

                                <button type="button" class="btn btn-dark waves-effect waves-light text-white"
                                    onclick="history.back()"><i class="fas fa-arrow-left" onclick="history.back()"></i>
                                    Go Back</button>
                            </div>
                        </div>
                    </div>
                    <fieldset>

                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Personal Details</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Surname</label>
                                <input type="text" name="surname" class="form-control"
                                    value="{{$application->application->surname}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Given name</label>
                                <input type="text" name="given_name" class="form-control"
                                    value="{{$application->application->name}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Name to be Printed on Certificate</label>
                                <input type="text" name="name_on_certificate" class="form-control"
                                    value="{{$application->application->name_on_certificate}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Title</label>

                                <input type="text" name="surname" class="form-control"
                                    value="{{$application->application->title}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">Gender</label>
                                <input type="text" name="surname" class="form-control"
                                    value="{{$application->application->gender}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-last-name">Profile Picture</label>
                                <br>
                                @if(!empty($application->application->profile_pic))
                                <a href="{{url($application->application->profile_pic)}}" download="">
                                    <img src="{{url($application->application->profile_pic)}}" class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="profile_pic">
                                </a>
                                @else
                                <img src="{{asset('assets/images/placeholder-user.png')}}" class="user-profile-pic"
                                    style="height: 150px; width: 150px; border: 2px solid silver;" alt="profile_pic">
                                @endif
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-last-name">Date of Birth</label>
                                <input type="date" name="dob" class="form-control"
                                    value="{{$application->application->dob}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">Nationality</label>
                                <input type="text" name="dob" class="form-control"
                                    value="{{$application->application->nationality}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">NRIC / Passport Number</label>
                                <input type="text" name="passport_no" class="form-control"
                                    value="{{$application->application->passport_no}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-last-name">Attach Passport</label>
                                <br>
                                @if(!empty($application->application->passport_copy))
                                <a href="{{url($application->application->passport_copy)}}" download="">
                                    <img src="{{url($application->application->passport_copy)}}"
                                        class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="passport_copy">
                                </a>
                                @else
                                <img src="{{asset('assets/images/placeholder-user.png')}}" class="user-profile-pic"
                                    style="height: 150px; width: 150px; border: 2px solid silver;" alt="passport_copy">
                                @endif
                            </div>
                            <div class="col-lg-12"></div>
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">Permanent Address</label>
                                <textarea name="per_address" cols="15" rows="5"
                                    class="form-control h-auto">{{$application->application->permanent_address}}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Post Code</label>
                                        <input type="text" name="postcode_per" class="form-control" id=""
                                            value="{{$application->application->per_postcode}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Country</label>
                                        <input type="text" name="postcode_per" class="form-control" id=""
                                            value="{{$application->application->per_country}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name">Phone </label>
                                        <input type="text" name="phone_per" class="form-control" id=""
                                            value="{{$application->application->per_phone}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name"> Email</label>
                                        <input type="email" name="email_per" class="form-control" id=""
                                            value="{{$application->application->per_email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">

                                <label class="" for="form-about-yourself">Current Address</label>
                                <textarea name="curr_address" cols="15" rows="5"
                                    class="form-control h-auto">{{$application->application->current_address}}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Post Code</label>
                                        <input type="text" name="post_code_curr" class="form-control"
                                            value="{{$application->application->curr_postcode}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Country</label>
                                        <input type="text" name="postcode_per" class="form-control" id=""
                                            value="{{$application->application->curr_country}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name">Phone </label>
                                        <input type="text" name="phone_curr" class="form-control"
                                            value="{{$application->application->curr_phone}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name"> Email</label>
                                        <input type="email" name="email_curr" class="form-control"
                                            value="{{$application->application->curr_email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Name and Address of Person to Contact in Case of Emergency</h3>
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Name </label>
                                <input type="text" name="name_person" class="form-control"
                                    value="{{$application->application->name_persone}}">
                            </div>
                            <div class="col-lg-6">
                                <label class="" for="form-first-name">Relationship </label>
                                <input type="text" name="person_relationship" class="form-control"
                                    value="{{$application->application->persone_relationship}}">
                            </div>
                            <div class="col-lg-12">
                                <label class="" for="form-first-name">Occupation </label>
                                <input type="text" name="person_occupation" class="form-control"
                                    value="{{$application->application->persone_occupation}}">
                            </div>

                            <div class="col-lg-6">

                                <label class="" for="form-about-yourself">Address</label>
                                <textarea name="person_address" cols="15" rows="5"
                                    class="form-control h-auto">{{$application->application->persone_address}}</textarea>
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Post Code</label>
                                        <input type="text" name="person_postcode" class="form-control"
                                            value="{{$application->application->persone_post_code}}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Country</label>
                                        <input type="text" name="person_occupation" class="form-control"
                                            value="{{$application->application->persone_country}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name">Phone </label>
                                        <input type="text" name="persone_phone" class="form-control"
                                            value="{{$application->application->persone_phone}}">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name"> Email</label>
                                        <input type="email" name="person_email" class="form-control"
                                            value="{{$application->application->persone_email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Program</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself"> Program </label>

                                <input type="text" class="form-control" value="{{$application->pro_name}}"
                                    name="quali_year">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Qualifications</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="" for="form-about-yourself"> Education and Qualifications </label>
                            </div>
                            @foreach ($application->education as $edu)
                            <div class="col-lg-2">
                                <label class="" for="form-about-yourself"> Year </label>
                                <input type="text" class="form-control" name="quali_year"
                                    value="{{$edu->qualifications_year}}">
                            </div>
                            <div class="col-lg-4">
                                <label class="" for="form-about-yourself"> School / College </label>
                                <input type="text" class="form-control" name="school_name" value="{{$edu->school}}">
                            </div>
                            <div class="col-lg-2">
                                <label class="" for="form-about-yourself"> Examination Taken </label>
                                <input type="text" class="form-control" name="examination_taken"
                                    value="{{$edu->examination_taken}}">
                            </div>
                            <div class="col-lg-2">
                                <label class="" for="form-about-yourself"> Grade / Result </label>
                                <input type="text" class="form-control" name="grade" value="{{$edu->garde}}">
                            </div>
                            <div class="col-lg-2">
                                <label class="" for="form-about-yourself">Attach Degree </label>
                                <br>
                                @if(strpos($edu->degree, ".pdf") !== false)
                                <a href="{{url($edu->degree)}}" download="">
                                    <img src="{{asset('assets/images/file.png')}}"
                                        class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="qualifications">
                                </a>
                                @else
                                @if(!empty($edu->degree))
                                <a href="{{url($edu->degree)}}" download="">
                                    <img src="{{url($edu->degree)}}" class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;" alt="degree">
                                </a>
                                @else
                                <img src="{{asset('assets/images/placeholder-user.png')}}" class="user-profile-pic"
                                    style="height: 150px; width: 150px; border: 2px solid silver;" alt="degree">
                                @endif
                                @endif
                            </div>
                            @endforeach
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">Qualifications </label>
                                <br>
                                @if(strpos($application->application->qualifications, ".pdf") !== false)
                                <a href="{{url($application->application->qualifications)}}" download="">
                                    <img src="{{asset('assets/images/file.png')}}"
                                        class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="qualifications">
                                </a>
                                @else
                                @if(!empty($application->application->qualifications) &&
                                file_exists(base_path($application->application->qualifications)))
                                <a href="{{url($application->application->qualifications)}}" download="">
                                    <img src="{{url($application->application->qualifications)}}"
                                        class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="qualifications">
                                </a>
                                
                                @else


                                <img src="{{asset('assets/images/placeholder-user.png')}}" class="user-profile-pic"
                                    style="height: 150px; width: 150px; border: 2px solid silver;" alt="qualifications">

                                @endif
                                @endif
                            </div>
                            <div class="col-lg-12 mt-3 mb-3">
                                <hr>
                                <label class="" for="form-about-yourself">Employment history (For working
                                    student only) </label>
                            </div>
                            @foreach ($application->employment as $emp)
                            <div class="col-lg-3">
                                <label class="" for="form-about-yourself"> Job title/ Position </label>
                                <input type="text" class="form-control" name="job_title"
                                    value="{{$emp->job_title}}">
                            </div>
                            <div class="col-lg-3">
                                <label class="" for="form-about-yourself"> Company </label>
                                <input type="text" class="form-control" name="company"
                                    value="{{$emp->company}}">
                            </div>
                            <div class="col-lg-3">
                                <label class="" for="form-about-yourself"> Date Commenced </label>
                                <input type="date" class="form-control" name="date_commenced"
                                    value="{{$emp->date_commenced}}">
                            </div>
                            <div class="col-lg-3">
                                <label class="" for="form-about-yourself">Date Ended </label>
                                <input type="date" class="form-control" name="date_end"
                                    value="{{$emp->date_ended}}">
                            </div>
                            @endforeach
                            <div class="col-lg-6">
                                <label class="" for="form-about-yourself">Resume </label>
                                <br>
                                @if(strpos($application->application->resume, ".pdf") !== false)
                                <a href="{{url($application->application->resume)}}" download="">
                                    <img src="{{asset('assets/images/file.png')}}"
                                        class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;"
                                        alt="qualifications">
                                </a>
                                @else
                                @if(!empty($application->application->resume))
                                <a href="{{url($application->application->resume)}}" download="">
                                    <img src="{{url($application->application->resume)}}" class="user-profile-pic"
                                        style="height: 150px; width: 150px; border: 2px solid silver;" alt="resume">
                                </a>
                                @else
                                <img src="{{asset('assets/images/placeholder-user.png')}}" class="user-profile-pic"
                                    style="height: 150px; width: 150px; border: 2px solid silver;" alt="resume">
                                @endif
                                @endif
                            </div>
                            <div class="col-lg-12 mt-3 mb-3">
                                <hr>
                            </div>


                            <div class="col-lg-12 mt-3 mb-3">
                                <label class="" for="form-about-yourself"> Extra curricular activities </label>
                            </div>
                            <div class="col-lg-10">
                                <label class="" for="form-about-yourself"> Activities </label>
                                <input type="text" class="form-control" name="activity"
                                    value="{{$application->application->activities}}">
                            </div>
                            <div class="col-lg-2">
                                <label class="" for="form-about-yourself">Year </label>
                                <input type="text" class="form-control" name="year_activity"
                                    value="{{$application->application->activities_year}}">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Financial Resources</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex  align-items-center">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label class="" for="form-about-yourself"> PTPTN Loan </label>

                                    </div>
                                    <div class="col-lg-4">
                                        <input type="checkbox" name="resources" value="PTPTN Loan"
                                            class="form-control h-50 w-50 "
                                            {{$application->application->resources=='PTPTN Loan'? 'checked' : ''}}>
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="" for="form-about-yourself"> Cash Payment </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="checkbox" name="resources" value="Cash Payment"
                                            class="form-control h-50 w-50 "
                                            {{$application->application->resources=='Cash Payment'? 'checked' : ''}}>
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="" for="form-about-yourself">Sponsor </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="checkbox" name="resources" value="Sponsor"
                                            class="form-control h-50 w-50 "
                                            {{$application->application->resources=='Sponsor'? 'checked' : ''}}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Accommodation (please tick where appropriate)</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 d-flex justify-content-around align-items-center">
                                <label class="" for="form-about-yourself"> Required </label>
                                <input type="checkbox" name="accommodation" class="form-control h-50 w-50 "
                                    {{$application->application->accommodation=='Required'? 'checked' : ''}}>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-around align-items-center">
                                <label class="" for="form-about-yourself"> Not Required </label>
                                <input type="checkbox" name="accommodation" class="form-control h-50 w-50 "
                                    {{$application->application->accommodation=='Not Required'? 'checked' : ''}}>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="row">
                            <div class="col-lg-12 heading_fieldset">
                                <h3>Declaration by Applicant</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 style="color: black;font-weight:bold">
                                    <input type="checkbox" name="accepte" class="accepte " checked
                                        style="width: 20px; height:20px">
                                    confirm that, to the best of my knowledge, the information given on this form is
                                    correct and understanding that all fees paid are NOT
                                    REFUNDABLE
                                </h5>
                            </div>
                            <div class="col-lg-6 ">
                                <label class="" for="form-about-yourself"> Date </label>
                                <input type="date" name="accepte_date" class="form-control "
                                    value="{{$application->application->declaration_date}}">
                            </div>
                        </div>

                    </fieldset>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    @endsection
