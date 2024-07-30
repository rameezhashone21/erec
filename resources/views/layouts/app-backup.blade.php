<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>E-Rec</title>

  <!-- gooogle fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <!-- gooogle fonts -->

  <!-- bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <!-- bootstrap 5 -->

  <!-- select2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- select2 -->

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script src="https://kit.fontawesome.com/7fc92a47b8.js" crossorigin="anonymous"></script>
  <!-- FontAwesome -->

  <!-- theme custom css -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" rel="preload" as="style" />
  <!-- theme custom css -->

  <!-- jquery js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- jquery js-->

  {{-- Social Share --}}
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

  <noscript>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </noscript>
  <!-- Scripts -->
  {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

  <!-- Styles -->
  {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
  <style>
    hr.style14 {
      border: 0;
      height: 5px;
      background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
      background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
      background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
      background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
    }
  </style>
</head>

<body>
  <div id="app">
    @if (!Route::is('index') && !Route::is('register') && !Route::is('login') && !Route::is('password.request'))
      @include('layouts.includes.header')
    @endif
    {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @guest
                @else
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                @endguest

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre data-target="#mydropdown">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="mydropdown" >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

    <main class="py-4">
      @yield('content')
    </main>

    @if (!Route::is('index') && !Route::is('register') && !Route::is('login') && !Route::is('password.request'))
      @include('layouts.includes.footer')
    @endif
  </div>
  @if (auth()->check())
    <div class="modal-apply">
      <div class="file-upload">
        <span class="close"></span>
        <div class="file-upload-wrap">
          <form method="post" action="{{ route('candidates.applyNow') }}" enctype="multipart/form-data">
            @csrf
            {{-- {{ dd($row->id); }} --}}
            <input type="hidden" name="post_id" id="post_id" value="1" />
            <div class="file-upload-content">
              {{-- <img class="file-upload-image" src="#" alt="your image" /> --}}
              <div class="file-title-wrap">
                <span class="file-title"></span>
                {{-- <span class="file-type"></span>
                                <span class="file-size"></span> --}}
                {{-- <button type="button" onclick="removeUpload()" class="action-btn"
                                    style="margin-top: 8px;">Remove
                                </button> --}}
              </div>
              <button type="button" onclick="removeUpload()" class="action-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                  viewBox="0 0 448 512">
                  <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                  <path
                    d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                </svg>
              </button>
            </div>
            @if (count(auth()->user()->resume) < 6)
              <div class="drag">
                <input class="file-upload-input" type="file" name="new_doc" onchange="readURL(this);"
                  accept="application/pdf,application/msword" />
                <div class="drag-text">
                  <h3>Drag and drop to upload your CV</h3>
                  {{-- <h3>Drag and drop a file or select add Image</h3> --}}
                  <span class="error">File not allowed <br> <i>Allowed Files: pdf, docx,
                      doc</i></span>
                </div>
              </div>
            @endif
            <div class="cv-list">
              <ul>
                @foreach (auth()->user()->resume as $row)
                  <li>
                    <div class="wrap">
                      {{-- <input type="hidden" name="doc_id" value="{{ $row->id }}"/> --}}
                      <input type="radio" name="cv_file" value="{{ $row->id }}">
                      <svg width="37" height="40" viewBox="0 0 37 40" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M33.6505 26.9031V22.7041C33.6505 21.2193 33.0606 19.7952 32.0107 18.7453C30.9607 17.6953 29.5367 17.1055 28.0518 17.1055C26.567 17.1055 25.1429 17.6953 24.093 18.7453C23.043 19.7952 22.4532 21.2193 22.4532 22.7041V26.9031C21.711 26.9038 20.9994 27.199 20.4746 27.7238C19.9498 28.2486 19.6546 28.9602 19.6539 29.7024V36.7007C19.6546 37.4429 19.9498 38.1545 20.4746 38.6793C20.9994 39.2041 21.711 39.4993 22.4532 39.5H33.6505C34.3927 39.4993 35.1042 39.2041 35.6291 38.6793C36.1539 38.1545 36.449 37.4429 36.4498 36.7007V29.7024C36.449 28.9602 36.1539 28.2486 35.6291 27.7238C35.1042 27.199 34.3927 26.9038 33.6505 26.9031ZM25.2525 22.7041C25.2525 21.9617 25.5474 21.2497 26.0724 20.7247C26.5974 20.1997 27.3094 19.9048 28.0518 19.9048C28.7942 19.9048 29.5063 20.1997 30.0312 20.7247C30.5562 21.2497 30.8511 21.9617 30.8511 22.7041V26.9031C30.8511 26.9031 30.8511 29.7024 28.0518 29.7024C25.2525 29.7024 25.2525 26.9031 25.2525 26.9031V22.7041ZM22.4532 39.5V29.7024H33.6505V39.5H22.4532Z"
                          fill="black" />
                        <path
                          d="M27.3506 10.2261L17.8441 0.71964C17.5817 0.457135 17.2257 0.309619 16.8546 0.30954H2.85797C2.11623 0.311755 1.4055 0.607394 0.881003 1.13189C0.356509 1.65638 0.0608701 2.36711 0.0586548 3.10886V36.7007C0.0608701 37.4424 0.356509 38.1531 0.881003 38.6776C1.4055 39.2021 2.11623 39.4978 2.85797 39.5H14.0552V36.7007H2.85797V3.10886H14.0552V11.5068C14.056 12.249 14.3511 12.9606 14.876 13.4854C15.4008 14.0102 16.1124 14.3054 16.8546 14.3061H25.6612C26.1337 14.3057 26.5955 14.1653 26.9883 13.9026C27.381 13.6399 27.6871 13.2667 27.8679 12.8301C28.0487 12.3935 28.096 11.9132 28.0039 11.4497C27.9119 10.9862 27.6845 10.5604 27.3506 10.2261V10.2261ZM16.8546 11.5068V3.68832L24.6717 11.5068H16.8546Z"
                          fill="black" />
                      </svg>
                      <label for="cv-file">Doc 01</label>
                    </div>
                    <a href="{{ asset('public/candidateDoc/doc/' . $row->document) }}"
                      target="_blank">{{ pathinfo($row->document, PATHINFO_EXTENSION) }}</a>
                  </li>
                @endforeach
                {{-- <li>
                                <div class="wrap">
                                    <input type="radio" name="cv-file" value="">
                                    <svg width="37" height="40" viewBox="0 0 37 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.6505 26.9031V22.7041C33.6505 21.2193 33.0606 19.7952 32.0107 18.7453C30.9607 17.6953 29.5367 17.1055 28.0518 17.1055C26.567 17.1055 25.1429 17.6953 24.093 18.7453C23.043 19.7952 22.4532 21.2193 22.4532 22.7041V26.9031C21.711 26.9038 20.9994 27.199 20.4746 27.7238C19.9498 28.2486 19.6546 28.9602 19.6539 29.7024V36.7007C19.6546 37.4429 19.9498 38.1545 20.4746 38.6793C20.9994 39.2041 21.711 39.4993 22.4532 39.5H33.6505C34.3927 39.4993 35.1042 39.2041 35.6291 38.6793C36.1539 38.1545 36.449 37.4429 36.4498 36.7007V29.7024C36.449 28.9602 36.1539 28.2486 35.6291 27.7238C35.1042 27.199 34.3927 26.9038 33.6505 26.9031ZM25.2525 22.7041C25.2525 21.9617 25.5474 21.2497 26.0724 20.7247C26.5974 20.1997 27.3094 19.9048 28.0518 19.9048C28.7942 19.9048 29.5063 20.1997 30.0312 20.7247C30.5562 21.2497 30.8511 21.9617 30.8511 22.7041V26.9031C30.8511 26.9031 30.8511 29.7024 28.0518 29.7024C25.2525 29.7024 25.2525 26.9031 25.2525 26.9031V22.7041ZM22.4532 39.5V29.7024H33.6505V39.5H22.4532Z"
                                            fill="black" />
                                        <path
                                            d="M27.3506 10.2261L17.8441 0.71964C17.5817 0.457135 17.2257 0.309619 16.8546 0.30954H2.85797C2.11623 0.311755 1.4055 0.607394 0.881003 1.13189C0.356509 1.65638 0.0608701 2.36711 0.0586548 3.10886V36.7007C0.0608701 37.4424 0.356509 38.1531 0.881003 38.6776C1.4055 39.2021 2.11623 39.4978 2.85797 39.5H14.0552V36.7007H2.85797V3.10886H14.0552V11.5068C14.056 12.249 14.3511 12.9606 14.876 13.4854C15.4008 14.0102 16.1124 14.3054 16.8546 14.3061H25.6612C26.1337 14.3057 26.5955 14.1653 26.9883 13.9026C27.381 13.6399 27.6871 13.2667 27.8679 12.8301C28.0487 12.3935 28.096 11.9132 28.0039 11.4497C27.9119 10.9862 27.6845 10.5604 27.3506 10.2261V10.2261ZM16.8546 11.5068V3.68832L24.6717 11.5068H16.8546Z"
                                            fill="black" />
                                    </svg>
                                    <label for="cv-file">Doc 01</label>
                                </div>
                            </li>
                            <li>
                                <div class="wrap">
                                    <input type="radio" name="cv-file" value="">
                                    <svg width="37" height="40" viewBox="0 0 37 40" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.6505 26.9031V22.7041C33.6505 21.2193 33.0606 19.7952 32.0107 18.7453C30.9607 17.6953 29.5367 17.1055 28.0518 17.1055C26.567 17.1055 25.1429 17.6953 24.093 18.7453C23.043 19.7952 22.4532 21.2193 22.4532 22.7041V26.9031C21.711 26.9038 20.9994 27.199 20.4746 27.7238C19.9498 28.2486 19.6546 28.9602 19.6539 29.7024V36.7007C19.6546 37.4429 19.9498 38.1545 20.4746 38.6793C20.9994 39.2041 21.711 39.4993 22.4532 39.5H33.6505C34.3927 39.4993 35.1042 39.2041 35.6291 38.6793C36.1539 38.1545 36.449 37.4429 36.4498 36.7007V29.7024C36.449 28.9602 36.1539 28.2486 35.6291 27.7238C35.1042 27.199 34.3927 26.9038 33.6505 26.9031ZM25.2525 22.7041C25.2525 21.9617 25.5474 21.2497 26.0724 20.7247C26.5974 20.1997 27.3094 19.9048 28.0518 19.9048C28.7942 19.9048 29.5063 20.1997 30.0312 20.7247C30.5562 21.2497 30.8511 21.9617 30.8511 22.7041V26.9031C30.8511 26.9031 30.8511 29.7024 28.0518 29.7024C25.2525 29.7024 25.2525 26.9031 25.2525 26.9031V22.7041ZM22.4532 39.5V29.7024H33.6505V39.5H22.4532Z"
                                            fill="black" />
                                        <path
                                            d="M27.3506 10.2261L17.8441 0.71964C17.5817 0.457135 17.2257 0.309619 16.8546 0.30954H2.85797C2.11623 0.311755 1.4055 0.607394 0.881003 1.13189C0.356509 1.65638 0.0608701 2.36711 0.0586548 3.10886V36.7007C0.0608701 37.4424 0.356509 38.1531 0.881003 38.6776C1.4055 39.2021 2.11623 39.4978 2.85797 39.5H14.0552V36.7007H2.85797V3.10886H14.0552V11.5068C14.056 12.249 14.3511 12.9606 14.876 13.4854C15.4008 14.0102 16.1124 14.3054 16.8546 14.3061H25.6612C26.1337 14.3057 26.5955 14.1653 26.9883 13.9026C27.381 13.6399 27.6871 13.2667 27.8679 12.8301C28.0487 12.3935 28.096 11.9132 28.0039 11.4497C27.9119 10.9862 27.6845 10.5604 27.3506 10.2261V10.2261ZM16.8546 11.5068V3.68832L24.6717 11.5068H16.8546Z"
                                            fill="black" />
                                    </svg>
                                    <label for="cv-file">Doc 01</label>
                                </div>
                            </li> --}}
              </ul>
            </div>
            <div class="text-center">
              <button type="submit" oncanplay="UploadFile()" class="btn default-btn upload">Submit</button>

            </div>
          </form>
        </div>
      </div>
    </div>
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        // allowClear: true
      });
      $('.editSkills').select2({
        placeholder: "Select Skills",
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        // allowClear: true
      });
    });

    $('#resetButton').click(() => {
      $('#search_job input[type=checkbox]').prop('checked', false);
      $('#search_job input[type=text]').val('');

      let url = "{{ route('job.browse') }}";
      document.location.href = url;
    })
    $('#employerReset').click(() => {
      $('#search_comp input[type=checkbox]').prop('checked', false);
      $('#search_comp input[type=text]').val('');

      let url = "{{ route('employer.list') }}";
      document.location.href = url;
    })
  </script>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/anime.min.js') }}"></script>
  <script src="{{ asset('js/tilt.js') }}"></script>
  <script>
    $('#recruiters').click(function() {
      $(this).append(
        '<animateTransform id="rec" attibuteName="transform" attributeType="XML" type="translate" from="434.463 341.237" to="57.8 318.7" dur="2s"/>'
      )
    });
    $('.candidates, .employers, .recruiters').mouseenter(function() {
      $('.btn').css('animation-play-state', 'paused');
      $('.bg-circle').css('animation-play-state', 'paused');
      $('.bg-circle .alldot').css('animation-play-state', 'paused');
      $('.bg-circle .img').css('animation-play-state', 'paused');
    })

    $('.candidates, .employers, .recruiters').mouseleave(function() {
      $('.btn').css('animation-play-state', 'running');
      $('.bg-circle').css('animation-play-state', 'running');
      $('.bg-circle .alldot').css('animation-play-state', 'running');
      $('.bg-circle .img').css('animation-play-state', 'running');
    })

    //image fade-in fade-out slider
    $(".img.one > img:gt(0)").hide();
    setInterval(function() {
      $('.img.one > img:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.img.one');
    }, 3000);

    $(".img.two > img:gt(0)").hide();
    setInterval(function() {
      $('.img.two > img:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.img.two');
    }, 3000);

    $(".img.three > img:gt(0)").hide();
    setInterval(function() {
      $('.img.three > img:first')
        .fadeOut(1000)
        .next()
        .fadeIn(1000)
        .end()
        .appendTo('.img.three');
    }, 3000);



    $(function() {
      var header = $(".custom-header");
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 600) {
          header.addClass("sticky-header");
        } else {
          header.removeClass("sticky-header");
        }
      });
    });


    $('#recruiter').mouseenter(function() {
      $('#recruiter').css('transform', 'translate(-10px, 5px)');
    })
    $('#recruiter').mouseleave(function() {
      $('#recruiter').css('transform', 'translate(0px, 0px)');
    })

    $('#candidate').mouseenter(function() {
      $('#candidate').css('transform', 'translate(0px, -10px)');
    })
    $('#candidate').mouseleave(function() {
      $('#candidate').css('transform', 'translate(0px, 1px)');
    })

    $('#employer').mouseenter(function() {
      $('#employer').css('transform', 'translate(10px, 5px)');
    })
    $('#employer').mouseleave(function() {
      $('#employer').css('transform', 'translate(0px, 0px)');
    })

    $('#logo-one').mouseenter(function() {
      $('#recruiter').css('transform', 'translate(-10px, 5px)');
      $('#candidate').css('transform', 'translate(0px, -10px)');
      $('#employer').css('transform', 'translate(10px, 5px)');
    })
    $('#logo-one').mouseleave(function() {
      $('#recruiter').css('transform', 'translate(0px, 0px)');
      $('#candidate').css('transform', 'translate(0px, 1px)');
      $('#employer').css('transform', 'translate(0px, 0px)');
    })
  </script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script> --}}
