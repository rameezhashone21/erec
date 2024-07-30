@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('admin.jobCategory') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
        <div class="row">
            <div class="col-sm-9">
                <h3>Edit Job Category</h3><br>
            </div>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('admin.jobCategory.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            {{-- {{ dd($cat) }} --}}
            <input type="hidden" name="cat_id" value="{{ $cat['class_id'] }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $cat['class_name'] }}"
                        placeholder="category Name" required>
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
