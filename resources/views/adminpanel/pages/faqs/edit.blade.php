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
    <a href="{{ route('faqs') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
    <div class="row">
      <div class="col-sm-9">
        <h3>Add New FAQ's</h3><br>
      </div>
      {{-- <div class="col-sm-3">
                <a class="btn btn-primary text-white"> Add New Education </a>
            </div> --}}
    </div>
  </div>

  <div class="container">
    {{-- {{ dd($edu->id) }} --}}
    <form method="post" action="{{ route('faqs.update') }}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{ $faqs->id }}">
      <div class="col-md-6">
        <div class="form-group">
          <label for="heading" class="form-label fs-14 text-theme-primary fw-bold">Heading</label>
          <input type="text" class="form-control fs-14 h-50px" name="heading" value="{{ $faqs->heading }}"
            placeholder="heading" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="subject" class="form-label fs-14 text-theme-primary fw-bold">Subject</label>
          <textarea class="form-control fs-14 h-50px" name="subject" value="" placeholder="subject" required> {{ $faqs->subject }}</textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" value="{{ $faqs->status }}" id="customSwitch1"
            name="status" />
          <label class="custom-control-label" for="customSwitch1">Want to
            published?</label>
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
