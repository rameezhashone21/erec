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
            <div class="table-header-panel">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="title-2">All Subscription Packages</h3>
                    </div>
                    <div>
                        <a class="btn btn-primary btn_panel" href="{{ route('subscription') }}"> View Package
                        </a>
                        <a class="btn btn-primary btn_panel" href="{{ route('admin.packages.add') }}"> Add New Package
                        </a>
                        {{-- <a class="btn btn-primary btn_panel" href="{{ route('subscription') }}"> View Package
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="px-4 pb-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Number of Posts Allowed</th>
                            <th>Price</th>
                            <th>Color</th>
                            <th>Interval</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if (count($pkg) > 0)
                            @foreach ($pkg as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->no_of_posts }}</td>
                                    <td>{{ $row->price }}</td>
                                    <td>{{ $row->class }}</td>
                                    <td>{{ $row->time_interval }}</td>
                                    <td>
                                        @if ($row->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.packages.edit', $row->slug) }}" class="btn btn_viewall">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                        {{-- <a href="{{ route('admin.packages.destroy', $row->id) }}"
                                            onclick="return confirm('Are you sure you want to delete?');"
                                            class="btn btn_viewall delete"><i class="fa fa-trash"
                                                style="font-size:18px"></i></a> --}}
                                        <a href="" data-toggle="modal" data-target="#deleteModal-job-{{ $row->id }}"
                                            class="btn btn_viewall delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <div class="modal fade" id="deleteModal-job-{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <a href="{{ route('admin.packages.destroy', $row->id) }}" class="btn btn_viewall delete"
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
                                <td colspan="6" allign="center">No data available</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center pt-5">
                {{ $pkg->links() }}
            </div> --}}
            </div>
        </div>
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
