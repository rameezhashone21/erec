@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
<div class="container">

    <div class="heading">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="form-group">
                    @if($user->recruiter->avatar != NULL)
                    <img id="imagePreview" src="{{ asset('public/storage/'.$user->recruiter->avatar) }}" width="100px" height="100px"/>
                    
                    @else
                    <img id="imagePreview" src="{{ asset('images/profile-img.svg') }}">
                </div>
                @endif
                <h3>Recruiter Profile</h3>
            </div>
        </div>
        @include('layouts.includes.messages')
    </div>
            {{-- @if (session($key ?? 'status'))
                <div class="alert alert-success" role="alert">
                    {!! session($key ?? 'status') !!}
                </div>
            @endif --}}
        </div>
        <form method="post" action="{{ route('recruiter.profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div >
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                            <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->recruiter->name }}" required>
                        </div>
                    </div>
                    <div >
                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone Number </label>
                        <div class="row">
                            <div class="col-2">
                                <input type="tel" class="form-control fs-14 h-50px w-60" maxlength="3" value="{{ $user->recruiter->country_code }}" name="country_code" >
                            </div>
                            <div class="col-5">
                                <input type="tel" class="form-control fs-14 h-50px" name="phone" value="{{ $user->recruiter->phone }}">
                            </div>
                        </div>
                    </div>
                    <div >
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">ABN/ ACN #.</label>
                            <input type="text" class="form-control fs-14 h-50px" name="abn" value="{{ $user->recruiter->abn }}" required>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                            <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required multiple>
                            <option disabled>Choose</option>
                            @foreach ($category as $ca)
                                <option value="{{ $ca->id }}"
                                    @if($user->recruiter->features != null)
                                        @foreach ($user->recruiter->features as $row)
                                            @if($row->id == $ca->id)
                                                Selected
                                            @endif
                                        @endforeach
                                    @endif>{{ $ca->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                            <textarea class="form-control fs-14 h-50px" name="description" value="{{ $user->recruiter->description }}" required>{{ $user->recruiter->description }}</textarea>
                        </div>
                    </div>
                    {{-- <div class="">
                        <div class="form-group">
                            <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if($user->recruiter->terms == 1) checked @endif>
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
                    <div class="">
                        <div class="form-group">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Recruiter Avatar</label>
                            <input type="file" class="form-control fs-14 h-50px" name="avatar" accept=".png, .jpg, .jpeg" value="{{ $user->recruiter->avatar }}" >
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group text-center">
                            <button type="submit" class="w-25 btn btn-primary btn_panel"> Update </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- <form id="msform" method="POST" action="{{ route('recruiter.store') }}" name="change_logo" enctype="multipart/form-data">
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
                                @if($user->recruiter->avatar != NULL)
                                <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->recruiter->avatar) }});">
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
            </div>
        </fieldset>
    </form>
    <form id="msform" method="POST" action="{{ route('recruiter.store') }}">
        @csrf
        <fieldset>
            <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
            <div class="row row-cols-1">
                <div class="col">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">recruiter Details</h2>
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
                    <input type="text" class="form-control fs-14 h-50px" name="description" value="{{ $user->recruiter->description }}" required>
                </div>

                <div class="col">
                    <div class="form-check py-2 ">
                        <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if($user->recruiter->terms == 1) checked @endif>
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
                        @if($user->recruiter->avatar != NULL)
                        <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->recruiter->avatar) }});">
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