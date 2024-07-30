@extends('layouts.app')

@section('content')
  <main>
    <section>
      <div class="container pt-5 mt-4">
        <h1 class="fs-48 text-center fw-bold text-uppercase my-5">Search Results</h1>
        <div class="row">
          <div class="col-lg-3">
            <form action="" method="get" class="row row-cols-1 search-area mb-3 py-4 px-3 d-block">
              <div class="col ">
                <div class="position-relative">
                  <input type="text" class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                    placeholder="Search by Name" name="name" value="">
                  <img src="{{ asset('images/icon-search.svg') }}" alt="icon-search" class="img-fluid position-absolute">

                </div>
              </div>
              <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                  <h2 class="fs-18 text-theme-primary fw-bold mb-0">Experience</h2>
                  <a href="javascript:void(0)">
                    <a data-bs-toggle="collapse" href="#Experience" role="button" aria-expanded="false"
                      aria-controls="Experience" id="collapseButtonOne" class="collapsed">
                      <i class="fas fa-plus" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="collapse" id="Experience">
                  <div class="card card-body border-0  rounded-0">
                    <ul>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="6 Months" type="checkbox" name="experience"
                            id="jt1">
                          <label class="form-check-label" for="jt1">
                            6 Months
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="1+ Year" type="checkbox" name="experience"
                            id="jt2">
                          <label class="form-check-label" for="jt2">
                            1+ Year
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="2+ Years" type="checkbox" name="experience"
                            id="jt3">
                          <label class="form-check-label" for="jt3">
                            2+ Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="3+ Years" type="checkbox" name="experience"
                            id="jt4">
                          <label class="form-check-label" for="jt4">
                            3+ Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="4+ Years" type="checkbox" name="experience"
                            id="jt5">
                          <label class="form-check-label" for="jt5">
                            4+ Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="5+ Years" type="checkbox" name="experience"
                            id="jt6">
                          <label class="form-check-label" for="jt6">
                            5+ Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="6+ Years" type="checkbox" name="experience"
                            id="jt7">
                          <label class="form-check-label" for="jt7">
                            6+ Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                      <li class="d-flex justify-content-between align-items-center border-top border-bottom-dash py-2">
                        <div class="form-check">
                          <input class="form-check-input" value="More than 10 Years" type="checkbox" name="experience"
                            id="jt8">
                          <label class="form-check-label" for="jt8">
                            More than 10 Years
                          </label>
                        </div>
                        <span>
                        </span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <button class="login-btn default-btn btn w-100">
                <i class="fas fa-filter" aria-hidden="true"></i>
                Click here-Filter Search
              </button>
              <div class="mt-2 text-end">
                <a href="javascript:void(0)" class="fs-14" id="resetCand">
                  Reset<i class="fas fa-sync ms-2"></i>
                </a>
              </div>
            </form>
          </div>
          <div class="col-lg-9">
            <div class="row align-items-center justify-content-between gy-3 mb-4">
              <div class="col-lg-4">
                <h3 class="view_profile_description fs-16 mb-0">
                  Showing Results
                </h3>
              </div>
              <div class="col-lg-7">
                <form action="" method="get">
                  <div class="d-flex justify-content-end">
                    <div class="me-3">
                      <select id="role" name="sort_by" class="sort_input form-select">
                        <option selected="" value="">All</option>
                        <option value="1">
                          Last 24 hours</option>
                        <option value="3">
                          Last 3 Days</option>
                        <option value="7">
                          Last 7 Days</option>
                        <option value="14">
                          Last 14 Days</option>
                        <option value="30">
                          Last 30 Days</option>
                      </select>
                    </div>
                    <div>
                      <select id="role" name="per_page" class="sort_input form-select">
                        <option value="10" selected="">10
                          Per Page</option>
                        <option value="25">25
                          Per Page</option>
                        <option value="50">
                          50
                          Per Page</option>
                        <option value="100">
                          100
                          Per Page</option>
                      </select>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row row-cols-lg-3 gy-lg-5 gy-4">
              <div class="col">
                <div class="new_candidate_box ">
                  <a href="" class="">
                    <img src="http://127.0.0.1:8000/images/profile-img.png" alt="profile-img"
                      class="profile img-fluid">
                  </a>
                  <div class="content">
                    <div class="user__info">
                      <h3 class="title">
                        <a href="" class="">Adria</a>
                      </h3>
                      <p class="designation">
                        Candidate
                      </p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="" class="d-flex aling-items-center button">
                        <span>
                          View Profile
                        </span>
                        <span>
                          <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" width="16.997" height="9.916"
                            viewBox="0 0 16.997 9.916">
                            <path id="Path_3242" data-name="Path 3242"
                              d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                              transform="translate(6.831 -10.123)" fill="#007ba7" fill-rule="evenodd"></path>
                            <path id="Path_3243" data-name="Path 3243"
                              d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                              transform="translate(-5.625 -12.625)" fill="#007ba7" fill-rule="evenodd"></path>
                          </svg>
                        </span>
                      </a>
                      <a href="#" class="d-flex aling-items-center button">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95"
                            viewBox="0 0 14.95 14.95">
                            <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                              d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                              transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="1.2"></path>
                          </svg>
                        </span>
                        <span>
                          Message
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="new_candidate_box ">
                  <a href="" class="">
                    <img src="http://127.0.0.1:8000/images/profile-img.png" alt="profile-img"
                      class="profile img-fluid">
                  </a>
                  <div class="content">
                    <div class="user__info">
                      <h3 class="title">
                        <a href="" class="">Adria</a>
                      </h3>
                      <p class="designation">
                        Recruiter
                      </p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="" class="d-flex aling-items-center button">
                        <span>
                          View Profile
                        </span>
                        <span>
                          <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" width="16.997" height="9.916"
                            viewBox="0 0 16.997 9.916">
                            <path id="Path_3242" data-name="Path 3242"
                              d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                              transform="translate(6.831 -10.123)" fill="#007ba7" fill-rule="evenodd"></path>
                            <path id="Path_3243" data-name="Path 3243"
                              d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                              transform="translate(-5.625 -12.625)" fill="#007ba7" fill-rule="evenodd"></path>
                          </svg>
                        </span>
                      </a>
                      <a href="#" class="d-flex aling-items-center button">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95"
                            viewBox="0 0 14.95 14.95">
                            <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                              d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                              transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="1.2"></path>
                          </svg>
                        </span>
                        <span>
                          Message
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="new_candidate_box ">
                  <a href="" class="">
                    <img src="http://127.0.0.1:8000/images/profile-img.png" alt="profile-img"
                      class="profile img-fluid">
                  </a>
                  <div class="content">
                    <div class="user__info">
                      <h3 class="title">
                        <a href="" class="">Adria</a>
                      </h3>
                      <p class="designation">
                        Employer
                      </p>
                    </div>
                    <div class="d-flex justify-content-between">
                      <a href="" class="d-flex aling-items-center button">
                        <span>
                          View Profile
                        </span>
                        <span>
                          <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" width="16.997" height="9.916"
                            viewBox="0 0 16.997 9.916">
                            <path id="Path_3242" data-name="Path 3242"
                              d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                              transform="translate(6.831 -10.123)" fill="#007ba7" fill-rule="evenodd"></path>
                            <path id="Path_3243" data-name="Path 3243"
                              d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                              transform="translate(-5.625 -12.625)" fill="#007ba7" fill-rule="evenodd"></path>
                          </svg>
                        </span>
                      </a>
                      <a href="#" class="d-flex aling-items-center button">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95"
                            viewBox="0 0 14.95 14.95">
                            <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                              d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                              transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="1.2"></path>
                          </svg>
                        </span>
                        <span>
                          Message
                        </span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="pt-5"></div>
    <div id="content" class="container">
      <div class="panel panel-default">
        <div class="panel-body">
          @if ($cand != null || $comp != null || $rec != null)
            <h1 class="nomargin">
              Results For: "{{ $request }}"
            </h1>
            <hr class="nomargin-bottom margin-top-10">
            <!-- SEARCH RESULTS -->

            @foreach ($cand as $row)
              <div class="clearfix search-result">
                <!-- item -->
                <h4><a href="{{ route('candidate.detail', $row->slug) }}"
                    >{{ $row->first_name . ' ' . $row->last_name }}</a></h4>
                <small class="text-danger">(Candidate)</small>
                <p>{{ $row->head_line }}</p>
              </div><!-- /item -->
            @endforeach

            @foreach ($comp as $row)
              <div class="clearfix search-result">
                <!-- item -->
                <h4><a href="{{ route('job.details', $row->slug) }}" >{{ $row->name }}</a>
                </h4>
                <small class="text-danger">(Employer)</small>
                <p>{{ $row->description }}</p>
              </div><!-- /item -->
            @endforeach

            @foreach ($rec as $row)
              <div class="clearfix search-result">
                <!-- item -->
                <h4><a href="{{ route('recruiter.detail', $row->slug) }}" >{{ $row->name }}</a>
                  (Recruiter)
                </h4>
                <small class="text-danger">(Recruiter)</small>
                <p>{{ $row->description }}</p>
              </div><!-- /item -->
            @endforeach

            <!-- PAGINATION -->
            {{-- <div class="text-center margin-top-20">
                    <ul class="pagination">
                        <li class="disabled"><a href="#">Previous</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div> --}}
            <!-- /PAGINATION -->
          @else
            <h1 class="nomargin">
              No Results Found For: "{{ $request }}"
            </h1>
          @endif
        </div>
      </div>

    </div>

  @endsection
