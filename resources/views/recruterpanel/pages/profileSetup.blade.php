@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('content')

  <div class="col-xl-6 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i>
      <span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <form id="firstform">
        @csrf
        <input type="hidden" name="source" value="api" />
        <div class="border-bottom" id="description">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">About</h2>
            <a href="javascript:;" class="ms-auto text_grey_999 description" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil"></i>
            </a>
            <div class="ms-2">
              <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update" id="save-btn"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="ms-2">
              <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" id="cancel-btn"
                class="text_grey_999 border-0 bg-transparent p-0" style='display: none;'>
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <p class="fs-14 mb-3 text">
            @if (isset(auth()->user()->recruiter))
              {{ $user->recruiter->description }}
            @endif
          </p>
          <textarea class="txt-editor form-control fs-14 descriptionTextarea" maxlength="200" cols="5" rows="5"
            id="description" name="description">{{ $user->recruiter->description }}</textarea>
          <div class="text_primary characters pb-3" style="font-size: 12px; display: none;">
            <span id="descriptionCharacters"></span>
            Character(s) Remaining
          </div>
        </div>
      </form>
      <form class="thirdform">
        @csrf
        <div class="border-bottom pt-3" id="editTagline">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Tagline</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editTagline" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil "></i>
            </a>
            <div class="me-2" id='saveBtntagline' style='display: none;'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                id="cancel-btn-tagline" class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <div class="fs-14 fs-14 mb-3 text">
            @if (isset(auth()->user()->recruiter))
              {!! $user->recruiter->tagline !!}
            @endif
          </div>

          <textarea class="txt-editor form-control fs-14 tagline-textarea" maxlength="100" cols="5" rows="5"
            name="tagline" id="summernote-tagline" style="display: none;">{{ $user->recruiter->tagline }}</textarea>
          <input type="hidden" name="source" value="api" />

          <div class="text_primary characters characters-tagline pb-3" style="font-size: 12px; display: none;">
            <span id="taglineCharacters"></span>
            Character(s) Remaining
          </div>
        </div>
      </form>
      <div class="mb-4 py-3 border-bottom">
        <form id="skillsForm">
          @csrf
          <div id="skills">
            <div class="d-flex aling-items-center mb-4">
              <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Expertise</h2>
              <a href="javascript:;" class="text_grey_999 editSkill" role="button" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Edit Info">
                <i class="fa-solid fa-pencil "></i>
              </a>
              <div class="" style='display: none' id='skills-save'>
                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"
                  class="text_grey_999 border-0 bg-transparent p-0 me-2"><i class="fas fa-check"></i></button>
              </div>
              <div class="" style='display: none;' id='skills-cancel'>
                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                  class="text_grey_999 border-0 bg-transparent p-0"><i class="fa-solid fa-xmark"></i></button>
              </div>
            </div>
            <input type="hidden" name="source" value="api" />
            <input type="hidden" value="{{ $user->recruiter->features }}" id="skills-hidden-input" />
            <input type="hidden" value="{{ $skill }}" id="skills-all-hidden-input" />
            <ul class="tags text">
              @if (isset(auth()->user()->skills))
                @foreach ($user->recruiter->features as $row)
                  <li>
                    <a href="javascript:void 0;" return false;">{{ $row->name }}</a>
                  </li>
                @endforeach
              @endif
            </ul>
            <div class="txt-editor">
              <select name="category[]" class="select2-multiple form-control skilled-select__2" id="select2"
                multiple>
                @foreach ($skill as $row)
                  <option value="{{ $row->id }}"
                    @foreach ($user->recruiter->features as $col) @if ($row->id == $col->id) selected @endif @endforeach>
                    {{ $row->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 mt-3 mt-xl-0">
    <div class="dashboard_content bg-white rounded_10 ">
      <div class="border-bottom p-3 ">
        <div class="d-flex aling-items-center ">
          <h2 class="fw-500 fs-14 align-self-center ">Contact Details</h2>
          <a href="javascript" role="button" data-bs-toggle="modal" data-bs-target="#editContactInfo"
            class="d-inline-block ms-auto text_grey_999 ">
            <span role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Info"><i
                class="fa-solid fa-pencil "></i></span>
          </a>
          <div class="modal fade" id="editContactInfo" tabindex="-1" aria-labelledby="editContactInfoLabel"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Contact Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="{{ route('recruiter.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="_token"
                                            value="aeKWcObGiCSGubIPzO0OJFDu9t67ELqzLcPNSANo"> --}}
                    <div class="row gy-3">
                      <div class="col-lg-3">
                        <label for="name" class="form-label ">First Name</label>
                        <input type="text" class="form-control" name="name"
                          value="{{ auth()->user()->recruiter->name }}">
                      </div>
                      <div class="col-lg-3">
                        <label for="lastName" class="form-label ">Last Name</label>
                        <input type="text" class="form-control" name="lastName"
                          value="{{ auth()->user()->recruiter->lastName }}">
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Phone</label>

                        {{-- <div class="d-flex">
                                                    <input type="number" class="form-control phone_number_input--sm with_padding" name="country_code" value="{{ auth()->user()->recruiter->country_code }}">
                                            <input type="number"
                                                class="form-control phone_number_input--lg with_padding" name="phone"
                                                value="{{ auth()->user()->recruiter->phone }}">
                                        </div> --}}
                        <!-- <input type="tel" class='form-control' id="telephone" placeholder=""> -->
                        <div class="single-field full-width phone-input-flag d-flex ">
                          <input type="tel" class="mobile-number form-control fs-14 h-50px"
                            style="color: transparent;" name="country_code"
                            value="{{ auth()->user()->recruiter->country_code }}">
                          <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                            placeholder="Phone Number" name="phone" maxlength="11"
                            value="{{ auth()->user()->recruiter->phone }}">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <label for="abn" class="form-label ">ABN</label>
                        <input type="text" class="form-control" name="abn"
                          value="{{ auth()->user()->recruiter->abn }}">
                      </div>
                      <div class="col-lg-6">
                        <label for="acn" class="form-label ">ACN</label>
                        <input type="text" class="form-control" name="acn"
                          value="{{ auth()->user()->recruiter->acn }}">
                      </div>
                      {{-- <div class="col-lg-6">
                                                <label for="address" class="form-label ">Address</label>
                                                <input type="text" class="form-control" name="address"
                                                    value="{{ auth()->user()->recruiter->address }}">
                                            </div> --}}
                      <div class="col-lg-4">
                        <label for="address" class="form-label">Address*</label>

                        <input id="searchInput" value="{{ auth()->user()->recruiter->address }}"
                          class="form-control searchInput" name="address" type="text" placeholder="" required
                          autocomplete="off">
                        <input type="hidden" id="latitude" value="{{ auth()->user()->recruiter->lat }}" name="lat" />
                        <input type="hidden" id="longitude" value="{{ auth()->user()->recruiter->lng }}" name="lng" />
                      </div>
                      <div class="col-lg-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country"
                          value="{{ auth()->user()->recruiter->country }}" placeholder="" required>
                      </div>
                      <div class="col-lg-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" placeholder=""
                          value="{{ auth()->user()->recruiter->city }}" required>
                      </div>
                      <div class="col-lg-2">
                        <label for="zip_code" class="form-label">Zip/Postal
                          Code</label>
                        <input type="text" class="form-control"
                          value="{{ auth()->user()->recruiter->postal_code }}" id="zip_code" name="postal_code"
                          placeholder="">
                      </div>
                      <div class="col-lg-6" style="cursor: pointer;">
                        <label for="address" class="form-label " style="cursor: pointer;">Banner
                          Image</label>
                        <input type='file' id="bannerUpload" class="file-upload" name="banner"
                          accept=".png, .jpg, .jpeg" />
                      </div>
                      {{-- <div class="col-12">
                                                <label for="address" class="form-label ">Date</label>
                                                <input type="date" class="form-control" name="founded"
                                                    value="1990">
                                            </div> --}}

                      {{-- <div class="col-12">
                                                <label for="address" class="form-label ">Facebook Link</label>
                                                <input type="text" class="form-control" name="facebook"
                                                    value="https://www.vufuq.net">
                                            </div>
                                            <div class="col-12">
                                                <label for="address" class="form-label ">Twitter Link</label>
                                                <input type="text" class="form-control" name="twitter"
                                                    value="https://www.jizinoveta.co">
                                            </div>

                                            <div class="col-12">
                                                <label for="address" class="form-label ">LinkedIn Link</label>
                                                <input type="text" class="form-control" name="linkedIn"
                                                    value="https://www.roxobejy.me">
                                            </div> --}}
                      <div class="col-12">
                        <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">Save
                          changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-3">
        <ul class="row row-cols-1 gy-3">
          <li class="fs-14">
            <i
              class="fa-solid fa-user text_grey_999 me-2 "></i>{{ auth()->user()->recruiter->name . ' ' . auth()->user()->recruiter->lastName }}
          </li>
          <li class="fs-14">
            <i class="fa-solid fa-envelope text_grey_999 me-2 "></i>{{ auth()->user()->email }}
          </li>
          <li class="fs-14">
            <i class="fa-solid fa-phone text_grey_999 me-2 "></i>{{ auth()->user()->recruiter->country_code }}
            {{ auth()->user()->recruiter->phone }}
          </li>
        </ul>
      </div>
      <div class="border-bottom p-3 ">
        <div class="d-flex aling-items-center ">
          <h2 class="fw-500 fs-14 align-self-center ">Others Details</h2>
        </div>
      </div>
      <div class="border-bottom p-3 ">
        <ul class="row row-cols-1 gy-3 ">
          <li class="d-flex fs-14 align-items-center" style="gap: 6px;">
            <span>ABN : </span>{{ auth()->user()->recruiter->abn }}
          </li>
          <li class="d-flex fs-14 align-items-center" style="gap: 6px;">
            <span>ACN : </span>{{ auth()->user()->recruiter->acn }}
          </li>
          <li class="fs-14">
            <span>Address : </span>{{ auth()->user()->recruiter->address }}
          </li>
        </ul>
      </div>
    </div>
  </div>

