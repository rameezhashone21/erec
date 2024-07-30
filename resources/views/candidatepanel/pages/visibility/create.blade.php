@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')
    <div class="container">
        <div class="heading">

            <h3>Add New Job Application</h3>
            @if (session($key ?? 'error'))
                <div class="alert alert-danger" role="alert">
                    {!! session($key ?? 'error') !!}
                </div>
            @endif
        </div>
        <form method="post" action="{{ route('company.jobs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Title</label>
                    <input type="text" class="form-control fs-14 h-50px" name="post" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <textarea class="form-control fs-14 h-50px" name="description" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="banner" class="form-label fs-14 text-theme-primary fw-bold">Banner</label>
                    <input type="file" class="form-control fs-14 h-50px" name="banner" accept=".png, .jpg, .jpeg"  required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Assign Recruiter</label>
                    <select name="recruiter" id="recruiter" class="select2-multiple form-control fs-14  h-50px" required>
                    <option disabled>Choose</option>
                    @foreach ($recruiter as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                  </select>
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Update </button>
                </div>
            </div>
        </form>
    </div>
    @endsection

@section('bottom_script')
@endsection
