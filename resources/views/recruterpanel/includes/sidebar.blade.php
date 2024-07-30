<div class="col-xl-3 col-lg-4 col-md-5 sidebar_container @if (Route::is('recruiter.map')) d-none @endif">
    <i class="fa-solid fa-xmark side_bar_close d-lg-none"></i>
    <div class="bg-white position-relative rounded_10">
        <img src="{{ asset('/dashboard/images/side_bar_top.png') }}" alt="" class="img-fluid ">
        <div class="text-center">
            {{-- <img src="{{ asset('/dashboard/images/side_bar_auth.png') }}" alt=""
                class="side_bar_author rounded-50 mt-minus"> --}}
            <div class="upload-profile-image mt-minus">
                <form id="upload_form" action="{{ route('recruiter.profile.update') }}" enctype="multipart/form-data"
                    method="POST">
                    @csrf
                    <label for="profileImage"><i class="fa-solid fa-camera"></i> </label>
                    <input type="file" name="avatar" id="profileImage">
                    @if (isset(auth()->user()->recruiter))

                        @if (auth()->user()->recruiter->avatar != null)
                            <img class="side_bar_author rounded-50"
                                src="{{ asset('public/storage/' . auth()->user()->recruiter->avatar) }}" alt="">
                            {{-- {{ dd(asset('public/storage/' . auth()->user()->recruiter->avatar)) }} --}}
                        @else
                            <img class="side_bar_author rounded-50"
                                src="{{ asset('adminpanel/images/avatar/dummy.png') }}" alt="">
                        @endif
                    @else
                        <img class="side_bar_author rounded-50" src="{{ asset('adminpanel/images/avatar/dummy.png') }}"
                            alt="">
                    @endif
                </form>
            </div>
            <h3 class="fs-5 fw-600 text_primary mb-2">
                {{ auth()->user()->recruiter->name }}
                {{ \Illuminate\Support\Str::limit(auth()->user()->recruiter->lastName, 20, $end = '...') }}
            </h3>
            <p class="mb-2 px-3 fs-14">
                {{ Illuminate\Support\Str::limit(auth()->user()->recruiter->tagline, 50, $end = '...') }}
            </p>
            {{-- <p class="mb-2 px-3 fs-14 fw-bolder">Recruiter <span class="text_primary">{{ auth()->user()->posts_count }}/{{ auth()->user()->package->no_of_posts }} jobs</span></p> --}}
            <p class="mb-2 px-3 fs-14 fw-bolder">Profile: Recruiter
                {{-- <span
                    class="text_primary">{{ auth()->user()->posts_count }}/
                    @if (auth()->user()->posts_count > auth()->user()->package->no_of_posts)
                        {{ auth()->user()->package->no_of_posts . '+' . auth()->user()->posts_count - auth()->user()->package->no_of_posts }}
                        jobs
                    @else
                        {{ auth()->user()->package->no_of_posts }} jobs
                    @endif
                </span> --}}
            </p>
        </div>
        <ul class="side_bar_menu" id="side_bar_dashboard">
            <li @if (Route::is('dashboard')) class="active" @endif>
                <a href="{{ route('dashboard') }}"
                    @if (Route::is('dashboard')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('/dashboard/images/dashboard.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('/dashboard/images/dashboard-2.png') }}" alt="" class="me-4 two">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('recruiter.jobs') }}"
                    @if (Route::is('recruiter.jobs')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('/dashboard/images/companies-av.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('/dashboard/images/companies-av-white.png') }}" alt="" class="me-4 two">
                    <span>My Job Posts</span>
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
                        <a href="{{ route('recruiter.companyIndex') }}"
                            @if (Route::is('recruiter.companyIndex')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                            <img src="{{ asset('/dashboard/images/suitcase.png') }}" alt="" class="me-4 three">
                            <img src="{{ asset('/dashboard/images/suitcase-white.png') }}" alt=""
                                class="me-4 four">
                            <span>Employers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('recruiter.candidateIndex') }}"
                            @if (Route::is('recruiter.candidateIndex')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                            <img src="{{ asset('dashboard/images/Profile.png') }}" alt="" class="me-4 three">
                            <img src="{{ asset('dashboard/images/Profile-1.png') }}" alt="" class="me-4 four">
                            <span>Candidates</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('recruiter.profile') }}"
                    @if (Route::is('recruiter.profile')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('/dashboard/images/edit.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('/dashboard/images/edit-2.png') }}" alt="" class="me-4 two">
                    <span>My Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('recruiter.map') }}"
                    @if (Route::is('recruiter.map')) class="d-flex align-items-center active" @else class="d-flex align-items-center" @endif>
                    <img src="{{ asset('/dashboard/images/users-avatar-1.png') }}" alt="" class="me-4 one">
                    <img src="{{ asset('/dashboard/images/users-avatar-white.png') }}" alt="" class="me-4 two">
                    <span>Map View</span>
                </a>
            </li>
        </ul>
        @php
            $pckg = App\Models\SubscriptionPackages::where('status', 1)->max('no_of_posts');
            // dd($pckg);
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