@endsection

@section('bottom_script')
  <script>
    $(document).ready(function() {

      $('#firstform').on('submit', function(e) {
        e.preventDefault();
        var userFormData = $(this).serialize();
        console.log(userFormData);
        $.ajax({
            url: "{{ route('recruiter.profile.update') }}",
            type: "POST",
            data: userFormData,
            dataType: "json",
            encode: true,
          }).done(function(data) {
            console.log(data);
            if (data[0] == "success") {
              $('#firstform .text').text($('textarea#description').val());
              $('textarea#description').hide();
              $('div#description .text').show();
              $('#cancel-btn').hide();
              $('#save-btn').hide();
              $('.description').show();
              $('#description .characters').hide();
              successModal("Your Data Has Been Successfully Updated...");
            } else {
              errorModal(data[1]);
            }
          })
          .fail(function(error) {
            console.log(error);
            var errors = error.responseJSON;
            console.log(errors);

            // if (errors.errors.phone) {
            //     errorModal(errors.errors.phone);
            // } else if (errors.errors.address) {

            //     errorModal(errors.errors.address);

            // } else if (errors.errors.bio) {

            //     errorModal(errors.errors.bio);

            // }

          });


      });

      // $('#secondform').on('submit', function(e) {
      //     e.preventDefault();
      //     var userFormData = $(this).serialize();
      //     console.log(userFormData);
      //     $.ajax({
      //             type: "POST",
      //             url: "{{ route('recruiter.profile.update') }}",
      //             data: userFormData,
      //             dataType: "json",
      //             encode: true,
      //         }).done(function(data) {
      //             successModal("Your Data Has Been Successfully Updated...");
      //         })
      //         .fail(function(error) {
      //             var errors = error.responseJSON;
      //             console.log(errors);

      //         });


      // });
      $('.thirdform').on('submit', function(e) {
        e.preventDefault();
        var userFormData = $(this).serialize();
        console.log(userFormData);
        $.ajax({
            url: "{{ route('recruiter.profile.update') }}",
            type: "POST",
            data: userFormData,
            dataType: "json",
            encode: true,
          }).done(function(data) {
            successModal("Your Data Has Been Successfully Updated...");

          })
          .fail(function(error) {
            console.log(error);
            var errors = error.responseJSON;
            console.log(errors);

          });
      });

    });
  </script>
  <script>
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
          url: "{{ route('recruiter.getRecCategory') }}",
        }).done(function(data) {
          console.log(data);
          const allSkills = data.skill
          const candidateSkills = data.candSkills
          const mapped = candidateSkills.map(skill => allSkills.find(allSkill => allSkill.id === skill
            .cat_id).name)

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

    $('#skillsForm').on('submit', function(e) {
      e.preventDefault();
      var userFormData = $(this).serialize();
      // console.log(userFormData);
      $.ajax({
          type: "POST",
          url: "{{ route('recruiter.profile.update') }}",
          data: userFormData,
          dataType: "json",
          encode: true,
        }).done(function(data) {
          successModal("Your Data Has Been Successfully Updated...");
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);

        });
    });

    // // start about edit recrutiter count textarea word
    // var textareaValLen = $('.descriptionTextarea').val().length;
    // $('#descriptionCharacters').text(200 - textareaValLen);
    // var maxLength = 200;
    // $('.descriptionTextarea').keyup(function() {
    //     var textlen = maxLength - $(this).val().length;
    //     $('#descriptionCharacters').text(textlen);
    // });
    // // end about edit recrutiter count textarea word

    // // start tagline edit recrutiter count textarea word
    // var textareaValLen = $('.tagline-textarea').val().length;
    // $('.characters-tagline').text(100 - textareaValLen);
    // var maxLength = 100;
    // $('.tagline-textarea').keyup(function() {
    //     var textlen = maxLength - $(this).val().length;
    //     $('.characters-tagline').text(textlen);
    // });
    // // end tagline edit recrutiter count textarea word
  </script>
@endsection
