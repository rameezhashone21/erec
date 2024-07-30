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
                <h3>Add New Skill</h3><br>
            </div>
            {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Education </a>
            </div> --}}
        </div>
    </div>

    <div class="container">
        {{-- {{ dd($edu->id) }} --}}
        <form method="post" action="{{ route('admin.storeSkill') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- <input type="hidden" name="edu_id" value="{{ $edu->id }}"> --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Skill</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value=""
                        placeholder="Skill Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="passing_year" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <textarea class="form-control fs-14 h-50px" name="description" value="" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Create </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('bottom_script')
@endsection
