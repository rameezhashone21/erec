@extends('companypanel.layout.app')

@section('page_title', 'E-Recss')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection



@section('content')



    {{-- <section> --}}
        <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            @if(session()->has('errorModal'))
                <div class="alert alert-success">
                    {{ session()->get('errorModal') }}
                </div>
                @endif
        
                @if (session('error'))
                  <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                  </div>
                @endif
            
                @if (session('success'))
                  <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                  </div>
                @endif
            <div class="d-md-flex aling-items-center mb-3">
                
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">All Job Posts List</h2>
                
                {{-- {{ dd(auth()->user()->package->name) }} --}}
                {{-- @if (auth()->user()->package->id == 21) --}}

                {{-- @php
                    if (auth()->user()->package->id == 21) {
                        $package_expiry = auth()->user()->package_expiry;
                        $postCheck = \App\Models\Posts::where('comp_id', auth()->user()->company->id)
                        ->where('created_at', '>=', $package_expiry)
                        ->get();
                        if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                            if (auth()->user()->posts_count > 0) {

                                @endphp
                                    <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                        onclick="existingJobs()"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job
                                    </a>
                                @php


                            } else {
                                @endphp
                                    <a href="javascript:void(0);" role="button"
                                        onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php
                            }
                        } else {
                            if (auth()->user()->posts_count > 0) {
                                $current = \Carbon\Carbon::now();
                                $userUpdate = auth()->user();
                                $userUpdate->package_expiry = $current->addMonth()->format('Y-m-d');
                                $userUpdate->save();

                                @endphp
                                    <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                        onclick="existingJobs()"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php


                            } else {
                                @endphp
                                    <a href="javascript:void(0);" role="button"
                                    onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                                    class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php
                            }

                        }
                        // dd(count($postCheck));
                        // dd('ok');
                        // dd(auth()->user()->posts_count);
                    } else {
                        if (auth()->user()->package_id != 0) {
                            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                            $customerdata = $stripe->subscriptions->retrieve(auth()->user()->package_buy_stripe_token, []);
                            if ($customerdata->status == 'trialing' || $customerdata->status == 'paid' || $customerdata->status == 'active') {
                                if (auth()->user()->posts_count > 0) {
                                    // dd($customerdata->toArray());
                                    @endphp
                                        <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                            onclick="existingJobs()"
                                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job</a>
                                    @php
                                } else {
                                    if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                                        $user = auth()->user();
                                        $user->posts_count = auth()->user()->package->no_of_posts;
                                        $user->package_expiry = date('Y-m-d H:i:s', $customerdata->current_period_end);
                                        // dd($user->toArray());
                                        $user->save();

                                        @endphp
                                            <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                                onclick="existingJobs()"
                                                class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                        @php
                                    } else {
                                        @endphp
                                            <a href="javascript:void(0);" role="button"
                                                onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                                                class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                        @php
                                    }
                                }
                            } else {
                                @endphp
                                    <a href="javascript:void(0);" role="button"
                                        onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php
                            }
                        } else {
                            @endphp
                                <a href="javascript:void(0);" role="button"
                                    onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                                    class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                Job</a>
                            @php
                        }
                    }
                @endphp --}}
                @php
                    // dd('ok');
                        if (auth()->user()->package->id == 21) {
                            $package_expiry = auth()->user()->package_expiry;
                            $postCheck = \App\Models\Posts::where('comp_id', auth()->user()->company->id)
                            ->where('created_at', '>=', $package_expiry)
                            ->get();
                            if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                                if (auth()->user()->posts_count > 0) {
                                    @endphp
                                        <a href="" data-package_expiryxyz="1" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                            onclick="existingJobs()"
                                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job
                                        </a>
                                    @php


                                } else {
                                    @endphp
                                    <a href="javascript:void(0);" role="button"
                                        data-bs-target="#error_modal" data-bs-toggle="modal"
                                        class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                    @php
                                }
                            } else {
                                if (auth()->user()->posts_count > 0) {
                                    $current = \Carbon\Carbon::now();
                                    $userUpdate = auth()->user();
                                    $userUpdate->package_expiry = $current->addMonth()->format('Y-m-d');
                                    $userUpdate->save();

                                @endphp
                                    <a href="" role="button" data-package_expiryzop="1" data-bs-toggle="modal" data-bs-target="#postJob"
                                        onclick="existingJobs()"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php


                                } else {
                                    @endphp
                                    <a href="javascript:void(0);" role="button" data-bs-toggle="modal"
                                        data-bs-target="#error_modal"
                                        class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                    @php
                                }

                            }
                            // dd(count($postCheck));
                            // dd('ok');
                            // dd(auth()->user()->posts_count);
                        } else {
                            if (auth()->user()->package_id != 0) {
                                // dd('ok');
                                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                                $customerdata = $stripe->subscriptions->retrieve(auth()->user()->package_buy_stripe_token, []);
                                if ($customerdata->status == 'trialing' || $customerdata->status == 'paid' || $customerdata->status == 'active') {
                                    if (auth()->user()->posts_count > 0) {
                                        // dd($customerdata->toArray());
                                        @endphp
                                            <a href="" data-posts_count="1" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                                onclick="existingJobs()"
                                                class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                        @php
                                    } else {
                                        if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                                            $user = auth()->user();
                                            $user->posts_count = auth()->user()->package->no_of_posts;
                                            $user->package_expiry = date('Y-m-d H:i:s', $customerdata->current_period_end);
                                            // dd($user->toArray());
                                            $user->save();

                                            @endphp
                                                <a href="" data-package_expiry="1" role="button"  data-bs-toggle="modal" data-bs-target="#postJob"
                                                    onclick="existingJobs()"
                                                    class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                                Job</a>
                                            @php
                                        } else {
                                                @endphp
                                                <a href="javascript:void(0);" role="button"  data-bs-toggle="modal"
                                                    data-bs-target="#error_modal"
                                                    class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                                Job</a>
                                                @php
                                        }

                                        // dd('ko');
                                    }
                                } else {
                                    @endphp
                                    <a href="javascript:void(0);" role="button" data-bs-toggle="modal"
                                        data-bs-target="#error_modal"
                                        class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                    @php
                                }
                            } else {
                                @endphp
                                <a href="javascript:void(0);" role="button"
                                    data-bs-target="#error_modal" data-bs-toggle="modal"
                                    class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                Job</a>
                                @php
                            }
                        }
                    @endphp

                    <!-- Modal -->
                    <div class="modal fade" id="error_modal" tabindex="-1" aria-labelledby="error_modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="{{ asset('imgs/fav-icon.png') }}" alt="" width="100" height="100"
                                    class="img-fluid">
                                <p>
                                    We hope you've been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you've used up your allocated job post credits for this subscription level, but don't worry, we've got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.
                                </p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn_viewall fw-500 px-4 py-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <a href="{{ route('subscription') }}" class="btn_viewall fw-500 px-4 py-2">Upgrade</a>
                            </div>
                        </div>
                    </div>
                    </div>
                {{-- @if (auth()->user()->posts_count > 0)
                    <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob" onclick="existingJobs()"
                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                        Job</a>
                @else
                    <a href="javascript:void(0);" role="button"
                        onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                        Job</a>
                @endif --}}

                <!-- Modal Post job start -->
                {{-- <div class="modal fade" id="postJob" tabindex="-1" aria-labelledby="postJobLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header border-0 pb-0">
                                <div>
                                    <h5 class="modal-title text_primary fw-600 fs-5 ps-3" id="postJobLabel">Post A Job</h5>
                                </div>
                            </div>
                            <div class="modal-body">
                                <p class="text-dark fs-14 mb-3 ps-3">How Would You Like To Post Your Job?</p>
                                <div class="position-relative mb-4">
                                    <input type="checkbox" onchange="disabledDiv()" id="newPost" name="jobPost"
                                        class="post-job-radio" checked>
                                    <label for="newPost" class="post-job-box p-3 ">
                                        <div class="fw-600 mb-2">Start With A New Post</div>
                                        <div class="fs-14 text_grey_999">Use our posting tool to create your job.</div>
                                    </label>
                                </div>
                                <div class="position-relative">
                                    <input type="checkbox" onchange="enableDiv()" id="previousTemplate" name="jobPost"
                                        class="post-job-radio">
                                    <label for="previousTemplate" class="post-job-box p-3 ">
                                        <div class="fw-600 mb-2">Use A Previous Job As A Template</div>
                                        <div class="fs-14 text_grey_999">Copy a past job post and edit as needed.</div>
                                    </label>
                                </div>
                                <div style="border: 1px dotted #ececec;" class="my-4"></div>
                                <div class="table-responsive table_height modal-table disable-div" disabled="disabled">
                                    <table id="datatableModal" class="table table-striped table-payment display nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="no-filter"></th>
                                                <th>Your Job</th>
                                                <th>Date posted</th>
                                                <th>Location</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check-box-table" id="jobpost1"
                                                        name="jobPostTable">
                                                </td>
                                                <td>
                                                    Product Manager
                                                </td>
                                                <td>
                                                    09 January 2023
                                                </td>
                                                <td>
                                                    La Quinta, California 92253USA La Quinta, California 92253, USA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check-box-table" id="jobpost2"
                                                        name="jobPostTable">
                                                </td>
                                                <td>
                                                    front end developer
                                                </td>
                                                <td>
                                                    09 January 2023
                                                </td>
                                                <td>
                                                    La Quinta, 92253USA La USA
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="check-box-table" id="jobpost3"
                                                        name="jobPostTable">
                                                </td>
                                                <td>
                                                    Product Manager
                                                </td>
                                                <td>
                                                    09 January 2023
                                                </td>
                                                <td>
                                                    La Quinta, California 92253USA La Quinta, California 92253, USA
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto"
                                    href="{{ route('company.jobs.create') }}">Next</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Modal Post job end -->
            </div>
            <div class="table-responsive table_height scrollbar">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="set-width-table-1">#</th>
                            <th class="set-width-table-3">Job title</th>
                            {{-- <th>Job Posted</th> --}}
                            {{-- <th>Description</th> --}}
                            <th class="set-width-table-2">Experience</th>

                            <th class="set-width-table-2">Recruiter</th>
                            <th class="set-width-table-4">Active/Inactive</th>
                            <th class="set-width-table-4">Status</th>
                            <th class="set-width-table-2">Action</th>
                            {{-- <th class="">Repost</th> --}}
                        </tr>

                    </thead>
                    <tbody>
                        @if (count($post) > 0)
                            @foreach ($post as $key => $row)
                                <tr>
                                    <td class="set-width-table-1">
                                        {{ $key + 1 }}.
                                    </td>
                                    <td class="set-width-table-3">
                                        <p>{{ $row->post }}</p>
                                    </td>
                                    {{-- <td>
                                        @if ($row->description != null)
                                            {!! Str::limit($row->description, 80, '...') !!}
                                        @else
                                            NULL
                                        @endif
                                    </td> --}}
                                    <td class="set-width-table-2">

                                        {{ $row->experience }}

                                    </td>
                                    <td class="set-width-table-2">
                                        @if ($row->rec_id != 0)
                                            @if($row->recruiter != null)
                                            {{ $row->recruiter->name }}
                                            @else
                                            Recruiter is not avalaible
                                            @endif
                                        @else
                                            No Recruiter
                                        @endif
                                    </td>
                                    @if ($row->status != 5)
                                        <td class="set-width-table-4" id="statusChangeBox-{{ $row->id }}">
                                            @if ($row->status == 0)
                                                <p onclick="statusChange({{ $row->id }})"
                                                    id="buttonID({{ $row->id }})"
                                                    class="btn btn_viewall text-center p-2 ">
                                                    Inactive</p>
                                            @elseif($row->rec_delete == 1)
                                                <p class="btn btn-success text-center p-2">Archived</p>
                                            @else
                                                {{-- <p onclick="statusDeactive({{ $row->id }})" id="buttonDeactive"
                                                class="btn btn-success text-center p-2">Deactivate</p> --}}
                                                <p onclick="statusDeactive({{ $row->id }})"
                                                    id="buttonID({{ $row->id }})"
                                                    class="btn btn_viewall text-center p-2 ">
                                                    Active</p>
                                            @endif
                                        </td>
                                    @else
                                        <td>
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="" class="btn btn-danger disabled">
                                                    Disabled by Admin
                                                </a>
                                            </div>
                                        </td>
                                    @endif
                                    {{-- <td class="set-width-table-4" id="statusChangeBox-{{ $row->id }}">
                                        @if ($row->status == 0)
                                            <p class="btn btn-danger text-center p-2" style="color:#fff;">Deactivated</p>
                                        @elseif($row->rec_delete == 1)
                                            Archived
                                        @else
                                            <p class="btn btn-success text-center p-2" style="color:#fff;">Posted</p>
                                        @endif
                                    </td> --}}
                                    <td class="set-width-table-2" id="realStatus-{{ $row->id }}">
                                        @if ($row->status == 0)
                                            <p class="btn btn-danger text-center p-2" style="color:#fff;">Inactive</p>
                                        @elseif($row->rec_delete == 1)
                                            Archived
                                        @else
                                            <p class="btn btn-success text-center p-2" style="color:#fff;">Posted</p>
                                        @endif
                                    </td>
                                    {{-- <td class="set-width-table-2">
                                        <a href="{{ route('company.job.details', $row->slug) }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="View" target="_blank"
                                            class="btn btn_viewall"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('company.job.edit', $row->slug) }}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit" class="btn btn_viewall"><i
                                                class="fas fa-edit"></i></a>
                                    </td> --}}
                                    <td class="set-width-table-4">
                                        @if ($row->status != 5)
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="{{ route('company.job.details', $row->slug) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="View"
                                                     class="btn btn_viewall">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('company.job.edit', $row->slug) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                    class="btn btn_viewall">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        @else
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="" class="btn btn-danger disabled">
                                                    Disabled by Admin
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" align="center" class="text-center">You didn't post any job</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            {{-- {{ $post->links() }} --}}
        </div>

        <!-- Modal -->
        {{-- <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style='background-color: #fff;'>
                    <div class="modal-body py-md-4 py-3">
                        <p class="text-center fs-4" style="font-weight:600;">Do you really want to
                            delete?</p>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">No</button>
                        <a class="btn btn-danger px-5" id="delete-edu" href="">Yes</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- End Modal -->

    </div>
    {{-- </section> --}}

    <script>
        function statusChange(value) {
            var url = '{{ route('change.status.job', ':id') }}';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                }
            }).done(function() {
                // $('#buttonID').html('Approved');
                $('#statusChangeBox-' + value).html('');
                var html = "";
                var htmlSecond = "";
                html += "<p onclick='statusDeactive(" + value + ")' id='buttonID" + value + "'";
                html += "class='btn btn_viewall text-center p-2 '>Active</p>";
                var htmlSecond = "<p class='btn btn-success text-center p-2' style='color:#fff;'>Posted</p>";
                $('#statusChangeBox-' + value).html(html);
                $('#realStatus-' + value).html(htmlSecond);
            });

        }

        function statusDeactive(value) {
            var url = '{{ route('change.deactive.job', ':id') }}';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                }
            }).done(function() {
                $('#statusChangeBox-' + value).html('');
                var html = "";
                var htmlSecond = "";
                var htmlSecond = "<p class='btn btn-danger text-center p-2' style='color:#fff;'>Inactive</p>";
                html += "<p onclick='statusChange(" + value + ")' id='buttonID" + value + "'";
                html += "class='btn btn_viewall text-center p-2 '>Inactive</p>";
                $('#statusChangeBox-' + value).html(html);
                $('#realStatus-' + value).html(htmlSecond);
            });

        }

        function callModal(id) {
            var href = '{{ route('companys.jobs.delete', ':id') }}';
            newhref = href.replace(':id', id);
            $('#delete-edu').attr('href', newhref);

            Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete this job? All the data will be removed",
                    // text: "Do you really want to delete?",
                    icon: 'error',
                    iconColor: '#64262f',
                    showCancelButton: true,
                    confirmButtonColor: '#007ba7',
                    cancelButtonColor: '#64262f',
                    customClass: "delete-sweet-alert",
                    confirmButtonText: "<span id='delete-edu'><a class='text-white' href='{{ route('companys.jobs.delete', '') }}/" +
                        id +
                        "'>Yes</a></span>",
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
            // $('#staticBackdrop').modal('show');
        }
    </script>

@endsection

@section('bottom_script')
@endsection
