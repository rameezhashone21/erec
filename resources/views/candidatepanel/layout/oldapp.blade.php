<!doctype html>
<html class="no-js h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>E-Rec Panel</title>
    <meta name="description"
        content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('adminpanel/css/font_awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('adminpanel/css/google_api.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminpanel/css/bootstrap.min.css') }}">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="{{ asset('adminpanel/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('adminpanel/css/extra_style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/panel.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <script async defer src="https://buttons.github.io/buttons.js"></script>

</head>

<body>
    {{-- <div class="color-switcher animated">

        @include('candidatepanel.includes.colorthemechange')
    </div> --}}
    {{-- <div class="color-switcher-toggle animated pulse infinite">
      <i class="material-icons">settings</i>
    </div> --}}
    <!-- Header  Section -->
    @include('candidatepanel.includes.header')
    <div class="candidate_panel_main h-100" style="background-color: #ebebeb;">


        <div class="container h-100">
            <div class="row h-100">

                <!-- Sidebar  Section -->
                @include('candidatepanel.includes.sidebar')


                <main class="main-content col-lg-9 col-md-8 col-sm-12 ">
                    <div class="main-navbar sticky-top bg-white ">

                        <div class="main-content-container container-fluid px-4">
                            <!-- Page Header -->
                            <div class="page-header row no-gutters py-4">
                                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                                    <!-- <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Blog Overview</h3> -->
                                </div>
                            </div>
                            <!-- End Page Header -->

                            <div class="row admin-panel-css">

                                <!-- Content Section. Contains page content -->
                                @yield('content')

                            </div>
                        </div>


                        <!-- Main Footer -->
                        @include('candidatepanel.includes.footer')
                </main>
            </div>
        </div>
    </div>
    {{-- <div class="promo-popup animated">
        <a href="http://bit.ly/shards-dashboard-pro" class="pp-cta extra-action">
        <img src="https://dgc2qnsehk7ta.cloudfront.net/uploads/sd-blog-promo-2.jpg"> </a>
        <div class="pp-intro-bar"> Need More Templates?
            <span class="close">
                <i class="material-icons">close</i>
            </span>
            <span class="up">
                <i class="material-icons">keyboard_arrow_up</i>
            </span>
        </div>
        <div class="pp-inner-content">
        <h2>Shards Dashboard Pro</h2>
        <p>A premium & modern Bootstrap 4 admin dashboard template pack.</p>
        <a class="pp-cta extra-action" href="http://bit.ly/shards-dashboard-pro">Download</a>
      </div>
    </div> --}}
    <script src="{{ asset('adminpanel/js/jquery_3.3.1.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('adminpanel/js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('adminpanel/js/bootstrap.min.js') }}" crossorigin="anonymous"></script>

    <!-- Comment because graphs are not important -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>

    <!-- comment end -->

    <script src="{{ asset('adminpanel/js/extra_js.js') }}"></script>
    <script src="{{ asset('adminpanel/js/app.js') }}"></script>
    <script src="{{ asset('adminpanel/js/blog_js.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js "></script>

    <script>
        $.fn.select2.amd.require(['select2/selection/search'], function(Search) {
            var oldRemoveChoice = Search.prototype.searchRemoveChoice;

            Search.prototype.searchRemoveChoice = function() {
                oldRemoveChoice.apply(this, arguments);
                this.$search.val('');
            };

            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
                // // allowClear: true
            });

            $('.editSkills').select2({
                placeholder: "Select Skills",
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
                // // allowClear: true
            });
        });
    </script>

    @yield('bottom_script')
</body>

</html>
