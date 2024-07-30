<main>
    <section>
        <div class="container">
            <div class="row justify-content-center  py-lg-5 py-3 mt-5">
                <div class="col-lg-10">
                    <div class="row pb-lg-5 pb-3 align-items-center">
                        <div class="col-lg-2">
                            @if ($cand->user->avatar != null)
                                <img src="{{ asset('public/storage/' . $cand->user->avatar) }}" alt="profile-img"
                                    class="candidate_profile_picture">
                            @else
                                <img src="{{ asset('images/profile-img.svg') }}" alt="profile-img"
                                    class="candidate_profile_picture">
                            @endif
                            {{-- <img src="{{ asset('images/company.svg') }}" alt="company" class="img-fluid"> --}}
                        </div>
                        <div class="col-lg-9 details">
                            <span class="title text-theme-primary fw-bold">{{ $cand->first_name }}
                                {{ $cand->last_name }}</span>
                            <p class="fs-14 mb-0">{{ $cand->head_line }}</p>
                            @if (isset($cand->user->candidatePro) && count($cand->user->candidatePro) > 0)
                                <p class="fs-14 mb-0">{{ $cand->user->candidatePro->first()->designation }}</p>
                            @endif
                            <div class="rate">
                                <div class="rating">
                                    <a href="javascript:void 0;" class="ps-2 text-decoration-underline fs-12">4 Reviews</a>
                                    <input type="radio" name="rating" value="1" id="1"><label
                                        for="1">☆</label>
                                    <input type="radio" name="rating" value="2" id="2"><label
                                        for="2">☆</label>
                                    <input type="radio" name="rating" value="3" id="3"><label
                                        for="3">☆</label>
                                    <input type="radio" name="rating" value="4" id="4"><label
                                        for="4">☆</label>
                                    <input type="radio" name="rating" value="5" id="5"><label
                                        for="5">☆</label>
                                    <span class="fs-17 fw-600 pe-2">4.0</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <h4 class="fs-18 fw-600 pb-lg-4 pb-3">About Company</h4>
                <p class="fs-14 text-secondary pb-3">{{ $comp->description }}</p>

                @if ($comp->whatWeDo != null)
                <h4 class="fs-18 fw-600 pb-lg-4 pb-3">What We Do</h4>
                <p class="fs-14 text-secondary pb-3">{{ $comp->whatWeDo }}</p>
                @endif

                @if ($comp->mission != null)    
                <h4 class="fs-18 fw-600 pb-lg-4 pb-3">Mission & Vision</h4>
                <p class="fs-14 text-secondary">{{ $comp->mission }}</p>
                @endif --}}

                    {{-- <h4 class="fs-18 fw-600 pb-lg-4 pb-3">Skills</h4> --}}
                    <h2 class="text-theme-primary fs-18 fw-600 pb-lg-4 pb-3">Skills</h2>

                    <div class="row row-cols-1 row-cols-lg-3 services">
                        @foreach ($cand->user->skills as $skill)
                            <div class="col">
                                <div class="card shadow">
                                    <div class="card-body ps-lg-5 py-4 ">
                                        {{ $skill->name }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-5">
                        <h2 class="text-theme-primary fs-18 fw-600 pb-lg-4 pb-3">Educational Details</h2>
                        @foreach ($cand->user->candidateEdu as $edu)
                            <ul class="pt-4 fs-18 ">
                                <li class="row">
                                    {{-- <div class="col-lg-4">
                                <p class="fw-600">{{ $edu->education }}</p>
                            </div> --}}
                                    <div class="col-lg-3">
                                        <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->education }}</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->institute }}</a>
                                    </div>
                                    <div class="col-lg-3">
                                        <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->passing_year }}</a>
                                    </div>
                                </li>
                                {{-- <li class="row">
                            <div class="col-lg-4">
                                <p class="fw-600">Course</p>
                            </div>
                            <div class="col-lg-8">
                                <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->course }}</a>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-lg-4">
                                <p class="fw-600">Institute</p>
                            </div>
                            <div class="col-lg-8">
                                <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->institute }}</a>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-lg-4">
                                <p class="fw-600">Passing Year</p>
                            </div>
                            <div class="col-lg-8">
                                <a href="javascript:void 0;" class="text-theme-primary">{{ $edu->passing_year }}</a>
                            </div>
                        </li> --}}
                                <hr class="style14">
                            </ul>
                        @endforeach
                    </div>

                    <div class="mb-5">
                        <h2 class="text-theme-primary fs-18 fw-600 pb-lg-4 pb-3">Professional Details</h2>
                        @foreach ($cand->user->candidatePro as $pro)
                            <div class="card p-2 m-2 b-2 px-5">
                                <ul class="pt-4 fs-18 ">
                                    <li class="row">
                                        <div class="col-lg-4">
                                            <p class="fw-600">Company</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <a href="javascript:void 0;" class="text-theme-primary">{{ $pro->company_name }}</a>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-lg-4">
                                            <p class="fw-600">Designation</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <a href="javascript:void 0;" class="text-theme-primary">{{ $pro->designation }}</a>
                                        </div>
                                    </li>
                                    <li class="row">
                                        <div class="col-lg-4">
                                            <p class="fw-600">Experience</p>
                                        </div>
                                        <div class="col-lg-8">
                                            <a href="javascript:void 0;" class="text-theme-primary">
                                                @if (date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y years, %m months') < 1)
                                                    {{ date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%m months') }}
                                                @elseif (date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y years, %m months') < 2)
                                                    {{ date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y year, %m months') }}
                                                @else
                                                    {{ date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y years, %m months') }}
                                                @endif
                                            </a>
                                            <?php
                                            // $sum = 0;
                                            // $exp = date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y years, %m months');
                                            // $sum = $sum + $exp;
                                            // echo $exp;
                                            // dd(date_diff(date_create($pro->month_exp), date_create($pro->year_exp))->format('%y years, %m months'));
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            {{-- <hr class="style14"> --}}
                        @endforeach
                    </div>

                    {{-- <h3 class="mb-0 fs-3 fw-bold px-2 py-5 text-theme-primary ">Jobs at Accounts ABC</h3>
                <div class="card horizontal-view py-3 mb-3">
                    <div class="card-body row align-items-center">
                        <div class="col-lg-2">
                            <img src="{{ asset('images/bag.svg') }}" alt="profile-img" class="candidate_profile_picture">
                        </div>
                        <div class="col-lg-7">
                            <div class="details">
                                <span class="title fw-bold text-theme-primary">Accountant</span>
                                <ul>
                                    <li class="d-lg-flex pt-3">
                                        <div>Name </div>
                                        <div class="">Laiza Actub</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Job Type </div>
                                        <div class="">Full Time</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Skills </div>
                                        <div class="">
                                            <span id="pointer-alt">HTML</span>
                                            <span id="pointer-alt">CSS</span>
                                            <span id="pointer-alt">JS</span>
                                        </div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Experience </div>
                                        <div class="">3 Year</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Location </div>
                                        <div class="">Lorem ipsum dolor sit amet, consetetur </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="btns d-flex flex-column">
                                <button class="btn default-btn mb-3">Hire Now</button>
                                <button class="btn default-btn-2">View Resume</button>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="javascript:void 0;"><img src="{{ asset('images/share.svg') }}" alt="" class="img-fluid"></a>
                                    <a href="javascript:void 0;"><img src="{{ asset('images/mail.svg') }}" alt="" class="img-fluid"></a>
                                    <a href="javascript:void 0;"><img src="{{ asset('images/wishlist.svg') }}" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card horizontal-view py-3 mb-3">
                    <div class="card-body row align-items-center">
                        <div class="col-lg-2">
                            <img src="{{ asset('images/bag.svg') }}" alt="profile-img" class="candidate_profile_picture">
                        </div>
                        <div class="col-lg-7">
                            <div class="details">
                                <span class="title fw-bold text-theme-primary">Accountant</span>
                                <ul>
                                    <li class="d-lg-flex">
                                        <div>Name </div>
                                        <div class="">Laiza Actub</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Job Type </div>
                                        <div class="">Full Time</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Skills </div>
                                        <div class="">
                                            <span id="pointer-alt">HTML</span>
                                            <span id="pointer-alt">CSS</span>
                                            <span id="pointer-alt">JS</span>
                                        </div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Experience </div>
                                        <div class="">3 Year</div>
                                    </li>
                                    <li class="d-lg-flex">
                                        <div>Location </div>
                                        <div class="">Lorem ipsum dolor sit amet, consetetur </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="btns d-flex flex-column">
                                <button class="btn default-btn mb-3">Hire Now</button>
                                <button class="btn default-btn-2">View Resume</button>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="javascript:void 0;"><img src="{{ asset('images/share.svg') }}" alt="" class="img-fluid"></a>
                                    <a href="javascript:void 0;"><img src="{{ asset('images/mail.svg') }}" alt="" class="img-fluid"></a>
                                    <a href="javascript:void 0;"><img src="{{ asset('images/wishlist.svg') }}" alt="" class="img-fluid"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center mb-0 py-4">
                    <a href="javascript:void 0;" class="btn default-btn ">View All</a>
                </p> --}}

                </div>
                {{-- <div class="col-lg-4">
                <button class="btn default-btn w-100 mb-3">Follow</button>

                <div class="search-area mb-3 p-4 mb-3">
                    <h2 class="fs-5 text-dark fw-bold pb-3">Companies In Similar Industries</h2>
                    <ul>
                        <li class="d-flex justify-content-between align-items-center pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <a href="javascript:void 0;" class="fs-6 text-grey">Show more similar companies <img src="{{ asset('images/down-arrow.svg') }}" class="img-fluid" alt="down-arrow"></a>
                        </li>
                    </ul>
                </div>

                <div class="search-area mb-3 p-4 mb-3">
                    <h2 class="fs-5 text-dark fw-bold pb-3">People Also Viewed</h2>
                    <ul>
                        <li class="d-flex justify-content-between align-items-center pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                        <li class="d-flex justify-content-between align-items-center pt-2 pb-4">
                            <img src="{{ asset('images/bag.svg') }}" alt="bag" class="img-fluid">
                            <div class="text-center">
                                <p class="mb-0 fw-bold"> RTC1 Services</p>
                                <p class=" mb-0 text-theme-primary fs-14 "> Software Industry</p>
                            </div>
                            <button class="btn default-btn ">Follow</button>
                        </li>
                    </ul>
                </div>
            </div> --}}
            </div>
        </div>
    </section>

</main>