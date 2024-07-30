@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex aling-items-center justify-content-between">
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">All Job Posts List</h2>
                <div>
                    {{-- <a href="{{ route('recruiter.jobs.create') }}" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Post An Existing Job</a> --}}
                    {{-- <a href="{{ route('recruiter.jobs.create') }}" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Post A Job</a> --}}
                    {{-- {{ dd(auth()->user()->package->name) }} --}}
                    {{-- @if (auth()->user()->package->id == 21) --}}
                    @php
                        if (auth()->user()->package->id == 21) {
                            $package_expiry = auth()->user()->package_expiry;
                            $postCheck = \App\Models\Posts::where('rec_id', auth()->user()->recruiter->id)
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
                                    <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                        onclick="existingJobs()"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                @php


                                } else {
                                    @endphp
                                        <a href="javascript:void(0);" role="button"
                                            data-bs-target="#error_modal" data-bs-toggle="modal"
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
                                                data-bs-target="#error_modal" data-bs-toggle="modal"
                                                class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                            @php
                                        }
                                    }
                                } else {
                                    @endphp
                                        <a href="javascript:void(0);" role="button"
                                            data-bs-target="#error_modal" data-bs-toggle="modal"
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
                        <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                            onclick="existingJobs()"
                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                            Job</a>
                    @else
                        <a href="javascript:void(0);" role="button"
                            onclick="errorModal('We hope you\'ve been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you\'ve used up your allocated job post credits for this subscription level, but don\'t worry, we\'ve got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.')"
                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                            Job</a>
                    @endif --}}
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="px-3">
                    {{-- <a class="btn btn-primary" style="color:#FFF;" href=""> Import CSV</a> --}}
                    <form id="" action="{{ route('recruiter.csv') }}" method="POST" class="btn" name="csv_form"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <span class="btn btn-primary btn-file btn_panel">
                         Upload CSV
                         <i class="fa fa-upload"></i></i><input type="file" name="csv_file" accept=""
                             onchange="csv_form.submit()">
                     </span> --}}
                    </form>
                </div>
            </div>
            <!-- <div class="table-responsive table_height scrollbar"> -->
            <div class="table-responsive scrollbar">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="set-width-table-1">#</th>
                            <th class="set-width-table-2">Job title</th>
                            <th class="set-width-table-2">Experience</th>
                            <th class="set-width-table-3">Company</th>
                            <th class="set-width-table-4">Active/Inactive</th>
                            {{-- <th>Banner</th> --}}
                            <th class="set-width-table-2">Status</th>
                            <th class="set-width-table-2">Action</th>
                            {{-- <th class="set-width-table-2">Repost</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($post) > 0)
                            @foreach ($post as $key => $row)
                                <tr id="remove-{{ $row->id }}">
                                    <td class="set-width-table-1">
                                        {{ $key + 1 }}.
                                    </td>
                                    <td class="set-width-table-2">{{ $row->post }}</td>
                                    <td class="set-width-table-2">
                                        {{ \Illuminate\Support\Str::limit($row->experience, 15, '...') }}
                                    </td>
                                    <td class="set-width-table-3">
                                        @if ($row->comp_id != 0)
                                            {{ \Illuminate\Support\Str::limit($row->company->name, 15, '...') }}
                                        @else
                                            No Company
                                        @endif
                                    </td>
                                    @if ($row->status != 5)
                                    <td class="set-width-table-4" id="statusChangeBox-{{ $row->id }}">
                                        {{-- @if ($row->comp_id == 0) --}}
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
                                        {{-- @else
                                            <p class="btn btn_viewall text-center p-2 disabled">
                                                @if ($row->status == 0)
                                                    Inactive
                                                @else
                                                    Active
                                                @endif
                                            </p>
                                        @endif --}}
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
                                    <td class="set-width-table-2" id="realStatus-{{ $row->id }}">
                                        @if ($row->status == 0)
                                            <p class="btn btn-danger text-center p-2" style="color:#fff;">Inactive</p>
                                        @elseif($row->rec_delete == 1)
                                            Archived
                                        @else
                                            <p class="btn btn-success text-center p-2" style="color:#fff;">Posted</p>
                                        @endif
                                    </td>
                                    <td class="set-width-table-2">
                                        @if ($row->status != 5)
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View"
                                                href="{{ route('recruiter.job.details', $row->slug) }}"
                                                class="btn btn_viewall"><i class="fas fa-eye"></i></a>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                href="{{ route('recruiter.jobs.edit', $row->slug) }}"
                                                class="btn btn_viewall"><i class="fas fa-edit"></i></a>
                                        @else
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="" class="btn btn-danger disabled">
                                                    Disabled by Admin
                                                </a>
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                                {{-- <td>
                                    <img src="{{ asset('public/storage/' . $row->banner) }}" alt="plus-circle" width="70px"
                                        style="border-radius: 100px" height="70px">
                                </td> --}}
                                {{-- <button type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Delete" class="btn btn_viewall delete" data-bs-toggle="modal"
                                        data-bs-target="#newModal10"><i class="fa fa-box-archive"
                                            title="Archive"></i></button> --}}
                                {{-- <td>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Post a similar job"
                                        href="{{ route('recruiter.existing.job', $row->id) }}"
                                        class="btn btn_viewall">Post
                                        An Existing</a>
                                </td> --}}
                                {{-- <div class="modal fade" id="newModal10" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body py-md-4 py-3">
                                                <p class="text-center fs-4" style="font-weight:600;">Move to archive?
                                                </p>
                                            </div>
                                            <div class="modal-footer border-0 justify-content-center">
                                                <a class="btn btn-danger" id="delete-edu"
                                                    href="{{ route('recruiter.job.destroy', $row->id) }}">Yes</a>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">You haven't posted any job yet.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2">
                    {{-- {{ $post->links() }} --}}
                </div>
            </div>
            <!-- Modal -->
            {{-- <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
    </div>
    {{-- <section> --}}
    {{-- <div class="container">
        <div class="card px-2 py-4">
            <div class="row py-4">
                <div class="col-md-6">
                    <div class="px-3">
                        <h2>All Job Posts List</h2>
                        @include('layouts.includes.messages')
                    </div>
                </div>
                <div class="col-md-6 text-right">
                   <div class="px-3">
                        <a class="btn btn-primary" style="color:#FFF;" href=""> Import CSV</a>
                        <form id="" action="{{ route('recruiter.csv') }}" method="POST" class="btn" name="csv_form"
                            enctype="multipart/form-data">
                            @csrf
                            <span class="btn btn-primary btn-file btn_panel">
                                Upload CSV
                                <i class="fa fa-upload"></i></i><input type="file" name="csv_file" accept=""
                                    onchange="csv_form.submit()">
                            </span>
                        </form>
                        <a class="btn btn-primary btn_panel" href="{{ route('recruiter.jobs.create') }}"> Add
                            Post</a>
                    </div>
                </div>
            </div>
            <div class="table table-border table-responsive">
                <table style="width: 100%;">
                    <tr>
                        <th>Sr. #</th>
                        <th>Designation</th>
                        <th>Experience</th>
                        <th>Company</th>
                        <th>Banner</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @if (count($post) > 0)
                        @foreach ($post as $key => $row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->post }}</td>
                                <td>{{ $row->experience }}</td>
                                <td>{{ $row->company->name }}</td>
                                <td>
                                    <img src="{{ asset('public/storage/' . $row->banner) }}" alt="plus-circle" width="70px"
                                        style="border-radius: 100px" height="70px">
                                </td>
                                <td>
                                    @if ($row->status == 0)
                                        <p class="btn btn-danger text-center p-2" style="color:#fff;">Not Approved</p>
                                    @else
                                        <p class="btn btn-success  text-center p-2" style="color:#fff;">Approved</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm mt-2"><i class="fa fa-info"
                                            style="font-size:18px"></i></a>
                                    <a href="" class="btn btn-danger btn-sm mt-2"><i class="fa fa-trash"
                                            style="font-size:18px"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" align="center">You didn't any job.</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div> --}}
    {{-- </section> --}}

@endsection

@section('bottom_script')
    <script>
        function statusChange(value) {
            var url = '{{ route('rec.change.status.job', ':id') }}';
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
                var htmlSecond = "<p class='btn btn-success text-center p-2' style='color:#fff;'>Posted</p>";
                html += "<p onclick='statusDeactive(" + value + ")' id='buttonID" + value + "'";
                html += "class='btn btn_viewall text-center p-2 '>Active</p>";
                $('#statusChangeBox-' + value).html(html);
                $('#realStatus-' + value).html(htmlSecond);
            });

        }

        function statusDeactive(value) {
            var url = '{{ route('rec.change.deactive.job', ':id') }}';
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
            // $("#remove-" + id).remove();
            // var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            //     keyboard: false
            // });
            // myModal.toggle();
            // $('#staticBackdrop').modal('show');
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
                confirmButtonText: "<span id='delete-edu'><a class='text-white' href='{{ route('recruiter.jobs.delete', '') }}/" +
                    id +
                    "'>Yes</a></span>",
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success',
                    )
                }

            })
        }
    </script>
@endsection
