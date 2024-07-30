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
                <div class="d-flex">
                    <div class="first">
                        <h3 class=" title-2">All Users</h3>
                    </div>
                </div>
            </div>
            <div class="px-4 pb-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($user) > 0)
                            @foreach ($user as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        @if ($row->role == 'user')
                                            Candidate
                                        @elseif($row->role == 'company')
                                            Company
                                        @elseif($row->role == 'rec')
                                            Recruiter
                                        @endif
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td>
                                        @if ($row->status == 1)
                                            <span class="badge bg-success">{{ __('Active') }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ __('InActive') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 0 6px">
                                            <label for="" class="me-auto text_grey_999 fs-14">
                                                @if($row->status == 1)
                                                 Active
                                                 @else
                                                 InActive
                                                @endif
                                            </label>
                                            <div class="form-check form-switch ">
                                                <input class="form-check-input" type="checkbox"  value=""
                                                    onchange="changeStatus({{ $row->id }})" id="flexSwitchCheckChecked-{{ $row->id }}" @if($row->status ==1) checked @endif>
                                            </div>
                                            <a href="{{ route('admin.editUser', $row->id) }}" class="btn btn_viewall">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}"
                                                class="btn btn_viewall delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="modal fade" id="statuseModal-{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to change the User Status?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <form method="post" action="{{ route('admin.approveUser') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{ $row->id }}"/>
                                                            @if ($row->status == 1)
                                                                <input type="hidden" name="status" value="0" />
                                                            @else
                                                                <input type="hidden" name="status" value="1" />
                                                            @endif
                                                            <button type="submit" class="btn btn_viewall delete"
                                                                style="padding: 8px 30px !important;font-size: 16px;">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn_viewall" onclick="cancleStatus({{ $row->id }})" data-dismiss="modal"
                                                            style=" padding: 8px 30px !important;font-size: 16px;">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="deleteModal-{{ $row->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <a href="{{ route('deleteUser.user',$row->id) }}" class="btn btn_viewall delete"
                                                            style="
                                                        padding: 8px 30px !important;
                                                        font-size: 16px;
                                                    ">Yes</a>
                                                        <button type="button" class="btn btn_viewall" data-dismiss="modal"
                                                            style="
                                                            padding: 8px 30px !important;
                                                            font-size: 16px;
                                                        ">No</button>
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
            </div>
            {{-- <div class="d-flex justify-content-center pt-5">
            {{ $user->links() }}
        </div> --}}
        </div>
    </div>
    {{-- <div class="col-sm-2">
    <a class="btn btn-primary text-white" href="{{ route('admin.addCategory') }}"> All Users </a>
</div> --}}
    <div class="card" style="width: 100% !important;">
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
    <script>
        function changeStatus(id)
        {
            $("#statuseModal-"+id).modal();
        }
        function cancleStatus(id)
        {
            $("#flexSwitchCheckChecked-"+id).click();
        }
    </script>
@endsection
