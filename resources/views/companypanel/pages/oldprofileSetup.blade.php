@extends('companypanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                <div class="heading">
        
                    @if($user->company->logo != NULL)
                    <img id="imagePreview" src="{{ asset('public/storage/'.$user->company->logo) }}" width="100px" height="100px"/>
        
                    @else
                    <img id="imagePreview" src="{{ asset('images/profile-img.svg') }}">
                    </div>
                    @endif
                    <h3>Company Profile</h3>
                    @if (session($key ?? 'status'))
                        <div class="alert alert-success" role="alert">
                            {!! session($key ?? 'status') !!}
                        </div>
                    @endif
                </div>

            </div>
        </div>
        <form method="post" action="{{ route('company.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div>
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company Name</label>
                            <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->company->name }}" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                            <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                            <option disabled>Choose</option>
                            @foreach ($category as $ca)
                                <option value="{{ $ca->id }}"
                                    @if($user->company->features != null)
                                        @foreach ($user->company->features as $row)
                                            @if($row->id == $ca->id)
                                                Selected
                                            @endif
                                        @endforeach
                                    @endif>{{ $ca->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div>
                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                        <div class="row">
                            <div class="col-2">
                                <input type="tel" class="form-control fs-14 h-50px w-60" maxlength="3" value="{{ $user->company->country_code }}" name="country_code" >
                            </div>
                            <div class="col-5">
                                <input type="tel" class="form-control fs-14 h-50px" name="phone" value="{{ $user->company->phone }}">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">ABN/ ACN #.</label>
                            <input type="text" class="form-control fs-14 h-50px" name="abn" value="{{ $user->company->abn }}" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company Description</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="description" value="{{ $user->company->description }}" required>{{ $user->company->description }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="whatWeDo" class="form-label fs-14 text-theme-primary fw-bold">What We Do</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="whatWeDo" value="{{ $user->company->whatWeDo }}">{{ $user->company->whatWeDo }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="mission" class="form-label fs-14 text-theme-primary fw-bold">Mission & Vision</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="mission" value="{{ $user->company->mission }}">{{ $user->company->mission }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="website" class="form-label fs-14 text-theme-primary fw-bold">Website Link</label>
                            <input type="url" class="form-control fs-14 h-50px" name="website" value="{{ $user->company->website }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="industry" class="form-label fs-14 text-theme-primary fw-bold">Industries</label>
                            <input type="text" class="form-control fs-14 h-50px" name="industry" value="{{ $user->company->industry }}">
                        </div>
                    </div>
                    {{-- <div>
                        <div class="form-group">
                            <label for="cSize" class="form-label fs-14 text-theme-primary fw-bold">Company size</label>
                            <input type="text" class="form-control fs-14 h-50px" name="cSize" value="{{ $user->company->cSize }}">
                        </div>
                    </div> --}}
                    <div>
                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Company size </label>
                        <div class="row">
                            <div class="col-2">
                                <input type="number" class="form-control fs-14 h-50px w-60" maxlength="3" value="{{ $user->company->cSizeFrom }}" name="cSizeFrom" >
                            </div>
                            <div class="col-2">
                                <input type="number" class="form-control fs-14 h-50px w-60" maxlength="3" value="{{ $user->company->cSizeTo }}" name="cSizeTo" >
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="headQuarter" class="form-label fs-14 text-theme-primary fw-bold">Headquarters</label>
                            <input type="text" class="form-control fs-14 h-50px" name="headQuarter" value="{{ $user->company->headQuarter }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Type</label>
                            <select name="type" id="role" class="form-select fs-14  h-50px" required>
                                <option selected disabled value="">Choose</option>
                                <option value="Service Business">Service Business</option>
                                <option value="Manufacturing Business">Manufacturing Business</option>
                                <option value="Merchandising Business">Merchandising Business</option>
                                <option value="Sole Proprietorship">Sole Proprietorship</option>
                                <option value="Partnership">Partnership</option>
                                <option value="Corporation">Corporation</option>
                                <option value="Multi-National Corporations (MNCs)">Multi-National Corporations (MNCs)</option>
                                <option value="Franchises">Franchises</option>
                                <option value="Limited Liability Company">Limited Liability Company</option>
                                <option value="Cooperative">Cooperative</option>
                                {{-- <option value="UK" @if($user->company->type == "UK") selected @endif>UK</option> --}}
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="founded" class="form-label fs-14 text-theme-primary fw-bold">Founded</label>
                            <input type="number" pattern="\d{4}" min="1947" max="2200" maxlength="4" class="form-control fs-14 h-50px" name="founded" value="{{ $user->company->founded }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="specialties" class="form-label fs-14 text-theme-primary fw-bold">Specialties</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="specialties" value="{{ $user->company->specialties }}">{{ $user->company->specialties }}</textarea>
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="linkedIn" class="form-label fs-14 text-theme-primary fw-bold">LinkedIn</label>
                            <input type="url" class="form-control fs-14 h-50px" name="linkedIn" value="{{ $user->company->linkedIn }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="twitter" class="form-label fs-14 text-theme-primary fw-bold">Twitter</label>
                            <input type="url" class="form-control fs-14 h-50px" name="twitter" value="{{ $user->company->twitter }}">
                        </div>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="facebook" class="form-label fs-14 text-theme-primary fw-bold">Facebook</label>
                            <input type="url" class="form-control fs-14 h-50px" name="facebook" value="{{ $user->company->facebook }}">
                        </div>
                    </div>
                    {{-- <div>
                        <div class="form-group">
                            <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if($user->company->terms == 1) checked @endif>
                            <label class="form-check-label text-dark fs-14" for="gridCheck">
                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
                            </label>
                            <p class="fs-14 text-grey">
                                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                                sanctus est. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                                dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.
                            </p>
                        </div>
                    </div> --}}
                    <div>
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company LOGO</label>
                            <input type="file" class="form-control fs-14 h-50px" name="logo" accept=".png, .jpg, .jpeg" value="{{ $user->company->logo }}" >
                        </div>
                    </div>
                    <div>
                        <div class="form-group text-center">
                            <button type="submit" class="w-25 btn btn-primary btn_panel border-0"> Update </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>

    {{-- <form id="msform" method="POST" action="{{ route('company.store') }}" name="change_logo" enctype="multipart/form-data">
        @csrf
        <fieldset class="mb-5">
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row align-items-center row-cols-lg-2">
                <div class="col-lg-2">
                    <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" onchange="form_submit()" name="logo" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                @if($user->company->logo != NULL)
                                <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->company->logo) }});">
                                </div>
                                @else
                                <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload Company Logo</h2>
                        <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>
    <form id="msform" method="POST" action="{{ route('company.store') }}">
        @csrf
        <fieldset>
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row row-cols-1">
                <div class="col">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Company Details</h2>
                </div>
                <div class="col">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->company->name }}" required>
                </div>
                <div class="col">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                    <option disabled>Choose</option>
                    @foreach ($cat as $ca)
                        <option value="{{ $ca->id }}"
                            @if($comp != null)
                                @foreach ($comp->features as $row)
                                    @if($row->id == $ca->id)
                                        Selected
                                    @endif
                                @endforeach
                            @endif>{{ $ca->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="description" value="{{ $user->company->description }}" required>
                </div>

                <div class="col">
                    <div class="form-check py-2 ">
                        <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if($user->company->terms == 1) checked @endif>
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
                        @if($user->company->logo != NULL)
                        <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->company->logo) }});">
                        </div>
                        @else
                        <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col">
                <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload Company Logo</h2>
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
