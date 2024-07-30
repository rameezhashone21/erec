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
                    <h2 class="fw-500 text_primary fs-5 align-self-center mb-3">My Professional Details</h2>
                </div>
                {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Experience </a>
            </div> --}}
            </div>
            {{-- {{ dd($edu->course) }} --}}
            <form class="dashboard-form" method="post" action="{{ route('candidates.profession.update') }}"
                enctype="multipart/form-data">
                @csrf
                @method('post')
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3">Experience</h2>
                <div class="row gy-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="designation" class="form-label fs-14 text-theme-primary fw-bold">Designation</label>
                            <input type="text" class="form-control fs-14 h-50px" name="designation[]"
                                placeholder="Designation" value="" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name" class="form-label fs-14 text-theme-primary fw-bold">Company</label>
                            <input type="text" class="form-control fs-14 h-50px" name="company_name[]"
                                placeholder="Company" value="" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="comp_loc" class="form-label fs-14 text-theme-primary fw-bold">Company
                                Location</label>
                            <select id="role" class="form-select fs-14  h-50px" name="comp_loc">
                                <option selected disabled value="">Select Country</option>
                                <option value="USA">USA</option>
                                <option value="AUS">AUS</option>
                                <option value="UK">UK</option>
                            </select>
                            {{-- <input type="text" class="form-control fs-14 h-50px" name="comp_loc[]" value="" placeholder="Company Location" required> --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="currency" class="form-label fs-14 text-theme-primary fw-bold">Currency</label>
                            <select id="role" class="form-select fs-14  h-50px" name="currency">
                                <option selected disabled value="">Select Currency</option>
                                <option value="CAD">CAD</option>
                                <option value="AUD">AUD</option>
                                <option value="USD">USD</option>
                            </select>
                            {{-- <input type="text" class="form-control fs-14 h-50px" name="currency[]" placeholder="Currency" value="" required> --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="salary" class="form-label fs-14 text-theme-primary fw-bold">Salary</label>
                            <input type="text" class="form-control fs-14 h-50px" name="salary[]" placeholder="Salary"
                                value="" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-6"></div> -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onchange='changeToDate()' value="0"
                                        name="year_exp[]" id="currentlyWorkHere" checked>
                                    <label class="form-check-label fs-14" for="currentlyWorkHere">
                                        Currently Working Here
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="fromDate" class="form-label fs-14 text-theme-primary fw-bold">Start Date</label>
                                <input type="date" id='fromDate' class="form-control fs-14 h-50px w-60" maxlength="3"
                                    value="" name="month_exp[]">
                            </div>
                            <div class="col-md-6">
                                <label for="toDate" class="form-label fs-14 text-theme-primary fw-bold">End Date</label>
                                <input type="date" id='toDate' class="form-control fs-14 h-50px" name="year_exp[]"
                                    value="" disabled>
                            </div>
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
                            <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block"> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- @endforeach --}}

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
                <button class="btn_viewall fw-500 px-4 py-2 d-inline-block"> Save </button>
            </div>
        </div>
    </form> --}}

@endsection

@section('bottom_script')
@endsection
