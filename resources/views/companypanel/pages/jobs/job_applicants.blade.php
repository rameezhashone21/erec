@extends('companypanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endsection

<style>
    /* HTML: <div class="loader"></div> */
    .loader_shortlisted {
          width: 50px;
          aspect-ratio: 1;
          border-radius: 50%;
          padding: 6px;
          background:
            conic-gradient(from 135deg at top,currentColor 90deg, #0000 0) 0 calc(50% - 4px)/17px 8.5px,
            radial-gradient(farthest-side at bottom left,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) top right/50%  50% content-box content-box,
            radial-gradient(farthest-side at top        ,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) bottom   /100% 50% content-box content-box;
          background-repeat: no-repeat;
          animation: l11 1s infinite linear;
        }
        @keyframes l11{ 
          100%{transform: rotate(1turn)}
        }
        .loader_shortlisted_container {
            background-color: #00000059;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
      
        }  
    </style>

@section('content')
 
  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="d-flex aling-items-center mb-3">
        <h2 class="fw-500 text_primary fs-5 align-self-center">Job Post Details</h2>
      </div>
     @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
      <ul class='row row-cols-md-4 row-cols-1 g-0 job_detail_links'>
        <li class='col'>
          <a href="{{ route('company.job.details', $post->slug) }}"
            @if (Route::is('company.job.details', $post->slug)) class="active" @endif>Job Detail</a>
        </li>
        <li class='col'>
          <a href="{{ route('company.job.applicants', $post->slug) }}"
            @if (Route::is('company.job.applicants', $post->slug) || Route::is('company.job.applicantsById', $post->slug)) class="active" @endif>Applicants</a>
        </li>
        <li class='col'>
          <a href="{{ route('company.job.shortlisted', $post->slug) }}"
            @if (Route::is('company.job.shortlisted', $post->slug)) class="active" @endif>Shortlisted</a>
        </li>
        <li class='col'>
          <a href="{{ route('company.exam.result', $post->slug) }}"
            @if (Route::is('company.exam.result', $post->slug)) class="active" @endif>Exam Results</a>
        </li>
      </ul>
      <!-- Grade Filter Dropdown -->
    <div class="mb-3">
        <input id="post_id" type="hidden" name="post" value="{{$post->id}}">
        <label for="grade-filter">Filter by Grade:</label>
        <select id="grade-filter" class="form-control">
            <option value="All">All Grades</option>
            <option value="Pass">Pass</option>
            <option value="Fail">Fail</option>
            <option value="Average">Average</option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div id="shortlisted_loader" class='loader_shortlisted_container d-none justify-content-center align-items-center'> 
            <div class='loader_shortlisted'> </div> 
    </div>
      <div class="table table-border table-responsive">
        <table id="example1" class="table table-striped table-payment display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Candidate Name</th>
              <th>Candidate Docs</th>
              <th>Cover Letter</th>
              <th>Assigned Test</th>
              <th>Percentage</th>
              <th>Grade</th>
              <th>Action</th>
              <th>Notify Candidate</th>
            </tr>
          </thead>
          <tbody id="candidate-table-body">
            @if (count($post->jobAppRecComp) > 0)
              @foreach ($post->jobAppRecComp as $key => $row)
                @if ($row->candidate != null)
                @if($row->result)
                @if($row->result->grade == "C")
                  <tr >
                    <td>{{ ++$key }}. </td>
                    <td>
                      <a href="{{ route('candidate.detail', $row->candidate->slug) }}" style="color: #000;">
                        {{ $row->candidate->first_name }}
                        {{ $row->candidate->last_name }}
                      </a>
                    </td>
                    <td>
                      @if ($row->candidateDocument != null)
                        <a href="{{ asset('candidateDoc/doc/' . $row->candidateDocument->document) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                    </td>
                    <td>
                      @if ($row->coverLetterFile != null)
                        <a href="{{ asset('storage/' . $row->coverLetterFile) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark mb-3'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                      @if ($row->coverLetter != null)
                        <button type="button" class="btn btn_viewall" data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop">
                          Click to view
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cover Letter
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{ $row->coverLetter }}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if ($row->coverLetter == null && $row->coverLetterFile == null)
                        No Record Found...
                      @endif
                    </td>
                    <td id="td_id{{ $row->id }}">
                      {{-- @if ($row->status == 0)
                                                <select name="assign_test" onchange="assign_test({{ $row->id }})"
                                                    id="assign_test{{ $row->id }}"
                                                    class="select2-multiple form-control fs-14  h-50px" required>
                                                    <option selected disabled value="">Select Test</option>
                                                    @foreach ($row->test($row->class_id) as $col)
                                                        <option value="{{ $col['number'] }}">{{ $col['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif ($row->status == 5)
                                                <p>Rejected</p>
                                            @elseif ($row->status == 2)
                                                <p>Hired</p>
                                            @else --}}
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                        <p>{{ $row->qst($row->qst_id)['exam_title'] }}
                        </p>
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="td_id{{ $row->id }}">
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                          @if ($row->result)
                            {{ $row->result->perentage }}%
                          @else
                            Not Attempted
                          @endif
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="gradeTr-{{ $row->id }}">
                      @if ($row->result)
                        <p class="orange_badge status_badge">
                          {{$row->result->grade}}</p>
                      @endif
                      </td>

                    <td id="hireTr-{{ $row->id }}">
                      @if ($row->status == 2)
                        <p class="text-center p-2">
                          Hired</p>
                      @elseif ($row->status == 5)
                        <p class="text-center p-2">
                          Rejected</p>
                      @else
                        @if ($row->status == 1)
                          <p class="text-center p-2">ShortListed</p>
                        @elseif ($row->status == 0)
                          <p onclick="shortCandidate({{ $row->id }})" class="btn btn_viewall text-center p-2">
                            Shortlist</p>
                        @endif
                      @endif
                      {{-- @if ($row->status == 0)
                                                <a href="javascript:void 0;" id="blue_shortlist{{ $row->id }}"
                                class="btn-sm mt-2"><i class="fa-solid fa-exclamation"></i> Task Not
                                Assigned Yet.</a>
                                @elseif($row->status == 1)
                                <p class="btn btn-success btn-sm"><i class="fa fa-check" id="green_shortlist{{ $row->id }}"
                                        style="font-size:18px"></i>
                                    Shortlist</p>
                                @endif() --}}
                    </td>
                    <td>
                    @if($row->result->notified == 0)
                    <form action="{{ route('candidate.notify', ['id' => $row->result->id]) }}" method="post" style="width:100%; display:flex; align-items:center;">
                        @csrf
                        <button type="submit" class="btn_theme border-0 fs-12 py-2 d-inline-block w-100"> Notify Candidate </button>
                        </a>
                    </form>
                    @else
                        Notified
                    @endif
                    </td>
                  </tr>
                @elseif($row->result->grade == "A" || $row->result->grade == "B")
                  <tr>
                    <td>{{ ++$key }}. </td>
                    <td>
                      <a href="{{ route('candidate.detail', $row->candidate->slug) }}" style="color: #000;">
                        {{ $row->candidate->first_name }}
                        {{ $row->candidate->last_name }}
                      </a>
                    </td>
                    <td>
                      {{-- {{ dd($row->candidateDocument) }} --}}
                      @if ($row->candidateDocument != null)
                        <a href="{{ asset('candidateDoc/doc/' . $row->candidateDocument->document) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                    </td>
                    <td>
                      @if ($row->coverLetterFile != null)
                        <a href="{{ asset('storage/' . $row->coverLetterFile) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark mb-3'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                      @if ($row->coverLetter != null)
                        <button type="button" class="btn btn_viewall" data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop">
                          Click to view
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cover Letter
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{ $row->coverLetter }}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if ($row->coverLetter == null && $row->coverLetterFile == null)
                        No Record Found...
                      @endif
                    </td>
                    <td id="td_id{{ $row->id }}">
                      {{-- @if ($row->status == 0)
                                                <select name="assign_test" onchange="assign_test({{ $row->id }})"
                                                    id="assign_test{{ $row->id }}"
                                                    class="select2-multiple form-control fs-14  h-50px" required>
                                                    <option selected disabled value="">Select Test</option>
                                                    @foreach ($row->test($row->class_id) as $col)
                                                        <option value="{{ $col['number'] }}">{{ $col['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif ($row->status == 2)
                                                <p>Hired</p>
                                            @else --}}
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                        <p>{{ $row->qst($row->qst_id)['exam_title'] }}
                        </p>
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="td_id{{ $row->id }}">
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                          @if ($row->result)
                            {{ $row->result->perentage }}%
                          @else
                            Not Attempted
                          @endif
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="gradeTr-{{ $row->id }}">
                      @if ($row->result)
                        <p class="green_badge status_badge">
                          {{$row->result->grade}}</p>
                      @endif
                      </td>

                      <td id="hireTr-{{ $row->id }}">
                      @if ($row->status == 2)
                        <p class="text-center p-2">
                          Hired</p>
                      @elseif ($row->status == 5)
                        <p class="text-center p-2">
                          Rejected</p>
                      @else
                        @if ($row->status == 1)
                          <p class="text-center p-2">ShortListed</p>
                        @elseif ($row->status == 0)
                          <p onclick="shortCandidate({{ $row->id }})" class="btn btn_viewall text-center p-2">
                            Shortlist</p>
                        @endif
                      @endif
                      {{-- @if ($row->status == 0)
                                                <a href="javascript:void 0;" id="blue_shortlist{{ $row->id }}"
                                class="btn-sm mt-2"><i class="fa-solid fa-exclamation"></i> Task Not
                                Assigned Yet.</a>
                                @elseif($row->status == 1)
                                <p class="btn btn-success btn-sm"><i class="fa fa-check" id="green_shortlist{{ $row->id }}"
                                        style="font-size:18px"></i>
                                    Shortlist</p>
                                @endif() --}}
                    </td>
                    <td>
                    @if($row->result->notified == 0)
                    <form action="{{ route('candidate.notify', ['id' => $row->result->id]) }}" method="post" style="width:100%; display:flex; align-items:center;">
                        @csrf
                        <button type="submit" class="btn_theme border-0 fs-12 py-2 d-inline-block w-100"> Notify Candidate </button>
                        </a>
                    </form>
                    @else
                        Notified
                    @endif
                    </td>
                  </tr>
                @elseif($row->result->grade == "F")
                  <tr>
                    <td>{{ ++$key }}. </td>
                    <td>
                      <a href="{{ route('candidate.detail', $row->candidate->slug) }}" style="color: #000;">
                        {{ $row->candidate->first_name }}
                        {{ $row->candidate->last_name }}
                      </a>
                    </td>
                    <td>
                      {{-- {{ dd($row->candidateDocument) }} --}}
                      @if ($row->candidateDocument != null)
                        <a href="{{ asset('candidateDoc/doc/' . $row->candidateDocument->document) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                    </td>
                    <td>
                      @if ($row->coverLetterFile != null)
                        <a href="{{ asset('storage/' . $row->coverLetterFile) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark mb-3'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                      @if ($row->coverLetter != null)
                        <button type="button" class="btn btn_viewall" data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop">
                          Click to view
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cover Letter
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{ $row->coverLetter }}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if ($row->coverLetter == null && $row->coverLetterFile == null)
                        No Record Found...
                      @endif
                    </td>
                    <td id="td_id{{ $row->id }}">
                      {{-- @if ($row->status == 0)
                                                <select name="assign_test" onchange="assign_test({{ $row->id }})"
                                                    id="assign_test{{ $row->id }}"
                                                    class="select2-multiple form-control fs-14  h-50px" required>
                                                    <option selected disabled value="">Select Test</option>
                                                    @foreach ($row->test($row->class_id) as $col)
                                                        <option value="{{ $col['number'] }}">{{ $col['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif ($row->status == 2)
                                                <p>Hired</p>
                                            @else --}}
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                        <p>{{ $row->qst($row->qst_id)['exam_title'] }}
                        </p>
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="td_id{{ $row->id }}">
                      {{-- {{ dd($row->qst_id) }} --}}
                      @if ($row->qst_id != '0')
                          @if ($row->result)
                            {{ $row->result->perentage }}%
                          @else
                            Not Attempted
                          @endif
                      @endif
                      {{-- @endif --}}
                    </td>

                    <td id="gradeTr-{{ $row->id }}">
                      @if ($row->result)
                        <p class="red_badge status_badge">
                          {{$row->result->grade}}</p>
                      @endif
                      </td>

                    <td id="hireTr-{{ $row->id }}">
                      @if ($row->status == 2)
                        <p class="btn btn_viewall text-center p-2">
                          Hired</p>
                      @else
                        @if ($row->status == 1)
                          <p onclick="hideCandidate({{ $row->id }})" id="buttonHire({{ $row->id }})"
                            class="btn btn_viewall text-center p-2">
                            Hire</p>
                        @elseif ($row->status == 0)
                          <p onclick="shortCandidate({{ $row->id }})" class="btn btn_viewall text-center p-2">
                            Shortlist</p>
                        @endif
                      @endif
                      {{-- @if ($row->status == 0)
                                                <a href="javascript:void 0;" id="blue_shortlist{{ $row->id }}"
                                class="btn-sm mt-2"><i class="fa-solid fa-exclamation"></i> Task Not
                                Assigned Yet.</a>
                                @elseif($row->status == 1)
                                <p class="btn btn-success btn-sm"><i class="fa fa-check" id="green_shortlist{{ $row->id }}"
                                        style="font-size:18px"></i>
                                    Shortlist</p>
                                @endif() --}}
                    </td>
                    <td>
                    @if($row->result->notified == 0)
                    <form action="{{ route('candidate.notify', ['id' => $row->result->id]) }}" method="post" style="width:100%; display:flex; align-items:center;">
                        @csrf
                        <button type="submit" class="btn_theme border-0 fs-12 py-2 d-inline-block w-100"> Notify Candidate </button>
                        </a>
                    </form>
                    @else
                        Notified
                    @endif
                    </td>
                  </tr>
                @endif
                @else
                <tr>
                    <td>{{ ++$key }}. </td>
                    <td>
                      <a href="{{ route('candidate.detail', $row->candidate->slug) }}" style="color: #000;">
                        {{ $row->candidate->first_name }}
                        {{ $row->candidate->last_name }}
                      </a>
                    </td>
                    <td>
                      {{-- {{ dd($row->candidateDocument) }} --}}
                      @if ($row->candidateDocument != null)
                        <a href="{{ asset('candidateDoc/doc/' . $row->candidateDocument->document) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                    </td>
                    <td>
                      @if ($row->coverLetterFile != null)
                        <a href="{{ asset('storage/' . $row->coverLetterFile) }}" target="_blank"
                          class='text-decoration-underline d-flex text-dark mb-3'>
                          <svg xmlns="http://www.w3.org/2000/svg" width="27.5" height="27.5" viewBox="0 0 27.5 27.5">
                            <g id="document-pdf" transform="translate(-2.25 -2.25)">
                              <path id="Path_3217" data-name="Path 3217"
                                d="M32.893,19.964V18H27v9.821h1.964V23.893h2.946V21.929H28.964V19.964Z"
                                transform="translate(-3.143 -2)" fill="#8b91a7" />
                              <path id="Path_3218" data-name="Path 3218"
                                d="M20.8,27.821H16.875V18H20.8a2.949,2.949,0,0,1,2.946,2.946v3.929A2.949,2.949,0,0,1,20.8,27.821Zm-1.964-1.964H20.8a.983.983,0,0,0,.982-.982V20.946a.983.983,0,0,0-.982-.982H18.839Z"
                                transform="translate(-1.857 -2)" fill="#8b91a7" />
                              <path id="Path_3219" data-name="Path 3219"
                                d="M11.661,18H6.75v9.821H8.714V24.875h2.946a1.967,1.967,0,0,0,1.964-1.964V19.964A1.966,1.966,0,0,0,11.661,18ZM8.714,22.911V19.964h2.946v2.946Z"
                                transform="translate(-0.571 -2)" fill="#8b91a7" />
                              <path id="Path_3220" data-name="Path 3220"
                                d="M21.893,14.036V10.107A.894.894,0,0,0,21.6,9.42L14.724,2.545a.893.893,0,0,0-.688-.3H4.214A1.97,1.97,0,0,0,2.25,4.214V27.786A1.964,1.964,0,0,0,4.214,29.75H19.929V27.786H4.214V4.214h7.857v5.893a1.97,1.97,0,0,0,1.964,1.964h5.893v1.964Zm-7.857-3.929v-5.5l5.5,5.5Z"
                                transform="translate(0)" fill="#8b91a7" />
                            </g>
                          </svg>
                          <span class='align-self-end ms-1'>
                            Click to view
                            {{-- <a class='px-4 py-2 progress_card d-block rounded-3'
                                                        href="{{ asset('public/candidateDoc/doc/' . $item->document) }}"
                                                    target="_blank"> --}}
                          </span>
                        </a>
                      @endif
                      @if ($row->coverLetter != null)
                        <button type="button" class="btn btn_viewall" data-bs-toggle="modal"
                          data-bs-target="#staticBackdrop">
                          Click to view
                        </button>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                          tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cover Letter
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                {{ $row->coverLetter }}
                              </div>
                            </div>
                          </div>
                        </div>
                      @endif
                      @if ($row->coverLetter == null && $row->coverLetterFile == null)
                        No Recordss Found...
                      @endif
                    </td>
                    <td id="td_id{{ $row->id }}">
                      {{-- @if ($row->status == 0)
                                                <select name="assign_test" onchange="assign_test({{ $row->id }})"
                                                    id="assign_test{{ $row->id }}"
                                                    class="select2-multiple form-control fs-14  h-50px" required>
                                                    <option selected disabled value="">Select Test</option>
                                                    @foreach ($row->test($row->class_id) as $col)
                                                        <option value="{{ $col['number'] }}">{{ $col['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            @elseif($row->status == 5)
                                                <p>Rejected</p>
                                            @elseif($row->status == 2)
                                                <p>Hired</p>
                                            @else --}}
                      @if ($row->qst_id != '0')
                        <p>{{ $row->qst($row->qst_id)['exam_title'] }}
                        </p>
                      @endif
                    </td>

                    <td>
                      <p>N/A</p>
                    </td>

                    <td>
                      <p>N/A</p>
                    </td>

                    <td>
                      <p>N/A</p>
                    </td>
                    
                    <td>
                      <p>N/A</p>
                    </td>
                    
                  </tr>
                @endif
                @endif
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection


@section('bottom_script')
  <script>
    function assign_test(id) {
      let timerInterval
      Swal.fire({
        title: 'Test asigning is inprogress',
        html: '',
        allowOutsideClick: false,

      })
      Swal.showLoading()
      console.log(id);
      var selectedId = document.getElementById("assign_test" + id).value;
      console.log(selectedId);
      url = "{{ route('company.job.assign') }}";
      $.ajax({
          type: 'GET',
          url: url,
          data: {
            'id': id,
            'selectedId': selectedId,
          },
          crossDomain: true,
          // success: function(data) {
          //     console.log(data);
          // }
        }).done(function(data) {
          swal.close();
          console.log(data);
          // if(data == 1)
          // {
          //     $('#blue_shortlist'+id).hide();
          $('#green_shortlist' + id).show();
          $('#td_id' + id).html('');
          $('#td_id' + id).html(data);
          // $('#td_shortlist' + id).html('');
          // $('#td_shortlist' + id).html(
          //     '<p class="btn btn-success btn-sm"><i class="fa fa-check" style = "font-size:18px"></i> Shortlist</p> '
          // );
          successModal("You successfully assigned a test...");
          // }
          // else
          // {

          // }
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);

        });
    }

    function hideCandidate(value) {
      var url = '{{ route('hire.candidate.comp', ':id') }}';
      url = url.replace(':id', value);
      $.ajax({
        type: 'GET',
        url: url,
        crossDomain: true,
        success: function(data) {
          console.log(data);
        }
      }).done(function() {

        $('#hireTr-' + value).html('');
        var html = "";
        html += "<p class='btn btn_viewall text-center p-2 disabled' disabled>Hired</p>";
        $('#hireTr-' + value).html(html);
        // console.log('#td_id' + value);
        $('#td_id' + value).html('');
        $('#td_id' + value).html('Hired');
        successModal("Hired...");
      });
    }

    function shortCandidate(value) {
      var element = document.getElementById('shortlisted_loader');
      element.classList.remove('d-none');
      element.classList.add('d-flex');
      var url = '{{ route('shortlist.candidate.comp', ':id') }}';
      url = url.replace(':id', value);
      $.ajax({
        type: 'GET',
        url: url,
        crossDomain: true,
        success: function(data) {
          console.log(data);
        }
      }).done(function() {
        var element = document.getElementById('shortlisted_loader');
        element.classList.add('d-none');
        element.classList.remove('d-flex');
        $('#hireTr-' + value).html('');
        var html = "";
        html += "<p class='text-center p-2 disabled' disabled>Shortlisted</p>";
        $('#hireTr-' + value).html(html);
        // console.log('#td_id' + value);
        $('#td_id' + value).html('');
        $('#td_id' + value).html('Shortlisted');
        successModal("Shortlisted...");
      });
    }
  </script>
  
<script>
$(document).ready(function() {
    $('#grade-filter').on('change', function() {
        let selectedGrade = $(this).val();
        let post_id = $('#post_id').val();
        
        console.log(selectedGrade);
        
        $.ajax({
            url: "{{ route('candidates.filter') }}", // Define a new route for filtering
            type: "post",
            data: { 
                grade: selectedGrade,
                job_id: post_id,
                _token: '{{ csrf_token() }}' // Include CSRF token
            },
            success: function(data) {
                console.log(data);
                $('#candidate-table-body').html(data);
            }
        });
    });
});
</script>

@endsection
