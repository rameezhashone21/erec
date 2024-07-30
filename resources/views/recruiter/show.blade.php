@extends('layouts.app')
<style>
  .rounded_img_xxm {
    width: 20px;
    height: 20px;
  }

  .candidate_thumb {
    width: 80px;
    height: 80px;
  }

  .theme_box_2 {
    background: #fff;
    filter: drop-shadow(0px 3px 10px rgba(120, 120, 120, 0.25));
    border-top: 2px solid var(--color-primary);
    border-radius: 2px;
    border-radius: 1rem;
  }

  /*========= MEDIA QUERIES===========*/
  @media (max-width: 991.98px) {
    .university_thumb {
      width: 50px;
      height: 50px;
    }
  }
</style>
@section('content')
  <div class="pt__banner"></div>
  <section class="position-relative">
    @if ($rec->user->banner != null)
      <img src="{{ asset('public/storage/' . $rec->user->banner) }}" alt="profile-img" class="w-100 banner__image"
        id="imagePreview">
    @else
      <img src="{{ asset('dashboard/images/Recruiter.png') }}" alt="" class="w-100 banner__image">
    @endif
  </section>
  <main class="margin-top-minus-all position-relative" style="z-index: 2">
    <div class="container">
      @if (Auth::check())
        @if (auth()->user()->role != 'admin')
          <p class="fs-14">
            <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
            <span>> Recruiter Detail</span>
          </p>
        @endif
      @endif
      <div class="row gy-4 gy-lg-0">
        <div class="col-lg-3 sidebar_container">
          <div class="side_bar bg-white position-relative rounded_10 side_bar_top view_profile_box pb-4">
            <img src="{{ asset('dashboard/images/side_bar_top.png') }}" alt="" class="img-fluid w-100">
            <div class="text-center">
              <div class="view_profile_image">
                @if ($rec->avatar != null)
                  {{-- @if (file_exists(asset('public/storage/' . $rec->avatar)))
                                        <img class="" src="{{ asset('public/storage/' . $rec->avatar) }}"
                                            alt="">
                                    @else
                                        <img class="" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                            alt="">
                                    @endif --}}
                  <img class="" src="{{ asset('public/storage/' . $rec->avatar) }}" alt="">
                @else
                  <img class="" src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                @endif
                {{-- <img src="{{ asset('images/banner-placeholder.png') }}" alt=""
                                    class=""> --}}
              </div>
              <h3 class="view_profile_name">
                {{ $rec->name . ' ' . $rec->lastName }}
              </h3>

              <p class="mb-0 px-3 fs-14">{{ $rec->tagline }}</p>
            </div>
            <div>
              <p class="mb-2 px-3 fs-14 text-center fw-bolder">Recruiter</p>
            </div>
            <div class="mt-4 px-3">
              <h3 class="view_profile_txt">Contact Details</h3>
            </div>
            <ul class="side_bar_menu view_profile_sidebar px-3" id="side_bar_view">
              <li>
                <a href="javascript:;" class="d-flex align-items-center">
                  <span>
                    @if (Auth::check())
                      @if (auth()->user()->role == 'company')
                        @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id) != null)
                          @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id)->status == 1)
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23" viewBox="0 0 19.182 23">
                              <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(1 1)">
                                <path id="Path_3207" data-name="Path 3207"
                                  d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                  transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="2" />
                                <path id="Path_3208" data-name="Path 3208"
                                  d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                  transform="translate(-7.159 -4.313)" fill="none" stroke="#92929d"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                              </g>
                            </svg>
                  </span>

                  <span>{{ $rec->address }}</span>
                  @endif
                  @endif
                  @endif
                @else
                  {{-- <span>ph******</span> --}}
                  <span style="font-size: 10px; color: transparent; text-shadow: 0 0 8px #000"
                    ;>{{ $rec->address }}</span>
                  @endif

                </a>
              </li>
              @if (Auth::check())
                @if (auth()->user()->role == 'company')
                  @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id) != null)
                    @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id)->status == 1)
                      @if ($rec->country_code != null)
                        <li>
                          <a href="javascript:;" class="d-flex align-items-center">
                            <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="18.405" height="18.398"
                                viewBox="0 0 18.405 18.398">
                                <path id="phone"
                                  d="M19.647,21.773h-.12C5.621,20.974,3.647,9.241,3.371,5.661A2.123,2.123,0,0,1,5.324,3.375h3.9a1.415,1.415,0,0,1,1.317.891l1.075,2.647A1.415,1.415,0,0,1,11.3,8.442L9.8,9.963a6.63,6.63,0,0,0,5.364,5.378L16.7,13.82a1.415,1.415,0,0,1,1.535-.29L20.9,14.6a1.415,1.415,0,0,1,.871,1.316v3.736A2.123,2.123,0,0,1,19.647,21.773ZM5.494,4.79a.708.708,0,0,0-.708.708v.057c.326,4.189,2.413,14.1,14.818,14.8a.708.708,0,0,0,.75-.665V15.914l-2.668-1.069-2.031,2.017-.34-.043C9.16,16.048,8.325,9.892,8.325,9.828l-.043-.34,2.01-2.031L9.23,4.79Z"
                                  transform="translate(-3.364 -3.375)" fill="#92929d" />
                              </svg>
                            </span>
                            {{-- <span>
                      {{ $rec->country_code . ' ' . $rec->phone }}
                    </span> --}}

                            <span>{{ $rec->country_code . ' ' . $rec->phone }}</span>

                            {{-- <span>ph******</span> --}}
                            <span>
                              {{ \Illuminate\Support\Str::limit($rec->country_code . ' ' . $rec->phone, 6, $end = '****') }}
                            </span>
                      @endif

                      </a>
                      </li>
                    @endif
                  @endif
                @endif
              @endif
              <li>
                <a href="javascript:;" class="d-flex align-items-center">
                  <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                      <g id="ic_date" transform="translate(0 -0.388)">
                        <path id="Shape"
                          d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,1,1,0-2H8.2a1,1,0,1,1,0,2Z"
                          transform="translate(0 0.388)" fill="#92929d" />
                      </g>
                    </svg>
                  </span>
                  <span>Joined
                    {{ \Carbon\Carbon::parse($rec->created_at)->formatLocalized('%b %Y') }}</span>
                </a>
              </li>
              {{-- <li>
                                <a href="javascript:;" class="d-flex align-items-center">
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
                                <a href="javascript:;" class="d-flex align-items-center">
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
                            </li> --}}
            </ul>
            <div class="py-3">
              <ul class="d-flex justify-content-around ">
                <li class="text-center">
                  <p class="mb-0 view_profile_des2 h-50px">Jobs<br>Posted</p>
                  <p class="mb-0 view_profile_des3">{{ $posted_jobs }}</p>
                </li>
                <li class="text-center ">
                  <p class="mb-0 view_profile_des2 h-50px">Recuited</p>
                  <p class="mb-0 view_profile_des3">{{ $recruited }}</p>
                </li>
                <li class="text-center ">
                  <p class="mb-0 view_profile_des2 h-50px">Employer<br>connected</p>
                  <p class="mb-0 view_profile_des3">{{ $comp_count }}</p>
                </li>
              </ul>
            </div>
            {{-- <div class="border-top d-flex justify-content-around view_profile_socials pt-3 mt-4 px-3">
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
                        </div> --}}
          </div>
        </div>
        <div class="col-lg-6">
          <div class="view_profile_box content_area p-4">
            <div class="border-bottom pb-4">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="view_profile_name my-0">About Me</h2>
                <div>
                  @if (Auth::check())
                    {{-- {{ dd() }} --}}
                    @if (auth()->user()->role == 'company')
                      @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id) != null)
                        @if ($rec->CompRecRelation(auth()->user()->company->id, $rec->id)->status == 1)
                          {{-- <form action="{{ route('delRelation', $rec->id, auth()->user()->company->id) }}" method="post"> --}}
                          {{-- <input type="hidden" name="rec_id" value="{{ $rec->id }}">
                                                      <input type="hidden" name="comp_id" value="{{ auth()->user()->company->id }}"> --}}
                          <a href="{{ route('delRelation', [$rec->id, auth()->user()->company->id]) }}"
                            class="btn default-btn text-center btn-disabled"
                            style="padding: 6px 24px, font-size: 14px;">
                            <i class="fas fa-user-plus me-1"></i> Unfollow</a> 
                          {{-- </form> --}}
                        @else
                          <button type="button" class="btn default-btn text-center btn-disabled" disabled
                            style="padding: 6px 24px, font-size: 14px;"><i class="fas fa-user-plus me-1"></i> Request
                            Sent
                          </button>
                        @endif
                      @else
                        <a href="{{ route('company.recruiters.send', $rec->id) }}" class="btn default-btn text-center"
                          style="padding: 6px 24px, font-size: 14px;"><i class="fas fa-user-plus me-1"></i> Connect</a>
                      @endif
                    @else
                      {{-- <a href="{{ route('login') }}" class="btn default-btn text-center"
                                                style="padding: 6px 24px, font-size: 14px;">Connect</a> --}}
                    @endif
                  @endif
                </div>
              </div>
              <p>
                {!! $rec->description !!}
              </p>
            </div>
            @if (isset($rec->features) && count($rec->features) > 0)
              <div class="border-bottom pb-4">
                <h2 class="view_profile_name mb-3">Skills</h2>
                <ul class="tags d-flex aling-items-center flex-wrap">
                  @foreach ($rec->features as $row)
                    <li>
                      {{ $row->name }}
                    </li>
                  @endforeach
                </ul>
              </div>
            @endif
            @if (count($post) > 0)
              <div id="recentjobs">
                <h2 class="view_profile_name my-4">Recently Posted Jobs</h2>
                @foreach ($post as $row)
                  <a href="{{ route('job.listing.details', $row->slug) }}" class="recentlyPostedJobsContent">
                    <div class="theme_box_2 p-3 mb-4">
                      <div>
                        <div class="d-flex mb-3">
                          <div class="me-3">
                            @if ($row->banner != null)
                              <img src="{{ asset('public/storage/' . $row->banner) }}" alt=""
                                class="candidate_thumb rounded-50">
                            @else
                              <img src="{{ asset('images/profile-img.svg') }}" alt=""
                                class="candidate_thumb rounded-50">
                            @endif
                          </div>
                          <div>
                            <p class="view_profile_destination mb-1">{{ $row->post }}</p>
                            <h4 class="view_profile_description">{!! \Illuminate\Support\Str::limit($row->description, 150, $end = '...') !!}</h4>
                          </div>
                        </div>
                        <ul
                          class="d-flex flex-column flex-wrap flex-lg-row align-items-lg-center justify-content-center profile_view_info"
                          style='gap: 16px'>
                          <li class="d-flex align-items-center">
                            <svg id="ic_date" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              viewBox="0 0 20 20">
                              <path id="Shape"
                                d="M17,20H3a3,3,0,0,1-3-3V3.7A1.9,1.9,0,0,1,1.9,1.8H4.5V1a1,1,0,0,1,2,0v.8h7.9V1a1,1,0,0,1,2,0v.8h1.7A1.9,1.9,0,0,1,20,3.7V17A3,3,0,0,1,17,20ZM2,7.4V17a1,1,0,0,0,1,1H17a1,1,0,0,0,1-1V7.4ZM2,3.8V5.4H18V3.8H16.4a1,1,0,0,1-1.991,0H6.5A1,1,0,0,1,4.5,3.8Zm9.8,10.8H4.6a1,1,0,0,1,0-2h7.2a1,1,0,0,1,0,2ZM8.2,11H4.6a1,1,0,0,1,0-2H8.2a1,1,0,1,1,0,2Z"
                                fill="#92929d"></path>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($row->created_at)->isoFormat('DD MMM YYYY') }}</span>
                          </li>
                          <li class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19.182" height="23"
                              viewBox="0 0 19.182 23">
                              <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin" transform="translate(1 1)">
                                <path id="Path_3207" data-name="Path 3207"
                                  d="M21.682,10.091c0,6.682-8.591,12.409-8.591,12.409S4.5,16.773,4.5,10.091a8.591,8.591,0,1,1,17.182,0Z"
                                  transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                <path id="Path_3208" data-name="Path 3208"
                                  d="M18,12.75a2.25,2.25,0,1,1-2.25-2.25A2.25,2.25,0,0,1,18,12.75Z"
                                  transform="translate(-7.159 -4.313)" fill="none" stroke="#92929d"
                                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                              </g>
                            </svg>
                            <span class="shortName" style="width: 70px;">{{ $row->location }}</span>
                          </li>
                          <li class="d-flex align-items-center">
                            <span>Posted by :</span>
                            @if ($row->comp_id != 0)
                              <span>
                                <img src="{{ asset('public/storage/' . $row->company->logo) }}" alt=""
                                  class="rounded-50 rounded_img_xxm">
                              </span>
                              <span class="text_primary">{{ $row->company->name }}</span>
                            @else
                              <span class="text_primary">{{ $row->recruiter->name }}</span>
                            @endif
                          </li>
                        </ul>
                      </div>
                    </div>
                  </a>
                @endforeach
              </div>
              <div class="text-center mt-5">
                <a href="#" class="view_profile_button px-5" id="loadMore">Load
                  More</a>
              </div>
            @else
              <div id="recentjobs">
                <h2 class="view_profile_name my-4">Recently Posted Jobs</h2>
                <p>No Jobs Found</p>
              </div>
            @endif

            {{-- <h2 class="view_profile_name my-3">Education</h2>
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
                                <h4 class="view_profile_company">Grade: A+</h4>
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
                                <h4 class="view_profile_company">Grade: A+</h4>
                                <p class="view_profile_description">
                                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                    invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...
                                </p>
                            </li>
                        </ul> --}}
          </div>
        </div>
        <div class="col-lg-3 ">
          <div class="view_profile_box p-3">
            <h2 class="view_profile_name mb-3" style="color: #333;">Other Recruiters</h2>
            <ul class="views_others_box_list">
              @foreach ($similar as $row)
                <li>
                  <a href="{{ route('recruiter.detail', $row->slug) }}"
                    class="views_others_box d-flex align-items-center">
                    <div class="view_profile_candidates">
                      @if ($row->avatar != null)
                        <img class="" src="{{ asset('public/storage/' . $row->avatar) }}" alt="">
                      @else
                        <img class="" src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                      @endif
                      {{-- <img src="{{ asset('images/banner-placeholder.png') }}"
                                                alt="" class=""> --}}
                    </div>
                    <div>
                      <h4 class="shortName" style="width: 100px;">{{ $row->name }}</h4>
                      {{-- <h5>UX Designer</h5> --}}
                    </div>
                  </a>
                </li>
              @endforeach
            </ul>
            <a href="{{ route('recruiter.list') }}" class="view_profile_button d-block text-center mt-4">View
              all</a>
          </div>
        </div>
      </div>
    </div>
  </main>
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
