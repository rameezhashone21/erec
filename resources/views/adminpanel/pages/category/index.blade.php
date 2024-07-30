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
                    <h3 class="title-2">Company Categories</h3>
                    <div>
                        <a class="btn btn-primary btn_panel" href="{{ route('admin.addCategory') }}"> Add New Category
                        </a>
                    </div>
                </div>
            </div>
            <div class="px-4 pb-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            {{-- <th>Icon</th> --}}
                            <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                        @if (count($cat) > 0)
                            @foreach ($cat as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->name }}</td>
                                    {{-- <td>
                                        @if ($row->img)
                                            <img src="{{ asset('public/storage/' . $row->img) }}" alt-text="No Image"
                                                width="70px" style="border-radius: 100px" height="70px">
                                        @else
                                            No Icon
                                        @endif
                                    </td> --}}
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 0 6px;">
                                            <a href="{{ route('admin.editCategory', $row->id) }}" class="btn btn_viewall">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            {{-- <a href="{{ route('admin.destroyCategory', $row->id) }}"
                                                onclick="return confirm('Are you sure you want to delete?');"
                                                class="btn btn_viewall delete">
                                                <i class="fa fa-trash"></i>
                                            </a> --}}
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
                                                            <a href="{{ route('admin.destroyCategory', $row->id) }}" class="btn btn_viewall delete"
                                                                style=" padding: 8px 30px !important; font-size: 16px;">
                                                                Yes
                                                            </a>
                                                            <button type="button" class="btn btn_viewall"
                                                                data-dismiss="modal"
                                                                style="padding: 8px 30px !important; font-size: 16px;">
                                                                No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" allign="center">No data available</td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                {{-- <div class="d-flex justify-content-center pt-5">
                {{ $cat->links() }}
            </div> --}}
            </div>
        </div>
        {{-- </section> --}}

    @endsection

    @section('bottom_script')
    @endsection
