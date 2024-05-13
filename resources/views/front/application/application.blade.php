<!doctype html>
<html lang="en">

<head>
    <title>ORIGIN INTERNATIONAL COLLEGE | Application Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}">
    <!-- Bootstrap CSS v5.2.1 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('form_assets/css/form.css')}}">
    <link rel="stylesheet" href="{{asset('form_assets/css/form-elements.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.min.css') }}">
    <style>
        .error {
            color: red;
            font-weight: 600;
        }
        .note {
            color: red;
            font-weight: 600;
        }
        .accomonote {
            color: red;
            font-weight: 600;
        }

        hr {
            width: 100%;
            height: 5px;
            border-top: 2px solid #000;
        }
        .star{
            color: red;
            font-size: 20px;
            font-weight: bold;
        }

    </style>
</head>

<body class="body_back">

    <div class="container ">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card  form_card shadow p-2">
                    <div class="card-body">
                        <div class="row mt-4 mb-4">
                            <div class="col-lg-12 text-center">
                                <img src="{{asset('front_asset/images/logooicwhite.png')}}" alt="logo"
                                    class="img-fluid w-50 " srcset="">
                            </div>

                        </div>
                        <form action="{{route('store_application')}}" method="post" enctype="multipart/form-data"
                            name="application">
                            @csrf
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Personal Details</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Surname <span class="star">*</span></label>
                                        <input type="text" name="surname" class="form-control surname" id="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Given name <span class="star">*</span></label>
                                        <input type="text" name="given_name" class="form-control given_name" id="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Name to be Printed on Certificate <span class="star">*</span></label>
                                        <input type="text" name="name_on_certificate"
                                            class="form-control name_on_certificate" id="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Title <span class="star">*</span></label>

                                        <select name="title" class="form-control title">
                                            <option value="">Choose</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">Gender <span class="star">*</span></label>
                                        <select name="gender" class="form-control gender">
                                            <option value="">Choose</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <label class="" for="form-last-name">Profile Picture <span class="star">*</span></label>
                                                <input type="file" name="profile_pic" class="form-control profile_pic"
                                                    onchange="readURLProfile(this);">
                                            </div>
                                            <div class="col-lg-4 mt-3">
                                                <img src="{{asset('assets/images/placeholder-user.png')}}"
                                                    class="profile_img"
                                                    style="height: 150px; width: 150px; border: 2px solid silver;"
                                                    alt="profile_pic">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-last-name">Date of Birth <span class="star">*</span></label>
                                        <input type="date" name="dob" class="form-control dob">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">Nationality <span class="star">*</span></label>
                                        <select name="nationality" class="form-control nationality" id="nationality">

                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">NRIC / Passport Number <span class="star">*</span></label>
                                        <input type="text" name="passport_no" class="form-control passport_no">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-last-name">Attach Passport <span class="star">*</span></label>
                                        <input type="file" name="passport_copy" class="form-control passport_copy">
                                    </div>
                                    <div class="col-lg-12"></div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">Permanent Address <span class="star">*</span></label>
                                        <textarea name="per_address" cols="15" rows="7"
                                            class="form-control h-auto per_address"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Post Code <span class="star">*</span></label>
                                                <input type="text" name="postcode_per" class="form-control postcode_per"
                                                    id="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Country <span class="star">*</span></label>
                                                <select name="country_pre" class="form-control country_pre"
                                                    id="country_pre">
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name">Phone <span class="star">*</span></label>
                                                <input type="text" name="phone_per" class="form-control phone_per"
                                                    id="">
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name"> Email <span class="star">*</span></label>
                                                <input type="email" name="email_per" class="form-control email_per"
                                                    id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <label class="" for="form-about-yourself">Current Address <span class="star">*</span></label>
                                        <textarea name="curr_address" cols="15" rows="7"
                                            class="form-control h-auto"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Post Code <span class="star">*</span></label>
                                                <input type="text" name="post_code_curr"
                                                    class="form-control post_code_curr" id="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Country <span class="star">*</span></label>
                                                <select name="country_curr" class="form-control country_curr"
                                                    id="country_curr">
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name">Phone <span class="star">*</span></label>
                                                <input type="text" name="phone_curr" class="form-control phone_curr"
                                                    id="">
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name"> Email <span class="star">*</span></label>
                                                <input type="email" name="email_curr" class="form-control email_curr"
                                                    id="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Name and Address of Person to Contact in Case of Emergency</h3>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Name <span class="star">*</span></label>
                                        <input type="text" name="name_person" class="form-control name_person" id="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-first-name">Relationship <span class="star">*</span></label>
                                        <input type="text" name="person_relationship"
                                            class="form-control person_relationship" id="">
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-first-name">Occupation <span class="star">*</span></label>
                                        <input type="text" name="person_occupation"
                                            class="form-control person_occupation" id="">
                                    </div>

                                    <div class="col-lg-6">

                                        <label class="" for="form-about-yourself">Address <span class="star">*</span></label>
                                        <textarea name="person_address" cols="15" rows="7"
                                            class="form-control h-auto person_address"></textarea>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Post Code <span class="star">*</span></label>
                                                <input type="text" name="person_postcode"
                                                    class="form-control person_postcode" id="">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="" for="form-first-name">Country <span class="star">*</span></label>
                                                <select name="person_country" class="form-control person_country"
                                                    id="person_country">
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name">Phone <span class="star">*</span> </label>
                                                <input type="text" name="persone_phone"
                                                    class="form-control persone_phone" id="">
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="" for="form-first-name"> Email <span class="star">*</span></label>
                                                <input type="email" name="person_email"
                                                    class="form-control person_email" id="">
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
                                        <label class="" for="form-about-yourself"> Program <span class="star">*</span></label>

                                        <select name="program" class="form-control program">
                                            <option value="">Select Program</option>
                                            @foreach ($programs as $list)
                                            <option value="{{$list->id}}">{{$list->pro_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Qualifications</h3>
                                    </div>
                                </div>
                                <div class="row input_fields_wrap">
                                    <div class="col-lg-12 text-right">
                                        <button type="button" id="add_more_field"
                                            class="add_field_button btn btn-link-1 add_more_field "><i
                                                class="fas fa-plus"></i> Add More</button>
                                    </div>
                                    <div class="col-lg-12">
                                        <label class="" for="form-about-yourself"> Education and Qualifications </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="" for="form-about-yourself"> Year </label>
                                        <input type="text" class="form-control quali_year" name="quali_year[]">
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="" for="form-about-yourself"> School / College </label>
                                        <input type="text" class="form-control school_name" name="school_name[]">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="" for="form-about-yourself"> Examination Taken </label>
                                        <input type="text" class="form-control examination_taken"
                                            name="examination_taken[]">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="" for="form-about-yourself"> Grade / Result </label>
                                        <input type="text" class="form-control grade" name="grade[]">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="" for="form-about-yourself">Attach Degree </label>
                                        <input type="file" class="form-control degree" name="degree[]">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">Attach Qualifications </label>
                                        <input type="file" class="form-control qualifications" name="qualifications">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <hr>
                                        <label class="" for="form-about-yourself">Employment history (For working
                                            student only) </label>
                                    </div>
                                </div>
                                <div class="row experience">

                                    <div class="col-lg-12 text-right">
                                        <button type="button" id="add_more_field"
                                            class="add_field_experience btn btn-link-1  "><i class="fas fa-plus"></i>
                                            Add More</button>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="" for="form-about-yourself"> Job title/ Position </label>
                                        <input type="text" class="form-control " name="job_title[]">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="" for="form-about-yourself"> Company </label>
                                        <input type="text" class="form-control" name="company[]">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="" for="form-about-yourself"> Date Commenced </label>
                                        <input type="date" class="form-control" name="date_commenced[]">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="" for="form-about-yourself">Date Ended </label>
                                        <input type="date" class="form-control" name="date_end[]">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself">Attach Resume</label>
                                        <input type="file" class="form-control resume" name="resume">
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <hr>
                                        <label class="" for="form-about-yourself"> Extra curricular activities </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <label class="" for="form-about-yourself"> Activities </label>
                                        <input type="text" class="form-control activity" name="activity">
                                    </div>
                                    <div class="col-lg-2">
                                        <label class="" for="form-about-yourself">Year </label>
                                        <input type="text" class="form-control year_activity" name="year_activity">
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Financial Resources <span class="star">*</span></h3>
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
                                                    class="form-control resources ">
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="" for="form-about-yourself"> Cash Payment </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="checkbox" name="resources" value="Cash Payment"
                                                class="form-control resources ">
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="" for="form-about-yourself">Sponsor </label>
                                            </div>
                                            <div class="col-lg-4">
                                                <input type="checkbox" name="resources" value="Sponsor"
                                                    class="form-control resources ">
                                            </div>
                                        </div>
                                       
                                    </div>
                                  <div class="col-lg-6">
                                    <label class="note" style="display: none">Please check at least one checkbox</label>	
                                  </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Accommodation ( tick where appropriate) <span class="star">*</span></h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 d-flex justify-content-around align-items-center">
                                        <label class="" for="form-about-yourself"> Required </label>
                                        <input type="checkbox" name="accommodation" value="Required"
                                            class="form-control accomo ">
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-around align-items-center">
                                        <label class="" for="form-about-yourself"> Not Required </label>
                                        <input type="checkbox" name="accommodation" value="Not Required"
                                            class="form-control accomo">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="accomonote" style="display: none">Please check at least one checkbox</label>	
                                      </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-12 heading_fieldset">
                                        <h3>Declaration by Applicant <span class="star">*</span></h3>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <h5 style="color: black;font-weight:bold">
                                            <input type="checkbox" name="accepte" class="accepte "
                                                style="width: 20px; height:20px">
                                            confirm that, to the best of my knowledge, the information given on this
                                            form is correct and understanding that all fees paid are NOT
                                            REFUNDABLE
                                        </h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="" for="form-about-yourself"> Date <span class="star">*</span></label>
                                        <input type="date" name="accepte_date" class="form-control accepte_date">
                                    </div>
                                </div>
                                <div class="row  text-center">
                                    <div class="col-lg-12 mt-5">
                                        <button type="submit" class="btn btn-link-1 btn_sub">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    {{-- <script src="{{asset('form_assets/js/jquery-1.11.1.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="{{asset('form_assets/js/countries.js')}}"></script> --}}
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('form_assets/js/countries.js')}}"></script>
    <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
    @include('components.toster')
    <script>
        populateCountries("nationality");
        populateCountries("country_pre");
        populateCountries("country_curr");
        populateCountries("person_country");

    </script>
    <script>
        $(".btn_sub").click(function(){
            if ($('.resources').filter(':checked').length < 1){                
                $(".note").show();
                return false;
            }else{
                $(".note").hide();             
            }
        });
        $(".btn_sub").click(function(){
            if ($('.accomo').filter(':checked').length < 1){                
                $(".accomonote").show();
                return false;
            }else{
                $(".accomonote").hide();             
            }
        });
       
        $('.accomo').on('change', function () {
            $('.accomo').not(this).prop('checked', false);
        });
        $('.resources').on('change', function () {
            $('.resources').not(this).prop('checked', false);
        });

    </script>

    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script>
        $(function () {

            $("form[name='application']").validate({

                rules: {

                    surname: {
                        required: true,
                    },
                    given_name: {
                        required: true,
                    },
                    name_on_certificate: {
                        required: true,
                    },
                    title: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                    profile_pic: {
                        required: true,
                    },
                    dob: {
                        required: true,
                    },
                    nationality: {
                        required: true,
                    },
                    passport_no: {
                        required: true,
                    },
                    passport_copy: {
                        required: true,
                    },
                    per_address: {
                        required: true,
                    },
                    postcode_per: {
                        required: true,
                    },
                    country_pre: {
                        required: true,
                    },
                    phone_per: {
                        required: true,
                    },
                    email_per: {
                        required: true,
                        email: true
                    },
                    curr_address: {
                        required: true,
                    },
                    post_code_curr: {
                        required: true,
                    },
                    country_curr: {
                        required: true,
                    },
                    phone_curr: {
                        required: true,
                    },
                    email_curr: {
                        required: true,
                        email: true
                    },
                    name_person: {
                        required: true,
                    },
                    person_relationship: {
                        required: true,
                    },
                    person_occupation: {
                        required: true,
                    },
                    person_address: {
                        required: true,
                    },
                    person_postcode: {
                        required: true,
                    },
                    person_country: {
                        required: true,
                    },
                    persone_phone: {
                        required: true,
                    },
                    person_email: {
                        required: true,
                        email: true
                    },
                    program: {
                        required: true,
                    },
                    quali_year: {
                        required: true,
                    },
                    school_name: {
                        required: true,
                    },
                    examination_taken: {
                        required: true,
                    },
                    grade: {
                        required: true,
                    },
                    degree: {
                        required: true,
                    },
                  
                    accomo: {
                        required: true,
                    },
                    accepte: {
                        required: true,
                    },
                    accepte_date: {
                        required: true,
                    },
                },

                messages: {

                    surname: {
                        required: " Provide a Surname",
                    },
                    given_name: {
                        required: " Provide a Given Name",
                    },
                    name_on_certificate: {
                        required: " Provide a Name to be Printed on Certificate",
                    },
                    title: {
                        required: "Select a Title",
                    },
                    gender: {
                        required: "Select a Title",
                    },
                    profile_pic: {
                        required: "Choose a Profile Picture",
                    },
                    dob: {
                        required: "Select Date of Birth",
                    },
                    nationality: {
                        required: "Select a Nationality  Country",
                    },
                    passport_no: {
                        required: " Provide a Passport Number",
                    },
                    passport_copy: {
                        required: "Choose a Passport Picture",
                    },
                    per_address: {
                        required: " Provide a Permanent Address",
                    },
                    postcode_per: {
                        required: " Provide a Post Code",
                    },
                    country_pre: {
                        required: "Select a Permanent Country",
                    },
                    phone_per: {
                        required: " Provide a Phone Number",
                    },
                    email_per: {
                        required: " Provide a Email",
                        email: "Enter Valid Email ID"
                    },
                    curr_address: {
                        required: " Provide a Current Address",
                    },
                    post_code_curr: {
                        required: " Provide a Post Code",
                    },
                    country_curr: {
                        required: "Select a Current Country",
                    },
                    phone_curr: {
                        required: " Provide a Phone Number",
                    },
                    email_curr: {
                        required: " Provide a Email",
                        email: "Enter Valid Email ID"
                    },
                    name_person: {
                        required: " Provide a Name",
                    },
                    person_relationship: {
                        required: " Provide a Relationship",
                    },
                    person_occupation: {
                        required: " Provide a Occupation",
                    },
                    person_address: {
                        required: " Provide a Address",
                    },
                    person_postcode: {
                        required: " Provide a Post Code",
                    },
                    person_country: {
                        required: "Select a Country",
                    },
                    persone_phone: {
                        required: " Provide a Phone Number",
                    },
                    person_email: {
                        required: " Provide a Phone Number",
                        email: "Enter Valid Email ID"
                    },
                    program: {
                        required: "Select a Program",
                    },
                    quali_year: {
                        required: "Provide a Year",
                    },
                    school_name: {
                        required: "Provide a School/College Name",
                    },
                    examination_taken: {
                        required: "Provide a Examination Taken ",
                    },
                    grade: {
                        required: "Provide a Grade",
                    },
                    degree: {
                        required: "Select a Degree",
                    },
                  
                    accomo: {
                        required: "Select Accommodation",
                    },
                    accepte: {
                        required: "Tick if accepted",
                    },
                    accepte_date: {
                        required: "Select Date",
                    },
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        });

    </script>
    <script>
        function readURLProfile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.profile_img').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var apendfields =
            '<div class="col-lg-12 "><button class="remove_field btn btn-link-1 mt-3 " title="Remove field"><i class="fas fa-minus"></i> Remove</button><div class="row"><div class="col-lg-2"><label class="" for="form-about-yourself"> Year </label><input type="text" class="form-control quali_year" name="quali_year[]"></div><div class="col-lg-4"><label class="" for="form-about-yourself"> School / College </label><input type="text" class="form-control school_name" name="school_name[]"></div><div class="col-lg-2"><label class="" for="form-about-yourself"> Examination Taken </label><input type="text" class="form-control examination_taken"name="examination_taken[]"></div><div class="col-lg-2"><label class="" for="form-about-yourself"> Grade / Result </label><input type="text" class="form-control grade" name="grade[]"></div><div class="col-lg-2"><label class="" for="form-about-yourself">Attach Degree </label><input type="file" class="form-control degree" name="degree[]"></div> </div> </div>';

        $(add_button).click(function (e) {
            e.preventDefault();
            $(wrapper).append(apendfields);
        });
        $(wrapper).on("click", ".remove_field", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });
        var wrapperexp = $(".experience"); //Fields wrapper
        var add_exp_button = $(".add_field_experience"); //Add button ID
        var apendexpfields =
            '<div class="col-lg-12 "><button class="remove_exp_field btn btn-link-1 mt-3 " title="Remove field"><i class="fas fa-minus"></i> Remove</button><div class="row">  <div class="col-lg-3"><label class="" for="form-about-yourself"> Job title/ Position </label><input type="text" class="form-control " name="job_title[]"></div><div class="col-lg-3"><label class="" for="form-about-yourself"> Company </label><input type="text" class="form-control" name="company[]"></div><div class="col-lg-3"><label class="" for="form-about-yourself"> Date Commenced </label><input type="date" class="form-control" name="date_commenced[]"></div><div class="col-lg-3"><label class="" for="form-about-yourself">Date Ended </label><input type="date" class="form-control" name="date_end[]"></div> </div> </div>';

        $(add_exp_button).click(function (e) {
            e.preventDefault();
            $(wrapperexp).append(apendexpfields);
        });
        $(wrapperexp).on("click", ".remove_exp_field", function (e) {
            e.preventDefault();
            $(this).parent('div').remove();
        });

    </script>
</body>

</html>
