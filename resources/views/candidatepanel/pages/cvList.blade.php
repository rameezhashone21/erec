@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')

{{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
@endforeach
@endif --}}
<div class="col-xl-9 col-lg-8">
  <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
    <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
  </button>

  <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
    <div class="d-md-flex aling-items-center justify-content-between mb-3">
      <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">My Resumes</h2>
      <div>
        @if (count($docs) >= 6)
        <button class="btn_viewall fw-500 px-4 py-2 d-inline-block" style="opacity: 0.5;pointer-events: none;" type="button" disabled>Add New Resume</button>
        <p class="text-danger text-center" style="font-size: 12px; line-height: 1.2; margin-top: 4px; ">
          You can not upload <br>more than six resumes</p>
        {{-- <label class="btn btn-light px-4 py-2 d-inline-block">You cannot add more than 6 documents...</label> --}}
        @else
        <a class="btn_viewall fw-500 px-4 py-2 d-inline-block" href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadCvModal">Add New Resume</a>
        @endif
      </div>
    </div>
    @foreach ($docs as $key => $item)
    <div class="d-flex justify-content-between border-bottom py-3">
      <div class="d-flex align-items-center" style="gap: 0 8px;">
        <a class="d-flex align-items-center" style="gap: 0 15px;" href="{{ asset('candidateDoc/doc/' . $item->document) }}" target="_blank">
          <span>
            {{-- pdf doc type icon --}}
            @if (pathinfo($item->document, PATHINFO_EXTENSION) == 'pdf')
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28">
              <g id="pdf" transform="translate(0.455)">
                <rect id="Rectangle_302" data-name="Rectangle 302" width="28" height="28" transform="translate(-0.455)" fill="#c80a0a" />
                <path id="Path_3259" data-name="Path 3259" d="M111.1,109.156a4.28,4.28,0,0,0-3.062-.82,19.741,19.741,0,0,0-2.9.273,13.781,13.781,0,0,1-2.844-3.773,15.3,15.3,0,0,0,.93-4.43c0-.93-.328-2.406-1.641-2.406a1.128,1.128,0,0,0-.93.547c-.547.984-.328,3.172.711,5.469a49.11,49.11,0,0,1-2.734,6.4c-2.9,1.2-4.812,2.516-4.977,3.555-.109.492.219,1.313,1.367,1.313,1.7,0,3.555-2.461,4.977-4.977a34.236,34.236,0,0,1,5.031-1.312,7.384,7.384,0,0,0,4.758,2.078C111.54,111.07,111.7,109.812,111.1,109.156ZM100.931,98.711c.438-.656,1.422-.437,1.422.875a13.927,13.927,0,0,1-.82,3.938C100.548,101.227,100.548,99.422,100.931,98.711Zm-6.945,15.313c.164-.875,1.8-2.078,4.375-3.117-1.422,2.406-2.844,3.938-3.719,3.938A.669.669,0,0,1,93.986,114.023Zm10.773-5.359a31.391,31.391,0,0,0-4.539,1.2,24.773,24.773,0,0,0,1.969-4.594A17.883,17.883,0,0,0,104.759,108.664Zm.711.219a13.716,13.716,0,0,1,3.883-.109c1.586.328,1.039,2.242-.711,1.8A7.714,7.714,0,0,1,105.47,108.883Z" transform="translate(-88.441 -92.641)" fill="#fff" />
              </g>
            </svg>
            {{-- pdf doc type icon --}}
            {{-- word doc type icon --}}
            @elseif (pathinfo($item->document, PATHINFO_EXTENSION) == 'docx')
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="27.962" viewBox="0 0 28 27.962">
              <g id="word_1_" data-name="word (1)" transform="translate(-2081 -2099)">
                <path id="Path_3264" data-name="Path 3264" d="M2083.995,2121.222l.01-16.66,12.64-2.163v20.981Zm19.914-5.624h-6.764v-1.31h6.764v-.872h-6.764v-1.307h6.764v-.873h-6.764v-1.31h6.764v-.873h-6.764v-1.309h6.764v-.872h-6.764l.013-2.06h8.187c.439-.017.529.07.512.512v15.2c.006.263-.075.489-.512.439h-8.187l-.013-2.314h6.764v-.873h-6.764v-1.31h6.764ZM2081,2126.962h28l-.037-27.962H2081Z" transform="translate(0)" fill="#2b5797" fill-rule="evenodd" />
                <path id="Path_3265" data-name="Path 3265" d="M4628.515,6908.052l-1,5.376-1.036-5.206-1.4.081-1,4.936-.841-4.783-1.239.014,1.289,6.926,1.3.07,1.069-4.786.57,2.426c.166.824.333,1.614.487,2.456l1.471.151,1.705-7.713Z" transform="translate(-2535.735 -4799.035)" fill="#2b5797" fill-rule="evenodd" />
              </g>
            </svg>
            {{-- word doc type icon --}}
            @endif
          </span>
          <span style="color: #333; font-size: 14px;">
            {{ $item->document_name }}
          </span>
        </a>
      </div>
      <div class="d-flex align-items-center">
        <span class="me-lg-5 me-3">
          <a href="{{ asset('candidateDoc/doc/' . $item->document) }}" download="">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="23.188" viewBox="0 0 22 23.188">
              <g id="Layer_2" data-name="Layer 2" transform="translate(-4 -3)">
                <g id="download" transform="translate(4 3)">
                  <rect id="Rectangle_303" data-name="Rectangle 303" width="22" height="3" rx="1" transform="translate(0 20.188)" fill="#92929d" />
                  <rect id="Rectangle_304" data-name="Rectangle 304" width="5" height="3" rx="1" transform="translate(0 23.188) rotate(-90)" fill="#92929d" />
                  <rect id="Rectangle_305" data-name="Rectangle 305" width="5" height="3" rx="1" transform="translate(19 23.188) rotate(-90)" fill="#92929d" />
                  <path id="Path_3262" data-name="Path 3262" d="M13.876,16.875a1.375,1.375,0,0,1-.8-.248l-5.5-3.877a1.375,1.375,0,1,1,1.595-2.241l4.7,3.286,4.675-3.52a1.375,1.375,0,1,1,1.65,2.2L14.7,16.6A1.375,1.375,0,0,1,13.876,16.875Z" transform="translate(-2.876 -0.375)" fill="#92929d" />
                  <path id="Path_3263" data-name="Path 3263" d="M12.375,16.75A1.375,1.375,0,0,1,11,15.375v-11a1.375,1.375,0,0,1,2.75,0v11A1.375,1.375,0,0,1,12.375,16.75Z" transform="translate(-1.375 -3)" fill="#92929d" />
                </g>
              </g>
            </svg>
          </a>
        </span>
        <span>
          {{-- <a href="javascript:;" role='button' data-bs-toggle="modal" data-bs-target="#deleteCV">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.045" height="24.834"
              viewBox="0 0 19.045 24.834">
                  <path id="delete"
                 d="M24.2,12.193,23.8,24.3a3.988,3.988,0,0,1-4,3.857H12.2a3.988,3.988,0,0,1-4-3.853L7.8,12.193a1,1,0,0,1,2-.066l.4,12.11a2,2,0,0,0,2,1.923h7.6a2,2,0,0,0,2-1.927l.4-12.106a1,1,0,0,1,2,.066Zm1.323-4.029a1,1,0,0,1-1,1H7.478a1,1,0,1,1,0-2h3.1a1.276,1.276,0,0,0,1.273-1.148,2.991,2.991,0,0,1,2.984-2.694h2.33a2.991,2.991,0,0,1,2.984,2.694,1.276,1.276,0,0,0,1.273,1.148h3.1a1,1,0,0,1,1,1Zm-11.936-1h4.828a3.3,3.3,0,0,1-.255-.944,1,1,0,0,0-.994-.9h-2.33a1,1,0,0,0-.994.9,3.3,3.3,0,0,1-.256.944Zm1.007,15.151V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Zm4.814,0V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Z"
         transform="translate(-6.478 -3.322)" fill="#c80a0a" />
          </svg>
     </a> --}}
          <a class="d-inline-block  text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" onclick="callModal({{ $item->id }})">
            <svg xmlns="http://www.w3.org/2000/svg" width="19.045" height="24.834" viewBox="0 0 19.045 24.834">
              <path id="delete" d="M24.2,12.193,23.8,24.3a3.988,3.988,0,0,1-4,3.857H12.2a3.988,3.988,0,0,1-4-3.853L7.8,12.193a1,1,0,0,1,2-.066l.4,12.11a2,2,0,0,0,2,1.923h7.6a2,2,0,0,0,2-1.927l.4-12.106a1,1,0,0,1,2,.066Zm1.323-4.029a1,1,0,0,1-1,1H7.478a1,1,0,1,1,0-2h3.1a1.276,1.276,0,0,0,1.273-1.148,2.991,2.991,0,0,1,2.984-2.694h2.33a2.991,2.991,0,0,1,2.984,2.694,1.276,1.276,0,0,0,1.273,1.148h3.1a1,1,0,0,1,1,1Zm-11.936-1h4.828a3.3,3.3,0,0,1-.255-.944,1,1,0,0,0-.994-.9h-2.33a1,1,0,0,0-.994.9,3.3,3.3,0,0,1-.256.944Zm1.007,15.151V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Zm4.814,0V13.8a1,1,0,0,0-2,0v8.519a1,1,0,0,0,2,0Z" transform="translate(-6.478 -3.322)" fill="#c80a0a" />
            </svg>
          </a>
        </span>
      </div>
    </div>
    @endforeach
    {{-- <div class="row row-cols-md-5 g-3">
                @foreach ($docs as $key => $item)
                    <div class="col position-relative">
                        <a class='px-4 py-2 progress_card bg-white shadow d-block rounded-3'
                            href="{{ asset('candidateDoc/doc/' . $item->document) }}" target="_blank">
    <div class="d-flex align-items-center">
      <div class="">
        <i class="fa fa-file fs-3 me-3"></i>
      </div>
      <div class="align-items-center">
        <p class="text-dark">Docs {{ $key + 1 }}</p>
      </div>
    </div>
    </a>
    <a href="javascript:;" class="position-absolute delete-cv" role='button' data-bs-toggle="modal" data-bs-target="#deleteCV"><i class="fa-solid fa-xmark"></i></a>
  </div>
  @endforeach
</div>
<div class="text-center mt-5">
  @if (count($docs) >= 6)
  <button class="btn_viewall fw-500 px-4 py-2 d-inline-block" style="opacity: 0.5;pointer-events: none;" type="button" disabled>Add New Resume</button>
  <p class="text-danger text-center" style="font-size: 14px;">Maximum number of docs already</p>
  @else
  <a class="btn_viewall fw-500 px-4 py-2 d-inline-block" href="javascript:;" data-bs-toggle="modal" data-bs-target="#uploadCvModal">Add New Resume</a>
  @endif
</div> --}}
</div>
<div class="modal fade" id="uploadCvModal" tabindex="-1" aria-labelledby="uploadCvModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadCvModalLabel">Add New Resume</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('candidates.cv.store') }}" enctype="multipart/form-data">
          @csrf
          <input type="file" name="document[]" class="form-control" required accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" multiple />
          <div class="mt-4 text-start">
            <button type="submit" class="btn_viewall fw-500 px-4 py-2">Upload</button>
            <span class="fs-14">Upload *doc or *pdf file only</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
{{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body py-md-4 py-3">
                        <h5 class="text-center modal-title">Are you sure you want to delete this document?</h5>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <a class="btn_viewall fw-500 px-4 py-2 d-inline-block" id="delete-edu" href="">Yes</a>
                        <button type="button" class="btn btn-danger fw-500 px-4 py-2 d-inline-block"
                            data-bs-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div> --}}

