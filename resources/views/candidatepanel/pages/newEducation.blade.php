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
                                <option value="PHD">PHD</option>
                                <option value="Masters">Masters</option>
                                <option value="Bachelors">Bachelors</option>
                                <option value="Undergrad">Undergrad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Course</label>
                            <select id="role" class="form-select fs-14  h-50px" name="course[]">
                                <option selected disabled value="">Choose</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Biology">Biology</option>
                                <option value="Mathematics">Mathematics</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institute" class="form-label fs-14 text-theme-primary fw-bold">Institute</label>
                            <input type="text" class="form-control fs-14 h-50px" name="institute[]" value=""
                                placeholder="Institute" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="institute_loc" class="form-label fs-14 text-theme-primary fw-bold">Institute
                                Location</label>
                            <input type="text" class="form-control fs-14 h-50px" name="institute_loc[]" value=""
                                placeholder="Institute Location" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="grade" class="form-label fs-14 text-theme-primary fw-bold">Grade</label>
                            <select id="role" class="form-select fs-14  h-50px" name="grade[]" required>
                                <option disabled selected>Choose</option>
                                <option value="HD">HD</option>
                                <option value="D">D</option>
                                <option value="C">C</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="passing_year" class="form-label fs-14 text-theme-primary fw-bold">Passing
                                Year</label>
                            <input type="date" class="form-control fs-14 h-50px" name="passing_year[]" value=""
                                placeholder="Passing Year" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description"
                                class="form-label fs-14 text-theme-primary fw-bold">*Description</label>
                            <textarea class="form-control fs-14" name="description[]" required></textarea>
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

    {{-- <form id="msform" method="POST" action="{{ route('candidate.store') }}" name="change_logo" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-5">
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row align-items-center row-cols-lg-2">
                <div class="col-lg-2">
                    <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" onchange="form_submit()" name="avatar" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                            ="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                                </div>
                                @else
                                <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload candidate avatar</h2>
                        <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <form id="msform" method="POST" action="{{ route('candidate.store') }}">
        @csrf
        <fieldset>
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row row-cols-1">
                <div class="col">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">candidate Details</h2>
                </div>
                <div class="col">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">recruiter Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->recruiter->name }}" required>
                </div>
                <div class="col">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                    <option disabled>Choose</option>
                    @foreach ($cat as $ca)
                        <option value="{{ $ca->id }}"
                            @if ($comp != null)
                                @foreach ($comp->features as $row)
                                    @if ($row->id == $ca->id)
                                        Selected
                                    @endif
                                @endforeach
                            @endif>{{ $ca->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="description" value="{{ $user->recruiter->description }}" required>
                </div>

                <div class="col">
                    <div class="form-check py-2 ">
                        <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if ($user->recruiter->terms == 1) checked @endif>
                        <label class="form-check-label text-dark fs-14" for="gridCheck">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                </label>
                        <p class="fs-14 text-grey">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                            sanctus est. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.
                        </p>
                    </div>
                </div>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input type='file' id="imageUpload" onchange="form_submit()" name="logo" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview">
                        @if ($user->avatar != null)
                        <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                        </div>
                        @else
                        <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload recruiter avatar</h2>
                <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
            </div>
            </div>
        </fieldset>
        <div class="row justify-content-center pt-5">
            <div class="col-lg-5 text-center">
                <button class="w-25 next action-button default-btn"> Save </button>
            </div>
        </div>
    </form> --}}

@endsection

@section('bottom_script')
@endsection
