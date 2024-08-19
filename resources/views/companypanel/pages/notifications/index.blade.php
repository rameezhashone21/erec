@extends('companypanel.layout.app') @section('page_title', 'E-Rec Notifications')

@section('content')
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex align-items-center justify-content-between my-3 border-bottom pb-3 mb-4">
                <h2 class="fw-500 text_primary fs-5 mb-3 mb-md-0">Notifications</h2>
                <div>
                    <a href="" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Mark as all read</a>
                </div>
            </div>
            {{-- loop start --}}

            {{-- start this is unread --}}
            <a href="" class="notifications__wrapper unread">
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="https://backend.hostingladz.com/webapp/erec/public/storage/banner.png" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div>
                                <span class="title fw-bold text-dark">Alfred laravel job</span>
                            </div>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        5 min ago
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            abc
                        </p>
                    </div>
                </div>
            </a>
            {{-- end this is unread --}}

            {{-- start this is read --}}
            <a href="" class="notifications__wrapper">
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="https://backend.hostingladz.com/webapp/erec/public/storage/banner.png" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            <div>
                                <span class="title fw-bold text-dark">Alfred laravel job</span>
                            </div>
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        5 min ago
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            abc
                        </p>
                    </div>
                </div>
            </a>
            {{-- end this is read --}}


            {{-- loop end --}}
        </div>
    </div>
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

@endsection
@section('bottom_script')
@endsection
