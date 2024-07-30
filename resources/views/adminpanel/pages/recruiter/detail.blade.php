@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')

  <div class="dashboard_content bg-white rounded_10 p-4 card">
    <div>
      <a href="{{ route('admin.recruiterIndex') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
      @if ($rec->user->banner != null)
        <img src="{{ asset('public/storage/' . $rec->user->banner) }}" alt="" class="job-detail-banner">
      @else
        <img src="{{ asset('dashboard/images/Company.png') }}" alt="" class="job-detail-banner">
      @endif
    </div>
    <div class="admin-dashboards-detail">
      <div class="mb-4 pb-4 border-bottom ">
        <div class="d-flex mb-4">
          <div class="bg-white position-relative">
            @if ($rec->avatar != null)
              <img src="{{ asset('public/storage/' . $rec->avatar) }}" alt="" class="candidate__avatar">
            @else
              <img class="candidate__avatar" src="{{ asset('images/profile-img.png') }}" alt="">
            @endif
            <span class="panel_package_tag">
              @if (isset($rec->user->package))
                @if ($rec->user->package->name == 'Gold')
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Gold Member</span>
                @elseif ($rec->user->package->name == 'Bronze')
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Bronze Member</span>
                @elseif ($rec->user->package->name == 'Silver')
                  <img width="16px" height="16px" src="{{ asset('/dashboard/images/bronze-medal.png') }}"
                    alt="">
                  <span>Silver Member</span>
                @endif
              @endif
            </span>
          </div>
          <div class="bg-white p-3">
            <h1 class="fs-4 text-capitalize mb-2">{{ $rec->name }}</h1>
            <p class="fs-14 text_grey_999 mb-2">
              Tagline:
              @if ($rec->tagline != null)
                {!! $rec->tagline !!}
              @else
                N/A
              @endif
            </p>
            <p class="fs-14 text_grey_999 mb-2">
              Phone:
              @if ($rec->country_code != null)
                {{ $rec->country_code }} {{ $rec->phone }}
              @else
                N/A
              @endif
            </p>
            <p class="fs-14 text_grey_999 mb-2">
              Abn / Acn:
              @if ($rec->abn == null and $rec->acn == null)
                N/A / N/A
              @elseif ($rec->abn == null)
                N/A / {{ $rec->acn }}
              @elseif ($rec->acn == null)
                {{ $rec->abn }} / N/A
              @else
                {{ $rec->abn }} / {{ $rec->acn }}
              @endif
            </p>
            <p class="fs-14 text_grey_999 mb-2">
              Address:
              @if ($rec->address != null)
                {{ $rec->address }}
              @else
                N/A
              @endif
            </p>
            <h3 class='fw-500 fs-5 mb-1'>Features</h3>
            <ul class='tags'>
              @foreach ($rec->features as $row)
                <li class="d-inline-block">
                  <a href="javascript:void 0;">{{ $row->name }}</a>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
        <h3 class='fw-500 fs-5 my-3'>Description</h3>
        <p class="fs-14 text_grey_999">
          {!! $rec->description !!}
        </p>
        <h3 class='fw-500 fs-5 my-3'>Job Remaining </h3>
        <p class="fs-14 text_grey_999">
          {{ $rec->user->posts_count }}
        </p>
        <h3 class='fw-500 fs-5 my-3'>Package Subscribed </h3>
        <p class="fs-14 text_grey_999">
          {{ $rec->user->package->name }}
        </p>
      </div>
    </div>
    {{-- <div class="my-4">
            <ul class='row '>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Phone</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($rec->country_code != null)
                            {{ $rec->country_code }} {{ $rec->phone }}
                        @else
                            Null
                        @endif
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Abn / Acn</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($rec->abn == null and $rec->acn == null)
                            Null / Null
                        @elseif ($rec->abn == null)
                            Null / {{ $rec->acn }}
                        @elseif ($rec->acn == null)
                            {{ $rec->abn }} / Null
                        @else
                            {{ $rec->abn }} / {{ $rec->acn }}
                        @endif
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Address</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($rec->address != null)
                            {{ $rec->address }}
                        @else
                            Null
                        @endif
                    </p>
                </li>
                <li class='col-md-4 mb-4'>
                    <h3 class='fw-500 fs-5 mb-1'>Tagline</h3>
                    <p class="fs-14 text_grey_999">
                        @if ($rec->tagline != null)
                            {!! $rec->tagline !!}
                        @else
                            Null
                        @endif
                    </p>
                </li>
            </ul>
        </div>
        <h3 class='fw-500 fs-5 mb-1'>Features</h3>
        <ul class='tags'>
            @foreach ($rec->features as $row)
                <li class="d-inline-block">
                    <a href="javascript:void 0;">{{ $row->name }}</a>
                </li>
            @endforeach
        </ul> --}}
  </div>

@endsection

@section('bottom_script')
@endsection
