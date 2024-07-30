<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Rec Panel</title>
    <meta name="description"
        content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('adminpanel/css/font_awesome.css')}}" rel="stylesheet">
    <link href="{{asset('adminpanel/css/google_api.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminpanel/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/panel.css')}}" >
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('adminpanel/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('adminpanel/css/extra_style.css') }}">
    <link rel="stylesheet" href="{{ asset('adminpanel/css/extra_style.css') }}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <style>

    .navbar {
        justify-content: flex-end;
        background-color: #ffffff;
        border-bottom: 1px solid #ebebeb;
    }

    .navbar .navbar-nav .nav-link,
    .navbar .navbar-nav .nav-link img {
        height: 100%
    }


    .main-content-container {
        background-color: #ffffff;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    .btn-primary.btn_panel {
        border-radius: 4px;
        background: #007ba7;
        color: #ffffff;
        padding: 10px 30px;
        border: 1px solid transparent;
        cursor: pointer;
    }

    .btn-primary.btn_panel:hover {
        background: var(--white-clr);
        color: var(--primary-color);
    }

    .navbar-nav .dropdown-menu.dropdown-menu-small {
        position: absolute;
        left: -13px;
        width: 100%;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top: none;
    }

    .table td,
    .table th {
        padding: .5rem 1rem
    }
    </style>
</head>

<body class="h-100">
    {{-- <div class="color-switcher animated">

        @include('recruterpanel.includes.colorthemechange')
    </div>
    <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div> --}}
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar  Section -->
            @include('recruterpanel.includes.sidebar')


            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <div class="main-navbar sticky-top bg-white">

                    <!-- Header  Section -->
                    @include('recruterpanel.includes.header')

                    <div class="main-content-container container-fluid px-4">
                        <!-- Page Header -->
                        <div class="page-header row no-gutters py-4">
                            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                {{-- <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Blog Overview</h3> --}}
                            </div>
                        </div>
                        <!-- End Page Header -->

                        <div class="row justify-content-center">

                            <!-- Content Section. Contains page content -->
                            @yield('content')

                        </div>
                    </div>


                    <!-- Main Footer -->
                    @include('recruterpanel.includes.footer')
            </main>
        </div>
    </div>
    <div class="promo-popup animated">
        {{--<a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
        <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>--}}
        <div class="pp-intro-bar"> Need More Templates?
            <span class="close">
                <i class="material-icons">close</i>
            </span>
            <span class="up">
                <i class="material-icons">keyboard_arrow_up</i>
            </span>
        </div>
        {{-- <div class="pp-inner-content">
        <h2>Shards Dashboard Pro</h2>
        <p>A premium & modern Bootstrap 4 admin dashboard template pack.</p>
        <a class="pp-cta extra-action" href="http://bit.ly/shards-dashboard-pro">Download</a>
      </div> --}}
    </div>
    <script src="{{asset('adminpanel/js/jquery_3.3.1.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('adminpanel/js/popper.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('adminpanel/js/bootstrap.min.js')}}" crossorigin="anonymous"></script>

    <!-- Comment because graphs are not important -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>


    <!-- comment end -->

    <script src="{{ asset('adminpanel/js/extra_js.js')}}"></script>
    <script src="{{ asset('adminpanel/js/app.js')}}"></script>
    <script src="{{ asset('adminpanel/js/blog_js.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            // allowClear: true
        });
        $('.editSkills').select2({
        placeholder: "Select Skills",
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        // allowClear: true
    });

    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Type Here',
            tabsize: 2,
            height: 150
        });
    });
    </script>


    @yield('bottom_script')
</body>

</html>