@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec Map')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        #map_wrapper_div {
            height: 400px;
        }

        #map_tuts {
            width: 100%;
            height: 100%;
        }

        .sidebar_container {
            display: none;
        }
    </style>
@endsection

@section('content')

    {{-- <div class="col-xl-9 col-lg-8 col-md-7"> --}}
    <div class="col-12">
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <form class="map-filter-form" id="smart-search">
                <div class="d-lg-flex" style="gap: 20px;">
                    <div class="map-left-div mb-4 mb-lg-0">
                        <div class="map__box ">
                            <div id="map" style="width: 100%; height:500px;"></div>
                        </div>
                        <h3 class="primary-color fs-2 border-bottom-2-blue py-3 mb-3"></h3>
                        <div class="row row-cols-md-3 row-cols-1 gy-4 gx-2 pb-3 mb-3 border-bottom map__form__input">
                            @csrf
                            <div class="col">
                                <label for="location" class="mb-2 fw-600">Location</label>
                                {{-- <button id="myButton">My button</button> --}}
                                <div class="position-relative">
                                    <div class="form__icon">
                                        <svg id="Group_2720" data-name="Group 2720" xmlns="http://www.w3.org/2000/svg"
                                            width="14" height="20.001" viewBox="0 0 14 20.001">
                                            <path id="Path_3268" data-name="Path 3268"
                                                d="M12,2A7,7,0,0,0,5,9c0,5.25,7,13,7,13s7-7.75,7-13A7,7,0,0,0,12,2ZM7,9A5,5,0,0,1,17,9c0,2.88-2.88,7.19-5,9.88C9.92,16.21,7,11.85,7,9Z"
                                                transform="translate(-5 -2)" fill="#aba6ac" />
                                            <circle id="Ellipse_3" data-name="Ellipse 3" cx="2.5" cy="2.5"
                                                r="2.5" transform="translate(4.5 4.5)" fill="#aba6ac" />
                                        </svg>
                                    </div>
                                    <input type="search" id="locationInp" placeholder="city or postcode"
                                        class="form-control input_with_icon fs-14 bg-theme-secondary">
                                    <input type="hidden" name="lat" id="lat" value="" />
                                    <input type="hidden" name="lng" id="lng" value="" />
                                    {{-- <button type="button" class="resetVal1" id="clearInput">X</button> --}}
                                </div>
                            </div>
                            <div class="col">
                                <label for="jobCategory" class="mb-2 fw-600">All Jobs</label>
                                <div class="position-relative">
                                    <select name="post" id="jobCategory" class="form-select fs-14 bg-theme-secondary">
                                        <option value="" disabled selected>-- Select Job Post --</option>
                                        @foreach ($post as $row)
                                            <option value="{{ $row->id }}">{{ $row->post }}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="resetVal1" id="jobCategoryclear" style="display: none;"><i
                                            class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <div class="col">
                                <label for="category" class="mb-2 fw-600">Category</label>
                                <div class="position-relative">
                                    <div class="form__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.095" height="15.176"
                                            viewBox="0 0 15.095 15.176">
                                            <path id="Path_3283" data-name="Path 3283"
                                                d="M103.032,78.4a1.361,1.361,0,0,0-1.174,1.476v.632H99.174A1.361,1.361,0,0,0,98,81.981V92.1a1.361,1.361,0,0,0,1.174,1.476H108.9a.456.456,0,0,0,.36-.182.752.752,0,0,0,0-.9.456.456,0,0,0-.36-.182H99.174c-.1,0-.168-.083-.168-.211V87.672h4.282a1.582,1.582,0,0,0,1.42,1.265h1.677a1.582,1.582,0,0,0,1.42-1.265h4.282V92.1c0,.128-.066.211-.168.211a.456.456,0,0,0-.36.182.752.752,0,0,0,0,.9.456.456,0,0,0,.36.182,1.361,1.361,0,0,0,1.174-1.476V81.981a1.361,1.361,0,0,0-1.174-1.476h-2.684v-.632a1.361,1.361,0,0,0-1.174-1.476Zm0,1.265h5.032c.1,0,.168.083.168.211v.632h-5.367v-.632c0-.128.066-.211.168-.211ZM99.174,81.77h12.747c.1,0,.168.083.168.211v4.426h-4.282a1.589,1.589,0,0,0-1.42-1.265h-1.677a1.589,1.589,0,0,0-1.42,1.265H99.007V81.981c0-.128.066-.211.168-.211Zm5.535,4.637h1.677a.649.649,0,0,1,0,1.265h-1.677a.649.649,0,0,1,0-1.265Zm5.7,5.9a.649.649,0,1,0,.5.632A.579.579,0,0,0,110.411,92.309Z"
                                                transform="translate(-98 -78.398)" fill="#aba6ac" />
                                        </svg>
                                    </div>
                                    <select name="category" id="category"
                                        class="form-select input_with_icon fs-14 bg-theme-secondary">
                                        <option value="" disabled selected>Select Job category --</option>
                                        @if ($data != null)
                                            @foreach ($data as $row)
                                                <option value="{{ $row['class_id'] }}">{{ $row['class_name'] }}</option>
                                            @endforeach
                                        @endif
                                        {{-- <option value="Category">Category</option>
                                        <option value="Category1">Category1</option>
                                        <option value="Category2">Category2</option>
                                        <option value="Category3">Category3</option> --}}
                                    </select>
                                    <button type="button" class="resetVal1" id="categoryclear" style="display: none;"><i
                                            class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="row row-cols-md-2 row-cols-1 gy-4 gx-2 pb-3 mb-3 border-bottom map__form__input">
                            <div class="col">
                                <label for="candidateGender" class="mb-2 fw-600">Candidate Gender</label>
                                <div class="position-relative">
                                    <div class="form__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.055" height="23.001"
                                            viewBox="0 0 16.055 23.001">
                                            <path id="Path_3269" data-name="Path 3269"
                                                d="M174.339,14.261v1.407a.269.269,0,0,0,.267.267h2.863L174,19.453a5.679,5.679,0,0,0-4.149-1.019,5.921,5.921,0,0,0-5,4.9,5.834,5.834,0,0,0,4.8,6.648v3.178h-1.577a.269.269,0,0,0-.267.267v1.407a.269.269,0,0,0,.267.267h1.577v1.626a.269.269,0,0,0,.267.267h1.407a.269.269,0,0,0,.267-.267V35.1h1.577a.269.269,0,0,0,.267-.267V33.428a.269.269,0,0,0-.267-.267H171.6V29.983a5.84,5.84,0,0,0,4.877-5.75,5.771,5.771,0,0,0-1.092-3.372l3.494-3.518v2.863a.269.269,0,0,0,.267.267h1.431a.269.269,0,0,0,.267-.267V14.261a.269.269,0,0,0-.267-.267H174.63a.275.275,0,0,0-.291.267Zm-3.712,13.829a3.882,3.882,0,1,1,3.882-3.882A3.893,3.893,0,0,1,170.627,28.091Z"
                                                transform="translate(-164.786 -13.994)" fill="#aba6ac" />
                                        </svg>
                                    </div>
                                    <select name="gender" id="candidateGender"
                                        class="form-select input_with_icon fs-14 bg-theme-secondary">
                                        <option value="" disabled selected>-- Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Non-binary">Non-binary</option>
                                    </select>
                                    <button type="button" class="resetVal1" id="candidateGenderclear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <div class="col">
                                <input type="hidden" id="valid-upto" name="startDate">
                                <input type="hidden" id="valid-upto2" name="endDate">
                                <label for="valid-upto" class="mb-2 fw-600">Select Date Range</label>
                                <input type="text" name="datetimes" placeholder="Select Date Range"
                                    autocomplete="off" id="dateRangePicker" class="form-control bg-theme-secondary">
                                <button type="button" class="resetVal1" id="postedDateClear" style="display: none;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                                <button type="button" class="resetVal1" id="expiryDateClear" style="display: none;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>

                                {{-- <label for="valid-upto" class="mb-2 fw-600">Job Posted Date</label>
                                <div class="position-relative">
                                    <input type="test" class="form-control fs-14 bg-theme-secondary map-datepicker"
                                        id="valid-upto" name="posted_date" placeholder="DD/MM/YYYY" readonly />
                                    <button type="button" class="resetVal1" id="postedDateClear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                    <label class="calender-icon d-block" for="valid-upto"> <i class="far fa-calendar-alt"
                                            aria-hidden="true"></i> </label>
                                </div> --}}
                            </div>
                            {{-- <div class="col">
                                <label for="valid-upto2" class="mb-2 fw-600">Job Expiry Date</label>
                                <div class="position-relative">
                                    <input type="test" class="form-control fs-14 bg-theme-secondary map-datepicker2"
                                        id="valid-upto2" name="validity" placeholder="DD/MM/YYYY" readonly />
                                    <button type="button" class="resetVal1" id="expiryDateClear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                    <label class="calender-icon d-block" for="valid-upto2"> <i
                                            class="far fa-calendar-alt" aria-hidden="true"></i> </label>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row row-cols-md-3 row-cols-1 gy-4 gx-2 map__form__input">
                            <div class="col">
                                <label for="experience" class="mb-2 fw-600">Experience</label>
                                <div class="position-relative">
                                    <select name="exp" id="experience" class="form-select fs-14 bg-theme-secondary">
                                        <option value="" disabled selected>Select</option>
                                        <option value="6 Months">6 Months</option>
                                        <option value="1+ Year">1+ Year</option>
                                        <option value="2+ Years">2+ Years</option>
                                        <option value="3+ Years">3+ Years</option>
                                        <option value="4+ Years">4+ Years</option>
                                        <option value="5+ Years">5+ Years</option>
                                        <option value="6+ Years">6+ Years</option>
                                        <option value="More than 10 Years">More than 10 Years</option>
                                    </select>
                                    <button type="button" class="resetVal1" id="experienceclear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <div class="col">
                                <label for="qualification" class="mb-2 fw-600">Qualification</label>
                                <div class="position-relative">
                                    <select name="qualification" id="qualification"
                                        class="form-select fs-14 bg-theme-secondary">
                                        <option value="" disabled selected>Select</option>

                                        {{-- <option value="PHD">
                                            PHD</option>
                                        <option value="Masters">
                                            Masters
                                        </option>
                                        <option value="Bachelors">
                                            Bachelors
                                        </option>
                                        <option value="Undergrad">
                                            Undergrad
                                        </option> --}}

                                        <option value="High School">High School</option>
                                        <option value="Tertiary">Tertiary</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Under Graduate">Under Graduate</option>
                                        <option value="Post Graduate">Post Graduate</option>
                                        <option value="Masters">Masters</option>
                                        <option value="Doctorate">Doctorate</option>
                                    </select>
                                    <button type="button" class="resetVal1" id="qualificationclear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            {{-- <div class="col">
                                <label for="testScore" class="mb-2 fw-600">Test Score</label>
                                <div class="position-relative">
                                    <select name="" id="testScore" class="form-select fs-14 bg-theme-secondary">
                                        <option value="">51%-60%</option>
                                        <option value="">61%-70%</option>
                                        <option value="">71%-80%</option>
                                        <option value="">81%-90%</option>
                                        <option value="">90%-100%</option>
                                    </select>
                                    <button type="button" class="resetVal1" id="testScoreclear"
                                        style="display: none;"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div> --}}
                            <div class="col ">
                                <div class="map-filter-rangeslider">
                                    <p class="range-slider-text mb-2">Radius: <span><span id="rangeValue">5</span>
                                            km</span> </p>
                                    <input class="range" type="range" name="radius" value="5" min="1"
                                        max="50" id="new-range" onchange="rangeSlide(this.value)" />
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 text-end">
                            <a href="javascript:void(0)" class="fs-14" id="resetButton">Reset<i
                                    class="fas fa-sync ms-2"></i></a>
                        </div>
                    </div>
                    <div class="map-right-div d-none d-lg-block">
                        <p class="fs-14 px-2 mb-3">
                            <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
                            <span>> Map </span>
                        </p>

                        <div class="position-relative pb-4 px-2">
                            <div class="search_map_icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15.342" height="15.342"
                                    viewBox="0 0 15.342 15.342">
                                    <path id="Path_3267" data-name="Path 3267"
                                        d="M13.964,12.649h-.693l-.246-.237a5.71,5.71,0,1,0-.614.614l.237.246v.693l4.386,4.377,1.307-1.307Zm-5.263,0A3.947,3.947,0,1,1,12.649,8.7,3.942,3.942,0,0,1,8.7,12.649Z"
                                        transform="translate(-3 -3)" fill="#aba6ac" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search-key" class="form-control"
                                placeholder="Candidate title, keywords">
                        </div>
                        <ul class="map-user-list" id="cand-card">
                            {{-- <li class="pb-4 px-2 popper" tabindex="0" role="button" data-bs-toggle="popover">
                                <div class="map-page-userbox d-flex user">
                                    <div class="border-end px-1 pt-1 text-center userbox-left">
                                        <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                            alt="" class="img-fluid">
                                        <a href="https://check.hostingladz.com/webapp/Erec/public/candidateDoc/doc/2022-11-22_.74.571428571429_.docx"
                                            download="" class="d-block text-center download__cv pt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                                viewBox="0 0 14.875 19.812">
                                                <defs>
                                                    <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                        y2="1" gradientUnits="objectBoundingBox">
                                                        <stop offset="0" stop-color="#2ec4bb"></stop>
                                                        <stop offset="1" stop-color="#007ba7"></stop>
                                                    </linearGradient>
                                                </defs>
                                                <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                    <path id="Path_3281" data-name="Path 3281"
                                                        d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                        transform="translate(-435.767 -28.435)"
                                                        fill="url(#linear-gradient)"></path>
                                                    <path id="Path_3282" data-name="Path 3282"
                                                        d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                        transform="translate(-156.154 -21.809)"
                                                        fill="url(#linear-gradient)"></path>
                                                </g>
                                            </svg>
                                            <div style="font-size: 12px; font-weight: 600">Download CV</div>
                                        </a>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div class="p-3">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h3>
                                                    Kim Candy

                                                </h3>
                                                <div>

                                                </div>
                                            </div>
                                            <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                                Senior Software Engineer
                                            </p>
                                            <div class="d-flex align-items-center"
                                                style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                                <span>
                                                    <svg id="Group_2725" data-name="Group 2725"
                                                        xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                        viewBox="0 0 9.4 13.428">
                                                        <path id="Path_3268" data-name="Path 3268"
                                                            d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                            transform="translate(-5 -2)" fill="#aba6ac"></path>
                                                        <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                            cy="1.678" r="1.678"
                                                            transform="translate(3.021 3.021)" fill="#aba6ac">
                                                        </circle>
                                                    </svg>
                                                </span>
                                                <span>2867 Poplar Lane Bowling Green Virginia United States</span>
                                            </div>
                                        </div>
                                        <div class="d-flex border-top ">
                                            <a href="https://check.hostingladz.com/webapp/Erec/candidates/kim"
                                                class="primary-color d-flex align-items-center mx-3"
                                                style="font-size: 12px; gap: 6px;" target="_blank">
                                                <span>
                                                    <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                        height="11.603" viewBox="0 0 12.475 11.603">
                                                        <path id="Path_3280" data-name="Path 3280"
                                                            d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                            fill="#007ba7"></path>
                                                    </svg>
                                                </span>
                                                <span>
                                                    View Profile
                                                </span>
                                            </a>
                                            <a href="" class="text-grey d-flex align-items-center"
                                                style="font-size: 12px; gap: 6px;">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11.641"
                                                        height="11.641" viewBox="0 0 11.641 11.641">
                                                        <path id="Path_3279" data-name="Path 3279"
                                                            d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                            transform="translate(-2 -2)" fill="#c7c7cd"></path>
                                                    </svg>
                                                </span>
                                                <span>
                                                    Message
                                                </span>
                                            </a>
                                            <select class="form-select status-select ms-auto">
                                                <option value="">Pending</option>
                                                <option value="">Pending</option>
                                                <option value="">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="shortList" tabindex="-1" aria-labelledby="shortListLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="shortListLabel">Assign Test</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <select name="assign_test" class="select2-multiple form-select fs-14 assign_testClass h-50px"
                        required>
                        <option value="">Select Test</option>
                    </select>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="hire" tabindex="-1" aria-labelledby="hireLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
              <h5 class="modal-title" id="hireLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> --}}
                <div class="modal-body text-center">
                    Are You Sure You want to hire this candidate
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <a type="button" class="hireCandidate btn_viewall fw-500 px-4 py-2 d-inline-block">Ok</a>
                    <button type="button" class="btn_viewall fw-500 px-4 py-2 d-inline-block"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('bottom_script')

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/tippy.js@6"></script>
    <script>
        const tippyFunction = tippy('.popper-content-header', {
            content(reference) {
                // console.log({
                //     reference
                // })
                const id = reference.getAttribute('data-template');
                const template = document.getElementById(id);
                // console.log(id);
                // console.log(template);
                return template.innerHTML;
            },
            allowHTML: true,
            interactive: true,
            // trigger: 'click',
            placement: 'left',
            zIndex: 9999,
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#smart-search').trigger('submit');

        });
        $('#candidateGender').on('change', function() {
            $('#smart-search').trigger('submit');
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(this).parent().siblings('button').show()
                } else {}
            });
        });
        $('#category').on('change', function() {
            $('#smart-search').trigger('submit');
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(this).parent().siblings('button').show()
                } else {}
            });
        });
        $('#jobCategory').on('change', function() {
            $('#smart-search').trigger('submit');
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(this).parent().siblings('button').show()
                } else {}
            });
        });
        $('#experience').on('change', function() {
            $('#smart-search').trigger('submit');
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(this).parent().siblings('button').show()
                } else {}
            });
        });
        $('#qualification').on('change', function() {
            $('#smart-search').trigger('submit');
            $(this).find("option:selected").each(function() {
                var optionValue = $(this).attr("value");
                if (optionValue) {
                    $(this).parent().siblings('button').show()
                } else {}
            });
        });
        $('#valid-upto').on('change', function() {
            $('#smart-search').trigger('submit');
        });
        $('#valid-upto2').on('change', function() {
            $('#smart-search').trigger('submit');
        });
        // $('#rangeSlide').on('change', function() {
        //   $('#smart-search').trigger('submit');
        // });
        function rangeSlide(range_value) {
            $('#rangeValue').html(range_value);
            $('#smart-search').trigger('submit');

        }
        $('#candidateGender').on('change', function() {
            console.log("check");
            $('#smart-search').trigger('submit');
        });

        $('#search-key').on('keyup', function() {
            $('#smart-search').trigger('submit');
        });

        $('#smart-search').on('submit', function(e) {
            $("#cand-card").html("<p>Loading...</p>");
            e.preventDefault();
            var userFormData = $(this).serializeArray();
            // console.log(userFormData);
            $.ajax({
                type: "POST",
                url: "{{ route('recruiter.smartSearch.candidate') }}",
                data: userFormData,
                dataType: "json",
                encode: true,
            }).done(function(data) {
                // console.log(data);
                var html = "";
                var newhtml = "";
                if (data.length == 0) {
                    //   $("#cand-card").html("No one has applied on the job");
                    $("#cand-card").html("No Record Found");
                } else {
                    $.each(data, function(index, val) {
                        html +=
                            "<div class='popper-content map_user_popover_box' id='popper-content-" +
                            val['id'] + "'";
                        html += "style='display:none;'>";
                        html += "<div class='row  P-3'>";
                        html += "<div class='col-md-8'>";
                        html += "<div class='d-flex align-items-center'>";
                        html += "<div class='me-3'>";
                        if (val['candidate']['user']['avatar'] != null) {
                            html += "<img class='user_map_hover'";
                            html +=
                                "src='{{ asset('public/storage/') }}/" + val['candidate']['user'][
                                    'avatar'
                                ] + "'";
                            html += "alt=''>";
                        } else {
                            html += "<img src='{{ asset('adminpanel/images/avatar/dummy.png') }}'";
                            html += "alt='' class='user_map_hover'>";
                        }
                        html += "</div>";
                        html += "<div>";
                        html += "<h2 class='fw-500 fs-3'>";
                        html +=
                            "<a href='{{ route('candidate.detail', '') }}/" + val['candidate'][
                                'slug'
                            ] +
                            "'";
                        html += "target='_blank' target='_blank' class='text_primary'>";
                        html += val['candidate']['first_name'] + " " + val['candidate'][
                            'last_name'
                        ];
                        html += "</a>";
                        html += "</h2>";
                        html += "<h3 class='text-dark'>" + val['post']['post'] + "</h3>";
                        html += "<p class='color-grey-787878'>";
                        html += val['candidate']['tagline'];
                        html += "</p>";
                        html += "<ul class='d-flex social-icons-popover align-items-center mt-2'>";
                        if (val['candidate']['facbookLink'] != null) {

                            html += "<li>";
                            html +=
                                "<a href='" + val['candidate']['facbookLink'] +
                                "' target='_blank'>";
                            html += "<img";
                            html += "src='{{ asset('dashboard/images/facebook.svg') }}'alt=''>";
                            html += "</a>";
                            html += "</li>";
                        }
                        if (val['candidate']['twitterLink'] != null) {

                            html += "<li>";
                            html +=
                                "<a href='" + val['candidate']['twitterLink'] +
                                "' target='_blank'>";
                            html += "<img";
                            html += "src='{{ asset('dashboard/images/instagram.svg') }}'alt=''>";
                            html += "</a>";
                            html += "</li>";
                        }
                        if (val['candidate']['instagramLink'] != null) {

                            html += "<li>";
                            html +=
                                "<a href='" + val['candidate']['instagramLink'] +
                                "' target='_blank'>";
                            html += "<img";
                            html +=
                                "src='{{ asset('dashboard/images/youtube-play.svg') }}'alt=''>";
                            html += "</a>";
                            html += "</li>";
                        }
                        if (val['candidate']['linkdinLink'] != null) {

                            html += "<li>";
                            html +=
                                "<a href='" + val['candidate']['linkdinLink'] +
                                "' target='_blank'>";
                            html += "<img";
                            html += "src='{{ asset('dashboard/images/linkedIn.svg') }}'alt=''>";
                            html += "</a>";
                            html += "</li>";
                        }
                        html += "</ul>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-4 text-end'>";
                        html += "<div>";
                        html += "<a target='_blank'";
                        html +=
                            "href='{{ route('candidate.detail', '') }}/" + val['candidate'][
                                'slug'
                            ] +
                            "'";
                        html += "class='btn_viewall fw-500 px-4 py-2 d-inline-block'>View";
                        html += " Profile</a>";
                        html += "</div>";
                        html += "<div>";
                        html +=
                            "<a href='{{ asset('public/candidateDoc/doc') }}/" + val[
                                'candidate_document'][
                                'document'
                            ] +
                            "'";
                        html += "target='_blank' class='fw-500 px-4 py-2 d-inline-block'";
                        html += "download=''>Download CV";
                        html += "</a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='mt-3  P-3'>";
                        html += "<h3 class='text-primary fw-600 mb-2'>Contact Details</h3>";
                        html += "<div ";
                        html +=
                            "class='pophover_inf_box d-flex flex-wrap align-items-center justify-content-between'>";
                        html += "<div class='d-flex'>";
                        html += "<span class='me-1'>";
                        html += "<img src='{{ asset('dashboard/images/map-pin.svg') }}'alt=''>";
                        html += "</span>";
                        html += "<span class='mt-0'>" + val['candidate']['address'] + "</span>";
                        html += "</div>";
                        html += "<div class='d-flex'>";
                        html += "<span class='me-1'>";
                        html += "<img src='{{ asset('dashboard/images/phone.svg') }}'alt=''>";
                        html += "</span>";
                        html += "<span class='mt-0'>" + val['candidate']['country_code'] + "";
                        html += val['candidate']['number'] + "</span>";
                        html += "</div>";
                        if (val['candidate']['marital_status'] != null) {
                            html += "<div class='d-flex'>";
                            html += "<span class='me-1'>";
                            html += "<img";
                            html +=
                                "src='{{ asset('dashboard/images/ic_relationship.svg') }}'alt=''>";
                            html += "</span>";
                            html +=
                                "<span class='mt-0'>" + val['candidate']['marital_status'] +
                                "</span>";
                            html += "</div>";
                        }
                        if (val['candidate']['user']['candidate_pro'] != '[]') {

                            html += "<div class='d-flex'>";
                            html += "<span class='me-1'>";
                            html += "<img";
                            html += "src='{{ asset('dashboard/images/ic_Working.svg') }}'alt=''>";
                            html += "</span>";
                            html += "<span";
                            html +=
                                " class='mt-0'>" + val['candidate']['user']['candidate_pro'][0][
                                    'company_name'
                                ] + " </span>";
                            html += "</div>";
                            html += "<div class='d-flex'>";
                            html += "<span class='me-1'>";
                            html += "<img";
                            html += " src='{{ asset('dashboard/images/ic_date.svg') }}'alt=''>";
                            html += "</span>";
                            html += "<span class='mt-0'>Joined";
                            html += val['candidate']['user']['candidate_pro'][0]['month_exp'] +
                                "</span>";
                            html += "</div>";
                        }
                        html += "</div>";
                        html += "</div>";
                        html += "<div>";
                        if (val['candidate']['user']['candidate_pro'] != null) {
                            html +=
                                "<p class='text-primary fw-600 mb-2 mt-4'>Professional Experience</p>";
                        } else {
                            html += "<p class='text-primary fw-600 my-2'>Eduction Details</p>";
                        }
                        html += "<div class='table-responsive'>";
                        html += "<table class='table table-striped'>";
                        if (val['candidate']['user']['candidate_pro'] != null) {
                            html += "<tr>";
                            html += "<th>";
                            html += "Designation";
                            html += "</th>";
                            html += "<th>";
                            html += "Company Name";
                            html += "</th>";
                            html += "<th>";
                            html += "Experience";
                            html += "</th>";
                            html += "</tr>";
                            $.each(val['candidate']['user']['candidate_pro'], function(index2,
                                value) {
                                // console.log(value);
                                html += "<tr>";
                                html += "<td>";
                                html += value['designation'];
                                html += "</td>";
                                html += "<td>";
                                html += value['company_name'];
                                html += "</td>";
                                html += "<td>";
                                html += value['date_diff'];
                                html += "</td>";
                                html += "</tr>";
                            });

                        } else {
                            html += "<tr>";
                            html += "<th>";
                            html += "Course";
                            html += "</th>";
                            html += "<th>";
                            html += "Education";
                            html += "</th>";
                            html += "<th>";
                            html += "Institute";
                            html += "</th>";
                            html += "</tr>";
                            $.each(val['candidate']['user']['candidate_edu'], function(index2,
                                value) {
                                html += "<tr>";
                                html += "<td>";
                                html += value['course'];
                                html += "</td>";
                                html += "<td>";
                                html += value['education'];
                                html += "</td>";
                                html += "<td>";
                                html += value['institute'];
                                html += "</td>";
                                html += "</tr>";
                            });
                        }
                        html += "</table>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";


                        html +=
                            "<li class='pb-4 px-2 popper-content-header' data-template='popper-content-" +
                            val['id'] + "' id='" + val['id'] + "' data-bs-toggle='popover'>";
                        html += "<div class='map-page-userbox d-flex  '>";
                        html += "<div class='border-end px-1 pt-1 text-center'>";
                        // html +=
                        //     "<img src='{{ asset('public/storage/') }}/" + val['candidate']['user']['avatar'] +
                        //     "'";
                        // html += "alt='' class='img-fluid'>";
                        if (val['candidate']['user']['avatar'] != null) {
                            html += "<img src='{{ asset('public/storage/') }}/" + val['candidate'][
                                'user'
                            ]['avatar'] + "' alt='' class='img-fluid'>";
                        } else {
                            html +=
                                "<img src='{{ asset('adminpanel/images/avatar/dummy.png') }}'";
                            html += " alt='' class='img-fluid'>";
                        }
                        html +=
                            "<a href='{{ asset('public/candidateDoc/doc') }}/" + val[
                                'candidate_document'][
                                'document'
                            ] +
                            "' download='' class='d-block text-center download__cv pt-3'>";
                        html +=
                            "<svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'";
                        html +=
                            "width='14.875' height='19.812' viewBox='0 0 14.875 19.812'>";
                        html +=
                            "<defs>";
                        html +=
                            "<linearGradient id='linear-gradient' x1='0.5' x2='0.5'";
                        html +=
                            "y2='1' gradientUnits='objectBoundingBox'>";
                        html +=
                            "<stop offset='0' stop-color='#2ec4bb' />";
                        html +=
                            "<stop offset='1' stop-color='#007ba7' />";
                        html +=
                            "</linearGradient>";
                        html += "</defs>";
                        html +=
                            "<g id='Group_2743' data-name='Group 2743' transform='translate(0 0)'>";
                        html +=
                            "<path id='Path_3281' data-name='Path 3281'";
                        html +=
                            "d='M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z'";
                        html +=
                            "transform='translate(-435.767 -28.435)'";
                        html +=
                            "fill='url(#linear-gradient)' />";
                        html +=
                            "<path id='Path_3282' data-name='Path 3282'";
                        html +=
                            "d='M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z'";
                        html +=
                            "transform='translate(-156.154 -21.809)'";
                        html +=
                            "fill='url(#linear-gradient)' />";
                        html += "</g>";
                        html +=
                            "</svg>";
                        html += "<div>Download CV</div>";
                        html += "</a>";
                        html +=
                            "</div>";
                        html += "<div class='flex-grow-1'>";
                        html +=
                            "<div class='p-3'>";
                        html +=
                            "<div class='d-flex justify-content-between align-items-center'>";
                        html +=
                            "<h3>";
                        html += val['candidate']['first_name'] + " " + val[
                            'candidate'][
                            'last_name'
                        ];
                        html += "<span style='position: relative; top: -7px; '>";
                        html +=
                            "<svg xmlns='http://www.w3.org/2000/svg' width='10.785'";
                        html +=
                            "height='10.785' viewBox='0 0 10.785 10.785'>";
                        html +=
                            "<path id='Path_3277' data-name='Path 3277'";
                        html +=
                            "d='M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z'";
                        html +=
                            "transform='translate(-2 -2)' fill='#e8d31c' />";
                        html +=
                            "</svg>";
                        html += "</span>";
                        html += "</h3>";
                        html +=
                            "<div>";
                        html +=
                            "<svg xmlns='http://www.w3.org/2000/svg' width='10.841' height='13.939'";
                        html +=
                            "viewBox='0 0 10.841 13.939'>";
                        html +=
                            "<path id='Path_3276' data-name='Path 3276'";
                        html +=
                            "d='M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z'";
                        html +=
                            "transform='translate(-5 -3)' fill='#007ba7' />";
                        html +=
                            "</svg>";
                        html += "</div>";
                        html += "</div>";
                        html +=
                            "<p class='mb-0' style='font-size: 14px; color: #4dc1ba;'>";
                        html +=
                            val['post']['post'];
                        html += "</p>";
                        html +=
                            "<div class='d-flex align-items-center'";
                        html +=
                            "style='gap: 5px; color: #aba6ac; font-size: 14px;'>";
                        html +=
                            "<span>";
                        html +=
                            "<svg id='Group_2725' data-name='Group 2725'";
                        html +=
                            "xmlns='http://www.w3.org/2000/svg' width='9.4' height='13.428'";
                        html +=
                            "viewBox='0 0 9.4 13.428'>";
                        html +=
                            "<path id='Path_3268' data-name='Path 3268'";
                        html +=
                            "d='M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z'";
                        html +=
                            "transform='translate(-5 -2)' fill='#aba6ac' />";
                        html +=
                            "<circle id='Ellipse_3' data-name='Ellipse 3' cx='1.678'";
                        html +=
                            "cy='1.678' r='1.678' transform='translate(3.021 3.021)'";
                        html +=
                            "fill='#aba6ac' />";
                        html += "</svg>";
                        html += "</span>";
                        html +=
                            "<span  id='can-box-" + val['id'] + "' data-lat='" + val['candidate'][
                                'latitude'
                            ] + "' data-lng='" + val['candidate']['longitude'] +
                            "' onclick='submitLoc(" + val['id'] + ")'>" + val['candidate'][
                                'address'] + "</span>";
                        html +=
                            "</div>";
                        html += "</div>";
                        html += "<div class='d-flex border-top '>";
                        html += "<a href='{{ route('candidate.detail', '') }}/" + val['candidate'][
                            'slug'
                        ] + "' class='primary-color d-flex align-items-center mx-3'";
                        html +=
                            "style='font-size: 12px; gap: 6px;' style='font-weight: 500' target='_blank'>";
                        html +=
                            "<span>";
                        html +=
                            "<svg id='profile' xmlns='http://www.w3.org/2000/svg' width='12.475'";
                        html +=
                            "height='11.603' viewBox='0 0 12.475 11.603'>";
                        html +=
                            "<path id='Path_3280' data-name='Path 3280'";
                        html +=
                            "d='M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z'";
                        html +=
                            "fill='#007ba7' />";
                        html += "</svg>";
                        html += "</span>";
                        html +=
                            "<span>";
                        html += "View Profile";
                        html += "</span>";
                        html += "</a>";
                        html += "<a href='javascript:void(0);' onclick='openBoxNew(" + val[
                                'candidate']['user']['id'] +
                            ")' class='text-grey d-flex align-items-center'";
                        // html += "<a href='{{ route('candidate.recruiter.chat', '') }}/" + val[
                        //         'candidate']['slug'] +
                        //     "' class='text-grey d-flex align-items-center'";
                        html += "style='font-size: 12px; gap: 6px;' style='font-weight: 500'>";
                        html +=
                            "<span>";
                        html +=
                            "<svg xmlns='http://www.w3.org/2000/svg' width='11.641' height='11.641'";
                        html +=
                            "viewBox='0 0 11.641 11.641'>";
                        html +=
                            "<path id='Path_3279' data-name='Path 3279'";
                        html +=
                            "d='M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z'";
                        html +=
                            "transform='translate(-2 -2)' fill='#c7c7cd' />";
                        html +=
                            "</svg>";
                        html += "</span>";
                        html += "<span>";
                        html +=
                            "Message";
                        html += "</span>";
                        html += "</a>";
                        html += "<div class='ms-auto' id='testIsPending-" + val['id'] + "'>";
                        if (val['status'] == 2) {
                            html +=
                                "<p class='bg-success text-white' style='padding: 10px;'>Hired</p>";
                        } else if (val['status'] == 1 || val['status'] == 0) {
                            html += "<select class='form-select status-select'";
                            html += "onchange='statusPending(" + val['id'] + ")'";
                            html += "id='pendingSelect-" + val['id'] + "'>";
                            html += "<option value='0'";
                            if (val['status'] == 0) {
                                html += "selected";
                            } else if (val['status'] == 1 || val['status'] == 2) {
                                html += "disabled";
                            }
                            html += ">Pending</option>";
                            html += "<option value='1'";
                            if (val['status'] == 1) {
                                html += "selected";
                            }
                            html += ">Shortlist</option>";
                            html += "<option value='2'>Hire</option>";
                            html += "</select>";
                        }
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</li>";




                        $("#cand-card").html(html);
                        // $.each(val['candidate']['job_applications'], function(index2, value) {
                        //     if(index2 < 3)
                        //     {
                        //         if (val['post_comp'] != null) {
                        //             var text = value['post']['post'];
                        //             var count = 20;
                        //             var result = text.slice(0, count) + (text.length > count ? "..." : "");
                        //             const qst = value['qst_id'];
                        //             const new_user_id = val['candidate']['user']['new_user_id'];
                        //             $.ajax({
                        //                 type: "GET",
                        //                 url: "{{ route('find.qst') }}",
                        //                 data: {
                        //                     qst: qst,
                        //                     new_user_id: new_user_id,
                        //                 },
                        //             }).done(function(QSTdata) {
                        //                 newhtml = "";
                        //                 newhtml += "<tr>";
                        //                 newhtml += "<th>"+result+"</th>";
                        //                 newhtml += "<th>";
                        //                 if (QSTdata != '')
                        //                 {
                        //                     if(QSTdata['mark'] != undefined)
                        //                     {
                        //                         newhtml +=QSTdata['mark'];
                        //                         newhtml += "/";
                        //                         if(QSTdata['qst'] != '')
                        //                         {
                        //                             newhtml +=
                        //                                 QSTdata['qst']['marks'];
                        //                         }
                        //                         else
                        //                         {
                        //                             newhtml += "0";
                        //                         }
                        //                     }
                        //                     else
                        //                     {
                        //                         newhtml += "N/A";
                        //                     }
                        //                 } else {
                        //                     if (value['status'] == 1) {
                        //                         newhtml += "Pending";
                        //                     }
                        //                     else
                        //                     {
                        //                         newhtml += "N/A";
                        //                     }
                        //                 }
                        //                 newhtml += "</th>";
                        //                 newhtml += "<th>";
                        //                 if (value['status'] == 2) {
                        //                     newhtml += "Status: Hired";
                        //                 } else if (value['status'] == 1) {
                        //                     newhtml += "Status: Test is pending";
                        //                 } else {
                        //                     newhtml += "Status: Pending";
                        //                 }
                        //                 newhtml += "</th>";
                        //                 newhtml += "</tr>";
                        //                 setTimeout(function()
                        //                 {
                        //                     $("#table-new-"+val['id']).append(newhtml);
                        //                     instance = tippy('.popper-content-header', {
                        //                         content(reference) {
                        //                             const id = reference.getAttribute('data-template');
                        //                             const template = document.getElementById(id);
                        //                             return template.innerHTML;
                        //                         },
                        //                         allowHTML: true,
                        //                         interactive: true,
                        //                         placement: 'left',
                        //                         zIndex: 9999,
                        //                     });
                        //                 },1000);
                        //             });
                        //         }
                        //     }
                        //     else
                        //     {
                        //         return false;
                        //     }
                        // });


                    });
                    setTimeout(function() {
                        // $("#table-new-"+val['id']).append(newhtml);
                        instance = tippy('.popper-content-header', {
                            content(reference) {
                                const id = reference.getAttribute('data-template');
                                const template = document.getElementById(id);
                                return template.innerHTML;
                            },
                            allowHTML: true,
                            interactive: true,
                            placement: 'left',
                            zIndex: 9999,
                        });
                    }, 1000);

                    // console.log(newhtml, "New html printed");
                    // instance.destroy();
                    // instance = tippy('.popper-content-header', {
                    //     content(reference) {
                    //         // console.log({
                    //         //     reference
                    //         // })
                    //         const id = reference.getAttribute('data-template');
                    //         const template = document.getElementById(id);
                    //         // console.log(id);
                    //         // console.log(template);
                    //         return template.innerHTML;
                    //     },
                    //     allowHTML: true,
                    //     interactive: true,
                    //     // trigger: 'click',
                    //     placement: 'left',
                    //     zIndex: 9999,
                    // });


                }
                var lat = "{{ auth()->user()->recruiter->lat }}";
                var lng = "{{ auth()->user()->recruiter->lng }}";
                if ($("#lat").val() != '') {
                    lat = $("#lat").val();
                }
                if ($("#lng").val() != '') {
                    lng = $("#lng").val();
                }
                console.log(lat, lng);
                initialize(lat, lng);
            }).fail(function(error) {
                var errors = error.responseJSON;
                console.log(errors);

            });
            tippy('.popper-content-header', {
                content(reference) {
                    // console.log({
                    //     reference
                    // })
                    const id = reference.getAttribute('data-template');
                    const template = document.getElementById(id);
                    // console.log(id);
                    // console.log(template);
                    return template.innerHTML;
                },
                allowHTML: true,
                interactive: true,
                // trigger: 'click',
                placement: 'left',
                zIndex: 9999,
            });
        });

        function submitLoc(id) {
            var lat = $("#can-box-" + id).attr('data-lat');
            var lng = $("#can-box-" + id).attr('data-lng');
            $("#lat").val(lat);
            $("#lng").val(lng);
            initialize(lat, lng);
            // $('#smart-search').trigger('submit');
        }

        function openBoxNew(boxid) {
            const id = boxid;
            const localItem = localStorage.getItem("message_ids");
            if (localItem) {
                const items = [...JSON.parse(localItem), id];
                localStorage.setItem("message_ids", JSON.stringify(items));
            } else {
                localStorage.setItem("message_ids", JSON.stringify([id]));
            }
        }

        function initMap() {
            $.ajax({
                url: "{{ route('recruiter.marker.candidate') }}",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(markers) {
                    var map;
                    var bounds = new google.maps.LatLngBounds();
                    var mapOptions = {
                        mapTypeId: 'roadmap'
                    };
                    // Display a map on the page
                    map = new google.maps.Map(document.getElementById("map"), mapOptions);
                    map.setTilt(45);
                    // Display multiple markers on a map
                    var infoWindow = new google.maps.InfoWindow(),
                        marker, i;
                    if (markers.length == 0) {
                        console.log("han khali h");
                        var position = new google.maps.LatLng(-25.274398, 133.775136);

                        bounds.extend(position);
                    } else {
                        // Loop through our array of markers & place each one on the map
                        for (i = 0; i < markers.length; i++) {
                            var position = new google.maps.LatLng(markers[i]['candidate']['latitude'],
                                markers[i][
                                    'candidate'
                                ]['longitude']);
                            bounds.extend(position);
                            marker = new google.maps.Marker({
                                position: position,
                                map: map,
                                title: markers[i]['candidate']['first_name'],
                                icon: "{{ asset('/imgs/candidate.png') }}",

                            });
                            // Each marker to have an info window
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infoWindow.setContent(
                                        '<div class="info_content"> <h3>' +
                                        markers[i]['candidate']['first_name'] +
                                        '</h3><p>' +
                                        markers[i]['candidate']['head_line'] +
                                        '</p></br><p>' + markers[i]['post']['post'] +
                                        '</p></div>');
                                    infoWindow.open(map, marker);
                                }
                            })(marker, i));
                            // Automatically center the map fitting all markers on the screen
                        }
                    }
                    map.fitBounds(bounds);
                    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed',
                        function(
                            event) {
                            this.setZoom(6);
                            google.maps.event.removeListener(boundsListener);
                        });
                }
            });

            var autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('locationInp')), {
                    types: ['geocode']
                }
            );
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                initialize(place.geometry.location.lat(), place.geometry.location.lng());
                // console.log(place.geometry.location.lat(),place.geometry.location.lng());
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();

                $('#smart-search').trigger('submit');

            });
        }

        function initialize(lat, lng) {
            console.log(lat, lng);
            $.ajax({
                url: "{{ route('recruiter.marker.candidate') }}",
                type: 'GET',
                dataType: 'json', // added data type
                success: function(markers) {
                    var map;
                    var latlng = new google.maps.LatLng(lat, lng);

                    var mapOptions = {
                        center: latlng,
                        zoom: 13,
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    var el = document.getElementById("map");
                    map = new google.maps.Map(el, mapOptions);
                    var marker2 = new google.maps.Marker({
                        map: map,
                        position: latlng
                    });
                    // Display multiple markers on a map
                    // Loop through our array of markers & place each one on the map
                    // console.log(markers.length );
                    if (markers.length == 0) {
                        console.log("checkif");
                        var marker = new google.maps.Marker({
                            map: map,
                            position: latlng
                        });
                    } else {
                        var infoWindow = new google.maps.InfoWindow(),
                            marker, i;
                        for (i = 0; i < markers.length; i++) {
                            var position = new google.maps.LatLng(markers[i]['candidate']['latitude'],
                                markers[
                                    i][
                                    'candidate'
                                ]['longitude']);
                            // bounds.extend(position);
                            marker = new google.maps.Marker({
                                position: position,
                                map: map,
                                title: markers[i]['candidate']['first_name'],
                                icon: "{{ asset('/imgs/candidate.png') }}",

                            });
                            // Each marker to have an info window
                            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                return function() {
                                    infoWindow.setContent(
                                        '<div class="info_content"> <h3>' +
                                        markers[i]['candidate']['first_name'] +
                                        '</h3><p>' +
                                        markers[i]['candidate']['head_line'] +
                                        '</p></div>');
                                    infoWindow.open(map, marker);
                                }
                            })(marker, i));
                            // Automatically center the map fitting all markers on the screen
                            // map.fitBounds(bounds);
                        }

                    }
                    console.log(latlng);
                    var new_radius = document.getElementById("new-range").value;
                    var sunCircle = {
                        strokeColor: "#c3fc49",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: "#c3fc49",
                        fillOpacity: 0.35,
                        map: map,
                        center: latlng,
                        radius: new_radius * 1000 // in meters
                    };
                    cityCircle = new google.maps.Circle(sunCircle)
                    cityCircle.bindTo('center', marker2, 'position');
                    // // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
                    // var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(
                    //     event) {
                    //     this.setZoom(14);
                    //     google.maps.event.removeListener(boundsListener);
                    // });
                }
            });
            // var marker = new google.maps.Marker({
            //     map: map,
            //     position: latlng
            // });


        }
    </script>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe_fLxQFXdTRd7JsWf2MiHzwjMhIupJ0A&callback=initMap&v=weekly&libraries=places"
        async defer></script>
    <script>
        $('#candidateGenderclear').click(function() {
            $('#candidateGender').prop('selectedIndex', 0);
            const selectVal = $('#candidateGender').val();
            $("#candidateGender option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#categoryclear').click(function() {
            $('#category').prop('selectedIndex', 0);
            const selectVal = $('#category').val();
            $("#category option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#jobCategoryclear').click(function() {
            $('#jobCategory').prop('selectedIndex', 0);
            const selectVal = $('#jobCategory').val();
            $("#jobCategory option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#experienceclear').click(function() {
            $('#experience').prop('selectedIndex', 0);
            const selectVal = $('#experience').val();
            $("#experience option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#qualificationclear').click(function() {
            $('#qualification').prop('selectedIndex', 0);
            const selectVal = $('#qualification').val();
            $("#qualification option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#testScoreclear').click(function() {
            $('#testScore').prop('selectedIndex', 0);
            const selectVal = $('#testScore').val();
            $("#testScore option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#candidateGenderclear').click(function() {
            $('#candidateGender').prop('selectedIndex', 0);
            const selectVal = $('#candidateGender').val();
            $("#candidateGender option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });
        $('#categoryclear').click(function() {
            $('#categoryGender').prop('selectedIndex', 0);
            const selectVal = $('#categoryGender').val();
            $("#categoryGender option[value='" + selectVal + "']").attr("selceted", false);
            $(this).hide();
            $('#smart-search').trigger('submit');
        });

        $('#locationInp').on('search', function() {
            // search logic here
            // this function will be executed on click of X (clear button)

            $('#lat').val('');
            $('#lng').val('');
            $('#smart-search').trigger('submit');
            console.log('click clear search')
        });
    </script>

    <script>
        function statusPending(id) {
            var pendingSelect = $("#pendingSelect-" + id).val();
            console.log(id);
            var href = '{{ route('recruiter.get.test', ':id') }}';
            href = href.replace(':id', id);
            $.ajax({
                type: 'GET',
                url: href,
            }).done(function(data) {
                console.log(data);
                if (pendingSelect == "1") {
                    assign_test(id);

                    // console.log('1 selected');
                    // $('#shortList').modal('show');
                    // $.each(data, function(index, value) {

                    //     html = "<option selected disabled value=''>Select Test</option>";
                    //     html += "<option value=" + value['number'] + ">" + value['name'] + "</option>";
                    //     $(".assign_testClass").attr('id', 'assign_test' + id);
                    //     $(".assign_testClass").attr('onchange', 'assign_test(' + id + ')');
                    //     $(".assign_testClass").html(html);
                    // });
                } else if (pendingSelect == "2") {
                    // console.log('2 selected');
                    $('#hire').modal('show');
                    $('.hireCandidate').click(() => {
                        // console.log('hireCandidate');
                        var href = '{{ route('changeJobAppStatus', '') }}';
                        newhref = href + '/' + id;
                        console.log(newhref);
                        $.ajax({
                            type: 'GET',
                            url: newhref,
                        }).done(function(data) {
                            console.log(data);
                            $('#hire').modal('hide');
                            $('#testIsPending-' + id).html('');
                            var html = "";
                            html +=
                                "<p class='bg-success text-white' style='padding: 10px;'>Hired</p>";
                            $('#testIsPending-' + id).html(html);
                        });
                    })
                }
            });

        }

        function assign_test(id) {
            console.log(id);
            // var selectedId = document.getElementById("assign_test" + id).value;
            // console.log(selectedId);
            url = "{{ route('recruiter.job.assign') }}";
            $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        'id': id,
                        'onlyStatus': 1,
                    },
                    crossDomain: true,
                }).done(function(data) {
                    // console.log(data);
                    // $('#testIsPending-' + id).html('');
                    // html = "<p class='bg-secondary text-white' style='padding: 10px;'>Test is pending</p>";
                    // $('#testIsPending-' + id).html(html);
                    // $('#shortList').modal('hide');
                    successModal("Candidate has been shortlisted...");
                })
                .fail(function(error) {
                    var errors = error.responseJSON;
                    console.log(errors);

                });
        }
    </script>
    <script>
        // start datepicker
        $(function() {
            $('.map-datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            }).on('changeDate', function(e) {
                $("#postedDateClear").click(function() {
                    $(".map-datepicker").val("").datepicker("update")
                    $("#postedDateClear").hide();
                }).show();
            });
        });
        $(function() {
            $('.map-datepicker2').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            }).on('changeDate', function(e) {
                $("#expiryDateClear").click(function() {
                    $(".map-datepicker2").val("").datepicker("update")
                    $("#expiryDateClear").hide();
                }).show();
            });
        });
        // end datepicker
    </script>
@endsection
