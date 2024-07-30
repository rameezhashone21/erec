@extends('layouts.app')

@section('content')
  <main>
    <section>
      <div class="container">
        <div class="row justify-content-center align-items-center py-lg-5 py-3">
          <div class="col">
            <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5">COMPANY DETAILS </h1>
            @csrf
            <form id="msform" class="avatar-form" name="change_logo" enctype="multipart/form-data">
              @csrf
              <fieldset class="mb-3">
                <div class="row align-items-center row-cols-lg-2">
                  <div class="col-lg-2">
                    <div class="avatar-upload avatar-upload-sm">
                      <div class="avatar-edit position-static">
                        <input type='file' id="imageUpload" class="file-upload" name="logo"
                          accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload" class="position-relative">
                          <i
                            class="fas fa-camera position-absolute uplaod__camera__icon d-flex justify-content-center align-items-center"></i>
                          <div class="avatar-preview  avatar-preview-sm mx-auto">
                            @if ($logo != null)
                              <img class="candidate_thumb rounded-50" src="{{ asset('public/storage/' . $logo) }}"
                                alt="" id="imagePreview">
                            @else
                              <img class="candidate_thumb rounded-50"
                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="" id="imagePreview">
                            @endif
                          </div>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload Company Logo</h2>
                    <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                  </div>
                </div>
              </fieldset>
            </form>
            <!-- fieldsets -->
            <form id="msform" method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data">
              @csrf
              <fieldset class="mb-4">
                {{-- <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id"> --}}
                <div class="row">
                  <div class="col-12">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Personal Details
                    </h2>
                  </div>
                  <div class="col-6">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">First
                      Name*</label>
                    <input type="text" class="form-control h-50px" name="name" value="{{ auth()->user()->name }}"
                      required>
                  </div>
                  <div class="col-6">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Last
                      Name*</label>
                    <input type="text" class="form-control h-50px" name="lname" value="{{ auth()->user()->lname }}"
                      required>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                {{-- <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id"> --}}
                <div class="row">
                  <div class="col-12">
                    <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Company Details</h2>
                  </div>
                  <div class="col-12">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company
                      Name*</label>
                    <input type="text" class="form-control h-50px" name="name" value="" required>
                  </div>
                  <div class="col-lg-6">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Phone
                      Number*</label>
                    <div class="single-field full-width phone-input-flag d-flex ">
                      <input type="tel" class="mobile-number form-control h-50px" style="color: transparent;"
                        name="country_code" value="{{ $country_code }}" required>
                      <input type="tel" class="mobile-number-full form-control h-50px"
                        placeholder="Please Enter Phone Number" name="phone" maxlength="11" value="{{ $phone }}"
                        required>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <label for="abn" class="form-label fs-14 text-theme-primary fw-bold">ABN*</label>
                    <input type="text" maxlength="11" class="form-control  h-50px" name="abn"
                      value="{{ $abn }}" required>
                  </div>
                  <div class="col-lg-3">
                    <label for="acn" class="form-label fs-14 text-theme-primary fw-bold">ACN*</label>
                    <input type="text" maxlength="11" class="form-control  h-50px" name="acn"
                      value="{{ $acn }}" required>
                  </div>
                  <div class="col mb-3 category__select2">
                    <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category*</label>
                    <select data-placeholder="Please select category" name="category[]" id="role"
                      class="select2-multiple form-select" required multiple>
                      <option></option>
                      @foreach ($cat as $ca)
                        <option value="{{ $ca->id }}"
                          @if ($comp != null) @foreach ($comp->features as $row)
                                                        @if ($row->id == $ca->id)
                                                            Selected @endif
                          @endforeach
                      @endif>{{ $ca->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-12">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Company
                      Size</label>
                    {{-- <select class="form-select" data-placeholder="Please Select company size" name="cSizeFrom"> --}}
                    <select class="form-select h-50px" name="cSizeFrom">
                      <option>Please Select company size</option>
                      <option value="10-25">10-25</option>
                      <option value="26-50">26-50</option>
                      <option value="51-100">51-100</option>
                      <option value="101-300">101-300</option>
                      <option value="301-500">301-500</option>
                      <option value="500+">500+</option>
                    </select>
                  </div>

                  {{--  --}}

                  <div class="col-12">
                    <label for="address" class="form-label fs-14 text-theme-primary fw-bold">Address*</label>
                    {{-- <input type="text" class="form-control h-50px" name="address" value="{{ $address }}" required> --}}

                    <input id="searchInput" value="" class="controls form-control input-login searchInput"
                      name="address" type="text" placeholder="" required autocomplete="off">
                    <input type="hidden" id="latitude" value="" name="lat" />
                    <input type="hidden" id="longitude" value="" name="lng" />
                  </div>
                  <div class="col-sm-4">
                    <label for="country" class="form-label fs-14 text-theme-primary fw-bold">Country</label>
                    <input type="text" class="form-control input-login" id="country" name="country"
                      value="" placeholder="" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="city" class="form-label fs-14 text-theme-primary fw-bold">City</label>
                    <input type="text" class="form-control input-login" id="city" name="city"
                      placeholder="" value="" required>
                  </div>
                  <div class="col-sm-4">
                    <label for="zip_code" class="form-label fs-14 text-theme-primary fw-bold">Zip/Postal
                      Code</label>
                    <input type="text" class="form-control input-login" value="" id="zip_code"
                      name="postal_code" placeholder="">
                  </div>

                  {{-- <div class="col-12 mb-3">
                                        <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description*</label>
                                        <textarea class="form-control fs-14 textarea_register_process" name="description" required>{{ $description }}</textarea>  
                                    </div> --}}
                  {{-- <div class="col-md-12">
                                        <label for="tagline" class="form-label fs-14 text-theme-primary fw-bold">Tag Line*</label>
                                        <textarea class="form-control fs-14 textarea_register_process" name="tagline" required>{{ $tagline }}</textarea>
                                    </div> --}}
                  <div class="col-12 mb-3">
                    <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description*</label>
                    <textarea id="description" maxlength="200" class="form-control textarea_register_process" name="description"
                      required>{{ $description }}</textarea>
                    <div class="text_primary characters" style="font-size: 12px;"><span id="descriptionChars"></span>
                      Character(s)
                      Remaining</div>
                  </div>
                  <div class="col-12">
                    <label for="tagline" class="form-label fs-14 text-theme-primary fw-bold">Tag
                      line*</label>
                    <textarea id="tagline" maxlength="100" class="form-control textarea_register_process" name="tagline" required>{{ $tagline }}</textarea>
                    <div class="text_primary characters" style="font-size: 12px;">
                      <span id="taglineChars"></span>
                      Character(s) Remaining
                    </div>
                  </div>
                  <div class="col-12" style="cursor: pointer;">
                    <label for="banner" class="form-label fs-14 text-theme-primary fw-bold"
                      style="cursor: pointer;">Banner Image</label>
                    <input type='file' id="bannerUpload" class="file-upload file-upload-simple" name="banner"
                      accept=".png, .jpg, .jpeg" />
                  </div>
                  <div class="col-12 terms-conditions-box" id="scrollable-div">
                    <div class="row row-cols-1">
                      <h3 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Terms &
                        Conditions
                      </h3>
                      <h3 class="fw-500 primary-color fw-bold fs-18">Terms of Service</h3>
                      <p style="font-size: 14px;">
                        Below you will find terms and conditions and information about our cookie
                        and
                        privacy policies. We
                        know we are giving a great deal of information. Erec does this for a reason:
                        we
                        want you to have as
                        much knowledge about what we do for you at as is possible. We do not want
                        you to
                        wonder about any of
                        our processes or procedures or guess as to what your interaction with means.
                        We
                        want you to
                        understand it, which is why we must explain it in detail. We urge you to
                        read
                        these terms or any
                        section of interest to you. You are agreeing to proceed under them.
                      </p>
                      <h3 class="fw-500 primary-color fw-bold fs-18">Erec General Terms of Service
                      </h3>
                      <p style="font-size: 14px;">
                        Introduction to Erec’s Terms of Service
                      </p>
                      <p style="font-size: 14px;">
                        Each time you access or use Erec’s online and/or mobile services and
                        websites,
                        including but not
                        limited to any mobile application and browser extension or plugin
                        (collectively
                        the Apps”),
                        regardless of where it is downloaded from, and any software, service,
                        feature,
                        product, program and
                        element provided by or on behalf of on or in connection with such services
                        or
                        websites
                        (collectively, the “Site”), including, but not limited to, any products,
                        programs, and services
                        described in these Terms of Service, (a) you represent that you have read
                        and
                        understand the Cookie
                        Policy and Privacy Policy; and (b) you are agreeing to the terms and
                        conditions
                        of these Terms of
                        Service (the “Agreement”) then in effect with the following entity or
                        entities:
                      </p>

                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-check py-2 ">
                      <input class="form-check-input rounded-0" name="terms" value="0" type="checkbox"
                        required>
                      <label class="form-check-label text-dark fs-14" for="gridCheck">
                        I agree to Terms And Condition*.
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="row justify-content-center pt-5">
                <div class="col-lg-5 text-center">
                  <button class="w-25 next action-button default-btn"> Save </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script>
    const scrollableDiv = document.getElementById('scrollable-div');
    const scrollCheckbox = document.getElementById('gridCheck');

    scrollableDiv.addEventListener('scroll', function() {
      if (scrollableDiv.scrollTop >= 190) {
        scrollCheckbox.disabled = false;
      }

    });
  </script>
  <script>
    function form_submit() {
      const collection = document.getElementsByName("change_logo");
      for (let i = 0; i < collection.length; i++) {
        collection[i].submit();
      }
    }

    $(".file-upload").on('change', function() {

      // formSubmit();
      // $("#loader").hide();
      // var profilefilename = document.getElementById('imageUpload');
      //         readURL(profilefilename);
      var frmData = new FormData($(".avatar-form")[0]);
      // console.log(frmData);
      // $("#loader").show();
      // console.log('here');
      $.ajax({
        type: "POST",
        url: "{{ route('company.store') }}",
        data: frmData,
        dataType: "json",
        encode: true,
        contentType: false,
        cache: false,
        processData: false,
      }).done(function(data) {
        // console.log(data);
        // $("#loader").hide();
        var profilefilename = document.getElementById('imageUpload');
        if (profilefilename.files && profilefilename.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            console.log(e);
            $('#imagePreview').attr('src', e.target.result);
          }

          reader.readAsDataURL(profilefilename.files[0]);
        }
      }).fail(function(error) {
        // $("#loader").hide();
        console.log(error['responseText']);
        var url = "{{ asset('public/storage/') }}";

        // console.log();
        // $('#imagePreview').css({"background-image": url+error['responseText']});
        // document.getElementById('imagePreview').style.style.backgroundImage = "url("+url+error['responseText']+")";
        var profilefilename = document.getElementById('imageUpload');
        // readURL(profilefilename);
        if (profilefilename.files && profilefilename.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            console.log(e);
            $('#imagePreview').attr('src', e.target.result);
          }

          reader.readAsDataURL(profilefilename.files[0]);
        }

        // successModal(data.message);
        // var errors = error.responseJSON;

        // if (errors.errors.avatar) {
        //     errorModal(errors.errors.avatar);
        // }

      });


    });
  </script>
  <script>
    // start tagline count textarea word
    var textareaValLen = $('#tagline').val().length;
    $('#taglineChars').text(100 - textareaValLen);
    var maxLength = 100;
    $('#tagline').keyup(function() {
      var textlen = maxLength - $(this).val().length;
      $('#taglineChars').text(textlen);

    });
    // end tagline count textarea word

    // start description count textarea word
    var descriptionareaValLen = $('#description').val().length;
    $('#descriptionChars').text(200 - descriptionareaValLen);
    var maxLength2 = 200;
    $('#description').keyup(function() {
      var textlen = maxLength2 - $(this).val().length;
      $('#descriptionChars').text(textlen);

    });
    // end description count textarea word
  </script>
@endsection
