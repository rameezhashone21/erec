@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')
<div class="col-lg-12">
    <div class="cv-view position-relative">
        <img src="{{ asset('/images/cv-view-vector.png') }}" alt="" class="cv-view-bg-voctor img-fluid">
        <div class="cv-view-header">
            <img src="{{ asset('/images/cv-head.png') }}" alt="Erec logo" class="img-fluid">
        </div>
        <div class="cv-view-body position-relative">
            <img src="{{ asset('/images/Untitled-3.png') }}" alt="profile" class="cv-view-profile-image">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="cv-profile-name">Philip Gutmann</h3>
                    <h4 class="cv-profile-title">Senior Web Developer</h4>
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
                            14585 10Th Avewhitestone, NY
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
                            (718) 361-9199
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
                            Philipgut@Gmail.Com
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
                    Highly motivated and results-oriented Senior Web Developer with [Number] years of experience
                    in designing, developing, and maintaining complex web applications. Proven ability to work
                    independently and as part of a team to deliver high-quality, scalable, and user-friendly web
                    solutions. Possesses a strong understanding of front-end and back-end development
                    technologies, as well as a passion for staying up-to-date with the latest trends and
                    innovations in the field.
                </p>
            </div>
            <div>
                <h3 class="cv-profile-name" style="margin-bottom: 14px;">Experience</h3>
                <div class="experience-box-cv-view">
                    <div class="first-child">
                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">Luna
                            Web Design
                        </h4>
                        <p class="cv-text-primary mb-1">New York</p>
                        <p class="cv-text-primary">Jan 2020 - Present</p>
                    </div>
                    <div class="experience-midle-vectors d-flex align-items-center flex-column second-child">
                        <div class="rounded-div">
                            <div class="squir-div"></div>
                        </div>
                        <div class="border-line"></div>
                    </div>
                    <div class="third-child">
                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                            Sr. Web Developer
                        </h4>
                        <p class="cv-text-primary mb-1">
                            Cooperate with designers to create clean interfaces and simple, intuitive
                            interactions
                            and experiences.
                        </p>
                    </div>
                </div>
                <div class="experience-box-cv-view">
                    <div class="first-child">
                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">Luna
                            Web Design
                        </h4>
                        <p class="cv-text-primary mb-1">New York</p>
                        <p class="cv-text-primary">Jan 2020 - Present</p>
                    </div>
                    <div class="experience-midle-vectors d-flex align-items-center flex-column second-child">
                        <div class="rounded-div">
                            <div class="squir-div"></div>
                        </div>
                        <div class="border-line"></div>
                    </div>
                    <div class="third-child">
                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                            Sr. Web Developer
                        </h4>
                        <p class="cv-text-primary mb-1">
                            Cooperate with designers to create clean interfaces and simple, intuitive
                            interactions
                            and experiences.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('bottom_script')

@endsection
