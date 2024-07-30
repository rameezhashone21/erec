<div class="col-xl-3 col-lg-4 col-md-5 sidebar_container
@if (Route::is('candidates.cvParser') ||
        Route::is('candidates.cvParser.contact') ||
        Route::is('candidates.cvParser.experience') ||
        Route::is('candidates.cvParser.education') ||
        Route::is('candidates.cvParser.others') ||
        Route::is('candidates.cvParser.skills') ||
        Route::is('candidates.cvParser.about')) d-none @endif">
  <i class="fa-solid fa-xmark side_bar_close d-lg-none"></i>
  <div class="bg-white position-relative rounded_10 h-sm-100per">
    <img src="{{ asset('dashboard/images/side_bar_top.png') }}" alt="" class="img-fluid ">
    <div class="text-center">
      <div class="upload-profile-image mt-minus">
        <form id="upload_form" action="{{ route('candidates.profile.update') }}" enctype="multipart/form-data"
          method="POST">
          @csrf
          <label for="profileImage"><i class="fa-solid fa-camera"></i> </label>
          <input type="file" name="avatar" id="profileImage">
          @if (isset(auth()->user()->candidate))
            @if (auth()->user()->avatar != null)
              <img class="side_bar_author rounded-50 " src="{{ asset('storage/' . auth()->user()->avatar) }}"
                alt="">
            @else
              <img class="side_bar_author rounded-50 " src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                alt="">
            @endif
          @else
            <img class="side_bar_author rounded-50 " src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
              alt="">
          @endif
        </form>
      </div>
      <h3 class="fs-5 fw-600 text_primary px-3 mb-2">
        {{ auth()->user()->candidate->first_name }}
        {{ \Illuminate\Support\Str::limit(auth()->user()->candidate->last_name, 20, $end = '...') }}
      </h3>
      <p class="mb-2 fs-14 px-3">
        {{-- {{ auth()->user()->candidate->head_line }} --}}
        @if (auth()->user()->candidate->tagline != null)
          {{ \Illuminate\Support\Str::limit(auth()->user()->candidate->tagline, 50, $end = '...') }}
        @else
          {{ \Illuminate\Support\Str::limit(auth()->user()->candidate->head_line, 50, $end = '...') }}
        @endif
      </p>
      <p class="mb-2 fs-14 px-3">
        <?php
        $user = auth()->user();
        if (isset($user->candidatePro) && count($user->candidatePro) > 0) {
            $pro = $user->candidatePro->first();
            // echo $pro->designation . '<br>' . $pro->company_name . '<br>' . auth()->user()->email . '<br>' . auth()->user()->candidate->country_code . auth()->user()->candidate->number;
            echo $pro->designation;
        }
        ?>
      </p>
      <p class="mb-2 px-3 fs-14 fw-bolder">Profile: Candidate</p>

    </div>
    <div class="px-4 d-flex my-3 align-items-center">
      <label for="" class="me-auto text_grey_999 fs-14">
        Open to work
      </label>
      <div class="form-check form-switch ">
        <input class="form-check-input" type="checkbox" @if (auth()->user()->candidate->status == 1) checked @endif
          value="{{ auth()->user()->candidate->status }}" onchange="status({{ auth()->user()->candidate->status }})"
          id="flexSwitchCheckChecked">
      </div>
    </div>

    <ul class="side_bar_menu" id="side_bar_dashboard">
      <li @if (Route::is('candidate.dashboard')) class="active" @endif>
        <a href="{{ route('candidate.dashboard') }}"
          @if (Route::is('candidate.dashboard')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('dashboard/images/dashboard.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/dashboard-2.png') }}" alt="" class="me-4 two">
          <span>Dashboard</span>
        </a>
      </li>
      <li class="collapse_button_parent d-flex justify-content-between align-items-center">
        {{-- <div class="d-flex justify-content-between align-items-center"> --}}
        <a class="d-flex align-items-center" href="{{ route('candidates.details.view') }}"
          @if (Route::is('candidates.details.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>

          <img src="{{ asset('dashboard/images/Profile.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/Profile-1.png') }}" alt="" class="me-4 two">
          <span>My Profile</span>
        </a>
        <span class="mx-auto not_collapsed collapsed" data-bs-toggle="collapse" href="#myProfile" role="button"
          aria-expanded="false" aria-controls="myProfile">
          <i class="fa-solid fa-plus"></i>
          <i class="fa-solid fa-minus"></i>
        </span>
        {{-- </div> --}}

        {{-- <div class="collapse" id="myProfile">
                  <div class="card card-body">
                    Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
                  </div>
                </div> --}}
      </li>
      <li class="collapse_items">
        <ul class="collapse" id="myProfile">
          <li>
            <a href="{{ route('candidates.education.view') }}"
              @if (Route::is('candidates.education.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
              <img src="{{ asset('dashboard/images/suitcase.png') }}" alt="" class="three me-4">
              <img src="{{ asset('dashboard/images/suitcase-white.png') }}" alt="" class="four me-4">
              <span>Education Details</span>
            </a>
          </li>
          <li>
            <a href="{{ route('candidates.profession.view') }}"
              @if (Route::is('candidates.profession.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
              <img src="{{ asset('dashboard/images/companies-av.png') }}" alt="" class="three me-4">
              <img src="{{ asset('dashboard/images/companies-av-white.png') }}" alt="" class="four me-4">
              <span>Professional Details</span>
            </a>
          </li>
          <li>
            <a href="{{ route('candidates.profile.view') }}"
              @if (Route::is('candidates.profile.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
              <img src="{{ asset('dashboard/images/edit.png') }}" alt="" class="three me-4">
              <img src="{{ asset('dashboard/images/edit-2.png') }}" alt="" class="four me-4">
              <span>Profile Settings</span>
            </a>
          </li>
        </ul>
      </li>
      {{-- <li>
                <a href="{{ route('candidates.details.view') }}"
                    @if (Route::is('candidates.details.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('dashboard/images/Profile.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('dashboard/images/Profile-1.png') }}" alt="" class="me-4 two">
                    <span>My Profile</span>
                </a>
            </li> --}}
      {{-- <li><a href="javascript:void(0)" class="d-flex align-items-center">My Profiile</a></li> --}}
      {{-- <li>
                <a href="{{ route('candidates.education.view') }}"
                    @if (Route::is('candidates.education.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('dashboard/images/suitcase.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('dashboard/images/suitcase-white.png') }}" alt="" class="me-4 two">
                    <span>Education Details</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidates.profession.view') }}"
                    @if (Route::is('candidates.profession.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('dashboard/images/companies-av.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('dashboard/images/companies-av-white.png') }}" alt="" class="me-4 two">
                    <span>Professional Details</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidates.profile.view') }}"
                    @if (Route::is('candidates.profile.view')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('dashboard/images/edit.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('dashboard/images/edit-2.png') }}" alt="" class="me-4 two">
                    <span>Profile Settings</span>
                </a>
            </li> --}}
      <li>
        <a href="{{ route('candidates.cvList') }}"
          @if (Route::is('candidates.cvList')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('dashboard/images/CV.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/CV-1.png') }}" alt="" class="me-4 two">
          <span>My Resumes</span>
        </a>
      </li>
      <li>
        <a href="{{ route('candidates.cvParser') }}"
          @if (Route::is('candidates.cvParser')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('dashboard/images/CV.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/CV-1.png') }}" alt="" class="me-4 two">
          <span>Digital CV Builder</span>
        </a>
      </li>
      {{-- <li>
                <a href="{{ route('candidates.job.visibility') }}"
                    @if (Route::is('candidates.job.visibility')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('dashboard/images/application.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('dashboard/images/application.png') }}" alt="" class="me-4 two">
                    <span>My visibility</span>
                </a>
            </li> --}}
      <li @if (Route::is('candidates.job.index')) class="active" @endif>
        <a href="{{ route('candidates.job.index') }}"
          @if (Route::is('candidates.job.index')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('dashboard/images/application.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/application-white.png') }}" alt="" class="me-4 two">
          <span>My Job Applications</span>
        </a>
      </li>
      <li @if (Route::is('candidates.saved.jobs')) class="active" @endif>
        <a href="{{ route('candidates.saved.jobs') }}"
          @if (Route::is('candidates.saved.jobs')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('dashboard/images/application.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/application-white.png') }}" alt="" class="me-4 two">
          <span>My Saved Jobs</span>
        </a>
      </li>
    </ul>
    {{-- <div class="text-center px-4 mt-large pb-4">
            <a href="javascript:;" class="d-flex align-items-center btn_theme_2 fw-500 justify-content-center py-3">
                <img src="{{ asset('dashboard/images/target.png') }}" alt="" class="me-3">
                <span>Upgrade Package</span>
            </a>
            <p class="fs-14 mt-3">
                Choose a package that best represents your requirements. Our subscription packages offer great value for
                money.
            </p>
        </div> --}}
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function status(value) {
    var url = 0;
    if (value == 1) {
      url = "{{ route('change.status', 0) }}";
    } else {
      url = "{{ route('change.status', 1) }}";
    }
    $.ajax({
      type: 'GET',
      url: url,
      crossDomain: true,
      success: function(data) {
        console.log(data);
      }
    });
  }

  $('#profileImage').change(function(event) {
    $("#upload_form").submit();
  });
  // $('#upload_form').on('submit',function(event) {
  //     // event.preventDefault();
  //     var formdata = ($("#upload_form").serialize());
  //     console.log(formdata);
  //     $.ajax({
  //         url: "{{ route('candidates.profile.update') }}",
  //         method: "POST",
  //         data: formdata,
  //         dataType: 'JSON',
  //         contentType: false,
  //         cache: false,
  //         processData: false,
  //         success: function(data) {
  //             $('#message').css('display', 'block');
  //             $('#message').html(data.message);
  //             $('#message').addClass(data.class_name);
  //             $('#uploaded_image').html(data.uploaded_image);
  //         },
  //         error: function(data) {
  //             console.log("error");
  //             console.log(data);
  //         }
  //     })
  // });
</script>
