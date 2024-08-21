@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
@endforeach
@endif --}}
    <div class="col-12">
        <div class="row">
            <div class="col-lg-7">
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                    </button>
                    <ul class="d-flex cv-perse-navigation">
                        <li>
                            <a href="{{ route('candidates.cvParser.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.skills') }}">Skills</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.about') }}">About</a>

                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.experience') }}" class="active">Experience</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.education') }}">Education</a>
                        </li>

                        <li>
                            <a href="{{ route('candidates.cvParser.others') }}">Others</a>
                        </li>
                    </ul>
                    <div class="my-4">
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">experience</h2>
                        <h3 class="fs-3 fw-600 mb-2">Tell us about your experience</h3>
                        <p class="color-grey-787878">Start with your recent job</p>
                    </div>
                    <form method="POST" class="cv_parse_form" action="{{ route('candidates.cvParser.update.data') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="exp" value="1" />
                        <input type="hidden" name="cv_builder_id" value="{{ $exp->id }}" />
                        <div class="row gy-4">
                            <div class="col-12">
                                <div class="row gy-4" id="employmentFields">
                                    @php
                                        if (count($exp->experience) > 0) {
                                            $lastId = $exp->experience[count($exp->experience) - 1]->id;
                                        } else {
                                            $lastId = 0;
                                        }
                                    @endphp
                                    @if (count($exp->experience) == 0)
                                        <div class="col-12 border-bottom pb-4 employmentFieldsClone"
                                            data-emp-div-id="{{ $lastId }}"
                                            id="employmentFieldsClone-{{ $lastId }}">
                                            <div class="row gy-4">
                                                <div class="col-lg-6">
                                                    <h3 class="text_primary fw-500 fs-5 text-uppercase">Add Experience</h3>
                                                </div>
                                                <div class="col-lg-6 text-end">
                                                    <div id="delete-button-wrapper">
                                                        <button type="button" id="delete-button-{{ $lastId }}"
                                                            class="delete-button-form">Delete</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="jobTitle" class="cv-parse-lable mb-2">Job Title</label>
                                                    <input type="text" value="" id="jobTitle-{{ $lastId }}"
                                                        name="title[]" class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="employerName" class="cv-parse-lable mb-2">Employer
                                                        Name</label>
                                                    <input type="text" id="employerName-{{ $lastId }}"
                                                        value="" name="company[]" class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="duration" class="cv-parse-lable mb-2">Duration</label>
                                                    <input type="text" id="duration-{{ $lastId }}" value=""
                                                        name="dates[]" class="form-control cv-parse-input">
                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <label for="endDate" class="cv-parse-lable mb-2">End Date</label>
                                                    <input type="date" id="endDate" class="form-control cv-parse-input">
                                                </div> --}}
                                                <div class="col-lg-6">
                                                    <label for="city" class="cv-parse-lable mb-2">City</label>
                                                    <input type="text" id="city-{{ $lastId }}"
                                                        class="form-control cv-parse-input" value="" name="city[]">
                                                </div>
                                                {{-- <div class="col-12">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="currentlyWorkHere">
                                                        <label class="form-check-label cv-parse-lable" for="currentlyWorkHere">I
                                                            currently work
                                                            here</label>
                                                    </div>
                                                </div> --}}
                                                <div class="col-12">
                                                    <label for="description" class="cv-parse-lable mb-2">Description</label>
                                                    <textarea class="form-control" style="height: 200px;" name="description[]" id="description-{{ $lastId }}"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($exp->experience as $row)
                                        <div class="col-12 border-bottom pb-4 employmentFieldsClone"
                                            id="employmentFieldsClone-{{ $row->id }}"
                                            data-emp-div-id="{{ $row->id }}">
                                            <div class="row gy-4">
                                                <div class="col-lg-6">
                                                    <h3 class="text_primary fw-500 fs-5 text-uppercase">Add Experience</h3>
                                                </div>
                                                <div class="col-lg-6 text-end">
                                                    <div id="delete-button-wrapper">
                                                        <button type="button" id="delete-button-{{ $row->id }}"
                                                            class="delete-button-form">Delete</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="jobTitle" class="cv-parse-lable mb-2">Job Title</label>
                                                    <input type="text" value="{{ $row->title }}"
                                                        id="jobTitle-{{ $row->id }}" name="title[]"
                                                        class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="employerName" class="cv-parse-lable mb-2">Employer
                                                        Name</label>
                                                    <input type="text" id="employerName-{{ $row->id }}"
                                                        value="{{ $row->company }}" name="company[]"
                                                        class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="duration" class="cv-parse-lable mb-2">Duration</label>
                                                    <input type="text" id="duration-{{ $row->id }}"
                                                        value="{{ $row->dates }}" name="dates[]"
                                                        class="form-control cv-parse-input">
                                                </div>
                                                {{-- <div class="col-lg-3">
                                                    <label for="endDate" class="cv-parse-lable mb-2">End Date</label>
                                                    <input type="date" id="endDate" class="form-control cv-parse-input">
                                                </div> --}}
                                                <div class="col-lg-6">
                                                    <label for="city" class="cv-parse-lable mb-2">City</label>
                                                    <input type="text" id="city-{{ $row->id }}"
                                                        class="form-control cv-parse-input" value="{{ $row->city }}"
                                                        name="city[]">
                                                </div>
                                                {{-- <div class="col-12">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="currentlyWorkHere">
                                                        <label class="form-check-label cv-parse-lable" for="currentlyWorkHere">I
                                                            currently work
                                                            here</label>
                                                    </div>
                                                </div> --}}
                                                <div class="col-12">
                                                    <label for="description"
                                                        class="cv-parse-lable mb-2">Description</label>
                                                    <textarea class="form-control" style="height: 200px;" name="description[]" id="description-{{ $row->id }}">{{ $row->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="button" id="addEmploymentButton" data-divId = "{{ $lastId }}"
                                    class="d-flex align-items-center justify-content-center gap-2 add-experience-button w-100">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <path id="Path_5715" data-name="Path 5715"
                                                d="M34,24A10,10,0,1,0,44,34,10,10,0,0,0,34,24Zm3.846,10.769H34.769v3.077a.769.769,0,1,1-1.538,0V34.769H30.154a.769.769,0,0,1,0-1.538h3.077V30.154a.769.769,0,1,1,1.538,0v3.077h3.077a.769.769,0,0,1,0,1.538Z"
                                                transform="translate(-24 -24)" fill="#787878" />
                                        </svg>
                                    </span>
                                    <span class="experience-button-text">
                                        Add Employment
                                    </span>
                                </button>
                                <p class="cv-text-primary mt-2">
                                    In this section, list related employment experience in your last 10 years along with the
                                    dates. Mention the most recent employment first.
                                </p>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="{{ route('candidates.cvParser.about') }}"
                                        class="cv-parse-form-button back-button">Back</a>
                                </div>
                                <div>
                                    <button type="submit" class="cv-parse-form-button">Next To Education</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="sticky__div">
                    <div class="cv-view position-relative">
                        <img src="{{ asset('/images/cv-view-vector.png') }}" alt=""
                            class="cv-view-bg-voctor img-fluid">
                        <div class="cv-view-header">
                            <img src="{{ asset('/images/cv-head.png') }}" alt="Erec logo" class="img-fluid">
                        </div>
                        <div class="cv-view-body position-relative">
                            @if ($exp->contact->cv_profile != null)
                                <img src="{{ asset('storage/' . $exp->contact->cv_profile) }}" alt="profile"
                                    class="cv-view-profile-image">
                            @else
                                <img src="{{ asset('/images/image_preview_noimage.png') }}" alt="profile"
                                    class="cv-view-profile-image">
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="cv-profile-name">{{ $exp->contact->name }}
                                        {{ $exp->contact->father_name }}
                                    </h3>
                                    <h4 class="cv-profile-title"> {{ $exp->contact->title }}</h4>
                                </div>
                                <div class="d-flex flex-column gap-2 col-lg-6">
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13.746"
                                                viewBox="0 0 11 13.746">
                                                <path id="Path_5639" data-name="Path 5639"
                                                    d="M45,16a5.006,5.006,0,0,0-5,5c0,4.278,4.545,7.51,4.739,7.645a.455.455,0,0,0,.522,0C45.455,28.51,50,25.278,50,21A5.006,5.006,0,0,0,45,16Zm0,3.182A1.818,1.818,0,1,1,43.182,21,1.818,1.818,0,0,1,45,19.182Z"
                                                    transform="translate(-39.5 -15.5)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $exp->contact->location }}
                                        </span>
                                    </p>
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.004" height="11.004"
                                                viewBox="0 0 11.004 11.004">
                                                <path id="Path_5640" data-name="Path 5640"
                                                    d="M41.994,31.555A2.813,2.813,0,0,1,39.2,34,7.208,7.208,0,0,1,32,26.8a2.813,2.813,0,0,1,2.446-2.794.8.8,0,0,1,.831.476l1.056,2.358v.006a.8.8,0,0,1-.063.755c-.009.014-.019.026-.028.038L35.2,28.874A4.611,4.611,0,0,0,37.141,30.8l1.217-1.036a.406.406,0,0,1,.038-.028.8.8,0,0,1,.759-.07l.007,0,2.356,1.056A.8.8,0,0,1,41.994,31.555Z"
                                                    transform="translate(-31.5 -23.498)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $exp->contact->phone }}
                                        </span>
                                    </p>
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.061" height="9.1"
                                                viewBox="0 0 13.061 9.1">
                                                <path id="Path_5641" data-name="Path 5641"
                                                    d="M12.5,14.7V9.3s-5.46,3.81-5.991,4.008C5.987,13.119.5,9.3.5,9.3v5.4c0,.75.159.9.9.9H11.6c.759,0,.9-.132.9-.9m-.009-6.459c0-.546-.159-.741-.891-.741H1.4c-.753,0-.9.234-.9.78l.009.084s5.421,3.732,6,3.936c.612-.237,5.991-4.02,5.991-4.02Z"
                                                    transform="translate(0 -7)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $exp->contact->email }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4">
                                @foreach ($exp->skills as $row)
                                    <li>
                                        {{ $row->skill }}
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <div style="margin-bottom: 14px;">
                                <div id="descriptionWrapper">
                                    <h3 class="cv-profile-name" style="margin-bottom: 8px;">About</h3>
                                    <p class="cv-text-primary" id="descriptionView">
                                        {{ $exp->contact->about }}
                                    </p>
                                </div>
                                <div class="row gy-3 pt-3 mb-4">
                                    <div class="col-lg-6" id="dateOfBirthWrapper">
                                        @if ($exp->contact->dob != null)
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;">
                                                Date Of Birth
                                            </h4>
                                        @endif
                                        <p class="cv-text-primary" id="dateOfBirthView">{{ $exp->contact->dob }}</p>
                                    </div>
                                    <div class="col-lg-6" id="maritalStatusWrapper">
                                        @if ($exp->contact->marital_status != null)
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;">
                                                Marital Status
                                            </h4>
                                        @endif
                                        <p class="cv-text-primary" id="maritalStatusView">
                                            {{ $exp->contact->marital_status }}</p>
                                    </div>
                                    <div class="col-lg-6" id="visaStatusWrapper">
                                        @if ($exp->contact->visa_status != null)
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;">
                                                Visa Status
                                            </h4>
                                        @endif
                                        <p class="cv-text-primary" id="visaStatusView">
                                            {{ $exp->contact->visa_status }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6" id="nationalityWrapper">
                                        @if ($exp->contact->nationality != null)
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;">
                                                Nationality
                                            </h4>
                                        @endif
                                        <p class="cv-text-primary" id="nationalityView">
                                            {{ $exp->contact->nationality }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div id="newViewDiv">
                                <h3 class="cv-profile-name" style="margin-bottom: 14px;">Experience</h3>
                                @if (count($exp->experience) == 0)
                                    <div class="experience-box-cv-view" id="experience-box-cv-view-{{ $lastId }}">
                                        <div class="first-child">
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                id="employerName-view-{{ $lastId }}" style="font-size: 16px;">
                                            </h4>
                                            <p class="cv-text-primary mb-1" id="city-view-{{ $lastId }}">
                                            </p>
                                            <p class="cv-text-primary" id="duration-view-{{ $lastId }}">
                                            </p>
                                        </div>
                                        <div
                                            class="experience-midle-vectors d-flex align-items-center flex-column second-child">
                                            <div class="rounded-div">
                                                <div class="squir-div"></div>
                                            </div>
                                            <div class="border-line"></div>
                                        </div>
                                        <div class="third-child">
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;" id="jobTitle-view-{{ $lastId }}">
                                            </h4>
                                            <p class="cv-text-primary mb-1" id="description-view-{{ $lastId }}">
                                            </p>
                                        </div>
                                    </div>
                                @endif

                                @foreach ($exp->experience as $row)
                                    <div class="experience-box-cv-view" id="experience-box-cv-view-{{ $row->id }}">
                                        <div class="first-child">
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                id="employerName-view-{{ $row->id }}" style="font-size: 16px;">
                                                {{ $row->company }}
                                            </h4>
                                            <p class="cv-text-primary mb-1" id="city-view-{{ $row->id }}">
                                                {{ $row->city }}</p>
                                            <p class="cv-text-primary" id="duration-view-{{ $row->id }}">
                                                {{ $row->dates }}</p>
                                        </div>
                                        <div
                                            class="experience-midle-vectors d-flex align-items-center flex-column second-child">
                                            <div class="rounded-div">
                                                <div class="squir-div"></div>
                                            </div>
                                            <div class="border-line"></div>
                                        </div>
                                        <div class="third-child">
                                            <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                                style="font-size: 16px;" id="jobTitle-view-{{ $row->id }}">
                                                {{ $row->title }}
                                            </h4>
                                            <p class="cv-text-primary mb-1" id="description-view-{{ $row->id }}">
                                                {{ $row->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom_script')
    <script>
        if ($('#descriptionView').text().trim() === '') {
            $('#descriptionWrapper').hide();
        }

        // $('#employmentFieldsClone-0').length {
        //     $('#delete-button-wrapper').hide()
        // } else {
        //     $('#delete-button-wrapper').show()
        // }

        const experienceMiddleDiv = `
            <div class="rounded-div">
                <div class="squir-div"></div>
            </div>
            <div class="border-line"></div>
        `

        function showDeleteButton() {
            // if ($(".employmentFieldsClone").length > 1) {
            //     $('#delete-button-wrapper').show();
            // } else {
            //     $('#delete-button-wrapper').hide();
            // }
            $(".employmentFieldsClone:first #delete-button-wrapper").hide()
        }

        showDeleteButton();



        $(document).ready(function() {
            $('#jobTitle-{{ $lastId }}').on('input', function() {
                let inputValue = $(this).val();
                $('#jobTitle-view-{{ $lastId }}').text(inputValue);
            });
            $('#employerName-{{ $lastId }}').on('input', function() {
                let inputValue = $(this).val();
                if (inputValue !== '') {
                    $(`#experience-box-cv-view-{{ $lastId }}`).find('.experience-midle-vectors')
                        .html(
                            experienceMiddleDiv);
                } else {
                    $(`#experience-box-cv-view-{{ $lastId }}`).find('.experience-midle-vectors')
                        .html('');
                }
                $('#employerName-view-{{ $lastId }}').text(inputValue);
            });

            $('#duration-{{ $lastId }}').on('input', function() {
                let inputValue = $(this).val();
                $('#duration-view-{{ $lastId }}').text(inputValue);
            });
            $('#city-{{ $lastId }}').on('input', function() {
                let inputValue = $(this).val();
                $('#city-view-{{ $lastId }}').text(inputValue);
            });
            $('#description-{{ $lastId }}').on('input', function() {
                let inputValue = $(this).val();
                $('#description-view-{{ $lastId }}').text(inputValue);
            });

            $('#delete-button-{{ $lastId }}').on('click', function() {
                $('#educationFieldsClone-{{ $lastId }}').remove();
                $('#experience-box-cv-view-{{ $lastId }}').remove();
                $("#addEmploymentButton").attr("data-divId", $(".employmentFieldsClone:last").attr(
                    "data-emp-div-id"))
                showDeleteButton();
            });

            @foreach ($exp->experience as $row)

                $('#delete-button-{{ $row->id }}').on('click', function() {
                    $('#educationFieldsClone-{{ $row->id }}').remove();
                    $('#experience-box-cv-view-{{ $row->id }}').remove();
                    $("#addEmploymentButton").attr("data-divId", $(".employmentFieldsClone:last").attr(
                        "data-emp-div-id"))
                    showDeleteButton();
                });

                $('#jobTitle-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#jobTitle-view-{{ $row->id }}').text(inputValue);
                });
                $('#employerName-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    if (inputValue !== '') {
                        $(`#experience-box-cv-view-{{ $row->id }}`).find('.experience-midle-vectors')
                            .html(
                                experienceMiddleDiv);
                    } else {
                        $(`#experience-box-cv-view-{{ $row->id }}`).find('.experience-midle-vectors')
                            .html('');
                    }
                    $('#employerName-view-{{ $row->id }}').text(inputValue);
                });

                $('#duration-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#duration-view-{{ $row->id }}').text(inputValue);
                });
                $('#city-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#city-view-{{ $row->id }}').text(inputValue);
                });
                $('#description-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#description-view-{{ $row->id }}').text(inputValue);
                });
            @endforeach
        });

        const addInputEventListeners = (id) => {

            const rowId = id

            $(`#delete-button-${rowId}`).on('click', function() {
                $(`#employmentFieldsClone-${rowId}`).remove();
                $(`#experience-box-cv-view-${rowId}`).remove();
                $(`#addEmploymentButton`).attr("data-divId", $(".employmentFieldsClone:last").attr(
                    "data-emp-div-id"))
                showDeleteButton();
            });

            $(`#jobTitle-${rowId}`).on('input', function() {
                let inputValue = $(this).val();
                $(`#jobTitle-view-${rowId}`).text(inputValue);
            });

            $(`#employerName-${rowId}`).on('input', function() {
                let inputValue = $(this).val();
                if (inputValue !== '') {
                    $(`#experience-box-cv-view-${rowId}`).find('.experience-midle-vectors').html(
                        experienceMiddleDiv);
                } else {
                    $(`#experience-box-cv-view-${rowId}`).find('.experience-midle-vectors').html('');
                }
                $(`#employerName-view-${rowId}`).text(inputValue);
            });

            $(`#duration-${rowId}`).on('input', function() {
                let inputValue = $(this).val();

                $(`#duration-view-${rowId}`).text(inputValue);
            });
            $(`#city-${rowId}`).on(`input`, function() {
                let inputValue = $(this).val();
                $(`#city-view-${rowId}`).text(inputValue);
            });
            $(`#description-${rowId}`).on(`input`, function() {
                let inputValue = $(this).val();
                $(`#description-view-${rowId}`).text(inputValue);
            });
        }

        $("#addEmploymentButton").on("click", function() {
            let divID = parseInt($(this).attr("data-divId"));
            let divIDIncrement = divID + 1;
            $(this).attr('data-divId', divIDIncrement);

            let newDiv = $("#employmentFieldsClone-" + divID).clone();
            newDiv.attr('id', "employmentFieldsClone-" + divIDIncrement);
            newDiv.attr('data-emp-div-id', divIDIncrement);
            updateChildIDs(newDiv, divIDIncrement);

            $("#employmentFields").append(newDiv);
            $(".employmentFieldsClone:not(:first-child) #delete-button-wrapper").show();

            let newViewDiv = $("#experience-box-cv-view-" + divID).clone();
            newViewDiv.attr('id', "experience-box-cv-view-" + divIDIncrement);
            updateChildIDs(newViewDiv, divIDIncrement);

            $("#newViewDiv").append(newViewDiv);

            // Reset input values
            newDiv.find('input').val("");
            newDiv.find('textarea').val("");
            newViewDiv.find('h4').text("");
            newViewDiv.find('p').text("");
            newViewDiv.find('.experience-midle-vectors').html("");

            // newViewDiv.find('h4').text("")
            // newViewDiv.find('p').text("")

            addInputEventListeners(divIDIncrement)

        });

        // Function to update child IDs
        function updateChildIDs(element, newID) {
            element.find("[id]").each(function() {
                let oldID = $(this).attr('id');
                let newIDWithHash = oldID.replace(new RegExp("-\\d+$"), "-" + newID);
                $(this).attr('id', newIDWithHash);
            });
        }
    </script>
@endsection
