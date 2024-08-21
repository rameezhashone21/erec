<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Candidate</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('imgs/fav-icon.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <!-- font-awesome/6.1.1 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- font-awesome/6.1.1 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
    integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- slick slider -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <!-- DataTable -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap5.min.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
  <!-- DataTable -->

  <!-- input type phone jquery -->
  <link rel="stylesheet" href="{{ asset('dashboard/css/intlTelInput.min.css') }}">
  <!-- input type phone jquery -->

  <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashboard/css/theme.css') }}">

  <style>
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
  <a id="backToTop"><i class="fa-solid fa-arrow-up-long"></i></a>
  {{-- Header --}}
  @if (!Route::is('get.pdf.file'))
    @include('candidatepanel.includes.header')
  @endif
  {{-- Header end --}}

  <main class="bg-light">
    @if (!Route::is('get.pdf.file'))
      <form id="msform" class="avatar-form" name="change_avatar" enctype="multipart/form-data">
        <div class="cover-edit-box global_cover">
          <div class="cover_picture ">
            {{-- {{ dd($user->user->id) }} --}}
            @csrf
            <input type="hidden" name="source" value="api" />
            <label class="-label" for="file">
              <i class="fa-solid fa-camera"></i>
            </label>
            <input id="file" type="file" onchange="loadFile(event)" class="file-upload" name="banner" />
            {{-- <img src="{{ asset('dashboard/images/candidate.png') }}" id="output" /> --}}
            @if (isset(auth()->user()->banner))
              <img src="{{ asset('storage/' . auth()->user()->banner) }}" alt="profile-img" id="output">
            @else
              <img src="{{ asset('dashboard/images/candidate.png') }}" id="output" />
            @endif
          </div>
        </div>
      </form>
    @endif
    <div class="container margin-top-minus-all position-relative">
      <div class="row">

        {{-- Sidebar --}}
        @if (!Route::is('get.pdf.file'))
          @include('candidatepanel.includes.sidebar')
        @endif
        {{-- Sidebar end --}}

        {{-- Main Content --}}
        @yield('content')
        {{-- Main Content end --}}


      </div>
    </div>

    <div id="okok">

    </div>
    @if (!Route::is('get.pdf.file'))
      <div id="app2" data-fetch-route="{{ route('fetch.messages') }}"
        data-connected="{{ route('company.connectedRecruiter') }}" data-send="{{ route('send.messages') }}">
        <global-chat :connected="connected" :messages="messages" :user="{{ Auth::user() }}"
          :route_fetch="'{{ route('fetch.messages') }}'"
          :route_fetch_indivisual="'{{ route('fetch.messages.individual') }}'"
          :route_send_messages="'{{ route('send.messages') }}'"
          :route_company_connectedRecruiter="'{{ route('company.connectedRecruiter') }}'"
          v-on:messagesent="addMessage"></global-chat>
      </div>
    @endif
  </main>


  @if (!Route::is('get.pdf.file'))
    <div class="modal-apply candidate_apply_modal">
      <div class="file-upload">
        <div class="file_upload_inner_div">
          <span class="close"></span>
          <div id="payment_loader" class='loader_payment_container d-none justify-content-center align-items-center'> 
            <div class='loader_payment'> </div> 
          </div>
          <div class="file-upload-wrap">
            <form method="post" action="{{ route('candidates.applyNow') }}" enctype="multipart/form-data"
              name="myForm">
              @csrf
              {{-- {{ dd($row->id); }} --}}
              <input type="hidden" name="post_id" id="post_id" value="1" />
              <h4 class="py-3 fs-4">Resume</h4>
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
                        <path id="Path_3" data-name="Path 3"
                          d="M74.458,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,74.458,203.144Z"
                          transform="translate(-69.374 -173.571)" fill="#687284" />
                        <path id="Path_4" data-name="Path 4"
                          d="M37.528,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,37.528,203.144Z"
                          transform="translate(-34.682 -173.571)" fill="#687284" />
                        <path id="Path_5" data-name="Path 5"
                          d="M111.388,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,203.144Z"
                          transform="translate(-104.066 -173.571)" fill="#687284" />
                        <path id="Path_6" data-name="Path 6"
                          d="M148.308,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,148.308,203.144Z"
                          transform="translate(-138.748 -173.571)" fill="#687284" />
                        <path id="Path_7" data-name="Path 7"
                          d="M.608,203.144a.608.608,0,1,0,.43.178A.612.612,0,0,0,.608,203.144Z"
                          transform="translate(0 -173.571)" fill="#687284" />
                        <path id="Path_8" data-name="Path 8"
                          d="M.608,129.235a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,129.235Z"
                          transform="translate(0 -104.141)" fill="#687284" />
                        <path id="Path_9" data-name="Path 9"
                          d="M.608,92.275a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,92.275Z"
                          transform="translate(0 -69.421)" fill="#687284" />
                        <path id="Path_10" data-name="Path 10"
                          d="M.608,55.326a.608.608,0,1,0,.608.608A.607.607,0,0,0,.608,55.326Z"
                          transform="translate(0 -34.712)" fill="#687284" />
                        <path id="Path_11" data-name="Path 11"
                          d="M.608,166.185a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,166.185Z"
                          transform="translate(0 -138.852)" fill="#687284" />
                        <path id="Path_12" data-name="Path 12"
                          d="M.608,18.376a.608.608,0,1,0,.43,1.037.607.607,0,0,0-.43-1.037Z"
                          transform="translate(0 -0.001)" fill="#687284" />
                        <path id="Path_13" data-name="Path 13"
                          d="M148.308,19.592a.608.608,0,1,0-.608-.608A.607.607,0,0,0,148.308,19.592Z"
                          transform="translate(-138.748 -0.002)" fill="#687284" />
                        <path id="Path_14" data-name="Path 14"
                          d="M185.237,19.592a.608.608,0,1,0-.608-.608A.608.608,0,0,0,185.237,19.592Z"
                          transform="translate(-173.439 -0.002)" fill="#687284" />
                        <path id="Path_15" data-name="Path 15"
                          d="M74.458,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,74.458,18.376Z"
                          transform="translate(-69.374 -0.001)" fill="#687284" />
                        <path id="Path_16" data-name="Path 16"
                          d="M37.528,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,37.528,18.376Z"
                          transform="translate(-34.682 -0.001)" fill="#687284" />
                        <path id="Path_17" data-name="Path 17"
                          d="M111.388,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,18.376Z"
                          transform="translate(-104.066 -0.001)" fill="#687284" />
                        <path id="Path_18" data-name="Path 18"
                          d="M222.166,19.59a.608.608,0,1,0-.43-.178A.612.612,0,0,0,222.166,19.59Z"
                          transform="translate(-208.13 0)" fill="#687284" />
                        <path id="Path_19" data-name="Path 19"
                          d="M222.167,93.491a.608.608,0,1,0-.608-.608A.607.607,0,0,0,222.167,93.491Z"
                          transform="translate(-208.131 -69.422)" fill="#687284" />
                        <path id="Path_20" data-name="Path 20"
                          d="M222.167,56.542a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,56.542Z"
                          transform="translate(-208.131 -34.712)" fill="#687284" />
                        <path id="Path_21" data-name="Path 21"
                          d="M222.167,130.451a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,130.451Z"
                          transform="translate(-208.131 -104.142)" fill="#687284" />
                        <path id="Path_22" data-name="Path 22"
                          d="M167.344,142.417l-7.124-2.606a.608.608,0,0,0-.781.776l2.579,7.2a.608.608,0,0,0,.561.4h.012a.608.608,0,0,0,.564-.381l.967-2.408,2.034,2.056a.608.608,0,1,0,.864-.855l-2.047-2.069,2.393-.982a.608.608,0,0,0-.022-1.133Zm-3.672,1.335a.608.608,0,0,0-.333.336l-.716,1.782-1.6-4.472,4.434,1.622Z"
                          transform="translate(-149.743 -114.041)" fill="#687284" />
                      </g>
                    </svg>

                    <h3 class="drag-title">Drag and drop to upload your CV</h3>
                    <p class="drag-description">
                      <span class="text-decoration-underline text-primary">Click to upload</span>
                      or
                      drag and drop. Max size 10 MB. Files allowed: JPG, PNG, PDF
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
                        <div for="cv-file" class="cv__name">{{ $row->document }}</div>
                      </label>
                    </li>
                  @endforeach
                </ul>
              </div>
              <h4 class="py-3 fs-4">Cover Letter</h4>
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
                <input class="file-upload-input" type="file" name="coverLetterFile"
                  onchange="readCoverURL(this);" accept="application/pdf,application/msword" />
                <div class="drag-text">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="15.773" viewBox="0 0 18 15.773">
                    <g id="drag" transform="translate(0 -18.375)">
                      <path id="Path_3" data-name="Path 3"
                        d="M74.458,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,74.458,203.144Z"
                        transform="translate(-69.374 -173.571)" fill="#687284" />
                      <path id="Path_4" data-name="Path 4"
                        d="M37.528,203.144a.608.608,0,1,0,.608.608A.608.608,0,0,0,37.528,203.144Z"
                        transform="translate(-34.682 -173.571)" fill="#687284" />
                      <path id="Path_5" data-name="Path 5"
                        d="M111.388,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,203.144Z"
                        transform="translate(-104.066 -173.571)" fill="#687284" />
                      <path id="Path_6" data-name="Path 6"
                        d="M148.308,203.144a.608.608,0,1,0,.608.608A.607.607,0,0,0,148.308,203.144Z"
                        transform="translate(-138.748 -173.571)" fill="#687284" />
                      <path id="Path_7" data-name="Path 7"
                        d="M.608,203.144a.608.608,0,1,0,.43.178A.612.612,0,0,0,.608,203.144Z"
                        transform="translate(0 -173.571)" fill="#687284" />
                      <path id="Path_8" data-name="Path 8"
                        d="M.608,129.235a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,129.235Z"
                        transform="translate(0 -104.141)" fill="#687284" />
                      <path id="Path_9" data-name="Path 9"
                        d="M.608,92.275a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,92.275Z"
                        transform="translate(0 -69.421)" fill="#687284" />
                      <path id="Path_10" data-name="Path 10"
                        d="M.608,55.326a.608.608,0,1,0,.608.608A.607.607,0,0,0,.608,55.326Z"
                        transform="translate(0 -34.712)" fill="#687284" />
                      <path id="Path_11" data-name="Path 11"
                        d="M.608,166.185a.608.608,0,1,0,.608.608A.608.608,0,0,0,.608,166.185Z"
                        transform="translate(0 -138.852)" fill="#687284" />
                      <path id="Path_12" data-name="Path 12"
                        d="M.608,18.376a.608.608,0,1,0,.43,1.037.607.607,0,0,0-.43-1.037Z"
                        transform="translate(0 -0.001)" fill="#687284" />
                      <path id="Path_13" data-name="Path 13"
                        d="M148.308,19.592a.608.608,0,1,0-.608-.608A.607.607,0,0,0,148.308,19.592Z"
                        transform="translate(-138.748 -0.002)" fill="#687284" />
                      <path id="Path_14" data-name="Path 14"
                        d="M185.237,19.592a.608.608,0,1,0-.608-.608A.608.608,0,0,0,185.237,19.592Z"
                        transform="translate(-173.439 -0.002)" fill="#687284" />
                      <path id="Path_15" data-name="Path 15"
                        d="M74.458,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,74.458,18.376Z"
                        transform="translate(-69.374 -0.001)" fill="#687284" />
                      <path id="Path_16" data-name="Path 16"
                        d="M37.528,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,37.528,18.376Z"
                        transform="translate(-34.682 -0.001)" fill="#687284" />
                      <path id="Path_17" data-name="Path 17"
                        d="M111.388,18.376a.608.608,0,1,0,.608.608A.607.607,0,0,0,111.388,18.376Z"
                        transform="translate(-104.066 -0.001)" fill="#687284" />
                      <path id="Path_18" data-name="Path 18"
                        d="M222.166,19.59a.608.608,0,1,0-.43-.178A.612.612,0,0,0,222.166,19.59Z"
                        transform="translate(-208.13 0)" fill="#687284" />
                      <path id="Path_19" data-name="Path 19"
                        d="M222.167,93.491a.608.608,0,1,0-.608-.608A.607.607,0,0,0,222.167,93.491Z"
                        transform="translate(-208.131 -69.422)" fill="#687284" />
                      <path id="Path_20" data-name="Path 20"
                        d="M222.167,56.542a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,56.542Z"
                        transform="translate(-208.131 -34.712)" fill="#687284" />
                      <path id="Path_21" data-name="Path 21"
                        d="M222.167,130.451a.608.608,0,1,0-.608-.608A.608.608,0,0,0,222.167,130.451Z"
                        transform="translate(-208.131 -104.142)" fill="#687284" />
                      <path id="Path_22" data-name="Path 22"
                        d="M167.344,142.417l-7.124-2.606a.608.608,0,0,0-.781.776l2.579,7.2a.608.608,0,0,0,.561.4h.012a.608.608,0,0,0,.564-.381l.967-2.408,2.034,2.056a.608.608,0,1,0,.864-.855l-2.047-2.069,2.393-.982a.608.608,0,0,0-.022-1.133Zm-3.672,1.335a.608.608,0,0,0-.333.336l-.716,1.782-1.6-4.472,4.434,1.622Z"
                        transform="translate(-149.743 -114.041)" fill="#687284" />
                    </g>
                  </svg>

                  <h3 class="drag-title">Drag your Cover Letter to upload</h3>
                  <p class="drag-description">
                    <span class="text-decoration-underline text-primary">Click to upload</span> or
                    drag
                    and drop. Max size 10 MB. Files allowed: JPG, PNG, PDF
                  </p>
                </div>
              </div>
              <div class="type-cover-letter-box mt-3">
                <p class="text_borders" id="coverLetterInputToggle">
                  Or Type Your Letter Here <i class="fas fa-chevron-down"></i>
                </p>
                <textarea class="form-control textarea_cover_letter" name="coverLetter" id="textareaCoverLetter"
                  style="display: none;"></textarea>
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

  {{-- Footer --}}
  @include('candidatepanel.includes.footer')
  {{-- Footer end --}}

  <script src=" {{ asset('/dashboard/js/jquery-3.6.0.min.js ') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  {{-- <script src="{{ asset('/dashboard/js/popper.min.js ') }}"></script>
    <script src="{{ asset('/dashboard/js/bootstrap.min.js ') }}"></script> --}}
  <!-- select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!-- select2 -->
  <!-- slick slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js "
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin=" anonymous " referrerpolicy="no-referrer "></script>
  <!-- DataTable -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
  <!-- DataTable -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput-jquery.min.js"
    integrity="sha512-9WaaZVHSw7oRWH7igzXvUExj6lHGuw6GzMKW7Ix7E+ELt/V14dxz0Pfwfe6eZlWOF5R6yhrSSezaVR7dys6vMg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- input type phone jquery -->
  <script src="{{ asset('/dashboard/js/intlTelInput-jquery.min.js') }}"></script>
  <!-- input type phone jquery -->

  <script src="{{ asset('/dashboard/js/theme.js ') }}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

  <script>
    $(document).ready(function() {
      $('[data-bs-toggle="tooltip"]').tooltip();
    });

    var btn = $('#backToTop');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
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


    // start change cover photo
    var loadFile = function(event) {
      var image = document.getElementById("output");
      image.src = URL.createObjectURL(event.target.files[0]);
      event.preventDefault();
      var frmData = new FormData($(".avatar-form")[0]);
      $.ajax({
          type: "POST",
          url: "{{ route('candidates.profile.update') }}",
          data: frmData,
          dataType: "json",
          encode: true,
          contentType: false,
          cache: false,
          processData: false,
        })
        .done(function(data) {
          successModal("Banner Has Been Successfully Updated...");
        }).fail(function(error) {
          var errors = error.responseJSON;
        });
    };
    // end change cover photo

    // start sidebar collapse functionality
    $('.not_collapsed').click(function() {
      if (!$(this).hasClass('collapsed')) {
        $('.collapse_button_parent').addClass('active__collapse_inner')
      } else {
        $('.collapse_button_parent').removeClass('active__collapse_inner')
      }
    });

    $(document).ready(function() {
      if ($('.collapse_items .collapse li').hasClass('active')) {
        $('.not_collapsed').removeClass('collapsed')
        $('.collapse_items .collapse').addClass('show')
        $('.side_bar_menu .collapse_button_parent ').addClass('active__collapse_inner')
      }
    });

    $(document).ready(function() {
      if ($('.collapse_button_parent').hasClass('active')) {
        $('.not_collapsed').removeClass('collapsed')
        $('.collapse_items .collapse').addClass('show')
        $(this).addClass('active__collapse')
      }
    });
    // end sidebar collapse functionality

    // else {
    // $('.collapse_button_parent').removeClass('active')
    // }

    $(function() {
      $('.datepicker').datepicker({
        autoclose: true,
        format: 'dd/mm/yyyy',
      });
    });

    function datepickerToday() {
      $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
      }).datepicker("setDate", 'now');
    }



    // start tagline count textarea word
    var textareaValLen = $('#tagline').val().length;
    $('#taglineChars').text(150 - textareaValLen);
    var maxLength = 150;
    $('#tagline').keyup(function() {
      var textlen = maxLength - $(this).val().length;
      $('#taglineChars').text(textlen);

    });
    // end tagline count textarea word




    // start tagline count textarea word
    var aboutTextareaValLen = $('#aboutText').val().length;
    $('#aboutTextChars').text(500 - aboutTextareaValLen);
    var maxLength2 = 500;
    $('#aboutText').keyup(function() {
      var textlen = maxLength2 - $(this).val().length;
      $('#aboutTextChars').text(textlen);

    });
    // end tagline count textarea word



    // start tagline count textarea word
    // let aboutTextareaValLen = $('#aboutTxt').val().length;
    // $('#aboutTxtChars').text(500 - aboutTextareaValLen);
    // var maxLength = 500;
    // $('#aboutTxt').keyup(function() {
    //     var textlen = maxLength - $(this).val().length;
    //     $('#aboutTxtChars').text(textlen);
    // });
    // end tagline count textarea word

    var instance = $("[name=country_code]")
    $(".mobile-number").intlTelInput({
      preferredCountries: ["us"],
      separateDialCode: true,
    });

    $(".mobile-number").on("focus", function() {
      var temp = $(".iti__selected-dial-code").html();
      $(".mobile-number").val(temp);
    });

    var x = $(".mobile-number").intlTelInput("getSelectedCountryData").dialCode;
    console.log(x);
    $(".mobile-number").val("+" + x);


    $.fn.select2.amd.require(['select2/selection/search'], function(Search) {
      var oldRemoveChoice = Search.prototype.searchRemoveChoice;

      Search.prototype.searchRemoveChoice = function() {
        oldRemoveChoice.apply(this, arguments);
        this.$search.val('');
      };

      $('.editSkills').select2({
        placeholder: "Select Skills",
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        // // allowClear: true
      });
      $('.select2-multiple').select2({
        placeholder: "Select",
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        // // allowClear: true
      });
      $(".languages__select").select2({
        maximumSelectionLength: 3,
        sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
      });


    });

    $('#editExperience').on('click', function() {
      $(".dashboard-form-2 .form-control").attr("disabled", false);
      $(".dashboard-form-2 .phoneNumber").hide();
      $(".dashboard-form-2 .phoneNumberEdit").show();

      // $("#firstform"+id+"").attr("disabled",false);
      $(".dashboard-form-2 .form-select").attr("disabled", false);
      $(".dashboard-form-2 #updateButton").show();

    });

    function editExp(id) {
      console.log(id);
      $(".dashboard-form-2-" + id + " .form-control").attr("disabled", false);
      $("#firstform" + id + "").attr("disabled", false);
      $(".dashboard-form-2-" + id + " .form-select").attr("disabled", false);
      $(".dashboard-form-2-" + id + " #toDate").attr("disabled", true);
      $(".dashboard-form-2-" + id + " #updateButton").show();
      $(".dashboard-form-2-" + id + " #currentlyWorkHereBox").show();
    }


    $('.editName').click(function() {
      $('#aboutme .text').hide();
      $(this).hide();
      $('#aboutme .txt-editor').show();
      $('#aboutme #btn-save-aboutme').show();
      $('#aboutme .txt-editor').focus();
      $('#about-me-cancel').click(function() {
        $('#aboutme .editName').show();
        $('#aboutme .text').show();
        $(this).hide();
        $('#aboutme .txt-editor').hide().val($('#aboutme .text').text());
        $('#btn-save-aboutme').hide();
      }).show()
    });

    const createOption = ({
      value,
      name,
      selected
    }) => {
      if (selected) {
        return `<option value="${value}" selected="">${name}</option>`
      }
      return `<option value="${value}">${name}</option>`
    }

    $('.editSkill').click(function() {
      $.ajax({
          type: "GET",
          url: "{{ route('candidates.getSkills') }}",
        }).done(function(data) {
          const allSkills = data.skill
          const candidateSkills = data.candSkills
          const mapped = candidateSkills.map(skill => allSkills.find(allSkill => allSkill.id === skill
            .skill_id).name)

          $('#skills .text').hide();
          $('#skills .txt-editor').show();
          $('#skills .txt-editor').focus();

          $('.txt-editor .select2-multiple').html(allSkills.map(skill => {
            return createOption({
              value: skill.id,
              name: skill.name,
              selected: mapped.includes(skill.name)
            })
          }).join(""))

          $('.txt-editor .select2-multiple').select2({
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
          });
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);
        });

      $(this).hide();
      $('#skills-cancel').click(function() {
        const skills = JSON.parse(document.querySelector("#skills-hidden-input").value)
        const allSkills = JSON.parse(document.querySelector("#skills-all-hidden-input").value)
        const mapped = skills.map(skill => skill.name)
        $('#skills .editSkill').show();
        $('#skills .text').show();
        $(this).hide();
        $('#skills .txt-editor').hide();
        $('#skills-save').hide();
        try {
          $('.txt-editor .select2-multiple').select2('destroy');
        } catch (errors) {
          console.log(errors)
        }

        $('.txt-editor .select2-multiple').html(allSkills.map(skill => {
          return createOption({
            value: skill.id,
            name: skill.name,
            selected: mapped.includes(skill.name)
          })
        }).join(""))

      }).show();
      $('#skills #skills-save').click(function() {
        $('#skills .editSkill').show();
        $('#skills-cancel').hide();
        $('#skills .text').show();
        $(this).hide();
        $('#secondform .txt-editor').hide();
        // $('.editSkill').show();
        $('#secondform .tags').show();
        // $('#skills-save').hide();
        $('#skills .txt-editor').hide();
        const items = document.querySelector('#skills .select2-selection__rendered')
        const spans = Array.from(items.querySelectorAll('li > span')).map((span) =>
          `<li><a>${span.innerText}</a></li>`).join("")
        $("#skills .tags").html(spans);
      }).show();
    });


    // var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    // var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    //     return new bootstrap.Tooltip(tooltipTriggerEl)
    // })

    function changeToDate() {
      if ($('#currentlyWorkHere').is(':checked')) {
        // $("#two").show();
        $("#toDate").attr("disabled", true);
      } else {
        $("#toDate").attr("disabled", false);
      }
    }
    $('document').get('change', function() {
      changeToDateUpdate();
    });

    function changeToDateUpdate() {
      if ($('#currentlyWorkHereUpdate').is(':checked')) {
        // $("#two").show();
        $("#toDateUpdate").attr("disabled", true);
      } else {
        $("#toDateUpdate").attr("disabled", false);
      }
    }

    // // start edit cover picturre
    // $('#editCoverPic').click(function() {
    //     let imageSrc = $('.cover__pic').attr('src');
    //     $('#output').attr('src', imageSrc)
    //     $('.cover-edit-box').show();
    //     $('.cover-not-edit-box').hide();
    //     $('#saveCoverPic').click(function() {
    //         let updateImage = $('#output').attr('src');
    //         $(this).hide();
    //         $('#cancelCoverPic').hide();
    //         $('.cover-edit-box').hide();
    //         $('.cover-not-edit-box').show();
    //         $('#editCoverPic').show();
    //         $('.cover__pic').attr('src', updateImage);
    //     }).show();
    //     $('#cancelCoverPic').click(function() {
    //         $(this).hide();
    //         $('#editCoverPic').show();
    //         $('.cover-edit-box').hide();
    //         $('.cover-not-edit-box').show();
    //         $('#saveCoverPic').hide();
    //     }).show();
    //     $(this).hide();
    // })
    // // end edit cover picturre

    // // start personal detail
    // $('#editPersonalInfo').click(function() {
    //     let firstNameVal = $('#firstName').val();
    //     let lastNameVal = $('#lastName').val();
    //     let dateOfBirthVal = $('#dateOfBirth').val();
    //     let genderSelect = $('#gender').find(":selected").val();
    //     let genderSelectTxt = $('#gender').find(":selected").text();
    //     let taglineVal = $('#tagline').val();
    //     let aboutTextVal = $('#aboutText').val();
    //     let textareaHeight = $('#tagline').height();
    //     let genderText = $('.gender-show').text();
    //     $('.personal-detail input').prop("disabled", false);
    //     $('.personal-detail textarea').prop("disabled", false);
    //     // $('.personal-detail select').prop("disabled", false);

    //     $(this).hide();
    //     console.log(textareaHeight);
    //     $('.characters').show();
    //     $('.calender-icon-2').show();
    //     $('.gender-show').hide();
    //     $('.gender-edit').show();
    //     $('#savePersonalInfo').click(function() {
    //         let genderValue = $('#gender').find(":selected").val();
    //         $('.gender-show').text(genderValue).show();
    //         $('.gender-show').show();
    //         $('.gender-edit').hide();
    //         $('.characters').hide();
    //         $('.calender-icon-2').hide();
    //         $('.personal-detail input').prop("disabled", true);
    //         $('.personal-detail textarea').prop("disabled", true);
    //         // $('.personal-detail select').prop("disabled", true);
    //         $('#cancelPersonalInfo').hide();
    //         $('#editPersonalInfo').show();
    //         $("textarea").each(function() {
    //             this.setAttribute("style", "height:" + (this.scrollHeight) +
    //                 "px;overflow-y:hidden;");
    //         }).on("input", function() {
    //             this.style.height = 0;
    //             this.style.height = (this.scrollHeight) + "px";
    //         });
    //         $(this).hide();
    //         // Swal.fire(
    //         //     'Good job!',
    //         //     'Your changes successfully updated',
    //         //     'success'
    //         // )
    //     }).show();
    //     $('#cancelPersonalInfo').click(function() {
    //         // maritialStatus
    //         const genderText = $('.gender-show')
    //         const genderselect = Array.from(document.querySelector('#gender').options)
    //             .map((item) => {
    //                 if (item.value === genderText.text()) {
    //                     return item.selected = true
    //                 }
    //             });
    //         $('#firstName').val(firstNameVal);
    //         $('#lastName').val(lastNameVal);
    //         $('#dateOfBirth').val(dateOfBirthVal);
    //         // $('#gender').find(":selected").val(genderSelect);
    //         // $('#gender').find(":selected").text(genderSelectTxt);
    //         $('#tagline').val(taglineVal);
    //         $('#aboutText').val(aboutTextVal);
    //         $('.characters').hide();
    //         $('.calender-icon-2').hide();
    //         $('.personal-detail input').prop("disabled", true);
    //         $('.personal-detail textarea').prop("disabled", true);
    //         // $('.personal-detail select').prop("disabled", true);
    //         $('#savePersonalInfo').hide();
    //         $('#editPersonalInfo').show();
    //         $(this).hide();
    //         $('#tagline').height(textareaHeight);
    //         $('.gender-show').show();
    //         $('.gender-edit').hide();
    //     }).show();

    // })
    // // end personal detail

    // // start edit contact detail
    // $('#editContactDetail').click(function() {
    //     let countryCode = $('#countryCode').val();
    //     let contactNumber = $('#contactNumber').val();
    //     let emailAddressVal = $('#emailAddress').val();
    //     let addressVal = $('#address').val();
    //     let zipCodeVal = $('#zipCode').val();
    //     $('.contact-detail input').prop("disabled", false);
    //     $('#saveContactDetail').click(function() {
    //         $('#cancelContactDetail').hide()
    //         $('.edit-phone-number').hide()
    //         $('.contact-number-text').show();
    //         $(this).hide();
    //         $('#editContactDetail').show();
    //         countryCode = $('#countryCode').val();
    //         contactNumber = $('#contactNumber').val();
    //         $('#countryCode').val(countryCode);
    //         $('#contactNumber').val(contactNumber);
    //         $('.country-code').text(countryCode);
    //         $('.contact-number').text(contactNumber);
    //         $('.contact-detail input').prop("disabled", true);
    //     }).show()
    //     $('#cancelContactDetail').click(function() {
    //         $('#saveContactDetail').hide()
    //         $('.edit-phone-number').hide()
    //         $('.contact-number-text').show();
    //         $(this).hide();
    //         $('#editContactDetail').show();
    //         $('#countryCode').val(countryCode);
    //         $('#contactNumber').val(contactNumber);
    //         $('.country-code').text(countryCode);
    //         $('.contact-number').text(contactNumber);
    //         $('#address').val(addressVal);
    //         $('#emailAddress').val(emailAddressVal);
    //         $('#zipCode').val(zipCodeVal);
    //         $('.contact-detail input').prop("disabled", true);
    //     }).show()
    //     $('.edit-phone-number').show()
    //     $('.contact-number-text').hide()
    //     $(this).hide()
    // })
    // // end edit contact detail

    // // start privacysettings detail
    // $('#editPrivacySettings').click(function() {
    //     let mobileNoText = $('.mobile-no-show').text();
    //     let emailAddressText = $('.email-address-show').text();
    //     let addressText = $('.address-show').text();
    //     let visaStatusText = $('.visa-status-show').text();
    //     $('.mobile-no-edit').show();
    //     $('.mobile-no-show').hide();
    //     $('.email-address-edit').show();
    //     $('.email-address-show').hide();
    //     $('.address-edit').show();
    //     $('.address-show').hide();
    //     $('.visa-status-edit').show();
    //     $('.visa-status-show').hide();
    //     $(this).hide();
    //     $('#cancelPrivacySettings').click(function() {
    //         $(this).hide();
    //         $('#savePrivacySettings').hide();
    //         $('#editPrivacySettings').show();
    //         $('.mobile-no-edit').hide();
    //         $('.mobile-no-show').show();
    //         $('.email-address-edit').hide();
    //         $('.email-address-show').show();
    //         $('.address-edit').hide();
    //         $('.address-show').show();
    //         $('.visa-status-edit').hide();
    //         $('.visa-status-show').show();
    //         // mobileNoSetting
    //         const mobileNoText = $('.mobile-no-show');
    //         const mobileNoSelect = Array.from(document.querySelector('#mobileNoSetting').options).map((
    //             item) => {
    //             if (item.value === mobileNoText.text()) {
    //                 return item.selected = true
    //             }
    //         });

    //         // emailAddressSetting
    //         const emailAddressText = $('.email-address-show');
    //         const emailAddressSettingSelect = Array.from(document.querySelector('#emailAddressSetting')
    //             .options).map((
    //             item) => {
    //             if (item.value === emailAddressText.text()) {
    //                 return item.selected = true
    //             }
    //         });

    //         // AddressSetting
    //         const addressText = $('.address-show');
    //         const addressSettingSelect = Array.from(document.querySelector('#addressSetting')
    //             .options).map((
    //             item) => {
    //             if (item.value === addressText.text()) {
    //                 return item.selected = true
    //             }
    //         });

    //         // visa status Setting
    //         const visaStatusText = $('.visa-status-show');
    //         const visaStatusSettingSelect = Array.from(document.querySelector('#visaStatus')
    //             .options).map((
    //             item) => {
    //             if (item.value === visaStatusText.text()) {
    //                 return item.selected = true
    //             }
    //         });
    //     }).show();
    //     $('#savePrivacySettings').click(function() {
    //         $(this).hide();
    //         $('#cancelPrivacySettings').hide();
    //         $('#editPrivacySettings').show();
    //         $('.mobile-no-edit').hide();
    //         $('.email-address-edit').hide();
    //         $('.address-edit').hide();
    //         $('.visa-status-edit').hide();
    //         let mobileNoSettingValue = $('#mobileNoSetting').find(":selected").val();
    //         let emailAddressSettingValue = $('#emailAddressSetting').find(":selected").val();
    //         let addressSettingValue = $('#addressSetting').find(":selected").val();
    //         let visaStatusValue = $('#visaStatus').find(":selected").val();
    //         $('.mobile-no-show').text(mobileNoSettingValue).show();
    //         $('.email-address-show').text(emailAddressSettingValue).show();
    //         $('.address-show').text(addressSettingValue).show();
    //         $('.visa-status-show').text(visaStatusValue).show();
    //     }).show();
    // })
    // // end privacysettings detail

    // // start edit other details
    // $('#editOtherDetail').click(function() {
    //     $('.nationality-show').hide();
    //     $('.nationality-edit').show();
    //     $('.religion-show').hide();
    //     $('.religion-edit').show();
    //     $('.maritialStatus-show').hide();
    //     $('.maritialStatus-edit').show();
    //     $('.visaStatus-show').hide();
    //     $('.visaStatus-edit').show();
    //     $('.driving-license-show').hide();
    //     $('.driving-license-edit').show();
    //     let nationalityText = $('.nationality-show').text();
    //     let drivingLicenseText = $('.driving-license-show').text();
    //     let religionText = $('.religion-show').text();
    //     let maritialStatusText = $('.maritialStatus-show').text();
    //     let visaStatusText = $('.visaStatus-show').text();
    //     $('.languages__select').prop("disabled", false);
    //     $(this).hide();
    //     $('#saveOtherDetail').click(function() {
    //         $('#cancelOtherDetail').hide();
    //         $('#editOtherDetail').show();
    //         let nationalityValue = $('#nationality').find(":selected").val();
    //         let religionValue = $('#religion').find(":selected").val();
    //         let maritialStatusValue = $('#maritialStatus').find(":selected").val();
    //         let visaStatusValue = $('#visaStatus').find(":selected").val();
    //         let drivingLicenseValue = $('#drivingLicense').find(":selected").text();
    //         $('.nationality-show').text(nationalityValue).show();
    //         $('.driving-license-show').text(drivingLicenseValue).show();
    //         $('.maritialStatus-show').text(maritialStatusValue).show();
    //         $('.visaStatus-show').text(visaStatusValue).show();
    //         $('.religion-show').text(religionValue).show();
    //         $('.nationality-edit').hide();
    //         $('.religion-edit').hide();
    //         $('.maritialStatus-edit').hide();
    //         $('.visaStatus-edit').hide();
    //         $('.driving-license-edit').hide();
    //         $('.languages__select').prop("disabled", true);
    //         $(this).hide();
    //         // Swal.fire(
    //         //     'Good job!',
    //         //     'Your changes successfully updated',
    //         //     'success'
    //         // )
    //     }).show();
    //     $('#cancelOtherDetail').click(function() {
    //         // nationality
    //         const nationalityText = $('.nationality-show')
    //         const nationalityselect = Array.from(document.querySelector('#nationality').options).map((
    //             item) => {
    //             if (item.value === nationalityText.text()) {
    //                 return item.selected = true
    //             }
    //         });

    //         // visaStatus
    //         const visaStatusText = $('.visaStatus-show')
    //         const visaStatusselect = Array.from(document.querySelector('#visaStatus').options).map((
    //             item) => {
    //             if (item.value === visaStatusText.text()) {
    //                 return item.selected = true
    //             }
    //         });

    //         // drivingLicense
    //         const drivingLicenseText = $('.driving-license-show')
    //         const drivingLicenseselect = Array.from(document.querySelector('#drivingLicense').options)
    //             .map((item) => {
    //                 if (item.value === '0') {
    //                     return item.selected = true
    //                     // console.log('109')
    //                 } else {
    //                     return item.selected = false
    //                     // console.log('109')
    //                 }
    //             });

    //         // Religion
    //         const religionText = $('.religion-show')
    //         const religionselect = Array.from(document.querySelector('#religion').options)
    //             .map((
    //                 item) => {
    //                 if (item.value === religionText.text()) {
    //                     return item.selected = true
    //                 }
    //             });

    //         // maritialStatus
    //         const maritialStatusText = $('.maritialStatus-show')
    //         const maritialStatusselect = Array.from(document.querySelector('#maritialStatus').options)
    //             .map((
    //                 item) => {
    //                 if (item.value === maritialStatusText.text()) {
    //                     return item.selected = true
    //                 }
    //             });
    //         console.log(document.querySelector('#drivingLicense').options[0].value)
    //         $('#saveOtherDetail').hide();
    //         $('#editOtherDetail').show();
    //         $('.nationality-show').show();
    //         $('.nationality-edit').hide();
    //         $('.religion-show').show();
    //         $('.religion-edit').hide();
    //         $('.maritialStatus-show').show();
    //         $('.maritialStatus-edit').hide();
    //         $('.driving-license-show').show();
    //         $('.driving-license-edit').hide();
    //         $('.visaStatus-show').show();
    //         $('.visaStatus-edit').hide();
    //         $(this).hide();
    //         $('.languages__select').prop("disabled", true);
    //     }).show();

    // })
    // // end edit other details
  </script>


  <script>
    // required cv
    function validateAndSend() {
      console.log("sadas")
      var element = document.getElementById('payment_loader');
      element.classList.remove('d-none');
      element.classList.add('d-flex');
      if(myForm.new_doc){
        if (myForm.new_doc.value.length == 0) {
          const radioButtons = document.querySelectorAll('input[name="cv_file"]');
          for (const radioButton of radioButtons) {
            console.log(radioButton.checked);
            if (radioButton.checked == true) {
              $("#alert-text").addClass("d-none");
              myForm.submit();
              break;
              return false;

            } else {
              $("#alert-text").removeClass("d-none");
              return false;
            }
        }
        var element = document.getElementById('payment_loader');
        element.classList.remove('d-none');
        element.classList.add('d-flex');
        // alert('check.hostingladz.com.');
      } else {
        $("#alert-text").addClass("d-none");
        myForm.submit();
      }
      }
      else{
        $("#alert-text").addClass("d-none");
        myForm.submit();
      }
    }
    // end required


    $("#coverLetterInputToggle").click(function() {
      $("#textareaCoverLetter").toggle('slow')
    })

    $('.open-apply-modal').click(function() {
      $('.modal-apply.candidate_apply_modal').css("display", "flex").hide().fadeIn();
      var id = $(this).attr("id");
      console.log(id);
      document.getElementById("post_id").value = id;
    })
    $('.modal-apply.candidate_apply_modal .close').click(function() {
      $('.modal-apply.candidate_apply_modal').fadeOut();
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
            $('.candidate_apply_modal .file-upload-wrap .drag-cv').hide();
            $('.candidate_apply_modal .file-upload-content-cv').css("display", "flex").hide().fadeIn();

            $('.candidate_apply_modal .file-title-cv').html(input.files[0].name);
            $('.candidate_apply_modal .file-type').html(fileTypeExt);
            $('.candidate_apply_modal .file-size').html(fileSize);

            if (fileTypeExt == 'docx') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-docx.png') }}");
            } else if (fileTypeExt == 'doc') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-doc.png') }}");
            } else if (fileTypeExt == 'pdf') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-pdf.png') }}");
            }
          };

          $('.candidate_apply_modal input[type="radio"]').attr('disabled', true);
          $('.candidate_apply_modal input[type="radio"]').prop('checked', false);
          $('.candidate_apply_modal li .wrap svg, li .wrap label').css('opacity', '0.35');
          reader.readAsDataURL(input.files[0]);
        } else {
          $('.candidate_apply_modal .error').show();
        }

      } else {
        removeUpload();
      }
    }

    function readCoverURL(input) {
      if (input.files && input.files[0]) {
        $('.candidate_apply_modal .error').hide()
        var reader = new FileReader();

        var fileSize = (input.files[0].size / (1024 * 1024)).toFixed(2) + 'mb'
        var fileType = input.files[0].name;
        var fileTypeExt = fileType.split('.').pop();

        if (fileTypeExt == 'docx' || fileTypeExt == 'doc' || fileTypeExt == 'pdf') {
          reader.onload = function(e) {
            $('.candidate_apply_modal .file-upload-wrap .drag-letter').hide();
            $('.candidate_apply_modal .file-upload-content-letter').css("display", "flex").hide().fadeIn();

            $('.candidate_apply_modal .file-title-letter').html(input.files[0].name);
            $('.candidate_apply_modal .file-type').html(fileTypeExt);
            $('.candidate_apply_modal .file-size').html(fileSize);

            if (fileTypeExt == 'docx') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-docx.png') }}");
            } else if (fileTypeExt == 'doc') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-doc.png') }}");
            } else if (fileTypeExt == 'pdf') {
              $('.candidate_apply_modal .file-upload-image').attr('src',
                "{{ asset('imgs/icon-pdf.png') }}");
            }
          };

          // $('.candidate_apply_modal input[type="radio"]').attr('disabled', true);
          // $('.candidate_apply_modal input[type="radio"]').prop('checked', false);
          $('.candidate_apply_modal li .wrap svg, li .wrap label').css('opacity', '0.35');
          reader.readAsDataURL(input.files[0]);
        } else {
          $('.candidate_apply_modal .error').show();
        }

      } else {
        removeUpload();
      }
    }

    function removeUpload() {
      // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('.candidate_apply_modal .drag-cv .file-upload-input').val('');
      $('.candidate_apply_modal .file-upload-content-cv').hide();
      $('.candidate_apply_modal .file-upload-wrap .drag-cv').show();
      $('.candidate_apply_modal input[type="radio"]').attr('disabled', false);
      $('.candidate_apply_modal li .wrap svg, li .wrap label').css('opacity', '1');
    }

    function removeCoverUpload() {
      // $('.file-upload-input').replaceWith($('.file-upload-input').clone());
      $('.candidate_apply_modal .drag-letter .file-upload-input').val('');
      $('.candidate_apply_modal .file-upload-content-letter').hide();
      $('.candidate_apply_modal .file-upload-wrap .drag-letter').show();
      $('.candidate_apply_modal input[type="radio"]').attr('disabled', false);
      $('.candidate_apply_modal li .wrap svg, li .wrap label').css('opacity', '1');
    }

    $('.candidate_apply_modal .file-upload-wrap').bind('dragover', function() {
      $('.candidate_apply_modal .file-upload-wrap').addClass('file-dropping');
    });
    $('.candidate_apply_modal .file-upload-wrap').bind('d`ragleave', function() {
      $('.candidate_apply_modal .file-upload-wrap').removeClass('file-dropping');
    });

    $(document).mouseup(function(e) {
      var container = $(".candidate_apply_modal .file-upload");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        $('.modal-apply.candidate_apply_modal').fadeOut();
        setTimeout(function() {
          removeUpload();
          removeCoverUpload();
        }, 400)
      }
    });

    $('.open-apply-modal').click(function() {
      $('.modal-apply.candidate_apply_modal').css("display", "flex").hide().fadeIn();
    })

    $('.modal-apply.candidate_apply_modal .close').click(function() {
      $('.modal-apply.candidate_apply_modal').fadeOut();
      setTimeout(function() {
        removeUpload();
        removeCoverUpload();
      }, 400)
    })
  </script>

  <script>
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
  </script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  <script>
    function fitTextTitle(id) {
      var value = $("#para-" + id).html();
      console.log(value);
      $("#search-title").val(value);
    }
    const searchLogic = function() {

      $("#search-title-search").append("");
      // $("#search-title-search").addClass('d-none');

      formData = {
        value: $(this).val(),
      }
      // console.log(formData);
      $.ajax({
        type: "GET",
        url: "{{ route('search.Keyword') }}",
        data: {
          value: $('#search-title').val(),
          for: $('#for').val(),
        },
        dataType: "json",
        encode: true,
      }).done(function(data) {
        $("#search-title-search").removeClass('d-none');
        $("#search-title-search").html('');
        html = '';
        if (data['can'].length == 0 && data['rec'].length == 0 && data['comp'].length == 0 && data[
            'job'].length == 0) {
          // $("#search-title-search").html("No Record Found");
          if ($("#for").val() == 'post') {
            if (data['job'].length == 0) {
              $("#search-title-search").html("No Record Found");
            }
          } else if ($("#for").val() == 'users') {
            if (data['can'].length == 0 && data['rec'].length == 0 && data['comp'].length == 0) {
              $("#search-title-search").html("No Record Found");
            }
          }
        } else {
          // console.log("check");
          if (data['can'] != null) {
            $.each(data['can'], function(index, value) {
              html +=
                "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='{{ asset('storage/') }}/" +
                value['user']['avatar'] +
                "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='{{ route('candidate.detail', '') }}/" +
                value['slug'] + "' id='para-" +
                value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                ")''>" +
                value['first_name'] + "</a></div>";
            });
          }
          if (data['rec'] != null) {
            $.each(data['rec'], function(index, value) {
              html +=
                "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='{{ asset('storage/') }}/" +
                value['avatar'] +
                "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='{{ route('recruiter.detail', '') }}/" +
                value['slug'] + "' id='para-" +
                value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                ")''>" +
                value['name'] + "</a></div>";
            });
          }
          if (data['comp'] != null) {
            $.each(data['comp'], function(index, value) {
              html +=
                "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='{{ asset('storage/') }}/" +
                value['logo'] +
                "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='{{ route('job.details', '') }}/" +
                value['slug'] + "' id='para-" +
                value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                ")''>" +
                value['name'] + "</a></div>";
            });
          }
          if (data['job'] != null) {
            $.each(data['job'], function(index, value) {
              html +=
                "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='{{ asset('storage/') }}/" +
                value['banner'] +
                "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='{{ route('job.listing.details', '') }}/" +
                value['slug'] + "' id='para-" +
                value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                ")''>" +
                value['post'] + "</a></div>";
            });
          }
          console.log($("#search-title").val());
          if ($("#search-title").val().length == 0) {
            $("#search-title-search").addClass('d-none');
          }
          $("#search-title-search").append(html);
        }
        this.value = "";
      });
    }
    const getInterval = setInterval(() => {
      if ($('#search-title').length) {
        $('#search-title').unbind("keydown", searchLogic);
        $('#search-title').on("keydown", searchLogic);
      }
    }, 1000);

    $(function() {
      $("#showDiv").on("click", function(a) {
        // $("#search-title-search").addClass("d-none");
        a.stopPropagation()
      });
      $(document).on("click", function(a) {
        if ($(a.target).is("#search-title-search") === false) {
          $("#search-title-search").addClass("d-none");
        }
      });
    });

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
        $('#message-bottom-' + id).css('display', 'block');
      } else {
        $('#message-bottom-' + id).css('display', 'none')
      }
    }



    // function openBox(id) {
    //     console.log(id);
    //     $.ajax({
    //             url: "{{ route('fetch.messages.individual') }}",
    //             type: "GET",
    //             data: {
    //                 id: id,
    //             },
    //             // dataType: "json",
    //             // encode: true,
    //         }).done(function(data) {
    //             console.log(data);
    //             var html = "";
    //             html += "<div id='chatBoxSingle-"+id+"' class='col-md-4' >";
    //             html += "<div class='chat__box__single'>";
    //                 html += "<div class='chat-top fs-14 px-2 pt-2'>";
    //                     html += "<div class='d-flex align-items-center'>";
    //                         html += "<div class='me-2'>";
    //                         html += "<img";
    //                         html +=
    //                             " src='https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg'";
    //                         html += " alt=''";
    //                         html += " class='profile_thumb rounded-50'";
    //                         html += "/>";
    //                         html += "</div>";
    //                     html += "<div>";
    //                 html += "<div>"+data['comp_rec']['recruiter']['name']+"</div>";
    //                 html += "<div style='font-size: 12px; color: #999'>Active now</div>";
    //                 html += "</div>";
    //                     html += "<div";
    //                     html += " class='ms-auto d-flex align-items-center'";
    //                     html += " style='gap: 6px'";
    //                     html += " >";
    //                     html += "<i class='fa-solid fa-plus'></i>";
    //                     html += "<i class='fa-solid fa-xmark' id ='"+id+"'></i>";
    //                     html += "</div>";
    //                 html += "</div>";
    //             html += "<div class='message-bottom'>";
    //                 html += "<div class='messages'>";
    //                     html += "<div ";
    //                     html += " class='";
    //                     html += " fs-14 ";
    //                     html += " day ";
    //                     html += " d-flex ";
    //                     html += " align-items-center ";
    //                     html += " justify-content-center ";
    //                     html += " align-items-center ";
    //                     html += " my-2 ";
    //                     html += "'";
    //                     html += ">";
    //                     html += "<div class='day_border'></div>";
    //                     html += "<div class='px-2'>THURSDAY</div>";
    //                     html += "<div class='day_border'></div>";
    //                     html += "</div>";
    //                 $.each(data['message'], function(index, val) {
    //                     html += "<div class='d-flex align-items-start mb-2 px-2'>";

    //                     html += "<div class='me-2'>";
    //                     html += "<img ";
    //                     html +=
    //                         "src='https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg'";
    //                     html += " alt=''";
    //                     html += "class='profile_thumb rounded-50'";
    //                     html += "/>";
    //                     html += "</div>";

    //                     html += "<div>";
    //                     html += "<div ";
    //                     html += "class='d-flex fs-14 align-items-center mb-2'";
    //                     html += "style='gap: 8px'";
    //                     html += ">";
    //                     html += "<div>"+val['user']['company']['name']+":</div>";
    //                     html += "<div style='font-size: 12px; color: #999'>12:19 PM</div>";
    //                     html += "</div>";
    //                     html += "<div style='font-size: 12px; color: #999'>";
    //                     html += val['message'];
    //                     html += "</div>";
    //                     html += "</div>";
    //                     html += "</div>";
    //                 });
    //                 html += "<div class='border-top'>";
    //                 html += "<div class='message_send d-flex px-2 mt-3' style='gap: 6px'>";
    //                     html += "<div class='flex-grow-1'>";
    //                     html += "<textarea";
    //                     html += " placeholder='Write message...'";
    //                     html += " id='btn-input'";
    //                     html += " v-model='newMessage'";
    //                     html += " @keyup.enter='sendMessage'";
    //                     html += " ></textarea>";
    //                     html += " </div>";
    //                 html += " <div>";
    //                 html += " <button";
    //                 html += " type='button'";
    //                 html += " class='send-message'";
    //                 html += " @click='sendMessage'";
    //                 html += " >";
    //                 html += " <i class='fa-solid fa-paper-plane' id='btn-chat'></i>";
    //                 html += " </button>";
    //                 html += " </div>";
    //                 html += " </div>";
    //                 html += " </div>";
    //             html += " </div>";
    //             html += "</div>";
    //             // html += "</div>";
    //             // html += "</div>";
    //             // html += "</div>";
    //             $("#message-box").append(html);

    //         })
    //         .fail(function(error) {
    //             console.log(error);
    //             var errors = error.responseJSON;
    //             console.log(errors);

    //         });
    // }
    $('#chatBoxPerson-0').click(function() {
      $('#chatBoxSingle-0').removeClass('d-none');
    })
    $('#chatBoxPerson-1').click(function() {
      $('#chatBoxSingle-1').removeClass('d-none');
    })
    // ChatBox end
  </script>

  @yield('bottom_script')

  {{-- <script>
        function initAutocomplete() {
            var autocomplete = new google.maps.places.Autocomplete(
                (document.getElementById('address')), {
                    types: ['geocode']
                }
            );
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                console.log(place);
                document.getElementById('Lat').value = place.geometry.location.lat();
                document.getElementById('Lng').value = place.geometry.location.lng();

            });
            //    google.maps.event.addListener(autocomplete, 'place_changed', function () {
            //         var near_place = autocomplete.getPlace();
            //         console.log(near_place);
            //     });

        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDe_fLxQFXdTRd7JsWf2MiHzwjMhIupJ0A&libraries=places&callback=initAutocomplete"
        async defer></script> --}}
  {{-- maps --}}
  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&libraries=places&language=en">
  </script>
  <script>
    google.maps.event.addDomListener(window, 'load', function() {
      var places = new google.maps.places.Autocomplete(document.getElementById('searchInput'));
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

              var pin = results[0].address_components[results[0].address_components
                .length - 1].long_name;

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
                if (pin != country) {
                  document.getElementById('zip_code').value = pin;
                } else {
                  document.getElementById('zip_code').value = null;
                }
              }
              document.getElementById('latitude').value = latitude;
              document.getElementById('longitude').value = longitude;

              var myaddressvalue = document.getElementById('searchInput').value;
              //    console.log(myaddressvalue);

              // var myarr = myaddressvalue.split(",");

              //    console.log(myarr[0]);

              // document.getElementById('searchInput').value = myarr[0];

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
      var placesInstitue = new google.maps.places.Autocomplete(document.getElementById('institute_loc_role'));
      var elementsWithClassName = document.getElementsByClassName('institute_loc_role_edit');
      for (var i = 0; i < elementsWithClassName.length; i++) {
        var placesInstitue = new google.maps.places.Autocomplete(elementsWithClassName[i]);
      }
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


      //                 var myaddressvalue = document.getElementById('searchInput').value;
      //             }
      //         }
      //     });
      // });
    });

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
</body>

</html>
