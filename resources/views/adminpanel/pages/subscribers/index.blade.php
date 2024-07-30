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
                    <h3 class="title-2">Subscribers</h3>
                    {{-- <div>
                        <a class="btn btn-primary btn_panel" href="{{ route('admin.addCategory') }}"> Add New Category
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="px-4 pb-4">
                <table id="dashboardTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr. #</th>
                            <th>Name</th>
                            <th class="text-center">Status</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($apps) > 0)
                            @foreach ($apps as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}. </td>
                                    <td>{{ $row->email }}</td>
                                    {{-- <td>
                                        @if ($row->status == 0)
                                            <p class="" style="">InActive</p>
                                        @else
                                            <p class="" style="">Active</p>
                                        @endif
                                    </td> --}}
                                    <td class="text-center">
                                        <input type="hidden" name="subId" id="subId{{ $row->id }}"
                                            value="{{ $row->status }}">
                                        {{-- <input class="form-check-input" type="checkbox"
                                            @if ($row->status == 1) checked @endif value="{{ $row->status }}"
                                            onchange="status({{ $row->status }})" id="flexSwitchCheckChecked"> --}}
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" onchange="status({{ $row->id }})"
                                                type="checkbox" id="flexSwitchCheckDefault{{ $row->id }}"
                                                @if ($row->status == 1) checked @endif>
                                            <label class="form-check-label" id="active-{{ $row->id }}"
                                                for="flexSwitchCheckDefault{{ $row->id }}">
                                                @if ($row->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </label>
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
                {{ $apps->links() }}
            </div> --}}
            </div>
        </div>
        {{-- </section> --}}

    @endsection

    @section('bottom_script')
        <script>
            function status(value) {
                var id = $('#subId' + value).val();
                var url = '{{ route("admin.subscribers.status", ['', '']) }}';
                // var url = 0;
                if (id == 1) {
                    url = url + '/' + 0 + '/' + value;
                } else if (id == 0) {
                    url = url + '/' + 1 + '/' + value;
                }
                // console.log(id);
                // console.log(url);
                $.ajax({
                    type: 'GET',
                    url: url,
                }).done(function(data) {
                    // console.log(url);
                    // var id = $('#change-' + value).html('ok');
                    if (data == 0) {
                        var id = $('#subId' + value).val(data);
                        var id = $('#active-' + value).html('');
                        var id = $('#active-' + value).html('Inactive');
                    } else if (data == 1) {
                        var id = $('#subId' + value).val(data);
                        var id = $('#active-' + value).html('');
                        var id = $('#active-' + value).html('Active');
                    }
                });
            }
        </script>
    @endsection
