@extends('layouts.app')

@section('content')
    <main>
        <div class="pt-5"></div>
        <section class="banner bg-img-none pt-lg-5 pt-3 h-auto ">
            <div class="container">
                <div class="row align-items-center mb-3 mb-md-0">
                    <div class="col-lg-7">
                        <img src="{{ asset('imgs/service-banner-1.png') }}" class="w-100" alt="">
                    </div>
                    <div class="col-lg-5">
                        <div class="banner-content">
                            <h1 class="fs-48">Services </h1>
                            <p class="fs-14 text-dark">
                                The best recruitment experience aligns itself to technology efficiency while maintaining the
                                human touch once you’ve identified that ideal candidate, so critical for relationships.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row gy-md-5 gy-3">
                    <div class="col-12 text-md-center banner-content mb-md-4">
                        <h1 class="fs-48">
                            Our Services include
                        </h1>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-captialize fs-5 fw-bold primary-color">Candidate Sourcing </h2>
                        <p class="fs-14 text-dark">
                            Our candidate sourcing engine consider time zones, language differences, even cultural
                            interests and continually learns and captures valuable data to find the most ideal candidate
                            for your organisation.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-captialize fs-5 fw-bold primary-color">Elite Talent </h2>
                        <p class="fs-14 text-dark">
                            E-REC is a premium service offering very advanced engines to source you the most ideal
                            candidate from hundreds if not thousands of applicants to give you the crème de la crème of
                            elite talent pool.
                        </p>
                    </div>
                    <div class="col-md-7">
                        <h2 class="text-captialize fs-5 fw-bold primary-color">Talent Mapping Process </h2>
                        <p class="fs-14 text-dark">
                            Our platform is connected to talent sourcing networks specifically created to scour the
                            globe for the ideal talent, which translates to organisations benefiting to rapidly back
                            fill, resource a project, low or high volume, including C-Suite executive talent.
                        </p>
                        <p class="fs-14 text-dark">
                            A job enters into the E-REC requisition engine. This requisition includes information about
                            the position, such as the job title, desired skills, and required experience along with a
                            host of other criteria.
                        </p>
                        <p class="fs-14 text-dark">
                            Then the E-REC platform uses this information to create a profile for the ideal candidate.
                        </p>
                        <p class="fs-14 text-dark">
                            As applicants submit their resumes, E-REC parses, sorts, and ranks them based on how well
                            they match the profile. E-REC Assessments engine engage the applicant to undergo a skills
                            and experience multiple choice survey, quiz or examination, based on the requirements of the
                            hiring manager.
                        </p>
                        <p class="fs-14 text-dark">
                            E-REC then advises the hiring manager of the most suitable candidates based on many factors
                            and quickly identify by highlighting the most qualified candidates and move them forward in
                            the hiring process.
                        </p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('imgs/Talent-Mapping-Process.png') }}" class="w-100"
                            alt="Talent-Mapping-Process">
                    </div>
                </div>
            </div>
        </section>
        <section class='py-4'>
            <div class="container">
                <div class="row gy-4 justify-content-center mb-4">
                    <div class="col-md-10 text-center">
                        <h2 class='text-uppercase fs-48 fw-bold'>
                            The contingency model
                        </h2>
                        <p class="fs-14 text-dark">
                            This is by far the most common business model for recruitment agencies and likely the one you’re
                            used to if you’ve worked in the industry before. Candidates are placed for a success-only fee,
                            which is between 15% and 25% of the candidate’s salary.
                        </p>
                    </div>
                </div>
                <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 gy-4">
                    <div class="col">
                        <div class="white-box p-4 h-100 box-hover">
                            <img src="{{ asset('imgs/services-icons/nomination.png') }}" alt="">
                            <h2 class='text-captialize fs-5 fw-bold primary-color mt-4'>
                                Preferred Supplier Lists
                            </h2>
                            <p class="fs-14 text-dark">
                                Preferred Supplier Lists (PSLs) are related to the contingency model, but more selective.
                                Typically used by large companies, it involves them creating a list of recruitment agencies
                                they want to work with, requiring new agencies to tender.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="white-box p-4 h-100 box-hover">
                            <img src="{{ asset('imgs/services-icons/search.png') }}" alt="">
                            <h2 class='text-captialize fs-5 fw-bold primary-color mt-4'>
                                Retained or Executive Search
                            </h2>
                            <p class="fs-14 text-dark">
                                Unlike the contingency and PSL models, agencies make money from the start with retained or
                                executive search. Clients make an initial upfront payment to an agency of their choice and
                                then further payments based on your delivery.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="white-box p-4 h-100 box-hover">
                            <img src="{{ asset('imgs/services-icons/applicant.png') }}" alt="">
                            <h2 class='text-captialize fs-5 fw-bold primary-color mt-4'>
                                Recruitment Process Outsourcing
                            </h2>
                            <p class="fs-14 text-dark">
                                Usually more suited to established recruitment agencies, in the recruitment process
                                outsourcing (RPO) model, your agency takes on the role of an in-house recruitment team for a
                                client, dealing with other recruiters on their behalf.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="white-box p-4 h-100 box-hover">
                            <img src="{{ asset('imgs/services-icons/nomination.png') }}" alt="">
                            <h2 class='text-captialize fs-5 fw-bold primary-color mt-4'>
                                Self-Service
                            </h2>
                            <p class="fs-14 text-dark">
                                This business model is driven by efficiency and the client only pays for the delivery of
                                each stage of recruitment you’re providing, such as marketing the position or interviewing
                                candidates, encouraging them to handle more of the hiring process.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="provide py-4">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col-lg-5">
                        <div class="banner-content">
                            <span class="text-captialize">The E-REC Difference</span>
                            <h1 class="fs-48">We Bridge the Gap Between Recruiters & Candidates</h1>
                            {{-- <span class="fw-bold fs-14 text-dark">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                                voluptua. At vero</span> --}}
                            <p class="fs-14 text-dark pt-3">
                                Hiring star team players is every company’s dream and each human resource professional’s
                                prime objective. And yet, manual hirings can only do so much. E-REC’s innovative and
                                phenomenal employee engagement dashboard is breaking borders, revolutionizing the hiring
                                process, and assisting employers and recruiters in taking control.
                            </p>
                            <ul class="fs-14 pb-lg-5 pb-3">
                                <li class='d-block w-100'>
                                    Advanced MI & AI engines
                                </li>
                                <li class='d-block w-100'>
                                    Pre-interview testing & screening
                                </li>
                                <li class='d-block w-100'>
                                    Top talents secured
                                </li>
                                <li class='d-block w-100'>
                                    Verified & validated platform
                                </li>
                                <li class='d-block w-100'>
                                    Real-time scores, assessment, and recruitment
                                </li>
                            </ul>
                            <a class="default-btn btn px-5 text-uppercase" href="{{ route('job.browse') }}"
                                style="animation-play-state: running;">Job Search</a>
                        </div>
                    </div>
                    <div class="offset-lg-1 mt-4 mt-lg-0 col-lg-6">
                        <div class="row row-cols-1 row-cols-md-2 g-0">
                            <div class="col">
                                <div class="card color-box">
                                    <div class="card-body px-4 py-5">
                                        <p class="mb-0 pb-2"><img src="{{ asset('imgs/headhunter.svg') }}" alt="headhunter"
                                                class=""></p>
                                        <span class="fs-5 fw-bold text-white">Create Preferences</span>
                                        <p class="mb-0 fs-14 text-white pt-2">
                                            Manage preferences like eligibility criteria, distance, time zones, and more to
                                            churn out the best resource from hundreds of applicants applying for the job.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card white-box">
                                    <div class="card-body px-4 py-5">
                                        <p class="mb-0 pb-2"> <img src="{{ asset('imgs/suitcase.svg') }}" alt="suitcase"
                                                class=""></p>
                                        <span class="fs-5 fw-bold">Add a Job</span>
                                        <p class="mb-0 fs-14 pt-2">
                                            Create your profile to add job roles according to the number of positions
                                            available and your company’s requirements.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card white-box radius-10-0-10-10">
                                    <div class="card-body px-4 py-5">
                                        <p class="mb-0 pb-2"> <img src="{{ asset('imgs/clock.svg') }}" alt="clock"
                                                class=""></p>
                                        <span class="fs-5 fw-bold">Get Notified</span>
                                        <p class="mb-0 fs-14 pt-2">
                                            Receive real-time updates about the candidates taking E-REC’s system-generated
                                            screening tests along with the results.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card color-box radius-0px-10-10-10px">
                                    <div class="card-body px-4 py-5">
                                        <p class="mb-0 pb-2"><img src="{{ asset('imgs/profile.svg') }}" alt="profile"
                                                class=""></p>
                                        <span class="fs-5 fw-bold text-white">Start Hiring</span>
                                        <p class="mb-0 fs-14 text-white pt-2">
                                            Recruit highly qualified talent shortlisted by our hyper-advanced algorithms and
                                            engines (candidates are shortlisted within 60 minutes of the job you post).
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-4">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 align-items-center">
                    <div class="col">
                        <img src="{{ asset('imgs/last-service.png') }}" alt="last-service" class="w-100">
                    </div>
                    <div class="col provide">
                        <span class="fs-48 fw-bold">Job Search Tips</span>
                        {{-- <p class="fs-14">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                            ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                            sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                            sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam
                            voluptua. At vero eos et accusam et justo
                            duo dolores et ea rebum. Stet
                        </p> --}}
                        <ul class="fs-14 pb-lg-5 pb-3">
                            <li class='w-100'>
                                List your strengths. Begin by creating a list of your strengths, your interests and your
                                skills.
                            </li>
                            <li class='w-100'>
                                Identify your dream job.
                            </li>
                            <li class='w-100'>
                                Write your resume.
                            </li>
                            <li class='w-100'>
                                Create a cover letter.
                            </li>
                            <li class='w-100'>
                                Define your geographic area.
                            </li>
                            <li class='w-100'>
                                Apply for multiple roles.
                            </li>
                            <li class='w-100'>
                                Practice before the interview.
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <span class="fs-48 fw-bold">Shortlisted Candidates</span>
                        <p class="fs-14">
                            Traditionally speaking with other organisations, the shortlisting stage on average, can take
                            between within 1 to 3 weeks for hiring managers to respond and, sometimes longer if there is a
                            large demand for the role or the organisation has multiple roles.
                        </p>
                        <p class="fs-14">
                            At EREC the hyper advanced algorithms and engines will shortlist candidates in no longer than 60
                            minutes for each role posted.
                        </p>
                        <p class="fs-14">
                            Generally, if the candidate is not contacted after the 1 – 3 week period, it must be considered
                            that the candidate was not selected.
                        </p>
                        <p class="fs-14">
                            EREC doesn't let the applicant wonder how their application went, we will always send through a
                            notification email, or a system generated message to the applicant’s inbox notifying the
                            outcome.
                        </p>
                        <p class="fs-14">
                            Progressing to interview will be the sole responsibility of the recruiter or the employer and
                            final decision on landing a position will be at the full discretion of the employer or the
                            recruiter handling the role.
                        </p>
                        <p class="fs-14">
                            All contracts will be managed by the recruiter or employer. No contractual information or
                            documents between the candidate and hiring manager are stored on the EREC assets such as
                            storage, file, database and web servers.
                        </p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('imgs/Shortlisted-Candidates.png') }}" alt="Shortlisted-Candidates"
                            class="w-100">
                    </div>
                </div>
            </div>
        </section>
        <section class="daily-progress">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card quote">
                            <div class="card-body">
                                <p class="fs-40 fs-sm-sizes fw-normal text-center"
                                    style='font-size: 20px;  color: #5e5454;'>
                                    Good platform and best for candidates to find a job with great and possible
                                    opportunities. Recommend and wonderful
                                </p>
                                <div class="text-center">
                                    <span class="fs-12 text-theme-primary fw-normal">
                                        {{-- THOM YORKE, MUSICIAN @ RADIOHEAD --}}
                                        Mark Shawn
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blue-box"></div>
        </section>

    </main>
@endsection
