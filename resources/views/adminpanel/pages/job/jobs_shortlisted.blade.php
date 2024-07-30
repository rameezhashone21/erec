@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-flex aling-items-center mb-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center">Job Post Details</h2>
            </div>
            <ul class='row row-cols-md-4 row-cols-1 g-0 job_detail_links'>
                <li class='col'>
                    <a href="{{ route('admin.jobDetails', $post->slug) }}"
                        @if (Route::is('admin.jobDetails', $post->slug)) class="active" @endif>Job Detail</a>
                </li>
                <li class='col'>
                    <a href="{{ route('admin.job.applicants', $post->slug) }}"
                        @if (Route::is('admin.job.applicants', $post->slug)) class="active" @endif>Applicants</a>
                </li>
                <li class='col'>
                    <a href="{{ route('admin.job.shortlisted', $post->slug) }}"
                        @if (Route::is('admin.job.shortlisted', $post->slug)) class="active" @endif>Shortlisted</a>
                </li>
                <li class='col'>
                    <a href="{{ route('admin.exam.result', $post->slug) }}"
                        @if (Route::is('admin.exam.result', $post->slug)) class="active" @endif>Exam Results</a>
                </li>
            </ul>
            <div class="table table-border table-responsive">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. #</th>
                            <th>Candidate Name</th>
                            <th>Candidate Docs</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($job))
                            @if (count($job->jobAppRecComp) > 0)
                                @foreach ($job->jobAppRecComp as $key => $row)
                                    <tr>
                                        <td>{{ ++$key }}. </td>
                                        <td>{{ $row->candidate->first_name }} {{ $row->candidate->last_name }}</td>
                                        <td>

                                            @if ($row->candidateDocument != null)
                                                @if ($row->candidateDocument->document != null)
                                                    <a href="{{ asset('public/candidateDoc/doc/' . $row->candidateDocument->document) }}"
                                                        target="_blank" class='text-decoration-underline d-flex text-dark'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27.5"
                                                            height="27.5" viewBox="0 0 27.5 27.5">
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
                                            @else
                                                Candidate has removed their Resume
                                            @endif
                                        </td>
                                        <td>
                                            <p class="btn btn-success btn-sm ">
                                                {{-- <i class="fa fa-check" id=""style="font-size:18px"></i> --}}
                                                Shortlisted</p>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('bottom_script')
@endsection
