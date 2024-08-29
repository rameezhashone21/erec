@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')


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
                            <a href="{{ route('candidates.cvParser.experience') }}">Experience</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.education') }}" class="active">Education</a>
                        </li>
                        
                        <li>
                            <a href="{{ route('candidates.cvParser.others') }}">Others</a>
                        </li>
                    </ul>
                    <div class="my-4">
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">Education</h2>
                        <h3 class="fs-3 fw-600 mb-2">Please enter your Education information</h3>
                        <p class="color-grey-787878">Start with your recent job</p>
                    </div>
                    <form class="cv_parse_form">
                        <div class="row gy-4">
                            <div class="col-12">
                                <div class="row gy-4" id="educationFields">
                                    @php
                                        $lastId = $edu->education[count($edu->education) - 1]->id;
                                    @endphp
                                    @foreach ($edu->education as $row)
                                        <div class="col-12" id="educationFieldsClone-{{ $row->id }}">
                                            <div class="row gy-4">
                                                <div class="col-lg-6">
                                                    <label for="school" class="cv-parse-lable mb-2">School</label>
                                                    <input type="text" id="schoolName-{{ $row->id }}"
                                                        value="{{ $row->institute }}" class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="degree" class="cv-parse-lable mb-2">Degree</label>
                                                    <input type="text" id="degreeName-{{ $row->id }}"
                                                        value="{{ $row->degree }}" class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="graduationDate" class="cv-parse-lable mb-2">Graduation
                                                        Date</label>
                                                    <input type="text" id="educationDuration-{{ $row->id }}"
                                                        value="{{ $row->date }}" class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="city" class="cv-parse-lable mb-2">City</label>
                                                    <input type="text" id="educationCity-{{ $row->id }}"
                                                        class="form-control cv-parse-input">
                                                </div>
                                                <div class="col-12">
                                                    <label for="description" class="cv-parse-lable mb-2">Description</label>
                                                    <textarea class="form-control" id="educationDescription-{{ $row->id }}" style="height: 200px;">{{ $row->description }}</textarea>
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
                                        Add Education
                                    </span>
                                </button>
                                <p class="cv-text-primary mt-2">
                                    In this section, list your level education; include any degrees and educational
                                    achievements, if relevant. Include the dates of your achievements.
                                </p>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div>
                                    <button class="cv-parse-form-button back-button">Back</button>
                                </div>
                                <div>
                                    <button class="cv-parse-form-button">Next To Skills</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cv-view position-relative">
                    <img src="{{ asset('/images/cv-view-vector.png') }}" alt=""
                        class="cv-view-bg-voctor img-fluid">
                    <div class="cv-view-header">
                        <img src="{{ asset('/images/cv-head.png') }}" alt="Erec logo" class="img-fluid">
                    </div>
                    <div class="cv-view-body position-relative">
                        <img src="{{ asset('/images/Untitled-3.png') }}" alt="profile7" class="cv-view-profile-image">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="cv-profile-name">{{ $edu->contact->name }} {{ $edu->contact->father_name }}
                                </h3>
                                <h4 class="cv-profile-title"> {{ $edu->contact->title }}</h4>
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
                                        {{ $edu->contact->location }}
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
                                        {{ $edu->contact->phone }}
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
                                        {{ $edu->contact->email }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4">
                            <li>
                                Wordpress
                            </li>
                            <li>
                                Python
                            </li>
                            <li>
                                UI
                            </li>
                            <li>
                                javascript
                            </li>
                            <li>
                                photoshop
                            </li>
                            <li>
                                IOS
                            </li>
                            <li>
                                android
                            </li>
                            <li>
                                php
                            </li>
                            <li>
                                illustrator
                            </li>
                        </ul>
                        <hr>
                        <div style="margin-bottom: 14px;">
                            <h3 class="cv-profile-name" style="margin-bottom: 14px;">About</h3>
                            <p class="cv-text-primary">
                                {{ $edu->contact->summary }}
                            </p>
                        </div>
                        <div>
                            <h3 class="cv-profile-name" style="margin-bottom: 14px;">Experience</h3>
                            @foreach ($edu->experience as $row)
                                <div class="experience-box-cv-view">
                                    <div class="first-child">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            {{ $row->company }}
                                        </h4>
                                        <p class="cv-text-primary mb-1"></p>
                                        <p class="cv-text-primary">{{ $row->dates }}</p>
                                    </div>
                                    <div
                                        class="experience-midle-vectors d-flex align-items-center flex-column second-child">
                                        <div class="rounded-div">
                                            <div class="squir-div"></div>
                                        </div>
                                        <div class="border-line"></div>
                                    </div>
                                    <div class="third-child">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            {{ $row->title }}
                                        </h4>
                                        <p class="cv-text-primary mb-1">

                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4" id="newViewDiv">
                            <h3 class="cv-profile-name" style="margin-bottom: 14px;">Education</h3>
                            @foreach ($edu->education as $row)
                                <div class="experience-box-cv-view" id="experience-box-cv-view-{{ $row->id }}">
                                    <div class="first-child">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1"
                                            id="degreeName-view-{{ $row->id }}" style="font-size: 16px;">
                                            {{ $row->institute }}
                                        </h4>
                                        <p class="cv-text-primary mb-1" id="educationCity-view-{{ $row->id }}"></p>
                                        <p class="cv-text-primary" id="educationDuration-view-{{ $row->id }}">
                                            {{ $row->date }}</p>
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
                                            id="schoolName-view-{{ $row->id }}" style="font-size: 16px;">
                                            {{ $row->degree }}
                                        </h4>
                                        <p class="cv-text-primary mb-1"
                                            id="educationDescription-view-{{ $row->id }}">
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

@endsection
@section('bottom_script')
    <script>
        $(document).ready(function() {
            @foreach ($edu->education as $row)
                $('#schoolName-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#schoolName-view-{{ $row->id }}').text(inputValue);
                });
                $('#degreeName-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#degreeName-view-{{ $row->id }}').text(inputValue);
                });

                $('#educationDuration-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#educationDuration-view-{{ $row->id }}').text(inputValue);
                });
                $('#educationCity-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#educationCity-view-{{ $row->id }}').text(inputValue);
                });
                $('#educationDescription-{{ $row->id }}').on('input', function() {
                    let inputValue = $(this).val();
                    $('#educationDescription-view-{{ $row->id }}').text(inputValue);
                });
            @endforeach
        });


        const addInputEventListeners = (id) => {

            const rowId = id

            $(`#schoolName-${rowId}`).on('input', function() {
                let inputValue = $(this).val();
                $(`#schoolName-view-${rowId}`).text(inputValue);
            });
            $(`#degreeName-${rowId}`).on('input', function() {
                let inputValue = $(this).val();
                $(`#degreeName-view-${rowId}`).text(inputValue);
            });

            $(`#educationDuration-${rowId}`).on('input', function() {
                let inputValue = $(this).val();
                $(`#educationDuration-view-${rowId}`).text(inputValue);
            });
            $(`#educationCity-${rowId}`).on(`input`, function() {
                let inputValue = $(this).val();
                $(`#educationCity-view-${rowId}`).text(inputValue);
            });
            $(`#educationDescription-${rowId}`).on(`input`, function() {
                let inputValue = $(this).val();
                $(`#educationDescription-view-${rowId}`).text(inputValue);
            });
        }

        $("#addEmploymentButton").on("click", function() {

            let divID = parseInt($(this).attr("data-divId"));
            let divIDIncrement = divID + 1;
            $(this).attr('data-divId', divIDIncrement);

            let newDiv = $("#educationFieldsClone-" + divID).clone();
            newDiv.attr('id', "educationFieldsClone-" + divIDIncrement);
            updateChildIDs(newDiv, divIDIncrement);

            $("#educationFields").append(newDiv);

            let newViewDiv = $("#experience-box-cv-view-" + divID).clone();
            newViewDiv.attr('id', "experience-box-cv-view-" + divIDIncrement);
            updateChildIDs(newViewDiv, divIDIncrement);

            $("#newViewDiv").append(newViewDiv);

            // Reset input values
            newDiv.find('input').val("");
            newDiv.find('textarea').val("");

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
