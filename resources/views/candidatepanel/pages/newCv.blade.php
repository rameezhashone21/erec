@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')

    <div class="col-xl-9 col-lg-8 col-md-7">
    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <form method="post" action="{{ route('candidates.cv.store') }}" enctype="multipart/form-data">
                @csrf
                    <input type="file" name="document[]" class="form-group" multiple />
                    <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block ">Upload</button>
            </form>
        </div>
    </div>

@endsection
@section('bottom_script')
@endsection
