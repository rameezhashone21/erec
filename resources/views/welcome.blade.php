@extends('layouts.app')

@section('content')
  @if (\Session::has('success'))
    <div class="alert alert-success">
      <strong>Alert!</strong> {!! \Session::get('success') !!}
    </div>
  @endif
  <div class="select-main">
    <div class="logo-center">
      <img src="{{ asset('images/intro-logo.png') }}">
    </div>
    <div id="fadeSlider" class="bg-circle">
      <div class="img one">
        <img src="{{ asset('images/img-c-01.png') }}">
        <img src="{{ asset('images/img-c-02.png') }}">
        <img src="{{ asset('images/img-c-03.png') }}">
      </div>
      <div class="img two">
        <img src="{{ asset('images/img-c-03.png') }}">
        <img src="{{ asset('images/img-c-01.png') }}">
        <img src="{{ asset('images/img-c-02.png') }}">
      </div>
      <div class="img three">
        <img src="{{ asset('images/img-c-02.png') }}">
        <img src="{{ asset('images/img-c-03.png') }}">
        <img src="{{ asset('images/img-c-01.png') }}">
      </div>

      <a href="{{ route('candidates') }}">
        <div class="btn candidates">Candidates</div>
      </a>
      <a href="{{ route('recruiter') }}">
        <div class="btn recruiters">Recruiters</div>
      </a>
      <a href="{{ route('employer') }}">
        <div class="btn employers">Employers</div>
      </a>

      <div class="dot one"></div>
      <div class="dot two"></div>
      <div class="dot three"></div>

      <div class="alldot one">
        <img src="{{ asset('images/dots.png') }}">
      </div>
      <div class="alldot two">
        <img src="{{ asset('images/dots.png') }}">
      </div>
      <div class="alldot three">
        <img src="{{ asset('images/dots.png') }}">
      </div>
    </div>
  </div>
@endsection
