@extends('layouts.app')

@section('content')
    <section class="map-main-section">
        <div class="container">
            <div class="d-lg-flex" style="gap: 20px;">
                <div class="map-left-div mb-4 mb-lg-0">
                    <div class="map__box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d6973121.942995201!2d134.58951135539115!3d-31.418404634006954!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!3m2!1d-37.8136276!2d144.96305759999998!4m3!3m2!1d-25.275325199999997!2d133.7783969!5e0!3m2!1sen!2s!4v1672046721097!5m2!1sen!2s"
                            width="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <h3 class="primary-color fs-2 border-bottom-2-blue py-3 ps-5">Filters</h3>
                        <form class="px-5 py-4">
                            <div class="row row-cols-md-2 gy-3 gx-5">
                                <div class="col">
                                    <label for="location" class="mb-2">Location</label>
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
                                        <select name="" id="location"
                                            class="form-select input_with_icon fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">City or Postcode</option>
                                            <option value="">country or Postcode</option>
                                            <option value="">City or Postcode</option>
                                            <option value="">country or Postcode</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="jobCategory" class="mb-2">All Jobs</label>
                                    <div class="position-relative">
                                        <select name="" id="jobCategory"
                                            class="form-select fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">All Jobs</option>
                                            <option value="">All Jobs</option>
                                            <option value="">All Jobs</option>
                                            <option value="">All Jobs</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="category" class="mb-2">Category</label>
                                    <div class="position-relative">
                                        <div class="form__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.095" height="15.176"
                                                viewBox="0 0 15.095 15.176">
                                                <path id="Path_3283" data-name="Path 3283"
                                                    d="M103.032,78.4a1.361,1.361,0,0,0-1.174,1.476v.632H99.174A1.361,1.361,0,0,0,98,81.981V92.1a1.361,1.361,0,0,0,1.174,1.476H108.9a.456.456,0,0,0,.36-.182.752.752,0,0,0,0-.9.456.456,0,0,0-.36-.182H99.174c-.1,0-.168-.083-.168-.211V87.672h4.282a1.582,1.582,0,0,0,1.42,1.265h1.677a1.582,1.582,0,0,0,1.42-1.265h4.282V92.1c0,.128-.066.211-.168.211a.456.456,0,0,0-.36.182.752.752,0,0,0,0,.9.456.456,0,0,0,.36.182,1.361,1.361,0,0,0,1.174-1.476V81.981a1.361,1.361,0,0,0-1.174-1.476h-2.684v-.632a1.361,1.361,0,0,0-1.174-1.476Zm0,1.265h5.032c.1,0,.168.083.168.211v.632h-5.367v-.632c0-.128.066-.211.168-.211ZM99.174,81.77h12.747c.1,0,.168.083.168.211v4.426h-4.282a1.589,1.589,0,0,0-1.42-1.265h-1.677a1.589,1.589,0,0,0-1.42,1.265H99.007V81.981c0-.128.066-.211.168-.211Zm5.535,4.637h1.677a.649.649,0,0,1,0,1.265h-1.677a.649.649,0,0,1,0-1.265Zm5.7,5.9a.649.649,0,1,0,.5.632A.579.579,0,0,0,110.411,92.309Z"
                                                    transform="translate(-98 -78.398)" fill="#aba6ac" />
                                            </svg>
                                        </div>
                                        <select name="" id="category"
                                            class="form-select input_with_icon fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>
                                            <option value="">Category</option>s
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="candidateGender" class="mb-2">Candidate Gender</label>
                                    <div class="position-relative">
                                        <div class="form__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16.055" height="23.001"
                                                viewBox="0 0 16.055 23.001">
                                                <path id="Path_3269" data-name="Path 3269"
                                                    d="M174.339,14.261v1.407a.269.269,0,0,0,.267.267h2.863L174,19.453a5.679,5.679,0,0,0-4.149-1.019,5.921,5.921,0,0,0-5,4.9,5.834,5.834,0,0,0,4.8,6.648v3.178h-1.577a.269.269,0,0,0-.267.267v1.407a.269.269,0,0,0,.267.267h1.577v1.626a.269.269,0,0,0,.267.267h1.407a.269.269,0,0,0,.267-.267V35.1h1.577a.269.269,0,0,0,.267-.267V33.428a.269.269,0,0,0-.267-.267H171.6V29.983a5.84,5.84,0,0,0,4.877-5.75,5.771,5.771,0,0,0-1.092-3.372l3.494-3.518v2.863a.269.269,0,0,0,.267.267h1.431a.269.269,0,0,0,.267-.267V14.261a.269.269,0,0,0-.267-.267H174.63a.275.275,0,0,0-.291.267Zm-3.712,13.829a3.882,3.882,0,1,1,3.882-3.882A3.893,3.893,0,0,1,170.627,28.091Z"
                                                    transform="translate(-164.786 -13.994)" fill="#aba6ac" />
                                            </svg>

                                        </div>
                                        <select name="" id="candidateGender"
                                            class="form-select input_with_icon fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">Candidate Gender</option>
                                            <option value="">Candidate Gender</option>
                                            <option value="">Candidate Gender</option>
                                            <option value="">Candidate Gender</option>s
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="datePosted" class="mb-2">Date Posted</label>
                                    <div class="position-relative">
                                        <select name="" id="datePosted"
                                            class="form-select fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">Last 24 hours</option>
                                            <option value="">Last 24 hours</option>
                                            <option value="">Last 24 hours</option>
                                            <option value="">Last 24 hours</option>s
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="experience" class="mb-2">Experience</label>
                                    <div class="position-relative">
                                        <select name="" id="experience"
                                            class="form-select fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">Fresh</option>
                                            <option value="">Fresh</option>
                                            <option value="">Fresh</option>
                                            <option value="">Fresh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="qualification" class="mb-2">Qualification</label>
                                    <div class="position-relative">
                                        <select name="" id="qualification"
                                            class="form-select fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">Master’s Degree</option>
                                            <option value="">Master’s Degree</option>
                                            <option value="">Master’s Degree</option>
                                            <option value="">Master’s Degree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="testScore" class="mb-2">Test Score</label>
                                    <div class="position-relative">
                                        <select name="" id="testScore"
                                            class="form-select fs-14 bg-theme-secondary border-0 h-50px">
                                            <option value="">=> 90%</option>
                                            <option value="">=> 90%</option>
                                            <option value="">=> 90%</option>
                                            <option value="">=> 90%</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col ">
                                    <div class="map-filter-rangeslider">
                                        <p class="range-slider-text">Radius: <span><span id="rangeValue">0</span>
                                                miles</span> </p>
                                        <input class="range" type="range" name="" value="30"
                                            min="30" max="1000" onChange="rangeSlide(this.value)"
                                            onmousemove="rangeSlide(this.value)" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="map-right-div">
                    <div class="position-relative pb-4">
                        <div class="form__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15.342" height="15.342"
                                viewBox="0 0 15.342 15.342">
                                <path id="Path_3267" data-name="Path 3267"
                                    d="M13.964,12.649h-.693l-.246-.237a5.71,5.71,0,1,0-.614.614l.237.246v.693l4.386,4.377,1.307-1.307Zm-5.263,0A3.947,3.947,0,1,1,12.649,8.7,3.942,3.942,0,0,1,8.7,12.649Z"
                                    transform="translate(-3 -3)" fill="#aba6ac" />
                            </svg>
                        </div>
                        <input type="text"
                            class="form-control input_with_icon fs-14 bg-theme-secondary border-0 h-50px"
                            placeholder="Candidate title, keywords">
                    </div>
                    <ul class="map-user-list">
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center  ">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center  ">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top mt-1 ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="14.875" height="19.812" viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                        <li class="pb-4 px-2">
                            <div class="map-page-userbox d-flex">
                                <div class="border-end px-1 pt-1 text-center">
                                    <img src="https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg"
                                        alt="" class="img-fluid">
                                    <a href="" class="d-block text-center download__cv pt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="14.875" height="19.812"
                                            viewBox="0 0 14.875 19.812">
                                            <defs>
                                                <linearGradient id="linear-gradient" x1="0.5" x2="0.5"
                                                    y2="1" gradientUnits="objectBoundingBox">
                                                    <stop offset="0" stop-color="#2ec4bb" />
                                                    <stop offset="1" stop-color="#007ba7" />
                                                </linearGradient>
                                            </defs>
                                            <g id="Group_2743" data-name="Group 2743" transform="translate(0 0)">
                                                <path id="Path_3281" data-name="Path 3281"
                                                    d="M447.506,32.153h2.872a1.354,1.354,0,0,0-.1-.12L447.043,28.8a1.373,1.373,0,0,0-.12-.1v2.872a.582.582,0,0,0,.583.583Z"
                                                    transform="translate(-435.767 -28.435)"
                                                    fill="url(#linear-gradient)" />
                                                <path id="Path_3282" data-name="Path 3282"
                                                    d="M167.892,26.354a1.411,1.411,0,0,1-1.409-1.409V21.809h-9.09a1.243,1.243,0,0,0-1.24,1.24V40.381a1.243,1.243,0,0,0,1.24,1.24h12.4a1.243,1.243,0,0,0,1.24-1.24V26.354Zm-4.3,10.383-2.556-2.556.584-.584,1.559,1.559V29.649H164v5.506l1.559-1.559.584.584Z"
                                                    transform="translate(-156.154 -21.809)"
                                                    fill="url(#linear-gradient)" />
                                            </g>
                                        </svg>
                                        <div>Download CV</div>
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h3>
                                                Luis Fernandes
                                                <span style="position: relative; top: -7px; ">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="10.785"
                                                        height="10.785" viewBox="0 0 10.785 10.785">
                                                        <path id="Path_3277" data-name="Path 3277"
                                                            d="M7.387,2a5.392,5.392,0,1,0,5.4,5.392A5.39,5.39,0,0,0,7.387,2Zm2.286,8.628L7.392,9.253,5.111,10.628l.6-2.594L3.7,6.292l2.653-.226L7.392,3.618,8.428,6.06l2.653.226L9.069,8.029Z"
                                                            transform="translate(-2 -2)" fill="#e8d31c" />
                                                    </svg>
                                                </span>
                                            </h3>
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="10.841" height="13.939"
                                                    viewBox="0 0 10.841 13.939">
                                                    <path id="Path_3276" data-name="Path 3276"
                                                        d="M14.293,3H6.549A1.547,1.547,0,0,0,5.008,4.549L5,16.939l5.421-2.323,5.421,2.323V4.549A1.553,1.553,0,0,0,14.293,3Z"
                                                        transform="translate(-5 -3)" fill="#007ba7" />
                                                </svg>
                                            </div>
                                        </div>
                                        <p class="mb-0" style="font-size: 14px; color: #4dc1ba;">
                                            PHP Developer
                                        </p>
                                        <div class="d-flex align-items-center"
                                            style="gap: 5px; color: #aba6ac; font-size: 14px;">
                                            <span>
                                                <svg id="Group_2725" data-name="Group 2725"
                                                    xmlns="http://www.w3.org/2000/svg" width="9.4" height="13.428"
                                                    viewBox="0 0 9.4 13.428">
                                                    <path id="Path_3268" data-name="Path 3268"
                                                        d="M9.7,2A4.7,4.7,0,0,0,5,6.7c0,3.525,4.7,8.728,4.7,8.728s4.7-5.2,4.7-8.728A4.7,4.7,0,0,0,9.7,2ZM6.343,6.7a3.357,3.357,0,1,1,6.714,0c0,1.934-1.934,4.827-3.357,6.633C8.3,11.541,6.343,8.613,6.343,6.7Z"
                                                        transform="translate(-5 -2)" fill="#aba6ac" />
                                                    <circle id="Ellipse_3" data-name="Ellipse 3" cx="1.678"
                                                        cy="1.678" r="1.678" transform="translate(3.021 3.021)"
                                                        fill="#aba6ac" />
                                                </svg>
                                            </span>
                                            <span>Santa Fe, New York</span>
                                        </div>
                                    </div>
                                    <div class="d-flex border-top ">
                                        <a href="" class="primary-color d-flex align-items-center mx-3"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg id="profile" xmlns="http://www.w3.org/2000/svg" width="12.475"
                                                    height="11.603" viewBox="0 0 12.475 11.603">
                                                    <path id="Path_3280" data-name="Path 3280"
                                                        d="M12.475,10.845a.312.312,0,0,1-.164.249,1.46,1.46,0,0,1-.506.187q-.341.074-.7.136a8.623,8.623,0,0,1-.92.1q-.56.034-.975.051t-1.066.028q-.652.011-.987.011H5.318l-.987-.011-1.066-.028-.975-.051-.92-.1-.7-.136-.506-.187L0,10.845a2.208,2.208,0,0,1,1.34-1.76A8.754,8.754,0,0,1,4.678,8.071V7.7a3.22,3.22,0,0,1-1.1-.736,3.544,3.544,0,0,1-.731-1.115,6.15,6.15,0,0,1-.39-1.37A9.609,9.609,0,0,1,2.339,2.9a2.68,2.68,0,0,1,.3-1.291A2.443,2.443,0,0,1,3.484.7,4.116,4.116,0,0,1,4.715.175,6.21,6.21,0,0,1,6.237,0,6.21,6.21,0,0,1,7.76.175,4.116,4.116,0,0,1,8.99.7a2.443,2.443,0,0,1,.841.911,2.68,2.68,0,0,1,.3,1.291q0,3.962-2.339,4.822v.351a8.754,8.754,0,0,1,3.338,1.013A2.208,2.208,0,0,1,12.475,10.845Z"
                                                        fill="#007ba7" />
                                                </svg>
                                            </span>
                                            <span>
                                                View Profile
                                            </span>
                                        </a>
                                        <a href="" class="text-grey d-flex align-items-center"
                                            style="font-size: 12px; gap: 6px;" style="font-weight: 500">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.641" height="11.641"
                                                    viewBox="0 0 11.641 11.641">
                                                    <path id="Path_3279" data-name="Path 3279"
                                                        d="M12.477,2H3.164A1.167,1.167,0,0,0,2,3.164V13.641l2.328-2.328h8.148a1.167,1.167,0,0,0,1.164-1.164V3.164A1.167,1.167,0,0,0,12.477,2Z"
                                                        transform="translate(-2 -2)" fill="#c7c7cd" />
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
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
