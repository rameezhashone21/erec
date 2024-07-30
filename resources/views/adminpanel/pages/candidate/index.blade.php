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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Create Date</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($can) > 0)
                            @foreach ($can as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                                    <td>{{ $row->email }}</td>
                                    @if ($row->number == null)
                                        <td> N/A</td>
                                    @else
                                        <td>{{ $row->country_code }} {{ $row->number }}</td>
                                    @endif
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                                    {{-- <td>{{ $row->languages }}</td> --}}
                                    <td class="text-center">
                                        @if ($row->user->avatar != null)
                                            <img src="{{ asset('public/storage/' . $row->user->avatar) }}"
                                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/profile-img.png') }}"
                                                style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex" style="gap: 0 6px">
                                            <label for="" class="me-auto text_grey_999 fs-14">
                                                @if ($row->user->status == 1)
                                                    Active
                                                @else
                                                    InActive
                                                @endif
                                            </label>
                                            <div class="form-check form-switch ">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    onchange="changeStatus({{ $row->id }})"
                                                    id="flexSwitchCheckChecked-{{ $row->id }}"
                                                    @if ($row->user->status == 1) checked @endif>
                                            </div>
                                            <a href="{{ route('admin.candidateDetails', $row->slug) }}"
                                                class="btn btn_viewall">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                            <a href="" data-toggle="modal"
                                                data-target="#deleteModal-{{ $row->id }}"
                                                class="btn btn_viewall delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="modal fade" id="statuseModal-{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to change the User Status?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <form method="post" action="{{ route('admin.approveUser') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $row->user->id }}" />
                                                            @if ($row->user->status == 1)
                                                                <input type="hidden" name="status" value="0" />
                                                            @else
                                                                <input type="hidden" name="status" value="1" />
                                                            @endif
                                                            <button type="submit" class="btn btn_viewall delete"
                                                                style="padding: 8px 30px !important;font-size: 16px;">Yes</button>
                                                        </form>
                                                        <button type="button" class="btn btn_viewall"
                                                            onclick="cancleStatus({{ $row->id }})"
                                                            data-dismiss="modal"
                                                            style=" padding: 8px 30px !important;font-size: 16px;">No</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="deleteModal-{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body text-center pb-0">
                                                        Are you sure you want to delete?
                                                    </div>
                                                    <div class="modal-footer border-0 justify-content-center">
                                                        <a href="{{ route('deleteUser.user', $row->user->id) }}"
                                                            class="btn btn_viewall delete"
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
                                        {{-- <a href="{{ route('admin.candidateDestroy', $row->id) }}"
                      onclick="return confirm('Are you sure you want to delete?');" class="btn btn_viewall delete">
                      <i class="fa fa-trash"></i></a> --}}
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
                {{ $can->links() }}
            </div> --}}
            </div>
        </div>
        <!-- </div> -->
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
    <script>
        function changeStatus(id) {
            $("#statuseModal-" + id).modal();
        }

        function cancleStatus(id) {
            $("#flexSwitchCheckChecked-" + id).click();
        }
    </script>
@endsection
