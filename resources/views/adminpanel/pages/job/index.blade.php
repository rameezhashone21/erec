@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    {{-- <section> --}}
    <div class="mb-5 col-md-12">
        <div class="table-responsive shadow">
            <div class="p-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Post</th>
                            <th>Job Type</th>
                            <th>Experience</th>
                            <th>Location</th>
                            <th>Posted Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if (count($job) > 0)
                            @foreach ($job as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->post }}</td>
                                    <td>{{ $row->job_type }}</td>
                                    <td>{{ $row->experience }}</td>
                                    <td>{{ $row->location }}</td>
                                    <td>{{ $row->created_at->format('d/m/y') }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            Active
                                        @elseif($row->status == 0)
                                            Disabled
                                        @elseif($row->status == 5)
                                            Disabled By Admin
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.jobDetails', $row->slug) }}" class="btn btn_viewall">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="" data-toggle="modal" data-target="#deleteModal-job-{{ $row->id }}"
                                            class="btn btn_viewall delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        {{-- <a href="{{ route('admin.jobPostDelete', $row->slug) }}"
                                            onclick="return confirm('Are you sure you want to delete?');"
                                            class="btn btn_viewall delete">
                                            <i class="fa fa-trash"></i>
                                        </a> --}}
                                        <div class="modal fade" id="deleteModal-job-{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <a href="{{ route('admin.jobPostDelete', $row->slug) }}" class="btn btn_viewall delete"
                                                            style=" padding: 8px 30px !important; font-size: 16px;">
                                                            Yes
                                                        </a>
                                                        <button type="button" class="btn btn_viewall" data-dismiss="modal"
                                                            style="padding: 8px 30px !important; font-size: 16px;">
                                                            No
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" allign="center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center pt-5">
                {{ $job->links() }}
            </div> --}}
            </div>
        </div>
    </div>
    <!-- </div> -->
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
