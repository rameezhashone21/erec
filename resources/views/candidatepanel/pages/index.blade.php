@extends('candidatepanel.layout.app') @section('page_title', 'E-Rec')

@section('content')

  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
      {{-- <h2 class="fw-500 text_primary fs-5 mb-4">My Progress</h2> --}}
      <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-sm-2 row-cols-1 gy-xl-0 gy-3">
        <a href="{{ route('candidates.job.index') }}">
          <div class="col">
            <div class="progress_card p-4 first_div">
              <h3 class="text-white fw-bold">Applications Sent</h3>
              <h4 class="text-white fs-1 fw-bold">{{ count($apps) }}</h4>
            </div>
          </div>
        </a>
        <a href="{{ route('candidates.cvList') }}">
          <div class="col">
            <div class="progress_card p-4 second_div">
              <h3 class="text-white fw-bold">My Documents</h3>
              <h4 class="text-white fs-1 fw-bold">{{ count($docs) }}</h4>
            </div>
          </div>
        </a>
        <a href="{{ route('candidates.saved.jobs') }}">
          <div class="col">
            <div class="progress_card p-4 third_div">
              <h3 class="text-white fw-bold">Save Jobs</h3>
              <h4 class="text-white fs-1 fw-bold">{{ count(auth()->user()->wishlistCount) }}</h4>
            </div>
          </div>
        </a>
      </div>
      <div class="d-flex aling-items-center my-3">
        <h2 class="fw-500 text_primary fs-5 align-self-center">Recent Jobs</h2>
        <a href="{{ route('job.browse') }}" class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">View all</a>
      </div>
      <div class="px-2">
        @if (count($post) > 0)
          @foreach ($post as $row)
            <div class="theme_box_2 p-4 mb-4 recentlyPostedJobsContent">
              <div class="row align-items-center">
                <div class="col-md-2 text-center">
                  <img src="{{ asset('storage/' . $row->banner) }}" alt="" class="candidate_thumb rounded-50">
                </div>
                <div class="col-md-7">
                  <a href="{{ route('job.listing.details', $row->slug) }}"><span
                      class="title fw-bold text-dark">{{ $row->post }}</span></a>
                  <p class="fs-14 mb-4 mt-2">
                    {!! \Illuminate\Support\Str::limit($row->description, 200, $end = '...') !!}
                  </p>

                </div>
                <div class="col-md-3">
                  {{-- <a href="" class="btn_box_2 px-4 py-3 fs-14 d-inline-block w-100 text-center">Save
                                    for
                                    later</a> --}}
                  {{-- @if (auth()->check() && auth()->user()->candidate != null)
                                        @if (auth()->user()->role == 'user')
                                            @if ($row->jobApp != '[]')
                                                <button
                                                    class="btn_box_1 px-4 py-2 fs-14 d-inline-block mb-3 w-100 text-center"
                                                    disabled style="opacity: 0.5; pointer-events: none;">Applied</button>
                                                </p>
                                            @endif
                                        @endif
                                    @else
                                        <a class="btn default-btn mb-3" href="{{ route('login') }}">Apply
                                            Now</a>
                                    @endif --}}
                  @if (auth()->check() && auth()->user()->candidate != null)
                    @if (auth()->user()->role == 'user')
                      @if ($row->jobApp == '[]')
                        <a class="btn_box_1 px-xl-4 open-apply-modal px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center"
                          id="{{ $row->id }}" href="javascript:;">Apply
                          Now</a>
                      @else
                        <button disabled="" style="opacity: 0.5;"
                          class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center" id="18"
                          href="javascript:;">Applied</button>
                      @endif
                    @endif
                  @elseif (auth()->user()->role == 'company' && auth()->user()->role == 'rec')
                    <a class="btn default-btn  mb-3" href="{{ route('job.session') }}">Apply
                      Now</a>
                  @endif

                  <a href="{{ route('job.listing.details', $row->slug) }}"
                    class="btn_box_1 px-xl-4 px-2 py-2 fs-14 d-inline-block mb-3 w-100 text-center">View
                    Details</a>
                </div>
                <div class="col-md-10 offset-md-2">
                  <ul class="d-flex flex-md-row flex-column align-items-lg-center " style="gap:14px;">
                    <li class=" fs-14">
                      <i class="fa-solid fa-calendar me-2 text_grey_999"></i>
                      <span>
                        {{-- {{ $row->expiry_date }} --}}
                        {{ \Carbon\Carbon::parse($row->expiry_date)->isoFormat('DD MMM YYYY') }}
                      </span>
                    </li>
                    <li class=" fs-14 d-flex aling-items-center">
                      <i class="fa-solid fa-location-dot me-2 d-inline-block align-self-center text_grey_999"></i>
                      <span class="shortName d-inline-block">
                        {{-- {{ $row->location }} --}}
                        <a href="https://www.google.com/maps/place/{{ $row->location }}" target="_blank">
                          {{ $row->location }}
                        </a>
                        {{-- {{ 'https://www.google.com/maps/place/' . $row->location }} --}}
                      </span>
                    </li>
                    <li class=" fs-14 d-flex align-items-center">
                      <span class="me-2">Posted by :</span>
                      {{-- <span class="me-2"><img src="{{ asset('dashboard/images/round_img.png') }}"
                                                    alt="" class="rounded-50 rounded_img_xxm"></span> --}}
                      <span class="text_primary">
                        @if ($row->recruiter != null)
                          {{-- @if ($row->rec_id != 0) --}}
                          <a
                            href="{{ route('recruiter.detail', $row->recruiter->slug) }}">{{ $row->recruiter->name }}</a>
                        @elseif ($row->company != null)
                          {{-- @elseif ($row->comp_id != 0) --}}
                          <a href="{{ route('job.details', $row->company->slug) }}">{{ $row->company->name }}</a>
                        @endif

                        {{-- @if ($row->recruiter != null)
                                                    @if ($row->recruiter != null)
                                                        {{ $row->recruiter->name }}
                                                    @elseif ($row->company != null)

                                                    @elseif ($row->company != null)
                                                        {{ $row->company->name }}
                                                    @endif --}}
                      </span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
          <div class="text-center mt-5">
            <a href="#" class="btn_viewall fw-500 px-4 py-2" id="loadMore">Load
              More</a>
          </div>
        @else
          <p>Currently no job available that matches your skills</p>
        @endif
        {{-- <div class="theme_box_2 p-4 mb-4">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="width_10per width_lg_20per width_md_100per">
                            <img src="{{ asset('dashboard/images/side_bar_auth.png') }}" alt=""
                                class="candidate_thumb rounded-50">
                        </div>
                        <div class="width_70per width_md_100per width_lg_80per pe-xl-5 ps-xl-3">
                            <h3 class="fs-5 fw-600">
                                Autumn 2017 Graduate Opportunities
                            </h3>
                            <p class="fs-14 text_grey_999 mb-4 mt-2">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                et justo duo dolores et ea rebum.
                            </p>
                            <ul class="d-flex flex-lg-row flex-column align-items-lg-center justify-content-lg-between">
                                <li class="text_grey_999 fs-14">
                                    <i class="fa-solid fa-calendar me-2"></i>
                                    <span>20 Jan 2022</span>
                                </li>
                                <li class="text_grey_999 fs-14">
                                    <i class="fa-solid fa-location-dot me-2"></i>
                                    <span>UAE</span>
                                </li>
                                <li class="text_grey_999 fs-14 d-flex align-items-center">
                                    <span class="me-2">Posted by :</span>
                                    <span class="me-2"><img src="{{ asset('dashboard/images/round_img.png') }}"
                                            alt="" class="rounded-50 rounded_img_xxm"></span>
                                    <span class="text_primary">Sam Brunt</span>
                                </li>
                            </ul>
                        </div>
                        <div class="width_md_100per d-flex align-items-end flex-column mt-4 mt-xl-0">
                            <a href=""
                                class="btn_box_1 px-4 py-3 fs-14 d-inline-block mb-3 w-100 text-center">Apply Now</a>
                            <a href="" class="btn_box_2 px-4 py-3 fs-14 d-inline-block w-100 text-center">Save for
                                later</a>
                        </div>
                    </div>
                </div>
                <div class="theme_box_2 p-4 mb-4">
                    <div class="d-flex flex-wrap justify-content-center">
                        <div class="width_10per width_lg_20per width_md_100per">
                            <img src="{{ asset('dashboard/images/side_bar_auth.png') }}" alt=""
                                class="candidate_thumb rounded-50">
                        </div>
                        <div class="width_70per width_md_100per width_lg_80per pe-xl-5 ps-xl-3">
                            <h3 class="fs-5 fw-600">
                                Autumn 2017 Graduate Opportunities
                            </h3>
                            <p class="fs-14 text_grey_999 mb-4 mt-2">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                                et justo duo dolores et ea rebum.
                            </p>
                            <ul class="d-flex flex-lg-row flex-column align-items-lg-center justify-content-lg-between">
                                <li class="text_grey_999 fs-14">
                                    <i class="fa-solid fa-calendar me-2"></i>
                                    <span>20 Jan 2022</span>
                                </li>
                                <li class="text_grey_999 fs-14">
                                    <i class="fa-solid fa-location-dot me-2"></i>
                                    <span>UAE</span>
                                </li>
                                <li class="text_grey_999 fs-14 d-flex align-items-center">
                                    <span class="me-2">Posted by :</span>
                                    <span class="me-2"><img src="{{ asset('dashboard/images/round_img.png') }}"
                                            alt="" class="rounded-50 rounded_img_xxm"></span>
                                    <span class="text_primary">Sam Brunt</span>
                                </li>
                            </ul>
                        </div>
                        <div class="width_md_100per d-flex align-items-end flex-column mt-4 mt-xl-0">
                            <a href=""
                                class="btn_box_1 px-4 py-3 fs-14 d-inline-block mb-3 w-100 text-center">Apply Now</a>
                            <a href="" class="btn_box_2 px-4 py-3 fs-14 d-inline-block w-100 text-center">Save for
                                later</a>
                        </div>
                    </div>
                </div> --}}
      </div>
    </div>
  </div>

@endsection
@section('bottom_script')
  <script>
    $(document).ready(function() {
      let content = $(".recentlyPostedJobsContent");
      if (content.length <= 4) {
        $("#loadMore").hide();
      }
      $(".recentlyPostedJobsContent").slice(0, 4).show();
      $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".recentlyPostedJobsContent:hidden").slice(0, 4).slideDown();
        if ($(".recentlyPostedJobsContent:hidden").length == 0) {
          $("#loadMore").hide();
        }
      });
    })
  </script>
@endsection
