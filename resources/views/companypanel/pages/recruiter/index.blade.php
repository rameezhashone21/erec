@extends('companypanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

    {{-- <section> --}}
    <div class="container">
        <div class="card">
            <div class="table table-border table-responsive">
                <table style="width: 100%;">
                    <tr>
                        <th>Sr. #</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                    @if (count($rec) > 0)
                        @foreach ($rec as $key => $row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->user->email }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    @if ($row->avatar != null)
                                        <img src="{{ asset('public/storage/' . $row->avatar) }}" alt="plus-circle" width="70px"
                                            style="border-radius: 100px" height="70px">
                                    @else
                                        No Image
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
                            <td colspan="6" align="center">No data available</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection
