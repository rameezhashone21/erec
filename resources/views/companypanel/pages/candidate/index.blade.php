@extends('companypanel.layout.app')

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
            <h2 class="fw-500 text_primary fs-5 mb-4">My Candidates</h2>
            <div class="row row-cols-xl-3 row-cols-md-2 row-cols-1 gy-lg-5 gy-4 gx-2" id="msg-btn">
                @if (count($can) > 0)
                    @foreach ($can as $key => $row)
                        <div class="col">
                            <div class="new_candidate_box">
                                @if ($row->candidate->user->avatar != null)
                                    <img src="{{ asset('public/storage/' . $row->candidate->user->avatar) }}"
                                        alt="profile-img" class="profile img-fluid">
                                    {{-- <img src="{{ asset('images/profile-img.png') }}" alt="profile-img" class="profile img-fluid"> --}}
                                @else
                                    <img src="{{ asset('images/profile-img.png') }}" alt="profile-img"
                                        class="profile img-fluid">
                                @endif
                                <div class="content">
                                    <div class="user__info">
                                        <h3 class="title">
                                            {{ $row->candidate->first_name . ' ' . $row->candidate->last_name }}
                                        </h3>
                                        @if ($row->candidate->head_line != null)
                                            <p class="designation">
                                                {!! \Illuminate\Support\Str::limit($row->candidate->head_line, 25, $end = '...') !!}
                                            </p>
                                        @else
                                            <p class="designation"></p>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="{{ route('candidate.detail', $row->candidate->slug) }}"
                                                class="d-flex aling-items-center button">
                                                <span>
                                                    View Profile
                                                </span>
                                                <span>
                                                    <svg id="arrow-left" xmlns="http://www.w3.org/2000/svg" width="16.997"
                                                        height="9.916" viewBox="0 0 16.997 9.916">
                                                        <path id="Path_3242" data-name="Path 3242"
                                                            d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                            transform="translate(6.831 -10.123)" fill="#007ba7"
                                                            fill-rule="evenodd"></path>
                                                        <path id="Path_3243" data-name="Path 3243"
                                                            d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                            transform="translate(-5.625 -12.625)" fill="#007ba7"
                                                            fill-rule="evenodd"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div>
                                            <open-box :openBoxFunction="openBox"
                                                :id="{{ $row->candidate->user->id }}"></open-box>
                                        </div>
                                        {{-- <a href="#" class="d-flex aling-items-center button">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="14.95" height="14.95" viewBox="0 0 14.95 14.95">
                          <path id="Icon_feather-message-square" data-name="Icon feather-message-square"
                            d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                            transform="translate(-3.9 -3.9)" fill="none" stroke="#007ba7" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.2">
                          </path>
                        </svg>
                      </span>
                      <span>
                        Message
                      </span>
                    </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        No data available
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- <section> --}}
    {{-- <div class="container">
        <div class="card" style="width: 100% !important;">
            <div class="table table-border table-responsive">
                <table style="width: 100%;">
                    <tr>
                        <th>Sr. #</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Language</th>
                        <th>Avatar</th>
                        <th>Action</th>
                    </tr>
                    @if (count($can) > 0)
                        @foreach ($can as $key => $row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->candidate->first_name.' '.$row->candidate->last_name }}</td>
                                <td>{{ $row->candidate->email }}</td>
                                <td>{{ $row->candidate->mobile }}</td>
                                <td>{{ $row->candidate->languages }}</td>
                                <td>
                                    @if ($row->candidate->user->avatar != null)
                                        <img src="{{ asset('public/storage/' . $row->candidate->user->avatar) }}" alt="plus-circle" width="70px"
                                            style="border-radius: 100px" height="70px">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('candidate.detail', $row->candidate->slug) }}"
                                        class="btn btn-primary btn-sm mt-2"><i class="fa fa-info"
                                            style="font-size:18px"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" allign="center">No data available</td>
                        </tr>
                    @endif
                </table>
            </div>
        </div>
    </div> --}}
    {{-- </section> --}}

@endsection

@section('bottom_script')
@endsection

{{-- OLD --}}
{{-- @extends('companypanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')

           <div class="container">
                <div class="card" style="width: 100% !important;">
                    <div class="table table-border table-responsive">
                        <table style="width: 100%;">
                            <tr>
                                <th>Sr. #</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Language</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                            @if (count($can) > 0)
                            @foreach ($can as $key => $row)
                            <tr>
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->first_name }}{{ $row->last_name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->mobile }}</td>
                                <td>{{ $row->languages }}</td>
                                <td>
                                    @if ($row->user->avatar != null)
                                    <img src="{{ asset('public/storage/'. $row->user->avatar) }}" alt="plus-circle" width="70px" style="border-radius: 100px" height="70px">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm mt-2"><i
                                        class="fa fa-info" style="font-size:18px"></i></a>
                                    <a href="" class="btn btn-danger btn-sm mt-2"><i
                                        class="fa fa-trash" style="font-size:18px"></i></a>
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

    @endsection

@section('bottom_script')
@endsection --}}
