@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7">
        <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            @if (session($key ?? 'error'))
                <div class="alert alert-danger" role="alert">
                    {!! session($key ?? 'error') !!}
                </div>
            @endif
            {{-- start cover picture --}}
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex aling-items-center justify-content-between mb-3">
                    <h3 class="fw-500 text_primary fs-5 align-self-center">Cover picture</h3>
                    <div>
                        <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Edit Info" id="editCoverPic" href="javascript:;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Update" id="saveCoverPic" style="display: none;">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cancel" id="cancelCoverPic" style="display: none;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="cover-edit-box" style="display: none;">
                    <div class="cover_picture">
                        <label class="-label" for="file">
                            <i class="fa-solid fa-camera"></i>
                            <span>Change Image</span>
                        </label>
                        <input id="file" type="file" onchange="loadFile(event)" />
                        <img src="{{ asset('images/banner-placeholder.png') }}" id="output" />
                    </div>
                    <p class="text_primary" style="font-size: 12px;">upload 300 x 500 </p>
                </div>
                <div class="cover-not-edit-box">
                    <img src="{{ asset('images/banner-placeholder.png') }}" class="w-100 cover__pic" />
                </div>
            </div>
            {{-- end cover picture --}}

            {{-- start personal detail info --}}
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex aling-items-center justify-content-between mb-3">
                    <h2 class="fw-500 text_primary fs-5 align-self-center">Personal Details</h2>
                    <div>
                        <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Edit Info" id="editPersonalInfo" href="javascript:;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Update" id="savePersonalInfo" style="display: none;">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cancel" id="cancelPersonalInfo" style="display: none;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                </div>
                <div class="row gy-3 personal-detail">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label fs-14 text-theme-primary">First Name</label>
                        <input disabled type="text" class="form-control" value="John" id="firstName">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label fs-14 text-theme-primary">Last Name</label>
                        <input disabled type="text" class="form-control" value="John" id="lastName">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label fs-14 text-theme-primary">Gender</label>
                        <div class="gender-show" style="font-size: 15px; color: #92929d;">
                            male
                        </div>
                        <div class="gender-edit " style="display: none;">
                            <select id="gender" class="form-select">
                                <option value="male" selected>male</option>
                                <option value="female">female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="dateOfBirth" class="form-label fs-14 text-theme-primary">Date Of Birth</label>
                        <div class="position-relative">
                            <input disabled type="text" class="form-control datepicker" placeholder="15-Dec-2000"
                                id="dateOfBirth" readonly>
                            <label class="calender-icon-2 " for="dateOfBirth" style="display: none;">
                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                            </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="tagline" class="form-label fs-14 text-theme-primary">Tag line</label>
                        <textarea disabled id="tagline" maxlength="150" class="form-control">Lorem Ipsum is simply dummy text of the printing and</textarea>
                        <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                id="taglineChars"></span>
                            Character(s)
                            Remaining</div>
                    </div>
                    <div class="col-12">
                        <label for="aboutText" class="form-label fs-14 text-theme-primary">About</label>
                        <textarea disabled id="aboutText" maxlength="500" class="form-control">Lorem Ipsum is simply dummy text of the printing and</textarea>
                        <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                id="aboutTextChars"></span>
                            Character(s)
                            Remaining</div>
                    </div>
                </div>
            </div>
            {{-- end personal detail info --}}

            {{-- start Contact Details info --}}
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex aling-items-center justify-content-between mb-3">
                    <h2 class="fw-500 text_primary fs-5 align-self-center">Contact Details</h2>
                    <div>
                        <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Edit Info" id="editContactDetail" href="javascript:;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Update" id="saveContactDetail" style="display: none;">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cancel" id="cancelContactDetail" style="display: none;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="row gy-3 contact-detail">
                    <div class="col-md-6">
                        <label for="contactNumber" class="form-label fs-14 text-theme-primary">Contact Number</label>
                        <div class="contact-number-text" style="font-size: 15px; color: #92929d;">
                            <span class="country-code">+1</span> <span class="contact-number">468-8827</span>
                        </div>
                        <div class="edit-phone-number" style="display: none;">
                            <div class="single-field full-width phone-input-flag d-flex ">
                                <input type="tel" class="mobile-number form-control fs-14 h-50px"
                                    style="color: transparent;" id="countryCode" value="+1">
                                <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                                    placeholder="Phone Number" id="contactNumber" maxlength="11" value="468-8827">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="emailAddress" class="form-label fs-14 text-theme-primary">Contact Number</label>
                        <input type="email" class="form-control" id="emailAddress" value="Smithjohn@gmail.com"
                            disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label fs-14 text-theme-primary">Address</label>
                        <input type="email" class="form-control" id="address"
                            value="18 Whitman Pl, Hillsdale, New Jersey" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="zipCode" class="form-label fs-14 text-theme-primary">Zip Code</label>
                        <input type="email" class="form-control" id="zipCode" value="07642" disabled>
                    </div>
                </div>
            </div>
            {{-- start Contact Details info --}}

            {{-- start others detail  --}}
            <div class="mb-4 pb-4 border-bottom">
                <div class="d-flex aling-items-center justify-content-between mb-3">
                    <h2 class="fw-500 text_primary fs-5 align-self-center">Other Details</h2>
                    <div>
                        <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Edit Info" id="editOtherDetail" href="javascript:;">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Update" id="saveOtherDetail" style="display: none;">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Cancel" id="cancelOtherDetail" style="display: none;">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="row gy-3 others-detail">
                    <div class="col-md-6">
                        <label for="nationality" class="form-label fs-14 text-theme-primary">Nationality</label>
                        <div class="nationality-show" style="font-size: 15px; color: #92929d;">
                            US
                        </div>
                        <div class="nationality-edit" style="display: none;">
                            <select id="nationality" class="form-select">
                                <option value="US" selected>US</option>
                                <option value="AUS">AUS</option>
                                <option value="UK">UK </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="religion" class="form-label fs-14 text-theme-primary">Religion</label>
                        <div class="religion-show" style="font-size: 15px; color: #92929d;">
                            Christianity
                        </div>
                        <div class="religion-edit" style="display: none;">
                            <select id="religion" class="form-select">
                                <option value="Christianity" selected>Christianity</option>
                                <option value="Islam">Islam</option>
                                <option value="Hinduism">Hinduism</option>
                                <option value="Sikhism">Sikhism</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="maritialStatus" class="form-label fs-14 text-theme-primary">Maritial Status</label>
                        <div class="maritialStatus-show" style="font-size: 15px; color: #92929d;">
                            Single
                        </div>
                        <div class="maritialStatus-edit" style="display: none;">
                            <select name="marital_status" id="maritialStatus" class="form-select">
                                <option value="Single" selected>Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 languages__select__box">
                        <label for="languages" class="form-label fs-14 text-theme-primary">Languages</label>
                        <select disabled multiple id="languages" class="form-select fs-14 languages__select h-50px mb-4">
                            <option value="English" selected>
                                English
                            </option>
                            <option value="Spanish">
                                Spanish
                            </option>
                            <option value="French">
                                French
                            </option>
                            <option value="German">
                                German
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="drivingLicense" class="form-label fs-14 text-theme-primary">Driving License</label>
                        <div class="driving-license-show" style="font-size: 15px; color: #92929d;">Yes</div>
                        <div class="driving-license-edit" style="display: none;">
                            <select name="driving_license" id="drivingLicense" class="form-select">
                                <option value="1" selected>
                                    Yes
                                </option>
                                <option value="0">
                                    No
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="visaStatus" class="form-label fs-14 text-theme-primary">Visa Status</label>
                        <div class="visaStatus-show" style="font-size: 15px; color: #92929d;">Citizen</div>
                        <div class="visaStatus-edit" style="display: none;">
                            <select name="visa_status" id="visaStatus" class="form-select">
                                <option value="Citizen" selected>
                                    Citizen
                                </option>
                                <option value="Visit Visa">
                                    Visit Visa
                                </option>
                                <option value="Student Visa">
                                    Student Visa
                                </option>
                                <option value="Business Visa">
                                    Business Visa
                                </option>
                                <option value="Employee Visa">
                                    Employee Visa
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end others detail --}}

            {{-- <div class="border p-3 mb-4">
                <form class="dashboard-form dashboard-form-2" method="post"
                    action="{{ route('candidates.profile.update') }}" enctype="multipart/form-data">
                    <div class="d-flex aling-items-center mb-4">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Edit Profile</h2>
                        <a class="d-inline-block ms-auto text_grey_999" role="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit Info" id="editExperience" href="javascript:;"> <i
                                class="fa-solid fa-pencil "></i></a>
                    </div>
                    @csrf
                    @method('post')
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">First Name</label>
                            <input disabled type="text" class="form-control fs-14 h-50px" name="first_name"
                                value="{{ $user->first_name }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Last Name</label>
                            <input disabled type="text" class="form-control fs-14 h-50px" name="last_name"
                                value="{{ $user->last_name }}" required>
                        </div>
                        <div class="col-12">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Headline</label>
                            <textarea disabled class="form-control fs-14 h-50px" name="head_line" required>{{ $user->head_line }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Gender</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="gender">
                                <option disabled selected>Choose</option>
                                <option value="Male" @if ($user->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($user->gender == 'Female') selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Nationality</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="nationality">
                                <option disabled>Choose</option>
                                <option value="US" @if ($user->nationality == 'US') selected @endif>US</option>
                                <option value="UK" @if ($user->nationality == 'UK') selected @endif>UK</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Address</label>
                            <input disabled type="text" class="form-control fs-14 h-50px" name="address"
                                value="{{ $user->address }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fs-14 text-theme-primary fw-bold">Email</label>
                            <input disabled type="email" class="form-control fs-14 h-50px" name="email"
                                value="{{ $user->email }}" required id="UserEmail">

                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Phone</label>
                            <div style="opacity: 0.8" class="phoneNumber">{{ $user->country_code }} {{ $user->number }}
                            </div>
                            <div style='display:none;' class="phoneNumberEdit">
                                <div class='single-field full-width phone-input-flag d-flex'>
                                    <input disabled type="tel" maxlength="4"
                                        class="mobile-number form-control fs-14 h-50px" style="color: transparent;"
                                        name="country_code" value="{{ $user->country_code }}" required>
                                    <input disabled type="text" class="form-control fs-14 h-50px phone_number_input--lg"
                                        name="number" value="{{ $user->number }}" maxlength="11"
                                        placeholder="111******" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Skills</label>
                            <select disabled multiple id="role" class="form-select fs-14 select2-multiple h-50px"
                                name="skills[]">
                                <option disabled>Select</option>
                                @foreach ($skill as $row)
                                    <option value="{{ $row->id }}"
                                        @if ($candSkills != null) @foreach ($candSkills as $ca)
                                                            @if ($row->id == $ca->skill_id)
                                                                Selected @endif
                                        @endforeach
                                @endif>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label fs-14 text-theme-primary fw-bold">Date of
                                Birth</label>
                            <div class="position-relative">
                                <input type="text" class="form-control datepicker fs-14 h-50px w-100" disabled
                                    value="{{ $user->dob }}" placeholder="mm/dd/yyyy" autocomplete="off"
                                    id="dob" name="dob" required="">
                                <label class="calender-icon d-block" for="dob">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="religion" class="form-label fs-14 text-theme-primary fw-bold">Religion</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="religion">
                                <option disabled>Choose</option>
                                <option value="Christianity" @if ($user->religion == 'Christianity') selected @endif>
                                    Christianity
                                </option>
                                <option value="Islam" @if ($user->religion == 'Islam') selected @endif>
                                    Islam</option>
                                <option value="Hinduism" @if ($user->religion == 'Hinduism') selected @endif>
                                    Hinduism
                                </option>
                                <option value="Sikhism" @if ($user->religion == 'Sikhism') selected @endif>
                                    Sikhism
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="marital_status" class="form-label fs-14 text-theme-primary fw-bold">Marital
                                Status</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="marital_status">
                                <option disabled>Choose</option>
                                <option value="Single" @if ($user->marital_status == 'Single') selected @endif>Single</option>
                                <option value="Married" @if ($user->marital_status == 'Married') selected @endif>Married
                                </option>
                                <option value="Divorced" @if ($user->marital_status == 'Divorced') selected @endif>Divorced
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="driving_license" class="form-label fs-14 text-theme-primary fw-bold">Driving
                                License</label>
                            
                            <select disabled id="role" class="form-select fs-14  h-50px" name="driving_license">
                                <option disabled>Choose</option>
                                <option value="1" @if ($user->driving_license == 1) selected @endif>Yes</option>
                                <option value="0" @if ($user->driving_license == 0) selected @endif>No</option>
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Languages</label>
                            <select disabled id="role" class="form-select fs-14 h-50px" name="languages">
                                <option value="English" @if ($user->languages == 'English') selected @endif>
                                    English
                                </option>
                                <option value="Spanish" @if ($user->languages == 'Spanish') selected @endif>
                                    Spanish
                                </option>
                                <option value="French" @if ($user->languages == 'French') selected @endif>
                                    French
                                </option>
                                <option value="German" @if ($user->languages == 'German') selected @endif>
                                    German
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="visa_status" class="form-label fs-14 text-theme-primary fw-bold">Visa
                                Status</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="visa_status">
                                <option disabled>Choose</option>
                                <option value="Permanant" @if ($user->visa_status == 'Permanant') selected @endif>Permanent
                                </option>
                                <option value="Citizen" @if ($user->visa_status == 'Citizen') selected @endif>Citizen
                                </option>
                                <option value="Work" @if ($user->visa_status == 'Work') selected @endif>Work</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="visa_status" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                            <select disabled id="role" class="form-select fs-14  h-50px" name="status">
                                <option value="1" @if ($user->status == '1') selected @endif>Active</option>
                                <option value="0" @if ($user->status == '0') selected @endif>Inactive
                                </option>
                            </select>
                        </div>
                        <div class="col-12 " id="updateButton" style="display:none;">
                            <button type="submit" class="btn_viewall px-4 py-2 d-inline-block"> Update </button>
                        </div>
                    </div>
                </form>
            </div> --}}
        </div>
    </div>

@endsection

@section('bottom_script')
@endsection
