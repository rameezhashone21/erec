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
    <a href="{{ route('social.links') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
    <div class="row">
      <div class="col-sm-9">
        <h3>Add New Links</h3><br>
      </div>
      {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Education </a>
            </div> --}}
    </div>
  </div>

  <div class="container">
    {{-- {{ dd($edu->id) }} --}}
    <form method="post" action="{{ route('admin.addlinks') }}" enctype="multipart/form-data">
      @csrf
      @method('post')
      {{-- <input type="hidden" name="edu_id" value="{{ $edu->id }}"> --}}
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="form-label fs-14 text-theme-primary fw-bold">facebook_link</label>
          <input type="url" class="form-control fs-14 h-50px" name="facebook_link" value=""
            placeholder="facebook_link" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Inst</label>
          <input type="url" class="form-control fs-14 h-50px" name="linkedin_link" value=""
            placeholder="linkedin_link" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="form-label fs-14 text-theme-primary fw-bold">LinkedIn</label>
          <input type="url" class="form-control fs-14 h-50px" name="insta_link" value=""
            placeholder="insta_link" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Youtube link</label>
          <input type="url" class="form-control fs-14 h-50px" name="youtube_link" value=""
            placeholder="youtube_link" required>
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
