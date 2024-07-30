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
                <div class="dashboard_content sticky__div bg-white rounded_10 p-md-4 p-2">
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
                            <a href="{{ route('candidates.cvParser.education') }}">Education</a>
                        </li>

                        <li>
                            <a href="{{ route('candidates.cvParser.others') }}" class="active">Others</a>
                        </li>
                    </ul>
                    <form method="POST" class="cv_parse_form" action="{{ route('candidates.cvParser.update.data') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="others" value="1" />
                        <input type="hidden" name="cv_builder_id" value="{{ $other->id }}" />

                        {{-- <div>
                            <div class="my-4">
                                <h2 class="text_primary fw-500 fs-5 text-uppercase">Others</h2>
                                <h3 class="fs-3 fw-600 mb-2">Websites & Social Links</h3>
                                <p class="color-grey-787878">Write your social link or portfolio or personal website links.
                                </p>
                            </div>
                            <div class="row gy-4">
                                <div class="col-12" id="linksFields">
                                    <div class="row gy-4" id="linksFieldsClone">
                                        <div class="col-lg-6">
                                            <label for="linkLabel" class="cv-parse-lable mb-2">Label</label>
                                            <input type="text" id="linkLabel" class="form-control cv-parse-input">
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="link" class="cv-parse-lable mb-2">Link</label>
                                            <input type="text" id="link" class="form-control cv-parse-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" id="addLinksButton"
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
                                            Add links
                                        </span>

                                    </button>
                                    <p class="cv-text-primary mt-2">
                                        In this section, add links to your personal website, portfolio, and/or Linkedin
                                        profile
                                        that you would like prospective employers to see.
                                    </p>
                                </div>
                            </div>
                        </div> --}}
                        <div>
                            <div class="my-4">
                                <h2 class="text_primary fw-500 fs-5 text-uppercase">Others</h2>
                                <h3 class="fs-3 fw-600 mb-2">Languages</h3>
                                <p class="color-grey-787878">Write about how many languages you speak and understand.
                                </p>
                            </div>
                            <div class="row gy-4">
                                <div class="col-12">
                                    <label for="jobTitle" class="cv-parse-lable mb-2">Language</label>
                                    <select id="get-language" class="select-2-languages-cv form-select fs-14 h-50px"
                                        multiple="multiple" name="language[]">
                                        <option value="English"
                                            @foreach ($other->others as $row) @if ($row->language == 'English') selected @endif @endforeach>
                                            English</option>
                                        <option value="French"
                                            @foreach ($other->others as $row) @if ($row->language == 'French') selected @endif @endforeach>
                                            French</option>
                                        <option value="Spanish"
                                            @foreach ($other->others as $row) @if ($row->language == 'Spanish') selected @endif @endforeach>
                                            Spanish</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex align-items-center justify-content-between">
                            <div>
                                <a href="{{ route('candidates.cvParser.education') }}" class="cv-parse-form-button back-button">Back</a>
                            </div>
                            <div>
                                <button type="submit" class="cv-parse-form-button">Finish It, Preview</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cv-view position-relative">
                    <img src="{{ asset('/images/cv-view-vector.png') }}" alt="" class="cv-view-bg-voctor img-fluid">
                    <div class="cv-view-header">
                        <img src="{{ asset('/images/cv-head.png') }}" alt="Erec logo" class="img-fluid">
                    </div>
                    <div class="cv-view-body position-relative">
                        @if ($other->contact->cv_profile != null)
                            <img src="{{ asset('public/storage/' . $other->contact->cv_profile) }}" alt="profile"
                                class="cv-view-profile-image">
                        @else
                            <img src="{{ asset('/images/image_preview_noimage.png') }}" alt="profile"
                                class="cv-view-profile-image">
                        @endif
                        <div class="row">
                            <div class="col-lg-6">
                                <h3 class="cv-profile-name">{{ $other->contact->name }}
                                    {{ $other->contact->father_name }}
                                </h3>
                                <h4 class="cv-profile-title"> {{ $other->contact->title }}</h4>
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
                                        {{ $other->contact->location }}
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
                                        {{ $other->contact->phone }}
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
                                        {{ $other->contact->email }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4" id="skillsItemsUl">
                            @foreach ($other->skills as $row)
                                <li>
                                    {{ $row->skill }}
                                </li>
                            @endforeach
                        </ul>
                        <hr>
                        <div style="margin-bottom: 14px;">
                            <div id="descriptionWrapper">
                                @if ($other->contact->summary != null)
                                    <h3 class="cv-profile-name" style="margin-bottom: 14px;">About</h3>
                                @endif
                                <p class="cv-text-primary" id="descriptionView">
                                    {{ $other->contact->summary }}
                                </p>
                            </div>
                            <div class="row gy-3 pt-3 mb-4">
                                <div class="col-lg-6">
                                    @if ($other->contact->dob != null)
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Date Of Birth
                                        </h4>
                                    @endif
                                    <p class="cv-text-primary" id="dateOfBirthView">{{ $other->contact->dob }}</p>
                                </div>
                                <div class="col-lg-6">
                                    @if ($other->contact->marital_status != null)
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Marital Status
                                        </h4>
                                    @endif
                                    <p class="cv-text-primary" id="maritalStatusView">
                                        {{ $other->contact->marital_status }}</p>
                                </div>
                                <div class="col-lg-6">
                                    @if ($other->contact->visa_status != null)
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Visa Status
                                        </h4>
                                    @endif
                                    <p class="cv-text-primary" id="visaStatusView">{{ $other->contact->visa_status }}</p>
                                </div>
                                <div class="col-lg-6">
                                    @if ($other->contact->nationality != null)
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Nationality
                                        </h4>
                                    @endif
                                    <p class="cv-text-primary" id="nationalityView">{{ $other->contact->nationality }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        {{-- <div style="margin-bottom: 14px;">
                            <h3 class="cv-profile-name" style="margin-bottom: 14px;">About</h3>
                            <p class="cv-text-primary">
                                {{ $other->contact->summary }}
                            </p>
                        </div> --}}
                        <div>
                            @if (count($other->experience) > 0)
                                <h3 class="cv-profile-name" style="margin-bottom: 14px;">Experience</h3>
                            @endif

                            @foreach ($other->experience as $row)
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
                                            {{ $row->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            @if (count($other->education) > 0)
                                <h3 class="cv-profile-name" style="margin-bottom: 14px;">Education</h3>
                            @endif
                            @foreach ($other->education as $row)
                                <div class="experience-box-cv-view">
                                    <div class="first-child">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            {{ $row->institute }}
                                        </h4>
                                        <p class="cv-text-primary mb-1"></p>
                                        <p class="cv-text-primary">{{ $row->date }}</p>
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
                                            {{ $row->degree }}
                                        </h4>
                                        <p class="cv-text-primary mb-1">
                                            {{ $row->description }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4" id="languagesWrapper">
                            <h3 class="cv-profile-name" style="margin-bottom: 14px;">Languages</h3>
                            <ul class="row" id="languagesItemsUl">
                                @foreach ($other->others as $row)
                                    <li class="col-lg-4 d-flex align-items-center gap-2">
                                        <span class="cv-language-vector"></span>
                                        <span class="cv-text-primary">{{ $row->language }}</span>
                                    </li>
                                @endforeach
                                {{-- <li class="col-lg-4 d-flex align-items-center gap-2">
                                    <span class="cv-language-vector"></span>
                                    <span class="cv-text-primary">French</span>
                                </li>
                                <li class="col-lg-4 d-flex align-items-center gap-2">
                                    <span class="cv-language-vector"></span>
                                    <span class="cv-text-primary">Spanish</span>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="cv-view-footer">
                        <h3>{{ $other->contact->name }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom_script')
    <script>
        // console.log(selectedValues);

        // $(document).ready(function() {
        //     // if ($('#descriptionView').text().trim() === '') {
        //     //     $('#descriptionWrapper').hide();
        //     // }

        //     $('.select-2-languages-cv').select2();
        //     var selectedValues = $('#get-language').val();
        //     let languagesItemsOnload = [];
        //     languagesItemsOnload = selectedValues.map((item) => (`
    //         <li class="col-lg-4 d-flex align-items-center gap-2">
    //             <span class="cv-language-vector"></span>
    //             <span class="cv-text-primary">${item}</span>
    //         </li>
    //         `));
        //     $("#languagesItemsUl").html(languagesItemsOnload);
        //     // if (languagesItemsOnload.length > 0) {
        //     //     languagesWrapper.show();
        //     // } else {
        //     //     languagesWrapper.hide();
        //     // }
        //     console.log($("#languagesItemsUl").html());
        //     let languagesItems = [];
        //     const languagesWrapper = $('#languagesWrapper');
        //     // toggleLanguagesWrapper();
        //     toggleLanguagesWrapperOnLoad();

        //     // Initialize languagesItems and toggle the wrapper visibility

        //     $(".select-2-languages-cv").on("select2:select", function(e) {
        //         let select_val = $(e.target).val();
        //         languagesItems = select_val.map((item) => (`
    //         <li class="col-lg-4 d-flex align-items-center gap-2">
    //             <span class="cv-language-vector"></span>
    //             <span class="cv-text-primary">${item}</span>
    //         </li>
    //         `))
        //         $("#languagesItemsUl").html(languagesItems);
        //         toggleLanguagesWrapper();
        //     });

        //     $('.select-2-languages-cv').on('select2:unselecting', function(e) {
        //         const filteredArray = languagesItems.filter(item => !item.includes(e.params.args.data
        //             .text));
        //         languagesItems = filteredArray
        //         $("#languagesItemsUl").html(filteredArray);
        //         toggleLanguagesWrapper();
        //     });

        //     function toggleLanguagesWrapper() {

        //         if (languagesItems.length > 0) {
        //             languagesWrapper.show();
        //         } else {
        //             languagesWrapper.hide();
        //         }
        //     }
        //     function toggleLanguagesWrapperOnLoad() {

        //         if (languagesItemsOnload.length > 0) {
        //             languagesWrapper.show();
        //         } else {
        //             languagesWrapper.hide();
        //         }
        //     }

        // });





        $(document).ready(function() {
            $('.select-2-languages-cv').select2();
            // Function to update skills list

            let selectedSkills = [];
            let skillsList = [];

            // Check if any list items exist within the #languagesItemsUl div
            if ($('#languagesItemsUl li').length > 0) {
                // If there are list items, show the #languagesWrapper div
                $('#languagesWrapper').show();
            } else {
                // If there are no list items, hide the #languagesWrapper div
                $('#languagesWrapper').hide();
            }

            // console.log(selectedSkills, 'selectedSkillsselectedSkillsselectedSkills')

            function updateSkillsList() {
                selectedSkills = $('.select-2-languages-cv').val();
                skillsList = selectedSkills.map(function(skill) {
                    return `<li class="col-lg-4 d-flex align-items-center gap-2">
                        <span class="cv-language-vector"></span>
                        <span class="cv-text-primary">${skill}</span>
                    </li>`;
                });
                $('#languagesItemsUl').html(skillsList.join(''));
            }

            function showHideLanguages() {
                if (skillsList.length > 0) {
                    $('#languagesWrapper').show();
                } else {
                    $('#languagesWrapper').hide();
                }
            }

            // Event listener for skill selection
            $('.select-2-languages-cv').on('select2:select select2:unselect', function() {
                updateSkillsList();
                showHideLanguages();
            });
        });
    </script>
@endsection
