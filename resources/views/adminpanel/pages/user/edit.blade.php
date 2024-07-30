@extends('adminpanel.layout.app')

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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-header-panel shadow">
                    <a href="{{ route('admin.users') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
                    <h3 class="title-2 mb-3">Edit User</h3>
                    <form method="post" action="{{ route('admin.approveUser') }}" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            @method('post')
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Name</label>
                                    <input type="text" disabled class="form-control fs-14 h-50px" name="name"
                                        value="{{ $user->name }}" placeholder="Skill Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Email</label>
                                    <input type="text" disabled class="form-control fs-14 h-50px" name="name"
                                        value="{{ $user->email }}" placeholder="Skill Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role" class="form-label fs-14 text-theme-primary fw-bold">Role</label>
                                    <select id="role" disabled name="role" class="form-control fs-14 h-50px" readonly>
                                        <option selected disabled value="">Select</option>
                                        <option value="user" @if ($user->role == 'user') selected @endif>Candidate
                                        </option>
                                        <option value="company" @if ($user->role == 'company') selected @endif>Company
                                        </option>
                                        <option value="rec" @if ($user->role == 'rec') selected @endif>Recruiter
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                                    <select id="status" name="status" class="form-control fs-14 h-50px">
                                        <option selected disabled value="">Select</option>
                                        <option value="1" @if ($user->status == '1') selected @endif>Active
                                        </option>
                                        <option value="0" @if ($user->status == '0') selected @endif>Inactive
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <div class="form-group">
                                    <button type="submit" class="w-25 btn btn-primary btn_panel"> Approve </button>
                                </div>
                                <div class="form-group">
                                    <a @if ($user->role == 'user') href="{{ route('admin.candidateDetails', $user->candidate->slug) }}"
                                @elseif($user->role == 'company')
                                    href="{{ route('admin.companyDetails', $user->company->slug) }}"
                                @elseif($user->role == 'rec')
                                    href="{{ route('admin.recruiterDetails', $user->recruiter->slug) }}" @endif
                                        class="btn_panel"> View Details </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
    <script>
        // $(document).ready(function() {
        //     successModal();
        // });
        @if (session('message'))
            $(document).ready(function() {
                successModal('message');
            });
        @endif
    </script>
@endsection
