@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    {{-- @if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert">
        {!! session($key ?? 'status') !!}
    </div>
    @endif --}}
    <div class="col-xl-9 col-lg-8 col-md-7">
        <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <div class="row">
                <div class="col-sm-9">
                    <h2 class="fw-500 text_primary fs-5 align-self-center">My Educational Details</h2><br>
                </div>
                {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Education </a>
            </div> --}}
            </div>
            {{-- {{ dd($edu->id) }} --}}
            <form class="dashboard-form" method="post" action="{{ route('candidates.education.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method('post')
                {{-- <input type="hidden" name="edu_id" value="{{ $edu->id }}"> --}}
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Education</label>
                            <select id="role" class="form-select fs-14  h-50px" name="education[]">
                                <option selected disabled value="">Choose</option>
                                <option value="PHD" @if ($edu->education == 'PHD') selected @endif>PHD</option>
                                <option value="Masters" @if ($edu->education == 'Masters') selected @endif>Masters</option>
                                <option value="Bachelors" @if ($edu->education == 'Bachelors') selected @endif>Bachelors
                                </option>
                                <option value="Undergrad" @if ($edu->education == 'Undergrad') selected @endif>Undergrad
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Course</label>
                            <select id="role" class="form-select fs-14  h-50px" name="course[]">
                                <option selected disabled value="">Choose</option>
                                <option value="Computer Science" @if ($edu->course == 'Computer Science') selected @endif>Computer
                                    Science</option>
                                <option value="Biology" @if ($edu->course == 'Biology') selected @endif>Biology</option>
                                <option value="Mathematics" @if ($edu->course == 'Mathematics') selected @endif>Mathematics
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institute" class="form-label fs-14 text-theme-primary fw-bold">Institute</label>
                            <input type="text" class="form-control fs-14 h-50px" name="institute[]"
                                value="{{ $edu->institute }}" placeholder="Institute" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institute_loc" class="form-label fs-14 text-theme-primary fw-bold">Institute
                                Location</label>
                            <input type="text" class="form-control fs-14 h-50px" name="institute_loc[]"
                                value="{{ $edu->institute_loc }}" placeholder="Institute Location" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passing_year" class="form-label fs-14 text-theme-primary fw-bold">Passing
                                Year</label>
                            <input type="date" class="form-control fs-14 h-50px" name="passing_year[]"
                                value="{{ $edu->passing_year }}" placeholder="Passing Year" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn_viewall px-4 py-2 d-inline-block"> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('bottom_script')
@endsection
