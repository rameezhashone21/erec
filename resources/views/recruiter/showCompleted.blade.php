@extends('layouts.app')

@section('content')
    <div class="pt__banner"></div>
    <section class="position-relative">
        <div class="container">
            <img src="{{ asset('images/banner-placeholder.png') }}" alt=""
                class="w-100 banner__image">
        </div>
    </section>
    <main class="pt-5">
        <div class="container">
            <div class="row gy-4 gy-lg-0">
                <div class="col-lg-3 sidebar_container">
                    <div class="side_bar bg-white position-relative rounded_10 side_bar_top view_profile_box pb-4">
                        <img src="{{ asset('dashboard/images/side_bar_top.png') }}" alt="" class="img-fluid ">
                        <div class="text-center">
                            <div class="view_profile_image">
                                <img src="{{ asset('images/banner-placeholder.png') }}" alt=""
                                    class="">
                            </div>
                            <h3 class="view_profile_name">XYZ Company</h3>
                            <p class="mb-0">Candidate</p>
                            <p class="mb-0">UX designer</p>
                        </div>
                        <div class="mt-4 px-3">
                            <h3 class="view_profile_txt">Contact Details</h3>
                        </div>
                        <ul class="side_bar_menu view_profile_sidebar px-3" id="side_bar_view">
                            <li>
                                <a href="#" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                                            viewBox="0 0 19.182 23">
                                            <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                transform="translate(1 1)">
                                                <path id="Path_3207" data-name="Path 3207"
                                                    d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                                    transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                                <path id="Path_3208" data-name="Path 3208"
                                                    d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                    transform="translate(-7.159 -4.313)" fill="none" stroke="#92929d"
                                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>Yogyakarta, ID</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.405" height="18.398"
                                            viewBox="0 0 18.405 18.398">
                                            <path id="phone"
                                                d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                                transform="translate(-3.364 -3.375)" fill="#92929d" />
                                        </svg>
                                    </span>
                                    <span>+44 5544 4445</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 20 20">
                                            <g id="ic_date" transform="translate(0 -0.388)">
                                                <path id="Shape"
                                                    d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,1,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                                    transform="translate(0 0.388)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>Joined June 2012</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24">
                                            <g id="ic_Working" transform="translate(0 -0.014)">
                                                <g id="Working_at" data-name="Working at">
                                                    <rect id="Rectangle_24" data-name="Rectangle 24" width="24"
                                                        height="24" transform="translate(0 0.014)" fill="none" />
                                                    <g id="Group_25" data-name="Group 25" transform="translate(1 3)">
                                                        <path id="Combined_Shape" data-name="Combined Shape"
                                                            d="M3,19a3,3,0,0,1-3-3V6A3,3,0,0,1,3,3H6A3,3,0,0,1,9,0h4a3,3,0,0,1,3,3h3a3,3,0,0,1,3,3V16a3,3,0,0,1-3,3Zm16-2a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1h-.5V17Zm-2.5,0V5H5.5V17ZM2,6V16a1,1,0,0,0,1,1h.5V5H3A1,1,0,0,0,2,6ZM14,3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3Z"
                                                            transform="translate(0 0.014)" fill="#92929d" />
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </span>
                                    <span>Working at Sebo Studio</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex align-items-center">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20"
                                            viewBox="0 0 22 20">
                                            <g id="ic_relationship" transform="translate(0 0.209)">
                                                <path id="Shape"
                                                    d="M11.094,20h-.188a3.06,3.06,0,0,1-2.21-.94L2.03,12.193A7.281,7.281,0,0,1,2.03,2.1,6.84,6.84,0,0,1,11,1.317a6.84,6.84,0,0,1,8.97.787,7.281,7.281,0,0,1,0,10.089L13.3,19.06A3.057,3.057,0,0,1,11.094,20Zm-.14-2h.14a1.076,1.076,0,0,0,.776-.333L18.535,10.8a5.281,5.281,0,0,0,0-7.3,4.843,4.843,0,0,0-6.848-.156,1,1,0,0,1-1.373,0A4.842,4.842,0,0,0,3.466,3.5a5.28,5.28,0,0,0,0,7.3l6.666,6.867a1.076,1.076,0,0,0,.775.333ZM11,14a1,1,0,0,1-1-1V11H8A1,1,0,1,1,8,9h2V7a1,1,0,0,1,2,0V9h2a1,1,0,1,1,0,2H12v2A1,1,0,0,1,11,14Z"
                                                    transform="translate(0 -0.209)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span>Single</span>
                                </a>
                            </li>
                        </ul>
                        <div class="mt-4 mb-3 px-3">
                            <h3 class="view_profile_txt">Download CV</h3>
                        </div>
                        <a href=""
                            class="d-flex align-items-center justify-content-center view_profile_button mx-3">
                            <span>
                                Evelyn_Harper.pdf
                            </span>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20"
                                    viewBox="0 0 16 20">
                                    <g id="bxs-file-pdf" transform="translate(-6 -3)">
                                        <path id="Path_3235" data-name="Path 3235"
                                            d="M12.214,22.02a1.5,1.5,0,0,0-.372.036v1.178a1.361,1.361,0,0,0,.3.023c.479,0,.774-.242.774-.651,0-.366-.254-.586-.7-.586Zm3.487.012a1.839,1.839,0,0,0-.407.036v2.61a1.631,1.631,0,0,0,.313.018,1.236,1.236,0,0,0,1.349-1.4A1.144,1.144,0,0,0,15.7,22.032Z"
                                            transform="translate(-1.947 -6.34)" fill="#fff" />
                                        <path id="Path_3236" data-name="Path 3236"
                                            d="M16,3H8A2,2,0,0,0,6,5V21a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V9ZM11.5,17.19a1.854,1.854,0,0,1-1.3.42,2.23,2.23,0,0,1-.308-.018v1.426H9V15.082A7.558,7.558,0,0,1,10.219,15a1.915,1.915,0,0,1,1.22.319,1.17,1.17,0,0,1,.426.923,1.285,1.285,0,0,1-.367.948ZM15.3,18.545a2.864,2.864,0,0,1-1.84.515A7.7,7.7,0,0,1,12.441,19V15.083A7.947,7.947,0,0,1,13.66,15a2.566,2.566,0,0,1,1.633.426,1.766,1.766,0,0,1,.675,1.5,2.022,2.022,0,0,1-.663,1.615ZM19,15.77H17.468v.911H18.9v.734H17.468v1.6h-.906V15.03H19ZM16,10H15V5l5,5Z"
                                            fill="#fff" />
                                    </g>
                                </svg>
                            </span>
                        </a>
                        <div class="border-top d-flex justify-content-around view_profile_socials pt-3 mt-4 px-3">
                            <a href="" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="11.428" height="20"
                                    viewBox="0 0 11.428 20">
                                    <path id="facebook"
                                        d="M1428,16l-2.741,0c-3.079,0-5.069,1.932-5.069,4.923v2.268h-2.756a.421.421,0,0,0-.431.409v3.288a.419.419,0,0,0,.431.406h2.756v8.3a.419.419,0,0,0,.431.407h3.6a.419.419,0,0,0,.431-.407v-8.3h3.222a.419.419,0,0,0,.431-.406V23.6a.4.4,0,0,0-.126-.289.446.446,0,0,0-.3-.12h-3.223V21.265c0-.925.233-1.395,1.506-1.395H1428a.42.42,0,0,0,.43-.409V16.408A.42.42,0,0,0,1428,16Z"
                                        transform="translate(-1417 -15.996)" fill="#007ba7" />
                                </svg>
                            </a>
                            <a href="" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20">
                                    <path id="instagram"
                                        d="M13.333,10A3.335,3.335,0,0,0,10,6.667,3.335,3.335,0,0,0,6.667,10,3.335,3.335,0,0,0,10,13.333,3.335,3.335,0,0,0,13.333,10Zm1.8,0A5.112,5.112,0,0,1,10,15.13,5.112,5.112,0,0,1,4.87,10,5.112,5.112,0,0,1,10,4.87,5.112,5.112,0,0,1,15.13,10Zm1.406-5.338a1.2,1.2,0,1,1-2.044-.846,1.2,1.2,0,0,1,2.044.846ZM10,1.8,9,1.79q-.9-.007-1.374,0t-1.257.039a10.268,10.268,0,0,0-1.341.13A5.175,5.175,0,0,0,4.1,2.2,3.405,3.405,0,0,0,2.2,4.1a5.225,5.225,0,0,0-.241.931,10.268,10.268,0,0,0-.13,1.341q-.032.788-.039,1.257T1.791,9q.007.905.007,1t-.007,1q-.007.905,0,1.374t.039,1.257a10.268,10.268,0,0,0,.13,1.341,5.194,5.194,0,0,0,.241.93,3.405,3.405,0,0,0,1.9,1.9,5.225,5.225,0,0,0,.931.241,10.268,10.268,0,0,0,1.341.13q.788.032,1.257.039t1.374,0l1-.007,1,.007q.905.007,1.374,0t1.257-.039a10.267,10.267,0,0,0,1.341-.13A5.226,5.226,0,0,0,15.9,17.8a3.405,3.405,0,0,0,1.9-1.9,5.225,5.225,0,0,0,.241-.931,10.269,10.269,0,0,0,.13-1.341q.032-.788.039-1.257t0-1.374q-.007-.9-.007-1t.007-1q.007-.905,0-1.374t-.039-1.257a10.268,10.268,0,0,0-.13-1.341A5.125,5.125,0,0,0,17.8,4.1a3.405,3.405,0,0,0-1.9-1.9,5.225,5.225,0,0,0-.931-.241,10.268,10.268,0,0,0-1.341-.13q-.788-.032-1.257-.039T11,1.791L10,1.8ZM20,10q0,2.982-.065,4.128a6.108,6.108,0,0,1-1.614,4.193,6.108,6.108,0,0,1-4.193,1.614Q12.982,20,10,20t-4.128-.065a6.108,6.108,0,0,1-4.193-1.614A6.108,6.108,0,0,1,.065,14.128Q0,12.982,0,10T.065,5.872A6.108,6.108,0,0,1,1.679,1.679,6.108,6.108,0,0,1,5.872.065Q7.018,0,10,0t4.128.065a6.108,6.108,0,0,1,4.193,1.614,6.108,6.108,0,0,1,1.614,4.193Q20,7.018,20,10Z"
                                        fill="#007ba7" />
                                </svg>
                            </a>
                            <a href="" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="17.577"
                                    viewBox="0 0 25 17.577">
                                    <path id="youtube-play"
                                        d="M9.918,12.226,16.67,8.739,9.918,5.209v7.017ZM12.5.2q2.344,0,4.527.062t3.2.133l1.019.056.237.021A3.1,3.1,0,0,1,21.8.514q.1.021.328.062a1.917,1.917,0,0,1,.4.112q.167.07.391.181a2.614,2.614,0,0,1,.433.272,3.435,3.435,0,0,1,.4.369,2.625,2.625,0,0,1,.216.258,4.75,4.75,0,0,1,.4.816,5.261,5.261,0,0,1,.369,1.409q.112.893.174,1.9T25,7.483V9.939a29.521,29.521,0,0,1-.251,4.046,5.586,5.586,0,0,1-.349,1.388,3.52,3.52,0,0,1-.447.858l-.2.237a3.288,3.288,0,0,1-.4.369,2.379,2.379,0,0,1-.433.265q-.223.1-.391.174a1.994,1.994,0,0,1-.4.112l-.335.062q-.1.02-.321.042t-.23.021q-3.5.265-8.747.265-2.887-.028-5.015-.091t-2.8-.1L4,17.527l-.5-.056a6.532,6.532,0,0,1-.76-.14,4.325,4.325,0,0,1-.712-.293,2.778,2.778,0,0,1-.788-.572,2.625,2.625,0,0,1-.216-.258,4.75,4.75,0,0,1-.4-.816,5.26,5.26,0,0,1-.369-1.409q-.112-.893-.174-1.9T0,10.5V8.041A29.52,29.52,0,0,1,.251,4,5.586,5.586,0,0,1,.6,2.607a3.52,3.52,0,0,1,.447-.858l.2-.237a3.288,3.288,0,0,1,.4-.369A2.733,2.733,0,0,1,2.078.87Q2.3.759,2.469.689a2.011,2.011,0,0,1,.4-.112L3.195.515q.1-.02.321-.042T3.753.452Q7.254.2,12.5.2Z"
                                        transform="translate(0.001 -0.201)" fill="#007ba7" />
                                </svg>
                            </a>
                            <a href="" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18.626"
                                    viewBox="0 0 20 18.626">
                                    <path id="linkedIn"
                                        d="M1523.428,16a1.834,1.834,0,0,1,1.464.615,2.434,2.434,0,0,1,.57,1.544,2.1,2.1,0,0,1-2.242,2.172h-.024a2.125,2.125,0,0,1-1.613-.627,2.171,2.171,0,0,1-.594-1.546,2.016,2.016,0,0,1,.655-1.55A2.524,2.524,0,0,1,1523.428,16Zm-2.176,6.047h4.276V34.627h-4.276Zm19.738,5.366v7.212h-4.275V27.9a3.766,3.766,0,0,0-.5-2.063,1.832,1.832,0,0,0-1.673-.776,2.077,2.077,0,0,0-1.436.478,2.827,2.827,0,0,0-.776,1.053,1.863,1.863,0,0,0-.1.465c-.016.168-.024.35-.024.543v7.029h-4.3q.028-3.194.029-5.852V24.511c0-.62-.006-1.149-.016-1.585s-.013-.728-.013-.876h4.3v1.782l-.023.051h.023v-.051a5.058,5.058,0,0,1,.513-.688,3.845,3.845,0,0,1,.769-.669,4.235,4.235,0,0,1,1.1-.51,4.963,4.963,0,0,1,1.483-.2,5.652,5.652,0,0,1,1.952.333,3.966,3.966,0,0,1,1.566,1.049,5.023,5.023,0,0,1,1.034,1.764A7.519,7.519,0,0,1,1540.99,27.416Z"
                                        transform="translate(-1520.99 -16.003)" fill="#007ba7" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                    </button>
                    <div class="view_profile_box content_area p-4">
                        <div class="border-bottom pb-4">
                            <h2 class="view_profile_name mb-3">About Me</h2>
                            <p>
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
                            </p>
                        </div>
                        <h2 class="view_profile_name my-3">Professional Experience</h2>
                        <ul>
                            <li class="border-bottom pb-3 mb-3">
                                <p class="view_profile_destination mb-1">Ux Engineer</p>
                                <h4 class="view_profile_company">Company Name . Remote</h4>
                                <ul class="profile_view_info">
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16">
                                                <path id="Shape"
                                                    d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                    fill="#92929d" />
                                            </svg>
                                        </span>
                                        <span>
                                            Aug 2016 - June 2020 . 4 yrs
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                viewBox="0 0 15.091 18">
                                                <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                    transform="translate(-3.5 -0.5)">
                                                    <path id="Path_3207" data-name="Path 3207"
                                                        d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                        fill="none" stroke="#92929d" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_3208" data-name="Path 3208"
                                                        d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                        transform="translate(-4.705 -4.687)" fill="none"
                                                        stroke="#92929d" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            Melbourne, Austrailia
                                        </span>
                                    </li>
                                </ul>
                                <p class="view_profile_description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
                                </p>
                            </li>
                            <li class="border-bottom pb-3 mb-3">
                                <p class="view_profile_destination mb-1">Ux Engineer</p>
                                <h4 class="view_profile_company">Company Name . Remote</h4>
                                <ul class="profile_view_info">
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16">
                                                <path id="Shape"
                                                    d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                    fill="#92929d" />
                                            </svg>
                                        </span>
                                        <span>
                                            Aug 2016 - June 2020 . 4 yrs
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                viewBox="0 0 15.091 18">
                                                <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                    transform="translate(-3.5 -0.5)">
                                                    <path id="Path_3207" data-name="Path 3207"
                                                        d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                        fill="none" stroke="#92929d" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_3208" data-name="Path 3208"
                                                        d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                        transform="translate(-4.705 -4.687)" fill="none"
                                                        stroke="#92929d" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            Melbourne, Austrailia
                                        </span>
                                    </li>
                                </ul>
                                <p class="view_profile_description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
                                </p>
                            </li>
                        </ul>
                        <div class="border-bottom pb-4">
                            <h2 class="view_profile_name mb-3">Skills</h2>
                            <ul class="tags d-flex aling-items-center flex-wrap">
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
                        </div>
                        <h2 class="view_profile_name my-3">Education</h2>
                        <ul>
                            <li class="border-bottom pb-3 mb-3">
                                <p class="view_profile_destination mb-1">University Of Melbourne</p>
                                <h4 class="view_profile_company">Masters - Computer Science</h4>
                                <ul class="profile_view_info">
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16">
                                                <path id="Shape"
                                                    d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                    fill="#92929d" />
                                            </svg>
                                        </span>
                                        <span>
                                            Aug 2016 - June 2020 . 4 yrs
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                viewBox="0 0 15.091 18">
                                                <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                    transform="translate(-3.5 -0.5)">
                                                    <path id="Path_3207" data-name="Path 3207"
                                                        d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                        fill="none" stroke="#92929d" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_3208" data-name="Path 3208"
                                                        d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                        transform="translate(-4.705 -4.687)" fill="none"
                                                        stroke="#92929d" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            Melbourne, Austrailia
                                        </span>
                                    </li>
                                </ul>
                                <h4 class="view_profile_company">Grade: HD</h4>
                                <p class="view_profile_description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
                                </p>
                            </li>
                            <li class="border-bottom pb-3 mb-3">
                                <p class="view_profile_destination mb-1">University Of Melbourne</p>
                                <h4 class="view_profile_company">Masters - Computer Science</h4>
                                <ul class="profile_view_info">
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16">
                                                <path id="Shape"
                                                    d="M13.6,16H2.4A2.4,2.4,0,0,1,0,13.6V2.96A1.522,1.522,0,0,1,1.52,1.44H3.6V.8A.8.8,0,0,1,5.2.8v.64h6.32V.8a.8.8,0,0,1,1.6,0v.64h1.36A1.522,1.522,0,0,1,16,2.96V13.6A2.4,2.4,0,0,1,13.6,16ZM1.6,5.92V13.6a.8.8,0,0,0,.8.8H13.6a.8.8,0,0,0,.8-.8V5.92Zm0-2.88V4.32H14.4V3.04H13.116a.8.8,0,0,1-1.593,0H5.2a.8.8,0,0,1-1.593,0Zm7.84,8.64H3.68a.8.8,0,0,1,0-1.6H9.44a.8.8,0,0,1,0,1.6ZM6.56,8.8H3.68a.8.8,0,0,1,0-1.6H6.56a.8.8,0,0,1,0,1.6Z"
                                                    fill="#92929d" />
                                            </svg>
                                        </span>
                                        <span>
                                            Aug 2016 - June 2020 . 4 yrs
                                        </span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.091" height="18"
                                                viewBox="0 0 15.091 18">
                                                <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                                    transform="translate(-3.5 -0.5)">
                                                    <path id="Path_3207" data-name="Path 3207"
                                                        d="M17.591,8.045c0,5.091-6.545,9.455-6.545,9.455S4.5,13.136,4.5,8.045a6.545,6.545,0,1,1,13.091,0Z"
                                                        fill="none" stroke="#92929d" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" />
                                                    <path id="Path_3208" data-name="Path 3208"
                                                        d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                                        transform="translate(-4.705 -4.687)" fill="none"
                                                        stroke="#92929d" stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span>
                                            Melbourne, Austrailia
                                        </span>
                                    </li>
                                </ul>
                                <h4 class="view_profile_company">Grade: HD</h4>
                                <p class="view_profile_description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="view_profile_box p-3">
                        <h2 class="view_profile_name mb-3" style="color: #333;">Other Candidates</h2>
                        <ul class="views_others_box_list">
                            <li>
                                <a href="" class="views_others_box d-flex align-items-center">
                                    <div class="view_profile_candidates">
                                        <img src="{{ asset('images/banner-placeholder.png') }}"
                                            alt="" class="">
                                    </div>
                                    <div>
                                        <h4>Evelyn Harper</h4>
                                        <h5>UX Designer</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="views_others_box d-flex align-items-center">
                                    <div class="view_profile_candidates">
                                        <img src="{{ asset('images/banner-placeholder.png') }}"
                                            alt="" class="">
                                    </div>
                                    <div>
                                        <h4>Evelyn Harper</h4>
                                        <h5>UX Designer</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="views_others_box d-flex align-items-center">
                                    <div class="view_profile_candidates">
                                        <img src="{{ asset('images/banner-placeholder.png') }}"
                                            alt="" class="">
                                    </div>
                                    <div>
                                        <h4>Evelyn Harper</h4>
                                        <h5>UX Designer</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="views_others_box d-flex align-items-center">
                                    <div class="view_profile_candidates">
                                        <img src="{{ asset('images/banner-placeholder.png') }}"
                                            alt="" class="">
                                    </div>
                                    <div>
                                        <h4>Evelyn Harper</h4>
                                        <h5>UX Designer</h5>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="" class="views_others_box d-flex align-items-center">
                                    <div class="view_profile_candidates">
                                        <img src="{{ asset('images/banner-placeholder.png') }}"
                                            alt="" class="">
                                    </div>
                                    <div>
                                        <h4>Evelyn Harper</h4>
                                        <h5>UX Designer</h5>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a href="" class="view_profile_button d-block text-center mt-4">View all</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