@endsection
@section('bottom_script')
{{-- @if (\Session::has('error')) --}}
@if ($message = session('error'))
{{-- <div class="alert alert-error"> --}}
{{-- <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul> --}}
<script>
  errorModal("{{ $message }}");
</script>

{{-- </div> --}}
@endif
<script>
  function callModal(id) {
    // console.log(id);
    var href = '{{ route("candidates.cv.destroy", ":id ") }}';
    newhref = href.replace(':id', id);
    // $('#staticBackdrop').modal('show');
    $('#delete-edu').attr('href', newhref);
    Swal.fire({
        title: 'Are you sure?',
        text: "Do you really want to delete this document?",
        // text: "Do you really want to delete?",
        icon: 'error',
        iconColor: '#64262f',
        showCancelButton: true,
        confirmButtonColor: '#007ba7',
        cancelButtonColor: '#64262f',
        customClass: "delete-sweet-alert",
        confirmButtonText: "<a class='text-white' id='delete-edu' href='{{ route('candidates.cv.destroy', '') }}/" +
          id +
          "'>Yes</a>",
        cancelButtonText: 'No',
      })
      .then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success',
          )
        }

      })
    // newhref = href + '/' + id;
    // var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
    //     keyboard: false
    // });
    // myModal.toggle();

    // $("#staticBackdrop").modal();
    // console.log(newhref);
  }
</script>
@endsection