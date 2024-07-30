@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

                        {{-- @include('layouts.includes.messages') --}}
    @section('content')
    <div class="container">
        <div class="heading">
            <div class="col-md-6">
                <div class="form-group">
                    @if($user->avatar != NULL)
                    <img id="imagePreview" src="{{ asset('public/storage/'.$user->avatar) }}" width="100px" height="100px"/>

                    @else
                    <img id="imagePreview" src="{{ asset('images/profile-img.svg') }}">
                </div>
                @endif
                <h3>My Profile</h3>
            </div>
        </div>
            {{-- @if (session($key ?? 'status'))
                <div class="alert alert-success" role="alert">
                    {!! session($key ?? 'status') !!}
                </div>
            @endif --}}
        </div>
        <form method="post" action="{{ route('candidates.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row">

           
            <div class="col-md-6">
                <div class="form-group">
                    <label for="first_name" class="form-label fs-14 text-theme-primary fw-bold">First Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="first_name" value="{{ $user->candidate->first_name }}" required>
                </div>
                <div class="form-group">
                    <label for="last_name" class="form-label fs-14 text-theme-primary fw-bold">Last Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="last_name" value="{{ $user->candidate->last_name }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" class="form-label fs-14 text-theme-primary fw-bold">Email</label>
                    <input type="text" class="form-control fs-14 h-50px" name="email" value="{{ $user->candidate->email }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                <div class="row">
                    <div class="col-2">
                        <input type="tel" class="form-control fs-14 h-50px w-60" maxlength="3" value="{{ $user->candidate->country_code }}" name="country_code" >
                    </div>
                    <div class="col-5">
                        <input type="tel" class="form-control fs-14 h-50px" name="number" value="{{ $user->candidate->number }}">
                    </div>
                </div>
            </div>
            
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                    <option disabled>Choose</option>
                    @foreach ($category as $ca)
                        <option value="{{ $ca->id }}"
                            @if($user->candidate->features != null)
                                @foreach ($user->candidate->features as $row)
                                    @if($row->id == $ca->id)
                                        Selected
                                    @endif
                                @endforeach
                            @endif>{{ $ca->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="dob" class="form-label fs-14 text-theme-primary fw-bold">Date of Birth</label>
                    <input type="date" class="form-control fs-14 h-50px" name="dob" value="{{ $user->candidate->dob }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gender" class="form-label fs-14 text-theme-primary fw-bold">Gender</label>
                    {{-- <label for="" class="form-label fs-14 text-theme-primary fw-bold">Gender</label> --}}
                    <br>
                    <input type="radio" class="btn-check" name="gender" id="male" value="male" autocomplete="off" checked>
                    <label class="btn btn-outline-primary fs-14" for="male" @if($user->candidate->gender == "male") selected @endif>Male</label>

                    <input type="radio" class="btn-check" name="gender" id="female" value="female" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="female" @if($user->candidate->gender == "female") selected @endif>Female</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nationality" class="form-label fs-14 text-theme-primary fw-bold">Nationality</label>
                    <select name="nationality" id="role" class="form-select fs-14  h-50px" required>
                        <option selected value="">Choose</option>
                        <option value="US" @if($user->candidate->nationality == "US") selected @endif>US</option>
                        <option value="AUS" @if($user->candidate->nationality == "AUS") selected @endif>AUS</option>
                        <option value="UK" @if($user->candidate->nationality == "UK") selected @endif>UK</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="address" class="form-label fs-14 text-theme-primary fw-bold">Street Address</label>
                    <input type="text" class="form-control fs-14 h-50px" name="address" value="{{ $user->candidate->address }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="head_line" class="form-label fs-14 text-theme-primary fw-bold">Head Line</label>
                    <input type="text" class="form-control fs-14 h-50px" name="head_line" value="{{ $user->candidate->head_line }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="religion" class="form-label fs-14 text-theme-primary fw-bold">Religion</label>
                    <select id="role" class="form-select fs-14  h-50px mb-4" name="religion">
                        <option selected disabled value="">Select Religion</option>
                        <option value="Islam" @if($user->candidate->religion == 'Islam') selected @endif>Islam</option>
                        <option value="Christian" @if($user->candidate->religion == 'Christian') selected @endif>Christian</option>
                        <option value="Hindu" @if($user->candidate->religion == 'Hindu') selected @endif>Hindu</option>
                        <option value="Other" @if($user->candidate->religion == 'Other') selected @endif>Other</option>
                      </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marital_status" class="form-label fs-14 text-theme-primary fw-bold">Marital Status</label>
                    <br>
                    <input type="radio" class="btn-check" name="marital_status" value="Single" @if($user->candidate->marital_status == 'Single') checked @endif id="Single" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Single">Single</label>

                    <input type="radio" class="btn-check" name="marital_status" value="Married" @if($user->candidate->marital_status == 'Married') checked @endif id="Married" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Married">Married</label>

                    <input type="radio" class="btn-check" name="marital_status" value="Divorced" @if($user->candidate->marital_status == 'Divorced') checked @endif id="Divorced" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Divorced">Divorced </label>

                    <input type="radio" class="btn-check" name="marital_status" value="Others" @if($user->candidate->marital_status == 'Others') checked @endif id="other" autocomplete="on">
                    <label class="btn btn-outline-primary fs-14" for="other">Others </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="driving_license" class="form-label fs-14 text-theme-primary fw-bold">Do you have a driving license?</label>
                    <br>
                    <input type="radio" class="btn-check" name="driving_license" value="1" @if($user->candidate->driving_license == '1') checked @endif id="Yes" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Yes">Yes</label>

                    <input type="radio" class="btn-check" name="driving_license" value="0" @if($user->candidate->driving_license == '0') checked @endif id="no" autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="no">No</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="languages" class="form-label fs-14 text-theme-primary fw-bold">Languages</label>
                    <select id="role" class="form-select fs-14  h-50px mb-4" name="languages">
                        <option selected disabled value="">Select language you know</option>
                        <option value="English" @if($user->candidate->languages == 'English') selected @endif>English</option>
                        <option value="Spanish" @if($user->candidate->languages == 'Spanish') selected @endif>Spanish</option>
                        <option value="French" @if($user->candidate->languages == 'French') selected @endif>French</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="visa_status" class="form-label fs-14 text-theme-primary fw-bold">Visa Status</label>
                    <br>
                    <input type="radio" class="btn-check" value="Citizen" name="visa_status" id="Citizen-Saudi" @if($user->candidate->visa_status == 'Citizen') checked @endif autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Citizen-Saudi">Citizen</label>

                    <input type="radio" class="btn-check" value="Visit Visa" name="visa_status" id="Visit" @if($user->candidate->visa_status == 'Visit Visa') checked @endif autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Visit">Visit Visa</label>

                    <input type="radio" class="btn-check" value="Student Visa" name="visa_status" id="Student" @if($user->candidate->visa_status == 'Student Visa') checked @endif autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Student">Student Visa</label>

                    <input type="radio" class="btn-check" value="Business Visa" name="visa_status" id="Business" @if($user->candidate->visa_status == 'Business Visa') checked @endif autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Business">Business Visa</label>

                    <input type="radio" class="btn-check" value="Employee Visa" name="visa_status" id="Employee" @if($user->candidate->visa_status == 'Employee Visa') checked @endif autocomplete="off">
                    <label class="btn btn-outline-primary fs-14" for="Employee">Employee Visa</label>
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <input class="form-check-input rounded-0" name="terms" required value="1" type="checkbox" id="gridCheck" @if($user->candidate->terms == 1) checked @endif>
                    <label class="form-check-label text-dark fs-14" for="gridCheck">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                    </label>
                    <p class="fs-14 text-grey">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.
                    </p>
                </div>
            </div> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Change Profile Picture</label>
                    <input type="file" class="form-control fs-14 h-50px" name="avatar" accept=".png, .jpg, .jpeg" value="{{ $user->avatar }}" >
                </div>
            </div>
            <div class="col-12">
                <div class="form-group text-center">
                    <button type="submit" class="w-25 btn btn-primary btn_panel"> Update </button>
                </div>
            </div>
            </div>
        </form>
    </div>

    {{-- <form id="msform" method="POST" action="{{ route('candidate.store') }}" name="change_logo" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-5">
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row align-items-center row-cols-lg-2">
                <div class="col-lg-2">
                    <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" onchange="form_submit()" name="avatar" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if($user->avatar != NULL)
                                <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                                </div>
                                @else
                                <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload candidate avatar</h2>
                        <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <form id="msform" method="POST" action="{{ route('candidate.store') }}">
        @csrf
        <fieldset>
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row row-cols-1">
                <div class="col">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Candidate Details</h2>
                </div>
                <div class="col">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">recruiter Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->recruiter->name }}" required>
                </div>
                <div class="col">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                    <option disabled>Choose</option>
                    @foreach ($cat as $ca)
                        <option value="{{ $ca->id }}"
                            @if($comp != null)
                                @foreach ($comp->features as $row)
                                    @if($row->id == $ca->id)
                                        Selected
                                    @endif
                                @endforeach
                            @endif>{{ $ca->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="description" value="{{ $user->recruiter->description }}" required>
                </div>

                <div class="col">
                    <div class="form-check py-2 ">
                        <input class="form-check-input rounded-0" name="terms" value="1" reqquired type="checkbox" id="gridCheck" @if($user->recruiter->terms == 1) checked @endif>
                        <label class="form-check-label text-dark fs-14" for="gridCheck">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                </label>
                        <p class="fs-14 text-grey">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                            sanctus est. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.
                        </p>
                    </div>
                </div>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" onchange="form_submit()" name="logo" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        @if($user->avatar != NULL)
                        <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                        </div>
                        @else
                        <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload recruiter avatar</h2>
                <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
            </div>
            </div>
        </fieldset>
        <div class="row justify-content-center pt-5">
            <div class="col-lg-5 text-center">
                <button class="w-25 next action-button default-btn"> Save </button>
            </div>
        </div>
    </form> --}}

    @endsection

@section('bottom_script')
@endsection
