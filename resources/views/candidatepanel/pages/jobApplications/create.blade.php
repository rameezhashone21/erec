@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8 col-md-7">
        <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <h3 class="fw-500 text_primary fs-5 mb-5">Add New Job Application</h3>
            @if (session($key ?? 'error'))
                <div class="alert alert-danger" role="alert">
                    {!! session($key ?? 'error') !!}
                </div>
            @endif
            <form class="dashboard-form" method="post" action="{{ route('candidates.job.store') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="row gy-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="form-label fs-14 text-theme-primary fw-bold">Title</label>
                            <input type="text" class="form-control fs-14 h-50px" name="title" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Job Type</label>
                            <select class="form-control fs-14 h-50px" name="job_type" required>
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Casual">Casual</option>
                                <option value="Vacation">Vacation</option>
                                <option value="Volunteer">Volunteer</option>
                                <option value="Work Experiencr (students)">Work Experiencr (students)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="experience" class="form-label fs-14 text-theme-primary fw-bold">Experience</label>
                            <input type="text" class="form-control fs-14 h-50px" name="experience" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location" class="form-label fs-14 text-theme-primary fw-bold">Location</label>
                            <textarea class="form-control fs-14 h-50px" name="location" required></textarea>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="banner" class="form-label fs-14 text-theme-primary fw-bold">Location</label>
                        <input type="text" class="form-control fs-14 h-50px" name="location" required>
                    </div>
                </div> --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Assign Resume For this
                                Application</label>
                            <select name="resume_id" id="resume_id" class="select2-multiple form-control fs-14  h-50px"
                                required>
                                <option disabled selected>Choose</option>
                                @foreach ($user->resume as $row)
                                    <option value="{{ $row->id }}">{{ $row->document }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block"> Update </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endsection

    @section('bottom_script')
    @endsection
