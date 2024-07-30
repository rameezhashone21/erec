@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    {{-- <section> --}}
    <div class="col-xl-9 col-lg-8 col-md-7">
        <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <div class="d-flex aling-items-center my-5">
                {{-- <div class="col-md-8"> --}}
                <h2 class="fw-500 text_primary fs-5 align-self-center">All Job Applications List</h2>
                {{-- </div> --}}
                {{-- <div class="col-md-4 text-right">
                            <a class="btn btn-primary" style="color:#FFF;" href="{{ route('company.jobs.create') }}"> Add Post</a>
                        </div> --}}
            </div>
            <div class="table table-border table-responsive">
                <table id="example" class="table table-striped table-payment display nowrap dataTable no-footer"
                    style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. #</th>
                            <th>Title</th>
                            <th>Job Type</th>
                            <th>Experience</th>
                            <th>Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($apps) > 0)
                            @foreach ($apps as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}. </td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->job_type }}</td>
                                    <td>{{ $row->experience }}</td>
                                    <td>
                                        @if ($row->status == 0)
                                            <form method="GET"
                                                action="{{ route('candidates.job.visibility.change', $row->id) }}">
                                                <input type="hidden" value="1" name="status" />
                                                <button class="btn_viewall fw-500 px-4 py-2"><i
                                                        class="material-icons">visibility_off</i></button>
                                            </form>
                                        @else
                                            <form method="GET"
                                                action="{{ route('candidates.job.visibility.change', $row->id) }}">
                                                <input type="hidden" value="0" name="status" />
                                                <button class="btn_viewall fw-500 px-4 py-2"><i
                                                        class="material-icons">visibility</i></button>
                                            </form>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <a href="" class="btn btn-primary btn-sm mt-2"><i
                                            class="fa fa-info" style="font-size:18px"></i></a>
                                        <a href="" class="btn btn-danger btn-sm mt-2"><i
                                            class="fa fa-trash" style="font-size:18px"></i></a>
                                    </td> --}}
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">No data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
