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
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger alert-dismissible">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible">
                        {{ session('error') }}
                    </div>
                @endif
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
                                placeholder="Designation" value="{{ $pro->designation }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name" class="form-label fs-14 text-theme-primary fw-bold">Company</label>
                            <input type="text" class="form-control fs-14 h-50px" name="company_name[]"
                                placeholder="Company" value="{{ $pro->company_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="comp_loc" class="form-label fs-14 text-theme-primary fw-bold">Company
                                Location</label>
                            <select id="role" class="form-select fs-14  h-50px" name="comp_loc">
                                <option disabled>Select Country</option>
                                <option value="USA" @if ($pro->comp_loc == 'USA') selected @endif>USA</option>
                                <option value="AUS" @if ($pro->comp_loc == 'AUS') selected @endif>AUS</option>
                                <option value="UK" @if ($pro->comp_loc == 'UK') selected @endif>UK</option>
                            </select>
                            {{-- <input type="text" class="form-control fs-14 h-50px" name="comp_loc[]" value="" placeholder="Company Location" required> --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="currency" class="form-label fs-14 text-theme-primary fw-bold">Currency</label>
                            <select id="role" class="form-select fs-14  h-50px" name="currency">
                                <option disabled>Select Currency</option>
                                <option value="CAD" @if ($pro->currency == 'CAD') selected @endif>CAD</option>
                                <option value="AUD" @if ($pro->currency == 'AUD') selected @endif>AUD</option>
                                <option value="USD" @if ($pro->currency == 'USD') selected @endif>USD</option>
                            </select>
                            {{-- <input type="text" class="form-control fs-14 h-50px" name="currency[]" placeholder="Currency" value="" required> --}}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="salary" class="form-label fs-14 text-theme-primary fw-bold">Salary</label>
                            <input type="text" class="form-control fs-14 h-50px" name="salary[]" placeholder="Salary"
                                value="{{ $pro->salary }}" required>
                        </div>
                    </div>
                    <!-- <div class="col-md-6"></div> -->
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onchange='changeToDate()' value=""
                                        id="currentlyWorkHere" @if ($pro->year_exp == 0) checked @endif>
                                    <label class="form-check-label fs-14" for="currentlyWorkHere">
                                        Currently Working Here
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="fromDate" class="form-label fs-14 text-theme-primary fw-bold">Start Date</label>
                                <input type="date" id='fromDate' class="form-control fs-14 h-50px w-60" maxlength="3"
                                    value="{{ $pro->month_exp }}" name="month_exp[]">
                            </div>
                            <div class="col-md-6">
                                <label for="toDate" class="form-label fs-14 text-theme-primary fw-bold">End Date</label>
                                <input type="date" id='toDate' class="form-control fs-14 h-50px" name="year_exp[]"
                                    value="{{ $pro->year_exp }}" disabled>
                            </div>
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
@endsection

@section('bottom_script')
@endsection
