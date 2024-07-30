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
        <a href="" class="btn btn-primary btn_panel mb-3">Go back</a>
        <div class="row">
            <div class="col-sm-9">
                <h3>Site Setting</h3><br>
            </div>
            {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Education </a>
            </div> --}}
        </div>
    </div>

    <div class="container">
        {{-- {{ dd($edu->id) }} --}}
        <form method="post" action="{{ route('admin.store.site.setting') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- <input type="hidden" name="edu_id" value="{{ $edu->id }}"> --}}
            @if ($siteSetting != null)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Tax Rate</label>
                        <input type="number" placeholder="Enter Tax Rate in Percentage..." class="form-control fs-14 h-50px" name="tax_rate" value="{{ $siteSetting->tax_rate }}"
                            placeholder="Skill Name" required>
                    </div>
                </div>

            @else
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Tax Rate</label>
                    <input type="number" class="form-control fs-14 h-50px"  placeholder="Enter Tax Rate in Percentage..." name="tax_rate" value=""
                        placeholder="Skill Name" required>
                </div>
            </div>
            @endif
    {{-- <div class="col-md-6">
        <div class="form-group">
            <label for="passing_year" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
            <textarea class="form-control fs-14 h-50px" name="description" value="" placeholder="Description"></textarea>
        </div>
    </div> --}}
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
