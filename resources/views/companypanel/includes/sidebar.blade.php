<div class="col-xl-3 col-lg-4 col-md-5 sidebar_container @if (Route::is('company.map')) d-none @endif">
  <i class="fa-solid fa-xmark side_bar_close d-lg-none"></i>
  {{-- @if (!Route::is('company.dashboard'))

    @if (Auth::check())
      @if (auth()->user()->role != 'admin')
        <p class="fs-14">
          <a href="{{ route('company.dashboard') }}" class="text-primary">Dashboard</a>
          <span>> My-Recruiter</span>
        </p>
      @endif
    @endif
  @endif --}}
  <div class="bg-white position-relative rounded_10 side-bar-mob">
    <img src="{{ asset('/dashboard/images/side_bar_top.png') }}" alt="" class="img-fluid ">
    <div class="text-center">
      {{-- <img src="{{ asset('/dashboard/images/side_bar_auth.png') }}" alt="" class="side_bar_author rounded-50
            mt-minus"> --}}
      <div class="upload-profile-image mt-minus">
        <form id="upload_form" action="{{ route('company.profile.update') }}" enctype="multipart/form-data"
          method="POST">
          @csrf
          <label for="profileImage"><i class="fa-solid fa-camera"></i> </label>
          <input type="file" name="logo" id="profileImage">
          @if (isset(auth()->user()->company))
            @if (auth()->user()->company->logo != null)
              <img class="side_bar_author rounded-50 " src="{{ asset('storage/' . auth()->user()->company->logo) }}"
                alt="">
            @else
              <img class="side_bar_author rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                alt="">
            @endif
          @else
            <img class="side_bar_author rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
              alt="">
          @endif
        </form>
      </div>
      <h3 class="fs-5 fw-600 text_primary mb-2">
        {{ auth()->user()->company->name }}
        <!--{{ \Illuminate\Support\Str::limit(auth()->user()->company->name, 20, $end = '...') }}-->
      </h3>
      <p class="mb-2 px-3 fs-14">
        @if (auth()->user()->company->type != null)
          {{ auth()->user()->company->type }}
        @else
          {{ auth()->user()->company->tagline }}
        @endif
      </p>
      <p class="mb-2 px-3 fs-14 fw-bolder">Profile: Employer
        {{-- - <span
                    class="text_primary">{{ auth()->user()->posts_count }}/
                    @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                        {{ auth()->user()->package->no_of_posts . '+' . auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                        jobs
                    @else
                        {{ auth()->user()->package->no_of_posts }} jobs
                    @endif
                </span> --}}</p>
    </div>

    <ul class="side_bar_menu" id="side_bar_dashboard">
      <li @if (Route::is('company.dashboard')) class="active" @endif>
        <a href="{{ route('company.dashboard') }}"
          @if (Route::is('company.dashboard')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('/dashboard/images/dashboard.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('/dashboard/images/dashboard-2.png') }}" alt="" class="me-4 two">
          <span>Dashboard</span>
        </a>
      </li>
      <li
        class="{{ request()->is('company/jobs') || request()->is('company/jobs/*') || request()->is('company/job/*') ? 'active' : '' }}">
        <a href="{{ route('company.jobs') }}"
          class="d-flex align-items-center {{ request()->is('company/jobs') || request()->is('company/jobs/*') || request()->is('company/job/*') ? 'active' : '' }}">
          <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('/dashboard/images/suitcase-white.png') }}" alt="" class="me-4 two">
          <span>My Job Posts</span>
        </a>
      </li>
      <li @if (Route::is('company.exam.*')) class="active" @endif>
        <a href="{{ route('company.exam.listing') }}"
          @if (Route::is('company.exam.listing')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('/dashboard/images/suitcase-white.png') }}" alt="" class="me-4 two">
          <span>My Exams</span>
        </a>
      </li>
      <li class="collapse_button_parent d-flex justify-content-between align-items-center">
        <a href="javascript:void(0)" class="d-flex align-items-center">
          <img src="{{ asset('dashboard/images/Connection.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('dashboard/images/Connection_hover.png') }}" alt="" class="me-4 two">

          <span>My Connections</span>
        </a>
        <span class="mx-auto not_collapsed collapsed" data-bs-toggle="collapse" href="#myProfile" role="button"
          aria-expanded="false" aria-controls="myProfile">
          <i class="fa-solid fa-plus"></i>
          <i class="fa-solid fa-minus"></i>
        </span>
      </li>
      <li class="collapse_items">
        <ul class="collapse" id="myProfile">
          <li>
            <a href="{{ route('company.recruiters') }}"
              @if (Route::is('company.recruiters')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
              <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="" class="me-4 three">
              <img src="{{ asset('/dashboard/images/users-avatar-white.png') }}" alt="" class="me-4 four">
              <span>Recruiters</span>
            </a>
          </li>
          <li>
            <a href="{{ route('company.candidateIndex') }}"
              @if (Route::is('company.candidateIndex')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
              <img src="{{ asset('dashboard/images/Profile.png') }}" alt="" class="me-4 three">
              <img src="{{ asset('dashboard/images/Profile-1.png') }}" alt="" class="me-4 four">
              <span>Candidates</span>
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="{{ route('company.profile') }}"
          @if (Route::is('company.profile')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('/dashboard/images/edit.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('/dashboard/images/edit-2.png') }}" alt="" class="me-4 two">
          <span>My Profile</span>
        </a>
      </li>
      <li>
        <a href="{{ route('company.map') }}"
          @if (Route::is('company.map')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
          <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="" class="me-4 one">
          <img src="{{ asset('/dashboard/images/users-avatar-white.png') }}" alt="" class="me-4 two">
          <span>Map View</span>
        </a>
      </li>

    </ul>
    @php
      $pckg = App\Models\SubscriptionPackages::where('status', 1)->max('no_of_posts');
      // dd($pckg, auth()->user()->package->no_of_posts);
    @endphp
    @if (auth()->user()->posts_count <= 2)
      <div class="text-center px-4 mt-large pb-4">
        <a href="{{ route('subscription') }}"
          class="d-flex align-items-center btn_theme_2 fw-500 justify-content-center py-3">
          <img src="{{ asset('/dashboard/images/target.png') }}" alt="" class="me-3">
          <span>Upgrade Package</span>
        </a>
        <p class="fs-14 mt-3">
          Choose a package that best represents your requirements. Our subscription packages offer
          great
          value
          for
          money.
        </p>
      </div>
    @endif
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  $('#profileImage').change(function(event) {
    $("#upload_form").submit();
  });
</script>
