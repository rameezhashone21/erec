@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    <div class="dashboard_content bg-white rounded_10 p-4 card">
        <div class="mb-3">
            <a href="{{ route('admin.job') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
            <h2 class="fw-500 text_primary fs-5 align-self-center">Job Post Details</h2>
        </div>
        <ul class='row row-cols-md-4 row-cols-1 g-0 job_detail_links mb-3'>
            <li class='col'>
                <a href="{{ route('admin.jobDetails', $job->slug) }}"
                    @if (Route::is('admin.jobDetails', $job->slug)) class="active" @endif>Job Detail</a>
            </li>
            <li class='col'>
                <a href="{{ route('admin.job.applicants', $job->slug) }}"
                    @if (Route::is('admin.job.applicants', $job->slug)) class="active" @endif>Applicants</a>
            </li>
            <li class='col'>
                <a href="{{ route('admin.job.shortlisted', $job->slug) }}"
                    @if (Route::is('admin.job.shortlisted', $job->slug)) class="active" @endif>Shortlisted</a>
            </li>
            <li class='col'>
                <a href="{{ route('admin.exam.result', $job->slug) }}"
                    @if (Route::is('admin.exam.result', $job->slug)) class="active" @endif>Exam Results</a>
            </li>
        </ul>
        <h2 class='job-title'>Job Title</h2>
        <h3 class='job-name mb-3'>{{ $job->post }}</h3>
        <img src="{{ asset('public/storage/' . $job->banner) }}" alt="" class="job-detail-banner">
        <h3 class='fw-500 fs-5 mt-3'>Job Description</h3>
        <p class="fs-14 text_grey_999">
            @if ($job->description != null)
                {!! $job->description !!}
            @else
                Null
            @endif
        </p>
        <h3 class='fw-500 fs-5 mt-3'>Key Responsibility</h3>
        <p class="fs-14 text_grey_999">
            @if ($job->key_responsibility != null)
                {!! $job->key_responsibility !!}
            @else
                Null
            @endif
        </p>
        <h3 class='fw-500 fs-5 mt-3'>Skills & Experience</h3>
        <p class="fs-14 text_grey_999">
            @if ($job->skill_exp != null)
                {!! $job->skill_exp !!}
            @else
                Null
            @endif
        </p>
        <div class="my-4">
            <ul class='row '>
                <li class='col'>
                    <h3 class='fw-500 fs-5 mb-1'>Job Category</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($job->getSingleClass($job->class_id) == null)
                            Class Not Assigned
                        @else
                            {{ $job->getSingleClass($job->class_id)['class_name'] }}
                        @endif
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Job Type</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->job_type }}
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Experience</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->experience }}
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Gender</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->gender }}
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Salary</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->offer_salary }}
                    </p>
                </li>
                @if ($job->comp_id != null)
                    <li class='col-md-4 mb-4'>
                        <h3 class='fw-500 fs-5 mb-1'>Company Name</h3>
                        <p class="fs-14 text_grey_999">
                            {{ $job->company->name ?? 'company has been deleted...' }}
                        </p>
                    </li>
                @endif
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Valid Till</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->expiry_date }}
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Location</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->location }}
                    </p>
                </li>

                {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-500 fs-5 mb-1'>Key Responsibility</h3>
                        <p class="fs-14 text_grey_999">
                            {!! $job->key_responsibility !!}
                        </p>
                    </li> --}}
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Qualification</h3>
                    <p class="fs-14 text_grey_999">
                        {{ $job->qualification }}
                    </p>
                </li>
                {{-- <li class='col-md-4 mb-4'>
                        <h3 class='fw-500 fs-5 mb-1'>Skills & Experience</h3>
                        <p class="fs-14 text_grey_999">
                            {!! $job->skill_exp !!}
                        </p>
                    </li> --}}
            </ul>
        </div>
        <h3 class='fw-500 fs-5 mb-1'>Skills</h3>
        <ul class='tags'>
            @foreach ($job->skills as $row)
                <li class="d-inline-block">
                    <a href="javascript:void 0;">{{ $row->name }}</a>
                </li>
            @endforeach
            {{-- <li class="d-inline-block">
                    <a href="">Laravel</a>
                </li>
                <li class="d-inline-block">
                    <a href="">Laravel</a>
                </li> --}}
        </ul>
        <h3 class='fw-500 fs-5 mt-4'>Change Job Status</h3>
        <form id="changeForm">
            @csrf
            <input type="hidden" name="post_id" value="{{ $job->id }}">
            <select name="status" id="changeStatus" class="form-select">
                <option value="1" @if ($job->status == 1) selected @endif>Active</option>
                <option value="5" @if ($job->status == 5) selected @endif>Inactive</option>
            </select>
        </form>
    </div>
@endsection

@section('bottom_script')
    <script>
        $(document).ready(function(e) {
            $("#changeStatus").on('change', function() {
                var url = '{{ route('admin.jobPostStatus') }}';
                var userFormData = $('#changeForm').serialize();
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: userFormData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    // console.log(data.data);
                    successModal(data.data);
                    // $('#changeForm').removeClass('focus');
                });
            });
        });
    </script>
@endsection
