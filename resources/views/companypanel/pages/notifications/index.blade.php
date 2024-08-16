@extends('companypanel.layout.app') @section('page_title', 'E-Rec Notifications')

@section('content')
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex align-items-center justify-content-between my-3">
                <h2 class="fw-500 text_primary fs-5 mb-3 mb-md-0">Notifications</h2>
                <div>
                    <a href="" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Mark as all read</a>
                </div>
            </div>
            <a href='' class="theme_box_2 p-2 mb-4 d-block">
              <div class="d-flex align-items-center">
                <div class='me-3'>
                  <img src="https://backend.hostingladz.com/webapp/erec/public/storage/banner.png" alt="" class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                </div>
                <div>
                  <div><span class="title fw-bold text-dark">Alfred laravel job</span></div>
                    <div class="fs-14 text-dark my-1">
                      <i class="fa-solid fa-calendar me-2 text_grey_999"></i>
                      <span>
                        31 Aug 2024
                      </span>
                    </div>
                      <p class="fs-14 text-dark">
                        abc
                      </p>
                </div>
              </div>
            </a>
            
        </div>
    </div>
@if(session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
@endif

@endsection
@section('bottom_script')
@endsection
