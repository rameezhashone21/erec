@extends('layouts.app')
@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5 mb-4">Candidate Details</h1>
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li></li>
                        </ul>
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- fieldsets -->
                        <form id="msform" class="avatar-form" method="post"
                            action="{{ route('store.candidateEducation') }}" name="change_avatar"
                            enctype="multipart/form-data">
                            @csrf
                            <fieldset class="mb-5">
                                {{-- <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id"> --}}
                                <div class="d-flex align-items-md-center">
                                    <div class="me-4">
                                        <div class="avatar-upload avatar-upload-sm">
                                            <div class="avatar-edit position-static">
                                                <input type="file" id="imageUpload" name="avatar"
                                                    class="input_type_file file-upload" max="32154"
                                                    class="input_type_file file-upload" required>
                                                <label for="imageUpload">
                                                    <i
                                                        class="fas fa-camera position-absolute d-flex justify-content-center align-items-center uplaod__camera__icon"></i>
                                                    <div class="avatar-preview avatar-preview-sm">

                                                        @if ($avatar == null)
                                                            <div>
                                                                <img src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                                                                    alt="" class="img-fluid" id="imagePreview">
                                                            </div>
                                                        @else
                                                            <div>
                                                                <img src="{{ asset('public/storage/' . $avatar) }}"
                                                                    alt="" class="img-fluid" id="imagePreview">

                                                            </div>
                                                        @endif
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload Profile Picture
                                        </h2>
                                        <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        <form id="msform" class="personalDetail" method="POST"
                            action="{{ route('store.candidateEducation') }}" enctype="multipart/form-data">
                            @csrf
                            <fieldset class="mb-5 mt-3">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">About*</h2>
                                    </div>
                                    <div class="col">
                                        <label for="taglineRegisterPro" class="form-label fs-14 text-theme-primary fw-bold">
                                            Give one line description to your profile
                                        </label>
                                        <input type="text" maxlength="500" id="taglineRegisterPro"
                                            class="form-control fs-14 h-50px" value="{{ $head_line }}" name="head_line"
                                            required>
                                        <div class="text_primary characters" style="font-size: 12px;">
                                            <span id="taglineRegisterProChars"></span>
                                            Character(s) Remaining
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-5 mt-3">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">headline*</h2>
                                    </div>
                                    <div class="col">
                                        {{-- <label for="taglineRegisterPro" class="form-label fs-14 text-theme-primary fw-bold">
                                            Give one line description to your profile
                                        </label> --}}
                                        <input type="text" maxlength="150" id="taglineRegisterPro1"
                                            class="form-control fs-14 h-50px" value="" name="tageLine" required>
                                        <div class="text_primary characters" style="font-size: 12px;">
                                            <span id="taglineRegisterProChars1"></span>
                                            Character(s) Remaining
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Personal Details
                                        </h2>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                            Visa Status for Current Location*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" value="Citizen" name="visa_status"
                                            id="Citizen-Saudi" @if ($visa_status == 'Citizen') checked @endif
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-primary fs-14" for="Citizen-Saudi">Citizen</label>

                                        <input type="radio" class="btn-check" value="Permanent Resident"
                                            name="visa_status" id="Permanent-Resident-Saudi"
                                            @if ($visa_status == 'Permanent Resident') checked @endif autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14"
                                            for="Permanent-Resident-Saudi">Permanent Resident</label>

                                        <input type="radio" class="btn-check" value="Visit Visa" name="visa_status"
                                            id="Visit" @if ($visa_status == 'Visit Visa') checked @endif
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Visit">Visit
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Student Visa" name="visa_status"
                                            id="Student" @if ($visa_status == 'Student Visa') checked @endif
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Student">Student
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Business Visa" name="visa_status"
                                            id="Business" @if ($visa_status == 'Business Visa') checked @endif
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Business">Business
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Employee Visa" name="visa_status"
                                            id="Employee" @if ($visa_status == 'Employee Visa') checked @endif
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Employee">Employee
                                            Visa</label>


                                        <input type="radio" class="btn-check" value="Spousal Visa" name="visa_status"
                                            id="Spousal" @if ($visa_status == 'Spousal Visa') checked @endif
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Spousal">Spousal Visa</label>
                                    </div>

                                    <div class="col">
                                        <label class="mt-3 form-label fs-14 text-theme-primary fw-bold">Date of
                                            Birth*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control datepicker fs-14 h-50px w-100"
                                                placeholder="dd-mm-yyyy" autocomplete="off" value="{{ $dob }}"
                                                id="dateOfBirth" name="dob" required readonly>
                                            <label class="calender-icon d-block" for="dateOfBirth">
                                                <i class="far fa-calendar-alt"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col languages__select__box">
                                        <label for=""
                                            class="form-label fs-14 text-theme-primary fw-bold">Languages Known
                                            (Max
                                            3)*</label>
                                        <?php
                                        $languages = explode(',', $languages);
                                        // dd($languages);
                                        ?>
                                        <select id="role" multiple
                                            class="form-select fs-14 languages__select h-50px mb-4" name="languages[]"
                                            required>
                                            {{-- <option selected disabled>Select language you know</option> --}}
                                            <option value="English"
                                                @foreach ($languages as $row) @if ($row == 'English')
                                            selected @endif @endforeach>
                                                English
                                            </option>
                                            <option value="Spanish"
                                                @foreach ($languages as $row) @if ($row == 'Spanish')
                                            selected @endif @endforeach>
                                                Spanish
                                            </option>
                                            <option value="French"
                                                @foreach ($languages as $row) @if ($row == 'French')
                                            selected @endif @endforeach>
                                                French
                                            </option>
                                            <option value="German"
                                                @foreach ($languages as $row) @if ($row == 'German')
                                            selected @endif @endforeach>
                                                German
                                            </option>
                                        </select>
                                        {{-- <label for=""
                                            class="form-label fs-14 text-theme-primary fw-bold">Languages Known (Max
                                            3)</label>
                                        <select id="role" class="form-select fs-14  h-50px mb-4" class="select2-multiple form-control fs-14 h-50px" name="languages">
                                            <option selected disabled>Select language you know</option>
                                            <option value="English" @if ($languages == 'English') selected @endif>
                                                English
                                            </option>
                                            <option value="Spanish" @if ($languages == 'Spanish') selected @endif>
                                                Spanish
                                            </option>
                                            <option value="French" @if ($languages == 'French') selected @endif>
                                                French
                                            </option>
                                        </select> --}}
                                        {{-- <a class="fs-14 bg-theme-secondary p-3 cut">English <span class="fs-5 text-theme-primary">+</span></a>
                                    <a class="fs-14 bg-theme-secondary p-3 cut">English <span class="fs-5 text-theme-primary">+</span></a> --}}
                                    </div>

                                    <div class="col">
                                        <label for=""
                                            class="mt-4 form-label fs-14 text-theme-primary fw-bold">Religion*</label>
                                        <select id="role" class="form-select fs-14  h-50px mb-4" name="religion"
                                            required>
                                            <option disabled selected>Select Religion</option>
                                            <option value="Christianity"
                                                @if ($religion == 'Christianity') selected @endif>Christianity</option>
                                            <option value="Islam" @if ($religion == 'Islam') selected @endif>
                                                Islam</option>
                                            <option value="Hinduism" @if ($religion == 'Hinduism') selected @endif>
                                                Hinduism</option>
                                            <option value="Buddhism" @if ($religion == 'Buddhism') selected @endif>
                                                Buddhism</option>
                                            <option value="Sikhism" @if ($religion == 'Sikhism') selected @endif>
                                                Sikhism</option>
                                            <option value="Judaism" @if ($religion == 'Judaism') selected @endif>
                                                Judaism</option>
                                            <option value="Bahá'í Faith"
                                                @if ($religion == "Bahá'í Faith") selected @endif>Bahá'í Faith</option>
                                            <option value="Jainism" @if ($religion == 'Jainism') selected @endif>
                                                Jainism</option>
                                            <option value="Shintoism" @if ($religion == 'Shintoism') selected @endif>
                                                Shintoism</option>
                                            <option value="Taoism" @if ($religion == 'Taoism') selected @endif>
                                                Taoism</option>
                                            <option value="Confucianism"
                                                @if ($religion == 'Confucianism') selected @endif>Confucianism</option>
                                            <option value="Zoroastrianism"
                                                @if ($religion == 'Zoroastrianism') selected @endif>Zoroastrianism</option>
                                            <option value="Other" @if ($religion == 'Other') selected @endif>
                                                Other</option>
                                            {{-- <option value="Christianity"
                                                @if ($religion == 'Christianity') selected @endif>
                                                Christianity
                                            </option>
                                            <option value="Islam" @if ($religion == 'Islam') selected @endif>
                                                Islam</option>
                                            <option value="Hinduism" @if ($religion == 'Hinduism') selected @endif>
                                                Hinduism
                                            </option>
                                            <option value="Sikhism" @if ($religion == 'Sikhism') selected @endif>
                                                Sikhism
                                            </option> --}}
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                            Marital Status*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" name="marital_status" value="Single"
                                            checked @if ($marital_status === 'Single')  @endif id="Single"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Single">Single</label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Married"
                                            checked @if ($marital_status === 'Married')  @endif id="Married"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Married">Married</label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Divorced"
                                            checked @if ($marital_status === 'Divorced')  @endif id="Divorced"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Divorced">Divorced </label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Others"
                                            checked @if ($marital_status === 'Others')  @endif id="other"
                                            autocomplete="on">
                                        <label class="btn btn-outline-primary fs-14" for="other">Others </label>
                                    </div>

                                    <div class="col">
                                        <label for="" class="mt-4 form-label fs-14 text-theme-primary fw-bold">
                                            Do you have a driving license?*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" name="driving_license" value="1"
                                            @if ($driving_license == '1') checked @endif id="Yes">
                                        <label class="btn btn-outline-primary fs-14" for="Yes">Yes</label>

                                        <input type="radio" class="btn-check" name="driving_license" value="0"
                                            @if ($driving_license == '0') checked @endif id="no">
                                        <label class="btn btn-outline-primary fs-14" for="no">No</label>
                                    </div>

                                    <div class="col">
                                        <label for="" class="mt-4 form-label fs-14 text-theme-primary fw-bold">
                                            Attach Resume
                                        </label>
                                        {{-- <label for="input" id="label"> --}}
                                        {{-- <span id="span" class="fs-14 text-dark">Drag & Drop or <span --}}
                                        {{-- class="text-theme-primary">browse</span></span> --}}
                                        {{-- <input id="input" type="file" name="cv" required> --}}
                                        {{-- <input id="input" type="file" name="document[]" multiple> --}}
                                        {{-- </label> --}}
                                        {{-- <div class="file-upload w-100">
                                            <span class="close"></span>
                                            <div class="file-upload-wrap">
                                                <div class="file-upload-content">
                                                    <div class="file-title-wrap">
                                                        <span class="file-title mb-0"></span>
                                                    </div>
                                                    <button type="button" onclick="removeUpload()" class="action-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="#fff" viewBox="0 0 448 512">
                                                            <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                            <path
                                                                d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="drag">
                                                    <input class="file-upload-input" type="file" name="document[]"
                                                        multiple onchange="readURL(this);"
                                                        accept="application/pdf,application/msword" />
                                                    <div class="drag-text">
                                                        <h3>Drag and drop to upload your CV</h3>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <span class="error">
                                                        File not allowed <i>Allowed Files: pdf, docx, doc</i>
                                                    </span>
                                                </div>
                                                <div class="cv-list">
                                                    <ul>
                                                        @foreach (auth()->user()->resume as $row)
                                                            <li>
                                                                <div class="wrap">
                                                                    <input type="radio" name="cv_file"
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
                                    <label for="cv-file">{{ $row->document }}</label>
                                </div>
                                </li>
                                @endforeach
                                </ul>
                            </div>

                </div>
            </div> --}}

                                        <div class="file-uploader">
                                            <div class="drop-area">
                                                <p>Drag and drop files here or click to <label for="file-input"
                                                        class="text-decoration-underline text-primary text-link"
                                                        style="cursor: pointer;">browse</label><br>
                                                    Only .docs, .pdf file are accepted
                                                    Size : 200kb
                                                </p>
                                                <input type="file" name="document[]" id="file-input"
                                                    style="display: none;" accept="application/pdf,application/msword"
                                                    multiple />
                                            </div>
                                            <ul class="file-list" id="file-list"></ul>
                                        </div>
                                    </div>
                            </fieldset>

                            {{-- @if ($user->avatar != null && $user->candidate != null && $user->candidateEdu != null && $user->candidatePro != null) --}}
                            <div class="row justify-content-center pt-5">
                                <div class="col-lg-6 text-center">
                                    <button type="submit" class="next action-button default-btn"> Next </button>
                                    <br />
                                    <br />
                                    {{-- <a href="{{ route('index') }}" class="fs-6 fw-normal">I will fill this later</a> --}}
                                    <a href="{{ route('candidates.details.next') }}" class="fs-6 fw-normal">
                                        << Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function submitForm() {
            //    var elem = document.getElementsByClassName("personalDetail");
            //    elem.forEach(element => {
            //        element.submit();
            //    });
        }
    </script>

    <script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     var numb = 1;
        //     do {
        //         ClassicEditor
        //             .create(document.querySelector('#body' + numb), {
        //                 removePlugins: ['insertImage', 'insertMedia', 'Link', 'blockQuote'],
        //                 toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', ]
        //             })
        //             .catch(error => {
        //                 console.error(error);
        //             })
        //         numb++;
        //     }
        //     while (numb < 6);
        // });

        function form_submit() {
            const collection = document.getElementsByName("change_avatar");
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
                    url: "{{ route('store.candidateEducation') }}",
                    data: frmData,
                    dataType: "json",
                    encode: true,
                    contentType: false,
                    cache: false,
                    processData: false,
                })
                .done(function(data) {
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
        // start taglineRegister count textarea word
        var taglineRegisterPro = $('#taglineRegisterPro').val().length;
        $('#taglineRegisterProChars').text(500 - taglineRegisterPro);
        var maxLength = 500;
        $('#taglineRegisterPro').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#taglineRegisterProChars').text(textlen);
        });

        var taglineRegisterPro1 = $('#taglineRegisterPro1').val().length;
        $('#taglineRegisterProChars1').text(150 - taglineRegisterPro1);
        var maxLength1 = 150;
        $('#taglineRegisterPro1').keyup(function() {
            var textlen1 = maxLength1 - $(this).val().length;
            $('#taglineRegisterProChars1').text(textlen1);
        });
        // end taglineRegister count textarea word


        // $("#msformAll").on('submit', function(e) {
        //     if ($("input[name=driving_license]").val(); == "") {
        //         e.preventDefault();
        //         errorModal("Please fill driving license field");
        //     } else {
        //         $("#msformAll").submit();
        //     }
        // });
    </script>
    <script>
        $(document).ready(function() {
            // Prevent default behavior for file drag and drop
            $(document).on('dragenter', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            $(document).on('dragover', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            $(document).on('drop', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            // Handle file drop on the drop area
            $('.drop-area').on('drop', function(e) {
                e.preventDefault();
                var files = e.originalEvent.dataTransfer.files;
                handleFiles(files);
            });

            // Handle file selection from the file input
            $('#file-input').on('change', function(e) {
                var files = e.target.files;
                handleFiles(files);
            });

            // Handle removing files
            $(document).on('click', '.remove-file', function() {
                var index = $(this).data('index');
                removeFile(index);
            });

            var fileList = [];

            function handleFiles(files) {
                var newFiles = Array.from(files);

                for (var i = 0; i < newFiles.length; i++) {
                    var file = newFiles[i];
                    fileList.push(file);
                }

                updateFileList();
            }

            function removeFile(index) {
                fileList.splice(index, 1);
                updateFileList();
            }

            function updateFileList() {
                var fileListElement = $('#file-list');
                fileListElement.empty();

                for (var i = 0; i < fileList.length; i++) {
                    var file = fileList[i];
                    var listItem = $('<li class="file-item">' + file.name +
                        '<span class="remove-file" data-index="' + i + '">&times;</span></li>');
                    fileListElement.append(listItem);
                }
            }
        });
    </script>
@endsection
