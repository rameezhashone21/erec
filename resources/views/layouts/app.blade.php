<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>E-Rec</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('imgs/fav-icon.png') }}">
    <script async src="https://www.google.com/recaptcha/api.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/libraries.css') }}"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet"
        href="https://mojoaxel.github.io/bootstrap-select-country/dist/css/bootstrap-select-country.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" rel="preload" as="style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {!! htmlScriptTagJsApi() !!}

    <!-- FontAwesome -->
    {{-- <script src="https://kit.fontawesome.com/7fc92a47b8.js" crossorigin="anonymous"></script> --}}
    {{-- <noscript>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </noscript> --}}
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput-jquery.min.js"
        integrity="sha512-9WaaZVHSw7oRWH7igzXvUExj6lHGuw6GzMKW7Ix7E+ELt/V14dxz0Pfwfe6eZlWOF5R6yhrSSezaVR7dys6vMg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            var href = '{{ route('getCategoriesApi') }}';

            $.ajax({
                type: 'GET',
                url: href,
            }).done(function(data) {
                var html = "";
                $.each(data, function(index, value) {
                    console.log(value);
                    if(index < 9)
                    {
                        html += "<li><a href='{{ route('job.browse') }}?job_cat%5B%5D=" + value
                            .class_id + "'>" + value.class_name + "</a></li>";
                        $('#implode').html(html);
                    }
                });

            });
        });

        // single post wishlist like
        function wishlist_singlePost(id) {

            event.preventDefault();
            var href = '{{ route('candidates.wishlist', ':id') }}';
            href = href.replace(':id', id);
            // console.log(id);

            $.ajax({
                type: 'GET',
                url: href,
            }).done(function(data) {
                // console.log(data['post_id']);
                if (data['check'] == 'yes') {
                    $(".singlePost").html('');
                    html = '';
                    html +=
                        "<a href='' onclick='wishlist_singlePost(" + data['post_id'] +
                        ")' class='btn default-btn-2 active mb-3'> <svg xmlns='http://www.w3.org/2000/svg' width='18.976' height='17.103' viewBox='0 0 18.976 17.103'> <g id='wishlist-empty' transform='translate(0.499 0.502)'> <path id='Path_3141' data-name='Path 3141' d='M631.778,1183.621c.153-.142.307-.268.442-.412a6.117,6.117,0,0,1,1.543-1.256,4.683,4.683,0,0,1,3.929-.37,4.378,4.378,0,0,1,2.191,1.76,5,5,0,0,1,.889,3.247,6.762,6.762,0,0,1-.687,2.43,13.113,13.113,0,0,1-1.986,2.93,28.02,28.02,0,0,1-3.865,3.625c-.774.609-1.568,1.193-2.353,1.788-.049.037-.085.058-.147.012a46.343,46.343,0,0,1-4.389-3.529,20.541,20.541,0,0,1-2.857-3.184,9.548,9.548,0,0,1-1.44-2.864,5.1,5.1,0,0,1,.055-3.249,4.872,4.872,0,0,1,2.108-2.636,4.442,4.442,0,0,1,3.765-.34,5.214,5.214,0,0,1,2.117,1.341C631.327,1183.152,631.557,1183.393,631.778,1183.621Z' transform='translate(-622.811 -1181.309)' fill='none' stroke='#007ba7' stroke-width='1' /> </g> </svg> </a>";
                    $(".singlePost").html(html);
                } else if (data['check'] == 'no') {
                    $(".singlePost").html('');
                    html = '';
                    html +=
                        "<a href='' onclick='wishlist_singlePost(" + data['post_id'] +
                        ")' class='btn default-btn-2 mb-3'> <svg xmlns='http://www.w3.org/2000/svg' width='18.976' height='17.103' viewBox='0 0 18.976 17.103'> <g id='wishlist-empty' transform='translate(0.499 0.502)'> <path id='Path_3141' data-name='Path 3141' d='M631.778,1183.621c.153-.142.307-.268.442-.412a6.117,6.117,0,0,1,1.543-1.256,4.683,4.683,0,0,1,3.929-.37,4.378,4.378,0,0,1,2.191,1.76,5,5,0,0,1,.889,3.247,6.762,6.762,0,0,1-.687,2.43,13.113,13.113,0,0,1-1.986,2.93,28.02,28.02,0,0,1-3.865,3.625c-.774.609-1.568,1.193-2.353,1.788-.049.037-.085.058-.147.012a46.343,46.343,0,0,1-4.389-3.529,20.541,20.541,0,0,1-2.857-3.184,9.548,9.548,0,0,1-1.44-2.864,5.1,5.1,0,0,1,.055-3.249,4.872,4.872,0,0,1,2.108-2.636,4.442,4.442,0,0,1,3.765-.34,5.214,5.214,0,0,1,2.117,1.341C631.327,1183.152,631.557,1183.393,631.778,1183.621Z' transform='translate(-622.811 -1181.309)' fill='none' stroke='#007ba7' stroke-width='1' /> </g> </svg> </a>";
                    $(".singlePost").html(html);

                }
            });
        }
        // end single post wishlist like
        // wishlist like
        function wishlist_post(id) {

            event.preventDefault();
            var href = '{{ route('candidates.wishlist', ':id') }}';
            href = href.replace(':id', id);
            // console.log(id);

            $.ajax({
                type: 'GET',
                url: href,
            }).done(function(data) {
                // console.log(data['post_id']);
                if (data['check'] == 'yes') {
                    $(".wishlist_box-" + data['post_id']).html('');
                    html = '';
                    html +=
                        "<a href='' class='icons__box active' onclick='wishlist_post(" +
                        data['post_id'] + ")'> <i class='fas fa-heart'></i></a>";
                    $(".wishlist_box-" + data['post_id']).html(html);
                } else if (data['check'] == 'no') {
                    $(".wishlist_box-" + data['post_id']).html('');
                    html = '';
                    html +=
                        "<a href='' class='icons__box' onclick='wishlist_post(" +
                        data['post_id'] + ")'> <i class='fas fa-heart'></i></a>";
                    $(".wishlist_box-" + data['post_id']).html(html);

                }
            });
        }
        // end wishlist like

        // start map filter range

        function rangeSlide(value) {
            document.getElementById('rangeValue').innerHTML = value;
        }

        // end map filter range
        $(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
            });
        });
        // start toggle pricing Yearly / Monthly
        function changePrices() {
            if ($('#dn').is(':checked')) {
                $("#two").show();
                $("#one").hide();
            } else {
                $("#two").hide();
                $("#one").show();
            }
        }

        function errorModal(error) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: error,
                footer: ''
            })
        }

        function successModal(message) {
            Swal.fire(
                'Thank You!',
                message,
                'success'
            )
        }
        // end toggle pricing Yearly / Monthly

        function changeToDate(id) {
            console.log(id);
            if ($('#currentlyWorkHere' + id).is(':checked')) {
                // $("#two").show();
                $("#toDate" + id).attr("disabled", true);
                $("#toDate" + id).val(null);
                $("#toDate" + id).hide();
                $("#presentText" + id).show();
            } else {
                $("#toDate" + id).attr("disabled", false);
                $("#toDate" + id).show();
                $("#presentText" + id).hide();
            }
        }
    </script>

    <style>
        hr.style14 {
            border: 0;
            height: 5px;
            background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
            background-image: -moz-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
            background-image: -ms-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
            background-image: -o-linear-gradient(left, #f0f0f0, #8c8b8b, #f0f0f0);
        }
    /* HTML: <div class="loader"></div> */
    .loader_payment {
          width: 50px;
          aspect-ratio: 1;
          border-radius: 50%;
          padding: 6px;
          background:
            conic-gradient(from 135deg at top,currentColor 90deg, #0000 0) 0 calc(50% - 4px)/17px 8.5px,
            radial-gradient(farthest-side at bottom left,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) top right/50%  50% content-box content-box,
            radial-gradient(farthest-side at top        ,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) bottom   /100% 50% content-box content-box;
          background-repeat: no-repeat;
          animation: l11 1s infinite linear;
        }
        @keyframes l11{ 
          100%{transform: rotate(1turn)}
        }
        .loader_payment_container {
            background-color: #00000059;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
      
        }  
    </style>
</head>

<body>
    <a id="backToTop"><i class="fas fa-hand-point-up"></i></a>
    <div>
        @if (
            !Route::is('register') &&
                !Route::is('login') &&
                !Route::is('password.request')
                // !Route::is('subscription') &&
                // !Route::is('subscriptionPayment') &&
                // !Route::is('successPayment') &&
                // !Route::is('company.details') &&
                // !Route::is('candidates.details') &&
                // !Route::is('candidates.details.next') &&
                // !Route::is('candidates.details.profile') &&
                // !Route::is('candidateEducationView') &&
                // !Route::is('recruiter.details')
                )
            @include('layouts.includes.header')
        @endif
        <main class="py-4">
            @yield('content')
            @if (auth()->check())
                @if (auth()->user()->role != "admin")
                <div id="app2" data-fetch-route="{{ route('fetch.messages') }}"
                    data-connected="{{ route('company.connectedRecruiter') }}" data-send="{{ route('send.messages') }}">
                    <global-chat :connected="connected" :messages="messages" :user="{{ auth()->user() }}"
                        :route_fetch="'{{ route('fetch.messages') }}'"
                        :route_fetch_indivisual="'{{ route('fetch.messages.individual') }}'"
                        :route_send_messages="'{{ route('send.messages') }}'"
                        :route_company_connectedRecruiter="'{{ route('company.connectedRecruiter') }}'"
                        v-on:messagesent="addMessage"></global-chat>
                </div>
                @endif
            @endif
        </main>

        @if (!Route::is('register') && !Route::is('login') && !Route::is('password.request'))
            @include('layouts.includes.footer')
        @endif
    </div>

    @if (auth()->check())
        <div class="modal-apply">
            <div class="file-upload overflow-x-hidden">
                <div class="file_upload_inner_div">
                <span class="close"></span>
                <div id="payment_loader" class='loader_payment_container d-none justify-content-center align-items-center'> 
                    <div class='loader_payment'> </div> 
                </div>
                <div class="file-upload-wrap ">
                    <form method="post" action="{{ route('candidates.applyNow') }}" enctype="multipart/form-data"
                        name="myForm">
                        @csrf
                        {{-- {{ dd($row->id); }} --}}

                        <h4 class="py-3">Resume</h4>
                        <input type="hidden" name="post_id" id="post_id" value="1" />
                        <div class="file-upload-content file-upload-content-cv">
                            {{-- <img class="file-upload-image" src="#" alt="your image" /> --}}
                            <div class="file-title-wrap">
                                <span class="file-title file-title-cv mb-0"></span>
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
                            <div class="drag drag-cv">
                                <input class="file-upload-input" type="file" name="new_doc" onchange="readURL(this);"
                                    accept="application/pdf,application/msword" />
                                <div class="drag-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.773" viewBox="0 0 18 15.773">
                                        <g id="drag" transform="translate(0 -18.375)">
                                          <path id="Path_3" data-name="Path 3" d="M74.458,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,74.458,203.144Z" transform="translate(-69.374 -173.571)" fill="#687284"/>
                                          <path id="Path_4" data-name="Path 4" d="M37.528,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,37.528,203.144Z" transform="translate(-34.682 -173.571)" fill="#687284"/>
                                          <path id="Path_5" data-name="Path 5" d="M111.388,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,203.144Z" transform="translate(-104.066 -173.571)" fill="#687284"/>
                                          <path id="Path_6" data-name="Path 6" d="M148.308,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,148.308,203.144Z" transform="translate(-138.748 -173.571)" fill="#687284"/>
                                          <path id="Path_7" data-name="Path 7" d="M.608,203.144a.608.608,0,1,0,.43.178A.612.612,0,0,0,.608,203.144Z" transform="translate(0 -173.571)" fill="#687284"/>
                                          <path id="Path_8" data-name="Path 8" d="M.608,129.235a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,129.235Z" transform="translate(0 -104.141)" fill="#687284"/>
                                          <path id="Path_9" data-name="Path 9" d="M.608,92.275a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,92.275Z" transform="translate(0 -69.421)" fill="#687284"/>
                                          <path id="Path_10" data-name="Path 10" d="M.608,55.326a.608.608,0,1,0,.608.608A.607.607,0,0,0,.608,55.326Z" transform="translate(0 -34.712)" fill="#687284"/>
                                          <path id="Path_11" data-name="Path 11" d="M.608,166.185a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,166.185Z" transform="translate(0 -138.852)" fill="#687284"/>
                                          <path id="Path_12" data-name="Path 12" d="M.608,18.376a.608.608,0,1,0,.43,1.037.607.607,0,0,0-.43-1.037Z" transform="translate(0 -0.001)" fill="#687284"/>
                                          <path id="Path_13" data-name="Path 13" d="M148.308,19.592a.608.608,0,1,0-.608-.608A.607.607,0,0,0,148.308,19.592Z" transform="translate(-138.748 -0.002)" fill="#687284"/>
                                          <path id="Path_14" data-name="Path 14" d="M185.237,19.592a.608.608,0,1,0-.608-.608A.608.608,0,0,0,185.237,19.592Z" transform="translate(-173.439 -0.002)" fill="#687284"/>
                                          <path id="Path_15" data-name="Path 15" d="M74.458,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,74.458,18.376Z" transform="translate(-69.374 -0.001)" fill="#687284"/>
                                          <path id="Path_16" data-name="Path 16" d="M37.528,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,37.528,18.376Z" transform="translate(-34.682 -0.001)" fill="#687284"/>
                                          <path id="Path_17" data-name="Path 17" d="M111.388,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,18.376Z" transform="translate(-104.066 -0.001)" fill="#687284"/>
                                          <path id="Path_18" data-name="Path 18" d="M222.166,19.59a.608.608,0,1,0-.43-.178A.612.612,0,0,0,222.166,19.59Z" transform="translate(-208.13 0)" fill="#687284"/>
                                          <path id="Path_19" data-name="Path 19" d="M222.167,93.491a.608.608,0,1,0-.608-.608A.607.607,0,0,0,222.167,93.491Z" transform="translate(-208.131 -69.422)" fill="#687284"/>
                                          <path id="Path_20" data-name="Path 20" d="M222.167,56.542a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,56.542Z" transform="translate(-208.131 -34.712)" fill="#687284"/>
                                          <path id="Path_21" data-name="Path 21" d="M222.167,130.451a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,130.451Z" transform="translate(-208.131 -104.142)" fill="#687284"/>
                                          <path id="Path_22" data-name="Path 22" d="M167.344,142.417l-7.124-2.606a.608.608,0,0,0-.781.776l2.579,7.2a.608.608,0,0,0,.561.4h.012a.608.608,0,0,0,.564-.381l.967-2.408,2.034,2.056a.608.608,0,1,0,.864-.855l-2.047-2.069,2.393-.982a.608.608,0,0,0-.022-1.133Zm-3.672,1.335a.608.608,0,0,0-.333.336l-.716,1.782-1.6-4.472,4.434,1.622Z" transform="translate(-149.743 -114.041)" fill="#687284"/>
                                        </g>
                                      </svg>

                                    <h3 class="drag-title">Drag and drop to upload your CV</h3>
                                    <p class="drag-description">
                                       <span class="text-decoration-underline text-primary">Click to upload</span>  or drag and drop. Only .docs, .pdf file are accepted
                                       Size : 200kb
                                    </p>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="error">File not allowed <br> <i>Allowed Files: pdf, docx,
                                        doc</i></span>
                            </div>
                        @endif
                        <div class="cv-list">
                            <ul>
                                @foreach (auth()->user()->resume as $row)
                                    <li class="d-block">
                                        <label class="wrap">
                                            {{-- <input type="hidden" name="doc_id" value="{{ $row->id }}"/> --}}
                                            <input type="radio" id="cv-file-{{ $row->id }}" name="cv_file"
                                                value="{{ $row->id }}">

                                            <svg width="37" height="40" viewBox="0 0 37 40" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M33.6505 26.9031V22.7041C33.6505 21.2193 33.0606 19.7952 32.0107 18.7453C30.9607 17.6953 29.5367 17.1055 28.0518 17.1055C26.567 17.1055 25.1429 17.6953 24.093 18.7453C23.043 19.7952 22.4532 21.2193 22.4532 22.7041V26.9031C21.711 26.9038 20.9994 27.199 20.4746 27.7238C19.9498 28.2486 19.6546 28.9602 19.6539 29.7024V36.7007C19.6546 37.4429 19.9498 38.1545 20.4746 38.6793C20.9994 39.2041 21.711 39.4993 22.4532 39.5H33.6505C34.3927 39.4993 35.1042 39.2041 35.6291 38.6793C36.1539 38.1545 36.449 37.4429 36.4498 36.7007V29.7024C36.449 28.9602 36.1539 28.2486 35.6291 27.7238C35.1042 27.199 34.3927 26.9038 33.6505 26.9031ZM25.2525 22.7041C25.2525 21.9617 25.5474 21.2497 26.0724 20.7247C26.5974 20.1997 27.3094 19.9048 28.0518 19.9048C28.7942 19.9048 29.5063 20.1997 30.0312 20.7247C30.5562 21.2497 30.8511 21.9617 30.8511 22.7041V26.9031C30.8511 26.9031 30.8511 29.7024 28.0518 29.7024C25.2525 29.7024 25.2525 26.9031 25.2525 26.9031V22.7041ZM22.4532 39.5V29.7024H33.6505V39.5H22.4532Z"
                                                    fill="black" />
                                                <path
                                                    d="M27.3506 10.2261L17.8441 0.71964C17.5817 0.457135 17.2257 0.309619 16.8546 0.30954H2.85797C2.11623 0.311755 1.4055 0.607394 0.881003 1.13189C0.356509 1.65638 0.0608701 2.36711 0.0586548 3.10886V36.7007C0.0608701 37.4424 0.356509 38.1531 0.881003 38.6776C1.4055 39.2021 2.11623 39.4978 2.85797 39.5H14.0552V36.7007H2.85797V3.10886H14.0552V11.5068C14.056 12.249 14.3511 12.9606 14.876 13.4854C15.4008 14.0102 16.1124 14.3054 16.8546 14.3061H25.6612C26.1337 14.3057 26.5955 14.1653 26.9883 13.9026C27.381 13.6399 27.6871 13.2667 27.8679 12.8301C28.0487 12.3935 28.096 11.9132 28.0039 11.4497C27.9119 10.9862 27.6845 10.5604 27.3506 10.2261V10.2261ZM16.8546 11.5068V3.68832L24.6717 11.5068H16.8546Z"
                                                    fill="black" />
                                            </svg>
                                            <div for="cv-file" class="cv__name">{{ $row->document_name }}</div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <h4 class="py-3">Cover Letter</h4>
                        <div class="file-upload-content file-upload-content-letter">
                            {{-- <img class="file-upload-image" src="#" alt="your image" /> --}}
                            <div class="file-title-wrap">
                                <span class="file-title file-title-letter mb-0"></span>
                                {{-- <span class="file-type"></span>
                                <span class="file-size"></span> --}}
                                {{-- <button type="button" onclick="removeUpload()" class="action-btn"
                                    style="margin-top: 8px;">Remove
                                </button> --}}
                            </div>
                            <button type="button" onclick="removeCoverUpload()" class="action-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                    viewBox="0 0 448 512">
                                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                    <path
                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                </svg>
                            </button>
                        </div>
                        <div class="drag drag-letter">
                            <input class="file-upload-input" type="file" name="coverLetterFile" onchange="readCoverURL(this);"
                                accept="application/pdf,application/msword" />
                            <div class="drag-text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.773" viewBox="0 0 18 15.773">
                                    <g id="drag" transform="translate(0 -18.375)">
                                      <path id="Path_3" data-name="Path 3" d="M74.458,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,74.458,203.144Z" transform="translate(-69.374 -173.571)" fill="#687284"/>
                                      <path id="Path_4" data-name="Path 4" d="M37.528,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,37.528,203.144Z" transform="translate(-34.682 -173.571)" fill="#687284"/>
                                      <path id="Path_5" data-name="Path 5" d="M111.388,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,203.144Z" transform="translate(-104.066 -173.571)" fill="#687284"/>
                                      <path id="Path_6" data-name="Path 6" d="M148.308,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,148.308,203.144Z" transform="translate(-138.748 -173.571)" fill="#687284"/>
                                      <path id="Path_7" data-name="Path 7" d="M.608,203.144a.608.608,0,1,0,.43.178A.612.612,0,0,0,.608,203.144Z" transform="translate(0 -173.571)" fill="#687284"/>
                                      <path id="Path_8" data-name="Path 8" d="M.608,129.235a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,129.235Z" transform="translate(0 -104.141)" fill="#687284"/>
                                      <path id="Path_9" data-name="Path 9" d="M.608,92.275a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,92.275Z" transform="translate(0 -69.421)" fill="#687284"/>
                                      <path id="Path_10" data-name="Path 10" d="M.608,55.326a.608.608,0,1,0,.608.608A.607.607,0,0,0,.608,55.326Z" transform="translate(0 -34.712)" fill="#687284"/>
                                      <path id="Path_11" data-name="Path 11" d="M.608,166.185a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,166.185Z" transform="translate(0 -138.852)" fill="#687284"/>
                                      <path id="Path_12" data-name="Path 12" d="M.608,18.376a.608.608,0,1,0,.43,1.037.607.607,0,0,0-.43-1.037Z" transform="translate(0 -0.001)" fill="#687284"/>
                                      <path id="Path_13" data-name="Path 13" d="M148.308,19.592a.608.608,0,1,0-.608-.608A.607.607,0,0,0,148.308,19.592Z" transform="translate(-138.748 -0.002)" fill="#687284"/>
                                      <path id="Path_14" data-name="Path 14" d="M185.237,19.592a.608.608,0,1,0-.608-.608A.608.608,0,0,0,185.237,19.592Z" transform="translate(-173.439 -0.002)" fill="#687284"/>
                                      <path id="Path_15" data-name="Path 15" d="M74.458,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,74.458,18.376Z" transform="translate(-69.374 -0.001)" fill="#687284"/>
                                      <path id="Path_16" data-name="Path 16" d="M37.528,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,37.528,18.376Z" transform="translate(-34.682 -0.001)" fill="#687284"/>
                                      <path id="Path_17" data-name="Path 17" d="M111.388,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,18.376Z" transform="translate(-104.066 -0.001)" fill="#687284"/>
                                      <path id="Path_18" data-name="Path 18" d="M222.166,19.59a.608.608,0,1,0-.43-.178A.612.612,0,0,0,222.166,19.59Z" transform="translate(-208.13 0)" fill="#687284"/>
                                      <path id="Path_19" data-name="Path 19" d="M222.167,93.491a.608.608,0,1,0-.608-.608A.607.607,0,0,0,222.167,93.491Z" transform="translate(-208.131 -69.422)" fill="#687284"/>
                                      <path id="Path_20" data-name="Path 20" d="M222.167,56.542a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,56.542Z" transform="translate(-208.131 -34.712)" fill="#687284"/>
                                      <path id="Path_21" data-name="Path 21" d="M222.167,130.451a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,130.451Z" transform="translate(-208.131 -104.142)" fill="#687284"/>
                                      <path id="Path_22" data-name="Path 22" d="M167.344,142.417l-7.124-2.606a.608.608,0,0,0-.781.776l2.579,7.2a.608.608,0,0,0,.561.4h.012a.608.608,0,0,0,.564-.381l.967-2.408,2.034,2.056a.608.608,0,1,0,.864-.855l-2.047-2.069,2.393-.982a.608.608,0,0,0-.022-1.133Zm-3.672,1.335a.608.608,0,0,0-.333.336l-.716,1.782-1.6-4.472,4.434,1.622Z" transform="translate(-149.743 -114.041)" fill="#687284"/>
                                    </g>
                                  </svg>

                                <h3 class="drag-title">Drag your Cover Letter to upload</h3>
                                <p class="drag-description">
                                    <span class="text-decoration-underline text-primary">Click to upload</span> or drag and drop. Only .docs, .pdf file are accepted
                                    Size : 200kb
                                </p>
                            </div>
                        </div>
                        <div class="type-cover-letter-box mt-3">
                            <p class="text_borders" id="coverLetterInputToggle">
                                Or Type Your Letter Here <i class="fas fa-chevron-down"></i>
                            </p>
                            <textarea class="form-control textarea_cover_letter" name="coverLetter" id="textareaCoverLetter" style="display: none;"></textarea>
                        </div>
                        <div class="text-center">
                            <span class="error">File not allowed <br> <i>Allowed Files: pdf, docx,
                                    doc</i></span>
                        </div>
                        {{-- <input type="text" name="coverLetter" class="form-control" placeholder="Cover Letter">
                        <input type="file" name="coverLetterDoc" class="form-control"> --}}
                        <div class="text-center mt-3 pb-4">
                            <p class="text-danger d-none" id="alert-text">Please select resume</p>
                            <span class="close close_2 me-2">Cancel</span>
                            <button type="button" oncanplay="UploadFile()" onclick="validateAndSend()"
                                class="default-btn upload">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    @endif

    @yield('bottom_script')

    <script src="{{ asset('js/app.js') }}"></script>

    {{-- maps --}}
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&libraries=places&language=en">
    </script>
    <script>
        initializeAutocomplete();
        function initializeAutocomplete()
        {
            // google.maps.event.addDomListener(window, 'load', function() {
                // var places = new google.maps.places.Autocomplete(document.getElementById('searchInput'));
                // google.maps.event.addListener(places, 'place_changed', function() {
                //     var place = places.getPlace();
                //     var address = place.formatted_address;
                //     var latitude = place.geometry.location.lat();
                //     var longitude = place.geometry.location.lng();
                //     var latlng = new google.maps.LatLng(latitude, longitude);
                //     var geocoder = geocoder = new google.maps.Geocoder();
                //     var response = getAddress(latitude, longitude);
                //     console.log(response);
                //     geocoder.geocode({
                //         'latLng': latlng
                //     }, function(results, status) {
                //         if (status == google.maps.GeocoderStatus.OK) {
                //             if (results[0]) {
                //                 console.log(results);
                //                 for (let i = 0; i < results[0].address_components.length; i++) {

                //                     // if(results[0].address_components[i].types[0] == "administrative_area_level_1")
                //                     // {
                //                     //     var state =  results[0].address_components[i].long_name;
                //                     // }
                //                     if (results[0].address_components[i].types[0] != "undefine") {
                //                         if (results[0].address_components[i].types[0] ==
                //                             "administrative_area_level_1") {
                //                             var state = results[0].address_components[i].long_name;
                //                         }
                //                         if (results[0].address_components[i].types[0] == "locality") {
                //                             var city = results[0].address_components[i].long_name;

                //                         } else if (results[0].address_components[i].types[0] ==
                //                             "administrative_area_level_2") {
                //                             var city = results[0].address_components[i].long_name;
                //                         }

                //                         if (results[0].address_components[i].types[0] ==
                //                             "postal_code") {

                //                             var pin = results[0].address_components[i].long_name;

                //                         }

                //                         if (pin == null) {

                //                             if (results[0].address_components[i].types[0] ==
                //                                 "postal_code_suffix") {

                //                                 var pin = results[0].address_components[i].long_name;

                //                             }


                //                         }
                //                     } else {
                //                         errorModal("Please Provide Proper Address with House Number");
                //                     }
                //                     // if(results[0].address_components[i].types[0] == "postal_code_suffix")
                //                     // {
                //                     //     var pin =  results[0].address_components[i].long_name;
                //                     // }
                //                 }
                //                 // console.log(results)
                //                 var address = results[0].formatted_address;

                //                 var pin = results[0].address_components[results[0].address_components.length - 1].long_name;

                //                 var country = results[results.length - 1].formatted_address;
                //                 // var country = results[0].address_components[results[0].address_components.length - 3].long_name;
                //                 // var state = results[0].address_components[results[0].address_components.length - 4].long_name;
                //                 // var city = results[0].address_components[results[0].address_components.length - 6].long_name;
                //                 if (document.getElementById('country') != undefined) {
                //                     document.getElementById('country').value = country;
                //                 }
                //                 // console.log(city);
                //                 // document.getElementById('State').value = state;
                //                 if (document.getElementById('city') != undefined) {
                //                     document.getElementById('city').value = city;
                //                 }
                //                 // document.getElementById('zipCode').value = pin;
                //                 if (document.getElementById('zip_code') != undefined) {
                //                     if(pin != country)
                //                     {
                //                         document.getElementById('zip_code').value = pin;
                //                     }
                //                     else{
                //                         document.getElementById('zip_code').value = null;
                //                     }
                //                 }
                //                 document.getElementById('latitude').value = latitude;
                //                 document.getElementById('longitude').value = longitude;

                //                 var myaddressvalue = document.getElementById('searchInput').value;
                //                 //    console.log(myaddressvalue);

                //                 var myarr = myaddressvalue.split(",");

                //                 //    console.log(myarr[0]);

                //                 document.getElementById('searchInput').value = myarr[0];

                //                 //         var geocoder = new google.maps.Geocoder();
                //                 //         var postalCode = pin;
                //                 //         geocoder.geocode({ 'address': pin }, function (results, status) {
                //                 //             console.log(google.maps.GeocoderStatus);
                //                 //             if (status == google.maps.GeocoderStatus.OK) {
                //                 //                 var address1 = results[0].formatted_address;
                //                 //                 var pin1 = results[0].address_components[results[0].address_components.length - 1].long_name;
                //                 //                 var country1 = results[0].address_components[results[0].address_components.length - 2].long_name;
                //                 //                 var state1 = results[0].address_components[results[0].address_components.length - 3].long_name;
                //                 //                 var city1 = results[0].address_components[results[0].address_components.length - 4].long_name;
                //                 //                 document.getElementById('txtCountry').value = country;
                //                 //                 document.getElementById('txtState').value = state;
                //                 //                 document.getElementById('txtCity').value = city;
                //                 //             }
                //                 //         });

                //             }
                //         }
                //     });
                // });
                var inputElements = document.getElementsByClassName('searchInput');
                for (var i = 0; i < inputElements.length; i++) {
                    var places = new google.maps.places.Autocomplete(inputElements[i]);
                    google.maps.event.addListener(places, 'place_changed', function() {
                        var place = places.getPlace();
                        var address = place.formatted_address;
                        var latitude = place.geometry.location.lat();
                        var longitude = place.geometry.location.lng();
                        var latlng = new google.maps.LatLng(latitude, longitude);
                        var geocoder = geocoder = new google.maps.Geocoder();
                        var response = getAddress(latitude, longitude);
                        console.log(response);
                        geocoder.geocode({
                            'latLng': latlng
                        }, function(results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    console.log(results);
                                    for (let i = 0; i < results[0].address_components.length; i++) {

                                        // if(results[0].address_components[i].types[0] == "administrative_area_level_1")
                                        // {
                                        //     var state =  results[0].address_components[i].long_name;
                                        // }
                                        if (results[0].address_components[i].types[0] != "undefine") {
                                            if (results[0].address_components[i].types[0] ==
                                                "administrative_area_level_1") {
                                                var state = results[0].address_components[i].long_name;
                                            }
                                            if (results[0].address_components[i].types[0] == "locality") {
                                                var city = results[0].address_components[i].long_name;

                                            } else if (results[0].address_components[i].types[0] ==
                                                "administrative_area_level_2") {
                                                var city = results[0].address_components[i].long_name;
                                            }

                                            if (results[0].address_components[i].types[0] ==
                                                "postal_code") {

                                                var pin = results[0].address_components[i].long_name;

                                            }

                                            if (pin == null) {

                                                if (results[0].address_components[i].types[0] ==
                                                    "postal_code_suffix") {

                                                    var pin = results[0].address_components[i].long_name;

                                                }


                                            }
                                        } else {
                                            errorModal("Please Provide Proper Address with House Number");
                                        }
                                        // if(results[0].address_components[i].types[0] == "postal_code_suffix")
                                        // {
                                        //     var pin =  results[0].address_components[i].long_name;
                                        // }
                                    }
                                    // console.log(results)
                                    var address = results[0].formatted_address;

                                    var pin = results[0].address_components[results[0].address_components.length - 1].long_name;

                                    var country = results[results.length - 1].formatted_address;
                                    // var country = results[0].address_components[results[0].address_components.length - 3].long_name;
                                    // var state = results[0].address_components[results[0].address_components.length - 4].long_name;
                                    // var city = results[0].address_components[results[0].address_components.length - 6].long_name;
                                    if (document.getElementById('country') != undefined) {
                                        document.getElementById('country').value = country;
                                    }
                                    // console.log(city);
                                    // document.getElementById('State').value = state;
                                    if (document.getElementById('city') != undefined) {
                                        document.getElementById('city').value = city;
                                    }
                                    // document.getElementById('zipCode').value = pin;
                                    if (document.getElementById('zip_code') != undefined) {
                                        if(pin != country)
                                        {
                                            document.getElementById('zip_code').value = pin;
                                        }
                                        else{
                                            document.getElementById('zip_code').value = null;
                                        }
                                    }
                                    document.getElementById('latitude').value = latitude;
                                    document.getElementById('longitude').value = longitude;

                                    var myaddressvalue = $('.institute_loc').val();
                                    //    console.log(myaddressvalue);

                                    var myarr = myaddressvalue.split(",");

                                    //    console.log(myarr[0]);

                                    $('.institute_loc').val(myarr[0]);

                                    //         var geocoder = new google.maps.Geocoder();
                                    //         var postalCode = pin;
                                    //         geocoder.geocode({ 'address': pin }, function (results, status) {
                                    //             console.log(google.maps.GeocoderStatus);
                                    //             if (status == google.maps.GeocoderStatus.OK) {
                                    //                 var address1 = results[0].formatted_address;
                                    //                 var pin1 = results[0].address_components[results[0].address_components.length - 1].long_name;
                                    //                 var country1 = results[0].address_components[results[0].address_components.length - 2].long_name;
                                    //                 var state1 = results[0].address_components[results[0].address_components.length - 3].long_name;
                                    //                 var city1 = results[0].address_components[results[0].address_components.length - 4].long_name;
                                    //                 document.getElementById('txtCountry').value = country;
                                    //                 document.getElementById('txtState').value = state;
                                    //                 document.getElementById('txtCity').value = city;
                                    //             }
                                    //         });

                                }
                            }
                        });
                    });
                }
            // });
        }

        function getAddress(latitude, longitude) {
            return new Promise(function(resolve, reject) {
                var request = new XMLHttpRequest();

                var method = 'GET';
                var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude +
                    '&key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&sensor=true';
                var async = true;

                request.open(method, url, async);
                request.onreadystatechange = function() {
                    if (request.readyState == 4) {
                        if (request.status == 200) {
                            var data = JSON.parse(request.responseText);
                            console.log(data);
                            var address = data.results[0];
                            resolve(address);
                        } else {
                            reject(request.status);
                        }
                    }
                };
                request.send();
            });
        };
    </script>

    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe_fLxQFXdTRd7JsWf2MiHzwjMhIupJ0A&libraries=places&callback=initAutocomplete"
        async defer></script> --}}

    <script>

        $("#coverLetterInputToggle").click(function(){
            $("#textareaCoverLetter").toggle('slow')
        })


        var btn = $('#backToTop');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 600) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
    </script>
    <script>
        // ChatBox start
    $('#chatBox').click(function() {
        $('#chatBoxList').toggle(200);
        $(".fa-chevron-down, .fa-chevron-up").toggleClass("fa-chevron-down fa-chevron-up");
    })

    $('.chat-top .fa-plus').click(function() {
        $(this).toggleClass('fa-plus fa-minus');
        let messageBottom = $('.message-bottom');
        $(this).closest('.chat-top').siblings('.message-bottom').toggle(200);
        console.log('close')
        // $(this).closest.('.chat-top').siblings('.message-bottom').toggle(200);
        // console.log($(this).closest('.chat-top').siblings('.message-bottom').toggle(200));
        // $(messageBottom).toggle(200);
    });


    function closeMsgBox(id) {
        console.log(id);
        var id = id;
        $('#chatBoxSingle' + id).remove();
    }

    function MinMsgBox(id) {
        var x = $('#message-bottom-' + id).css('display');
        if (x == "none") {
            $("#min-" + id).removeClass('fa-plus');
            $("#min-" + id).addClass('fa-minus');
            $('#message-bottom-' + id).css('display', 'block');
        } else {
            $("#min-" + id).removeClass('fa-minus');
            $("#min-" + id).addClass('fa-plus');
            $('#message-bottom-' + id).css('display', 'none')
        }
    }
    $('#chatBoxPerson-0').click(function() {
        $('#chatBoxSingle-0').removeClass('d-none');
    })
    $('#chatBoxPerson-1').click(function() {
        $('#chatBoxSingle-1').removeClass('d-none');
    })
    // ChatBox end
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        // function geoSuccess(position) {
        //     var lat = position.coords.latitude;
        //     var lng = position.coords.longitude;

        //     alert("lat:" + lat + " lng:" + lng);
        // }
        function geoError() {
            alert("Geocoder failed.");
        }

        function geoSuccess(position) {
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            console.log("lat:" + lat + " lng:" + lng);
            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lng;
            codeLatLng(lat, lng);
        }
        var geocoder;

        function initialize() {
            geocoder = new google.maps.Geocoder();
        }

        function codeLatLng(lat, lng) {
            var latlng = new google.maps.LatLng(lat, lng);
            geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results)
                    if (results[1]) {
                        //formatted address
                        var address = results[0].formatted_address;
                        alert("address = " + address);
                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            });
        }
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&callback=getLocation">
        async defer
    </script> --}}
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&callback=getLocation">
        async defer
    </script> --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // required cv
        function validateAndSend() {
            console.log('myForm.new_doc.value.length', myForm.new_doc.value.length);
            if (myForm.new_doc.value.length == 0) {
                const radioButtons = document.querySelectorAll('input[name="cv_file"]');
                for (const radioButton of radioButtons) {
                    console.log(radioButton.checked);
                    if (radioButton.checked == true) {
                        $("#alert-text").addClass("d-none");
                        var element = document.getElementById('payment_loader');
                        element.classList.remove('d-none');
                        element.classList.add('d-flex');
                        myForm.submit();
                        break;
                        return false;

                    }
                    else {
                        $("#alert-text").removeClass("d-none");
                        return false;
                    }
                }
                // alert('check.hostingladz.com.');
            } else {
                $("#alert-text").addClass("d-none");
                myForm.submit();
            }
        }
        // end required

        var instance = $("[name=country_code]")
        // instance.intlTelInput();
        $(".mobile-number").intlTelInput({
            preferredCountries: ["us"],
            separateDialCode: true,
        });

        $(".mobile-number").on("focus", function() {
            var temp = $(".iti__selected-dial-code").html();
            $(".mobile-number").val(temp);
            // console.log($(".mobile-number").intlTelInput("getSelectedCountryData")) //get counrty code
        });

        var x = $(".mobile-number").intlTelInput("getSelectedCountryData").dialCode;
        console.log(x);
        $(".mobile-number").val("+" + x);
        // $(".mobile-number").intlTelInput({preferredCountries: ["es"],separateDialCode: true,});

        $(".mobile-number-full").keydown(function(e) {
            // console.log(e);
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // console.log("check1");
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
                // console.log("check2");
            }
        });

        $.fn.select2.amd.require(['select2/selection/search'], function(Search) {
            var oldRemoveChoice = Search.prototype.searchRemoveChoice;

            Search.prototype.searchRemoveChoice = function() {
                oldRemoveChoice.apply(this, arguments);
                this.$search.val('');
            };

            $(".select2-multiple").select2({
                placeholder: "Select",
                placeholder: function() {
                    $(this).data('placeholder');
                },
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            });

            $('.editSkills').select2({
                placeholder: "Select Skills",
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            });

            $(".languages__select").select2({
                maximumSelectionLength: 3,
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            });
        });


        $(document).ready(function() {


            // $(".mobile-number").val(x);
            // Select2 Multiple
            // $('.select2-multiple').select2({
            //     placeholder: "Select",

            //     // allowClear: true
            // });
            // $('.editSkills').select2({
            //     placeholder: "Select Skills",
            //     // allowClear: true
            // });

        });

        $('#resetButton').click(() => {
            $('#search_job input[type=checkbox]').prop('checked', false);
            $('#search_job input[type=text]').val('');

            let url = "{{ route('job.browse') }}";
            document.location.href = url;
        })
        $('#resetCand').click(() => {
            $('#search_job input[type=checkbox]').prop('checked', false);
            $('#search_job input[type=text]').val('');

            let url = "{{ route('candidates.list') }}";
            document.location.href = url;
        })
        $('#searchPageReset').click(() => {
            $('#search_job input[type=checkbox]').prop('checked', false);
            $('#search_job input[type=text]').val('');

            let url = "{{ route('search.Keyword.view') }}";
            document.location.href = url;
        })
        $('#employerReset').click(() => {
            $('#search_comp input[type=checkbox]').prop('checked', false);
            $('#search_comp input[type=text]').val('');

            let url = "{{ route('employer.list') }}";
            document.location.href = url;
        })
        $('#recruiterReset').click(() => {
            $('#search_comp input[type=checkbox]').prop('checked', false);
            $('#search_comp input[type=text]').val('');

            let url = "{{ route('recruiter.list') }}";
            document.location.href = url;
        })
    </script>
    <script>
        $(function() {
            $("#addbtn").bind("click", function() {
                // start scroll bottom
                var documentHeight = $(document).height();
                var windowHeight = $(window).height();

                $('html, body').animate({
                    scrollTop: documentHeight - windowHeight
                }, 500)
                // end scroll bottom
                var div = $("<div class='append-div' />");
                var check = div.html(GetDynamicTextBox(""));
                $(".first-sec").append(div);
                var numItems = $('.append-div').length;
                var newId = 'append-div' + numItems;
                $(check[0]).attr('id', newId);
                $('#' + newId + '> .clone input').val("");
                $('#' + newId + '> .clone textarea').val("");

                $('#' + newId + '> .clone #startDate0').attr('id', 'startDate0' + numItems);
                $('#' + newId + '> .clone [for*=startDate0]').attr('for', 'startDate0' + numItems);

                $('#' + newId + '> .clone #toDate0').attr('disabled', false);
                $('#' + newId + '> .clone #toDate0').attr('id', 'toDate' + numItems).css('display', "flex");
                $('#' + newId + '> .clone #presentText0').attr('id', 'presentText' + numItems).css('display', "none");
                $('#' + newId + '> .clone [for*=toDate0]').attr('for', 'toDate' + numItems);
                // $('#' + newId + '> .clone [for*=toDate0]').attr('for', 'toDate' + numItems);

                $('#' + newId + '> .clone #currentlyWorkHere0').attr('onchange', 'changeToDate(' +
                    numItems + ')');
                $('#' + newId + '> .clone #currentlyWorkHere0').attr('id', 'currentlyWorkHere' + numItems);
                $('#' + newId + '> .clone [for*=currentlyWorkHere0]').attr('for', 'currentlyWorkHere' +
                    numItems);
                $(function() {
                    $('.datepicker').datepicker({
                        autoclose: true,
                        format: 'dd/mm/yyyy',
                    });
                });

                // console.log($('#'+newId +'> .clone #startDate0').attr('id','startDate0'+numItems));
                // console.log($('#'+newId +'> .clone [for*=startDate0]').attr('for','startDate0'+numItems));
                initializeAutocomplete();
            });
            $("body").on("click", ".remove", function(e) {
                e.target.parentElement.parentElement.parentElement.remove();
                $("html, body").animate({
                    scrollTop: 0
                }, 500);
            });
        });

        function GetDynamicTextBox() {
            return document.querySelector(".clone").outerHTML;
        }
    </script>
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/anime.min.js') }}"></script>
    <script src="{{ asset('js/tilt.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/libraries.js') }}"></script> --}}
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

        function readURL(input) {
            if (input.files && input.files[0]) {
                $('.error').hide()
                var reader = new FileReader();

                var fileSize = (input.files[0].size / (1024 * 1024)).toFixed(2) + 'mb'
                var fileType = input.files[0].name;
                var fileTypeExt = fileType.split('.').pop();

                if (fileTypeExt == 'docx' || fileTypeExt == 'doc' || fileTypeExt == 'pdf') {
                    reader.onload = function(e) {
                        $('.file-upload-wrap .drag-cv').hide();
                        $('.file-upload-content-cv').css("display", "flex").hide().fadeIn();

                        $('.file-title-cv').html(input.files[0].name);
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
        function readCoverURL(input) {
            if (input.files && input.files[0]) {
                $('.error').hide()
                var reader = new FileReader();

                var fileSize = (input.files[0].size / (1024 * 1024)).toFixed(2) + 'mb'
                var fileType = input.files[0].name;
                var fileTypeExt = fileType.split('.').pop();

                if (fileTypeExt == 'docx' || fileTypeExt == 'doc' || fileTypeExt == 'pdf') {
                    reader.onload = function(e) {
                        $('.file-upload-wrap .drag-letter').hide();
                        $('.file-upload-content-letter').css("display", "flex").hide().fadeIn();

                        $('.file-title-letter').html(input.files[0].name);
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

                    // $('input[type="radio"]').attr('disabled', true);
                    // $('input[type="radio"]').prop('checked', false);
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
            $('.drag-cv .file-upload-input').val('');
            $('.file-upload-content-cv').hide();
            $('.file-upload-wrap .drag-cv').show();
            $('input[type="radio"]').attr('disabled', false);
            $('li .wrap svg, li .wrap label').css('opacity', '1');
        }
        function removeCoverUpload() {
            // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
            $('.drag-letter .file-upload-input').val('');
            $('.file-upload-content-letter').hide();
            $('.file-upload-wrap .drag-letter').show();
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
                    removeCoverUpload();
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
                removeCoverUpload();
            }, 400)
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://mojoaxel.github.io/bootstrap-select-country/dist/js/bootstrap-select-country.min.js"></script>
    <script>
        $(".worksQuicklyBtn").click(function() {
            $(".worksQuickly").toggle(500);
            $(this).text(function(i, text) {
                // return text === "View more" ? "view less" : "View more";
                return text === "View less" ? "View more" : "View less";
            })
        });
    </script>
    <script>
        $(document).ready(function($) {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'), {
                html: true
            })
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })

            $('.map1').popover({
                title: '',
                content: '<h3>Function</h3><p class="">Indicates candidate has met all criteria and surpassed expectations to achieve scores within the top 5% of candidates.</p><h3>Business Benefit</h3><p class="">Provides a significant strategic hiring advantage to identify highly talented candidates as they become known in the wild in real time to  contact and secure for interview.</p>',
                html: true,
                placement: "top",
                customClass: 'map_popover',
                trigger: "focus"
            });

            $('.map2').popover({
                title: '',
                content: '<h3>Function</h3><p class="">Indicates candidate achieved a score of 80% but less than 95%</p><h3>Business Benefit</h3><p class="">Creates a 2nd tier of candidates that act as redundant candidates if the 95% plus candidates are unavailable or have found other roles.</p>',
                html: true,
                placement: "top",
                customClass: 'map_popover',
                trigger: "focus"
            });

            $('.map3').popover({
                title: '',
                content: '<h3>Function</h3><p class="">Indicates candidate did not meet minimum criteria</p><h3>Business Benefit</h3><p class="">Time is saved by instantly filtering out candidates that are suitable for other roles than the one they have applied for.</p>',
                html: true,
                placement: "top",
                customClass: 'map_popover',
                trigger: "focus"
            });
        })
    </script>

</body>

</html>