</body>

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  -- >
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> --}}



<!--  -->
<script>
  $(document).ready(function() {
    // $(function($) {
    //     var path = window.location.href;
    //     $("#side_bar_dashboard a").each(function() {
    //         if (this.href === path) {
    //             $(this).parent().addClass("active");
    //         }
    //     });
    // });

    $('#side_bar_view li a').click(function() {
      $('#side_bar_view li').removeClass("active");
      $(this).parent().addClass("active");
      $('.sidebar_container').removeClass('show_sidebar');
      $('body').removeClass('overlay overflow-hidden');

    });

  });

  $(".mobile_menu_trigger").click(function() {
    $('.sidebar_container').addClass('show_sidebar');
    $('body').addClass('overlay overflow-hidden');

  })

  $(".side_bar_close").click(function() {
    $('.sidebar_container').removeClass('show_sidebar');
    $('body').removeClass('overlay overflow-hidden');

  })
</script>
<script>
  $('.open-apply-modal').click(function() {
    $('.modal-apply').css("display", "flex").hide().fadeIn();
    var id = $(this).attr("id");
    console.log(id);
    document.getElementById("post_id").value = id;
  })
  $('.modal-apply .close').click(function() {
    $('.modal-apply').fadeOut();
  })
  // function readURL(input) {
  //     if (input.files && input.files[0]) {

  //         var reader = new FileReader();

  //         reader.onload = function (e) {
  //             $('.file-upload-wrap').hide();

  //             // $('.file-upload-image').attr('src', e.target.result);
  //             $('.file-upload-content').show();

  //             //$('.file-title').html(input.files[0].name);
  //             // $('.file-title').html(input.files[0].type);
  //             if (input.files[0].type == 'application/pdf') {
  //                 $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
  //             } else if (input.files[0].type == 'image/png') {
  //                 $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
  //             } else if (input.files[0].type == 'image/jpg') {
  //                 $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
  //             } else if (input.files[0].type == 'image/jpeg') {
  //                 $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
  //             } else if (input.files[0].type == 'application/msword') {
  //                 $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
  //             }
  //         };

  //         reader.readAsDataURL(input.files[0]);

  //     } else {
  //         removeUpload();
  //     }
  // }

  // function removeUpload() {
  //     // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  //     $('.file-upload-input').val('');
  //     $('.file-upload-content').hide();
  //     $('.file-upload-wrap').show();
  // }
  // $('.file-upload-wrap').bind('dragover', function () {
  //     $('.file-upload-wrap').addClass('file-dropping');
  // });
  // $('.file-upload-wrap').bind('dragleave', function () {
  //     $('.file-upload-wrap').removeClass('file-dropping');
  // });
  // $(document).mouseup(function (e) {
  //         var container = $(".file-upload");

  //         // if the target of the click isn't the container nor a descendant of the container
  //         if (!container.is(e.target) && container.has(e.target).length === 0) {
  //             // container.hide();
  //             $('.modal-apply').fadeOut();
  //             $('.file-upload-input').val('');
  //         }
  //     });
  function readURL(input) {
    if (input.files && input.files[0]) {
      $('.error').hide()
      var reader = new FileReader();

      var fileSize = (input.files[0].size / (1024 * 1024)).toFixed(2) + 'mb'
      var fileType = input.files[0].name;
      var fileTypeExt = fileType.split('.').pop();

      if (fileTypeExt == 'docx' || fileTypeExt == 'doc' || fileTypeExt == 'pdf') {
        reader.onload = function(e) {
          $('.file-upload-wrap .drag').hide();
          $('.file-upload-content').css("display", "flex").hide().fadeIn();

          $('.file-title').html(input.files[0].name);
          $('.file-type').html(fileTypeExt);
          $('.file-size').html(fileSize);

          if (fileTypeExt == 'docx') {
            $('.file-upload-image').attr('src', "{{ asset('imgs/icon-docx.png') }}");
          } else if (fileTypeExt == 'doc') {
            $('.file-upload-image').attr('src', "{{ asset('imgs/icon-doc.png') }}");
          } else if (fileTypeExt == 'pdf') {
            $('.file-upload-image').attr('src', "{{ asset('imgs/icon-pdf.png') }}");
          }
        };

        $('input[type="radio"]').attr('disabled', true);
        $('input[type="radio"]').prop('checked', false);
        $('li .wrap svg, li .wrap label').css('opacity', '0.35');
        reader.readAsDataURL(input.files[0]);
      } else {
        $('.error').show();
      }

    } else {
      removeUpload();
    }
  }

  function removeUpload() {
    // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-input').val('');
    $('.file-upload-content').hide();
    $('.file-upload-wrap .drag').show();
    $('input[type="radio"]').attr('disabled', false);
    $('li .wrap svg, li .wrap label').css('opacity', '1');
  }

  $('.file-upload-wrap').bind('dragover', function() {
    $('.file-upload-wrap').addClass('file-dropping');
  });
  $('.file-upload-wrap').bind('d`ragleave', function() {
    $('.file-upload-wrap').removeClass('file-dropping');
  });

  $(document).mouseup(function(e) {
    var container = $(".file-upload");
    if (!container.is(e.target) && container.has(e.target).length === 0) {
      $('.modal-apply').fadeOut();
      setTimeout(function() {
        removeUpload();
      }, 400)
    }
  });

  $('.open-apply-modal').click(function() {
    $('.modal-apply').css("display", "flex").hide().fadeIn();
  })
  $('.modal-apply .close').click(function() {
    $('.modal-apply').fadeOut();
    setTimeout(function() {
      removeUpload();
    }, 400)
  })

  // show/hide pass
  const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#password');

  togglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
  });

  const ctogglePassword = document.querySelector('#togglePasswordConfirm');
  const cpassword = document.querySelector('#password-confirm');

  ctogglePassword.addEventListener('click', function(e) {
    // toggle the type attribute
    const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
    cpassword.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
  });
</script>

@yield('bottom_script')

</html>
