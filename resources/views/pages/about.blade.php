@extends('layouts.app')

@section('content')
    <main>
        <div class="pt-5"></div>
        <section class="banner bg-img-none pt-lg-5 pt-3 h-auto">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <img src="{{ asset('imgs/service-banner-1.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="banner-content">
                            {{-- <span class="text-captialize">About Us</span> --}}
                            <h1 class="fs-48">About Us </h1>
                            <p class="fs-14 text-dark">
                                The mission of our business is to make yours succeed. Success breeds success.
                            </p>
                            <p class="fs-14 text-dark">
                                From recruitment process outsourcing (RPO) to employer branding, and across the complete
                                life cycle of your recruitment requirements, we thrive in delivering world-class customer
                                experiences.
                            </p>

                            {{-- <h2 class="fs-48 fw-bold">
                                Who We Are
                            </h2> --}}
                            <p class="fs-14 text-dark">
                                Since 2009, the company has seen several iterations in its evolution, we’ve delivered
                                innovative, customized IT and recruitment outsourcing and talent solutions to organizations
                                in Australia, Egypt, New Zealand, Japan and Dubai.
                            </p>
                            <p class="fs-14 text-dark">
                                We like to think of our connection with you as a trusted partner from the first get go,
                                working with you to develop unique, cost-effective, productive and repeatable talent
                                solutions that drive your business forward.
                            </p>
                            <p class="fs-14 text-dark">
                                Discover how E-REC are advanced in the way we do things, very innovative thinking models
                                with a strong focus on delivering exceptional talent strategies and processes that provide
                                you with the opportunity to do your business better. Rest assured E-REC places top talent
                                based on data driven decisions that help you hire the most outstanding people from anywhere
                                at anytime.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row my-4 align-items-center" id="whatwedo">
                    <div class="col-md-7">
                        <div class="banner-content">
                            {{-- <span class="text-captialize">About Us</span> --}}
                            <h1 class="fs-48">What We Do </h1>
                            <p class="fs-14 text-dark">
                                E-REC brings to the recruiter and employer the top talent using the advanced shortlisting
                                processes to bring the right candidate for your organisation. The E-REC dashboard provides
                                HR in your organisation with a competitive advantage due to the extensive data filtering
                                engines coupled with an industry leading testing and examination assessment engine
                            </p>
                            <p class="fs-14 text-success">
                                {{-- Green Writing –  --}}
                                Simplify and Expedite the Shortlisting Process
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('imgs/what_we_do.png') }}" class="w-100" alt="">
                    </div>
                </div>
                <div class="row align-items-center" id="howWeDo">
                    <div class="col-md-5">
                        <img src="{{ asset('imgs/how_we_do_it.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="banner-content">
                            {{-- <span class="text-captialize">About Us</span> --}}
                            <h1 class="fs-48">How We Do It </h1>
                            <p class="fs-14 text-dark">
                                The E-REC dashboard presents the user (Employer or Recruiter) with real time engagement data
                                metrics about the candidate and informs the user of recommended next steps to expedite the
                                shortlisting process to move to interview. This is performed through advanced ML and AI
                                engines that have been specifically developed for this industry. Our specially designed
                                staffing and recruitment platform solutions help you identify the right candidate for the
                                right role in unprecedented timeframes reducing
                            </p>
                            <p class="fs-14 text-success">
                                {{-- Green Writing –  --}}
                                Realtime Dashboard, always on, anytime, anywhere on any device.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="second-banner h-auto py-5">
            <div class="container">
                <div class="row row-cols-1 justify-content-center about align-items-center">
                    <div class="col col-lg-5">
                        <img src="{{ asset('imgs/about-img.png') }}" alt="author" class="w-100 authors">
                    </div>
                    <div class="col col-lg-1"></div>
                    <div class="col col-lg-5">
                        <div class="card ">
                            <div class="card-body p-4">
                                <span>Founder</span>
                                <h3 class="fs-48 fw-bold position-relative">Michael Massoud</h3>
                                {{-- <p class="fs-5 text-dark fw-normal mb-0 pt-3">| Chief Executive Officer & Chief Information
                  Officer</p> --}}
                                <p class="fs-14 pt-3">
                                    Welcome to E-REC, the Employment - Realtime Engagement Center. I'm Michael Massoud,
                                    founder and Group CEO of E-REC Group. With nearly 30 years of experience in people
                                    management, enterprise architecture, software development, and infrastructure
                                    management, I envisioned E-REC to revolutionize job seeking, recruitment, and employer
                                    needs. E-REC consistently identifies the top 1% of candidates with precision and speed.
                                    Since September 2020, my team and I have developed an intuitive product for the staffing
                                    and recruitment industry. E-REC streamlines the Application to Interview process with
                                    innovative features. We're confident you'll appreciate the E-REC experience and hope you
                                    enjoy using the E-REC Portal as much as we enjoyed creating it!
                                </p>
                                <p class="fs-14">
                                    <b>
                                        “I’m passionate about people and helping them in their journey to achieve a
                                        successful
                                        and rewarding career, and E-REC has the potential to do just that.”
                                    </b>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="images-icons">
                        <img src="{{ asset('imgs/Polygon.svg') }}" alt="Polygon" class="polygon position-absolute">
                        <img src="{{ asset('imgs/turn-right-arrow.svg') }}" alt="arrow"
                            class="turn-right-arrow position-absolute">
                        <img src="{{ asset('imgs/dots-1.svg') }}" alt="dots" class="dots1 position-absolute">
                        <img src="{{ asset('imgs/dots-2.svg') }}" alt="dots" class="dots2 position-absolute">
                        <img src="{{ asset('imgs/system.svg') }}" alt="dots" class="system position-absolute">
                        <span class="position-absolute founder">The Founder</span>
                        <span class="position-absolute boss">The Boss</span>
                        <span class="position-absolute leader">The Leader</span>

                    </div>
                </div>
            </div>
        </section>

        {{-- <section class="boxes py-5 boxed">
            <div class="container">
                <div class="row row-cols-lg-3 row-cols-1 justify-content-center">
                    <div class="col-lg-12">
                        <p class="fs-48 text-center fw-bold">Management Team</p>
                    </div>
                    <div class="col">
                        <div class="box text-center pt-5 pb-3">
                            <img src="{{ asset('imgs/pioneer-img.png') }}" alt="pioneer-img" class="">
                            <p class="mb-3 fw-600 ">FIONA CRANE PENNY</p>
                            <p class="fs-14">
                                Projects & Operations <br> Director
                            </p>
                            <p class="pt-lg-5 pt-3">
                                <a href="#" target="_blank">
                                    <img src="{{ asset('imgs/linkedin-simple.svg') }}" alt="linkedin-simple">
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box text-center pt-5 pb-3">
                            <img src="{{ asset('imgs/pioneer-img.png') }}" alt="pioneer-img" class="">
                            <p class="mb-3 fw-600 ">FIONA CRANE PENNY</p>
                            <p class="fs-14">
                                Projects & Operations <br> Director
                            </p>
                            <p class="pt-lg-5 pt-3">
                                <a href="#" target="_blank">
                                    <img src="{{ asset('imgs/linkedin-simple.svg') }}" alt="linkedin-simple">
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="box text-center pt-5 pb-3">
                            <img src="{{ asset('imgs/pioneer-img.png') }}" alt="pioneer-img" class="">
                            <p class="mb-3 fw-600 ">FIONA CRANE PENNY</p>
                            <p class="fs-14">
                                Projects & Operations <br> Director
                            </p>
                            <p class="pt-lg-5 pt-3">
                                <a href="#" target="_blank">
                                    <img src="{{ asset('imgs/linkedin-simple.svg') }}" alt="linkedin-simple">
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <hr class="custom-hr">
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="py-lg-5 py-3" id="whyUseErec">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('imgs/values.png') }}" class="img-fluid" alt="values">
                    </div>
                    <div class="col-lg-6">
                        <h5 class="fs-48 fw-bold">Why Use E-REC</h5>
                        {{-- <h5 class="fs-48 fw-bold">Our Core Values</h5> --}}
                        {{-- <p class="fs-14 mb-2">
                            "We believe in real change, because that is where we truly make a difference in our magnificent
                            world."
                        </p>

                        <span class="fs-24 fw-bold">
                            INTEGRAL
                        </span>
                        <p class="fs-14">
                            We pride ourselves in the quality of honesty we operate with on a day to day basis. We believe
                            in having strong moral principles and lead our Business on solid foundation of truth and
                            openness.
                        </p>


                        <span class="fs-24 fw-bold">
                            ETHICAL
                        </span>
                        <p class="fs-14">
                            We are a technology company which means we operate in one of the largest deregulated ever
                            evolving industries in the world. "Just because you can do it, doesn't mean you should". We
                            operate on the ethical grounds where technology meets 'the right decision'
                        </p>


                        <span class="fs-24 fw-bold">
                            ENGAGING
                        </span>
                        <p class="fs-14">
                            Our leadership is build on engagement, happiness, warmth, nature, and humanity. Our community
                            love to engage with us because "having fun" is one of our only rigid rules in our company. When
                            you're happy, we are happy. </p>



                        <span class="fs-24 fw-bold">
                            TRANSPARENT
                        </span>
                        <p class="fs-14">
                            Transparency is our Core Belief because we display openness, honesty, and straightforwardness to
                            our customers, clients, staff, and community. We believe in leading with an egalitarian mindset. --}}
                        <p class="fs-14">
                            Reduce recruitment costs, with a significant reduction in the use of third-party agencies.
                            Build a range of talent pools of skilled, 'at-the-ready' candidates to meet your future talent
                            needs.
                            Elevate your performance metrics, like time to fill, while significantly increasing the quality
                            of hire and new hire retention.
                        </p>
                        <p class="fs-14">
                            Increase your employer brand value, and position your organization as an employer
                            of choice.
                            Leverage reporting, data and insights to create operational excellence and superior risk
                            management.
                        </p>
                        <p class="fs-14">
                            Identify the best possible candidate in a highly accurate and structured process
                            in a fraction of the time it takes to shortlist applicants from a pool of talent compared to the
                            traditional RPO process.
                        </p>
                        <p class="fs-14 text-success">
                            {{-- Green Writing –  --}}
                            One Platform, One Centralized Command Centre, One Experience.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="daily-progress">
            <div class="container">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <h2>OUR STATISTICS</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 g-0 bg-custom">
                    <div class="col=">
            <div class="progress-box progress-bax-sm text-center">
                        <span>Registering</span>
                        <h2>{{ count($user) }}</h2>
                        <p>DAILY</p>
                    </div>
                </div>
                <div class="col=">
            <div class="progress-box progress-bax-sm text-center">
                    <span>Jobs</span>
                    <h2>{{ count($posts) }}</h2>
                    <p>ADVERTISED</p>
                </div>
            </div>
            <div class="col=">
            <div class="progress-box progress-bax-sm text-center">
                <span>Number OF</span>
                <h2>{{ count($jobApps) }}</h2>
                <p>APPLICANTS</p>
            </div>
            </div>
            <div class="col=">
            <div class="progress-box progress-bax-sm text-center">
                <span>Number OF</span>
                <h2>{{ count($company) }}</h2>
                <p>EMPLOYERS</p>
            </div>
            </div>
            </div>
            </div>
            <div class="blue-box"></div>
        </section>

    </main>
@endsection
