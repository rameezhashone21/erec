@extends('adminpanel.layout.app') @section('page_title', 'E-Rec') @section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

@endsection
@section('content')
{{-- <div class="col-xl-3 col-md-6 mb-5">
    <a href="{{ route('admin.candidateIndex') }}" class="box-dashboard">
        <div class="card dashboard-card bg-one">
            <div class="card-body d-flex align-items-center">
                <div class="second">
                    <h5 class="card-title">{{ count($can) }}</h5>
                    <p class="card-text">Candidate</p>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-md-6  mb-5">
    <a href="{{ route('admin.companyIndex') }}" class="box-dashboard">
        <div class="card dashboard-card bg-two">
            <div class="card-body d-flex align-items-center">
                <div class="second">
                    <h5 class="card-title">{{ count($com) }}</h5>
                    <p class="card-text">Company</p>
                </div>
            </div>
        </div>
    </a>
</div>
<div class="col-xl-3 col-md-6  mb-5">
    <a href="{{ route('admin.recruiterIndex') }}" class="box-dashboard">
        <div class="card dashboard-card bg-three">
            <div class="card-body d-flex align-items-center">
                <div class="second">
                    <h5 class="card-title">{{ count($rec) }}</h5>
                    <p class="card-text">Recruiter</p>
                </div>
            </div>
        </div>
    </a>
</div> --}}
<div class="col-12">
    <div class="row">
        <div class="col-xl-3 col-lg-6 mb-5">
            @php
                $userCount = count($user);
                $canCount = count($UserCan);
                $empCount = count($UserCom);
                $recCount = count($UserRec);
                $EmpPercentage = round(($empCount * 100) / $userCount);
                $RecPercentage = round(($recCount * 100) / $userCount);
                $CanPercentage = round(($canCount * 100) / $userCount);

                $CanCurrentCount = count($CanUserCurrent);
                $EmpCurrentCount = count($EmpUserCurrent);
                $RecCurrentCount = count($RecUserCurrent);

                $EmpCurrentPercentage = round(($EmpCurrentCount * 100) / $userCount);
                $RecCurrentPercentage = round(($RecCurrentCount * 100) / $userCount);
                $CanCurrentPercentage = round(($CanCurrentCount * 100) / $userCount);

                $ActivePercentage = round(($ActivejobCount * 100) / $AlljobCount);
                $CuurentActivePercentage = round(($CurrentActivejobCount * 100) / $AlljobCount);

            @endphp
            <div class="new__boxes shadow rounded p-3">
                <h3 class="title__new">Total No. of Employers</h3>
                <h4 class="title__new2">{{ $empCount }}</h4>
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <div class="box-wrapper-2 text-center p-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.169" height="22.167"
                                    viewBox="0 0 22.169 22.167">
                                    <path id="arrow"
                                        d="M928.084,523.166a11.083,11.083,0,1,1,11.084-11.083v.31A11.084,11.084,0,0,1,928.084,523.166Zm0-12.169h0l3.259,3.268a.827.827,0,0,0,1.169.017l.006-.006a.832.832,0,0,0,.249-.6.808.808,0,0,0-.249-.576l-3.846-3.868a.828.828,0,0,0-1.171,0l0,0-3.846,3.868a.776.776,0,0,0-.244.576.827.827,0,0,0,.244.6.838.838,0,0,0,.586.239.811.811,0,0,0,.588-.25L928.084,511Z"
                                        transform="translate(-917 -501)" fill="#3c7ba7" />
                                </svg>
                            </span>
                            <span>+ {{ $EmpCurrentPercentage }} %</span>
                        </div>
                    </div>
                    <div>
                        <div class="box-wrapper">
                            <div class="box-circle">
                                <div class="circle-border" data-color1="#ECEDEF" data-color2="#38B5E6">
                                    <div class="circle-percentage">
                                        <span class="percentage" data-percentage="{{ $EmpPercentage }}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-5">
            <div class="new__boxes shadow rounded p-3">
                <h3 class="title__new">Total No. of Recruiters</h3>
                <h4 class="title__new2">{{ $recCount }}</h4>
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <div class="box-wrapper-2 text-center p-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.169" height="22.167"
                                    viewBox="0 0 22.169 22.167">
                                    <path id="arrow"
                                        d="M928.084,523.166a11.083,11.083,0,1,1,11.084-11.083v.31A11.084,11.084,0,0,1,928.084,523.166Zm0-12.169h0l3.259,3.268a.827.827,0,0,0,1.169.017l.006-.006a.832.832,0,0,0,.249-.6.808.808,0,0,0-.249-.576l-3.846-3.868a.828.828,0,0,0-1.171,0l0,0-3.846,3.868a.776.776,0,0,0-.244.576.827.827,0,0,0,.244.6.838.838,0,0,0,.586.239.811.811,0,0,0,.588-.25L928.084,511Z"
                                        transform="translate(-917 -501)" fill="#3c7ba7" />
                                </svg>
                            </span>
                            <span>+ {{ $RecCurrentPercentage }} %</span>
                        </div>
                    </div>
                    <div>
                        <div class="box-wrapper">
                            <div class="box-circle">
                                <div class="circle-border" data-color1="#ECEDEF" data-color2="#38B5E6">
                                    <div class="circle-percentage">
                                        <span class="percentage" data-percentage="{{ $RecPercentage }}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-5">
            <div class="new__boxes shadow rounded p-3">
                <h3 class="title__new">Total No. of Candniates</h3>
                <h4 class="title__new2">{{ $canCount }}</h4>
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <div class="box-wrapper-2 text-center p-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.169" height="22.167"
                                    viewBox="0 0 22.169 22.167">
                                    <path id="arrow"
                                        d="M928.084,523.166a11.083,11.083,0,1,1,11.084-11.083v.31A11.084,11.084,0,0,1,928.084,523.166Zm0-12.169h0l3.259,3.268a.827.827,0,0,0,1.169.017l.006-.006a.832.832,0,0,0,.249-.6.808.808,0,0,0-.249-.576l-3.846-3.868a.828.828,0,0,0-1.171,0l0,0-3.846,3.868a.776.776,0,0,0-.244.576.827.827,0,0,0,.244.6.838.838,0,0,0,.586.239.811.811,0,0,0,.588-.25L928.084,511Z"
                                        transform="translate(-917 -501)" fill="#3c7ba7" />
                                </svg>
                            </span>
                            <span>+ {{ $CanCurrentPercentage }} %</span>
                        </div>
                    </div>
                    <div>
                        <div class="box-wrapper">
                            <div class="box-circle">
                                <div class="circle-border" data-color1="#ECEDEF" data-color2="#38B5E6">
                                    <div class="circle-percentage">
                                        <span class="percentage" data-percentage="{{ $CanPercentage }}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-5">
            <div class="new__boxes shadow rounded p-3">
                <h3 class="title__new">No of posted jobs</h3>
                <h4 class="title__new2">{{ $AlljobCount }}</h4>
                <div class="d-flex align-items-end justify-content-between">
                    <div>
                        <div class="box-wrapper-2 text-center p-3">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.169" height="22.167"
                                    viewBox="0 0 22.169 22.167">
                                    <path id="arrow"
                                        d="M928.084,523.166a11.083,11.083,0,1,1,11.084-11.083v.31A11.084,11.084,0,0,1,928.084,523.166Zm0-12.169h0l3.259,3.268a.827.827,0,0,0,1.169.017l.006-.006a.832.832,0,0,0,.249-.6.808.808,0,0,0-.249-.576l-3.846-3.868a.828.828,0,0,0-1.171,0l0,0-3.846,3.868a.776.776,0,0,0-.244.576.827.827,0,0,0,.244.6.838.838,0,0,0,.586.239.811.811,0,0,0,.588-.25L928.084,511Z"
                                        transform="translate(-917 -501)" fill="#3c7ba7" />
                                </svg>
                            </span>
                            <span>+ {{ $CuurentActivePercentage }} %</span>
                        </div>
                    </div>
                    <div>
                        <div class="box-wrapper">
                            <div class="box-circle">
                                <div class="circle-border" data-color1="#ECEDEF" data-color2="#38B5E6">
                                    <div class="circle-percentage">
                                        <span class="percentage" data-percentage="{{ $ActivePercentage }}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-lg-3">
            <div class="new__boxes shadow rounded p-3">
                <div class="chart-container">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="title__new2">Revenue</h2>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-2 p-0">
                                    M
                                </div>
                                <div class="col-8  p-0">
                                    <div class="form-check form-switch ">
                                        <input class="form-check-input m-0" type="checkbox" value=""
                                            onchange="subscription()" id="interval-check">
                                    </div>
                                </div>
                                <div class="col-2  p-0">
                                    Y
                                </div>
                            </div>

                        </div>
                    </div>
                    <div>
                        <canvas id="doughnut-chart" width="1000" height="1300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="new__boxes shadow rounded p-3">
                <div class="chart-container">
                    <h2 class="title__new2">Working Status</h2>
                    <div>
                        <canvas id="bar-chart" width="1000" height="1300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="new__boxes shadow rounded p-3">
                <h2 class="title__new2 mb-3">Recent Jobs</h2>
                <div class="table-responsive">
                    <table class="table recent-users-table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <div>
                                        Job Title
                                    </div>
                                </th>
                                <th>
                                    Posted On
                                </th>
                                <th style="width: 120px;text-align: center;"> <a href="{{ route('admin.job') }}">View
                                        All</a> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($job) > 0)
                                @foreach ($job as $key => $row)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td>
                                            <a href="#" style="color: #7a86a1;">
                                                <p style="font-size: 14px;">{{ $row->post }}</p>
                                                <p style="font-size: 10px;">Casual, Exp {{ $row->experience }}</p>
                                            </a>
                                        </td>
                                        <td style="color: #7a86a1;">
                                            {{ $row->created_at->format('d/m/y') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.jobDetails', $row->slug) }}"
                                                class="view-recent-user-button">
                                                View Detail >
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="new__boxes shadow rounded p-3">
                <div class="chart-container">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h2 class="title__new2">Statistics</h2>
                        </div>
                        <div>
                            <div class="buttons">
                                <button class="button__table statistics active" value="last-month"
                                    onclick="statistics(this)">Last Month</button>
                                <button class="button__table statistics" value="last-30-days"
                                    onclick="statistics(this)">Last 30 Days</button>
                                <button class="button__table statistics" value="last-year"
                                    onclick="statistics(this)">Last Year</button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <canvas id="line-chart" width="300" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-lg-3">
            <div class="new__boxes shadow rounded p-3">
                <h2 class="title__new2 mb-3" style="font-size: 18px;">Recent Employers</h2>
                <div class="table-responsive">
                    <table class="table recent-users-table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <div>
                                        Employer List
                                    </div>
                                </th>
                                <th style="width: 80px;"> <a href="{{ route('admin.companyIndex') }}">View All</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($UserComFive) > 0)
                                @foreach ($UserComFive as $key => $row)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td colspan="2">
                                            <a href="{{ route('admin.companyDetails', $row->company->slug) }}"
                                                class="d-flex align-items-center" style="color: #7a86a1; gap: 12px;">
                                                @if ($row->company->logo != null)
                                                    <img class="profile_thumb rounded-50"
                                                        src="{{ asset('public/storage/' . $row->company->logo) }}"
                                                        alt="">
                                                @else
                                                    <img src="https://e-rec.com.au/imgs/bg-gradient-candidate.png"
                                                        alt="image" class="profile_thumb rounded-50">
                                                @endif
                                                <p>{{ $row->name }} {{ $row->lname }}</p>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="new__boxes shadow rounded p-3">
                <h2 class="title__new2 mb-3" style="font-size: 18px;">Recent Recruiters</h2>
                <div class="table-responsive">
                    <table class="table recent-users-table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <div>
                                        Recruiters list
                                    </div>
                                </th>
                                <th style="width: 80px;"> <a href="{{ route('admin.recruiterIndex') }}">View All</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($UserRecFive) > 0)
                                @foreach ($UserRecFive as $key => $row)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td colspan="2">
                                            <a href="{{ route('admin.recruiterDetails', $row->recruiter->slug) }}"
                                                class="d-flex align-items-center" style="color: #7a86a1; gap: 12px;">
                                                @if ($row->recruiter->avatar != null)
                                                    <img class="profile_thumb rounded-50"
                                                        src="{{ asset('public/storage/' . $row->recruiter->avatar) }}"
                                                        alt="">
                                                @else
                                                    <img src="https://e-rec.com.au/imgs/bg-gradient-candidate.png"
                                                        alt="image" class="profile_thumb rounded-50">
                                                @endif
                                                <p>{{ $row->name }} {{ $row->lname }}</p>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="new__boxes shadow rounded p-3">
                <h2 class="title__new2 mb-3" style="font-size: 18px;">Recent Candidate</h2>
                <div class="table-responsive">
                    <table class="table recent-users-table" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>
                                    <div>
                                        Candidate List
                                    </div>
                                </th>
                                <th style="width: 120px;text-align: center;"> <a
                                        href="{{ route('admin.candidateIndex') }}">View All</a> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($UserCanFive) > 0)
                                @foreach ($UserCanFive as $key => $row)
                                    <tr>
                                        <th>{{ ++$key }}</th>
                                        <td colspan="2">
                                            <a href="{{ route('admin.candidateDetails', $row->candidate->slug) }}"
                                                class="d-flex align-items-center" style="color: #7a86a1; gap: 12px;">
                                                @if ($row->avatar != null)
                                                    <img class="profile_thumb rounded-50"
                                                        src="{{ asset('public/storage/' . $row->avatar) }}"
                                                        alt="">
                                                @else
                                                    <img src="https://e-rec.com.au/imgs/bg-gradient-candidate.png"
                                                        alt="image" class="profile_thumb rounded-50">
                                                @endif
                                                <p>{{ $row->name }} {{ $row->lname }}</p>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="new__boxes shadow rounded p-4">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="title__new2">
                            Recent Payments
                        </h2>
                        {{-- <p class="title__new">Update Your index information in Setting</p> --}}
                    </div>
                    <div>
                        {{-- <div class="d-flex">
                            <button class="button__table active">Subscribers</button>
                            <button class="button__table">Subscriptions</button>
                        </div> --}}
                        <div class="text-right mt-4">
                            <select class="border-0" style="color: #7a86a1">
                                <option selected disabled>Filter</option>
                                <option value="option1">option1</option>
                                <option value="option1">option2</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="new__table__wrapper">
                    <table id="statementTable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Date</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Tax</th>
                                <th>Payment Methods</th>
                                <th>User</th>
                                <th>Status</th>
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payment as $row)
                                <tr>
                                    <td></td>
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y') }}</td>
                                    <td>{{ $row->package->name }}</td>
                                    @php
                                        $site = App\Models\SiteSetting::first();
                                        $tax = (int)$site->tax_rate;
                                        $price = (int) $row->package->price;
                                        $tax_price = ((int) $price * $tax) / 100;
                                        $total_price = $price + $tax_price;
                                    @endphp
                                    <td>${{ (int)$total_price }}</td>
                                    <td>${{ $tax }}.00</td>
                                    <td>Stripe</td>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <button class="paid_tag">Paid</button>
                                    </td>
                                    {{-- <td>
                                        <a href="#" class="view__button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14"
                                                viewBox="0 0 20 14">
                                                <path id="Icon_awesome-eye" data-name="Icon awesome-eye"
                                                    d="M19.879,10.968A11.1,11.1,0,0,0,10,4.5,11.1,11.1,0,0,0,.121,10.968a1.232,1.232,0,0,0,0,1.064A11.1,11.1,0,0,0,10,18.5a11.1,11.1,0,0,0,9.879-6.468A1.232,1.232,0,0,0,19.879,10.968ZM10,16.75A5.13,5.13,0,0,1,5,11.5a5.13,5.13,0,0,1,5-5.25,5.13,5.13,0,0,1,5,5.25A5.127,5.127,0,0,1,10,16.75ZM10,8a3.164,3.164,0,0,0-.879.138,1.81,1.81,0,0,1-.163,2.268,1.6,1.6,0,0,1-2.16.172,3.58,3.58,0,0,0,1.357,3.815,3.2,3.2,0,0,0,3.876-.129,3.6,3.6,0,0,0,1.125-3.9A3.342,3.342,0,0,0,10,8Z"
                                                    transform="translate(0 -4.5)" fill="#3c7ba7" />
                                            </svg>
                                        </a>
                                    </td> --}}
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td></td>
                                <td>13 Apr 2021 </td>
                                <td>#345623</td>
                                <td>$367.00</td>
                                <td>$36.00</td>
                                <td>...1678</td>
                                <td>
                                    <button class="paid_tag">Paid</button>
                                </td>
                                <td>
                                    <a href="#" class="view__button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14"
                                            viewBox="0 0 20 14">
                                            <path id="Icon_awesome-eye" data-name="Icon awesome-eye"
                                                d="M19.879,10.968A11.1,11.1,0,0,0,10,4.5,11.1,11.1,0,0,0,.121,10.968a1.232,1.232,0,0,0,0,1.064A11.1,11.1,0,0,0,10,18.5a11.1,11.1,0,0,0,9.879-6.468A1.232,1.232,0,0,0,19.879,10.968ZM10,16.75A5.13,5.13,0,0,1,5,11.5a5.13,5.13,0,0,1,5-5.25,5.13,5.13,0,0,1,5,5.25A5.127,5.127,0,0,1,10,16.75ZM10,8a3.164,3.164,0,0,0-.879.138,1.81,1.81,0,0,1-.163,2.268,1.6,1.6,0,0,1-2.16.172,3.58,3.58,0,0,0,1.357,3.815,3.2,3.2,0,0,0,3.876-.129,3.6,3.6,0,0,0,1.125-3.9A3.342,3.342,0,0,0,10,8Z"
                                                transform="translate(0 -4.5)" fill="#3c7ba7" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>13 Apr 2021 </td>
                                <td>#345623</td>
                                <td>$367.00</td>
                                <td>$36.00</td>
                                <td>...1678</td>
                                <td>
                                    <button class="pending_tag">Pending</button>
                                </td>
                                <td>
                                    <a href="#" class="view__button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="14"
                                            viewBox="0 0 20 14">
                                            <path id="Icon_awesome-eye" data-name="Icon awesome-eye"
                                                d="M19.879,10.968A11.1,11.1,0,0,0,10,4.5,11.1,11.1,0,0,0,.121,10.968a1.232,1.232,0,0,0,0,1.064A11.1,11.1,0,0,0,10,18.5a11.1,11.1,0,0,0,9.879-6.468A1.232,1.232,0,0,0,19.879,10.968ZM10,16.75A5.13,5.13,0,0,1,5,11.5a5.13,5.13,0,0,1,5-5.25,5.13,5.13,0,0,1,5,5.25A5.127,5.127,0,0,1,10,16.75ZM10,8a3.164,3.164,0,0,0-.879.138,1.81,1.81,0,0,1-.163,2.268,1.6,1.6,0,0,1-2.16.172,3.58,3.58,0,0,0,1.357,3.815,3.2,3.2,0,0,0,3.876-.129,3.6,3.6,0,0,0,1.125-3.9A3.342,3.342,0,0,0,10,8Z"
                                                transform="translate(0 -4.5)" fill="#3c7ba7" />
                                        </svg>
                                    </a>
                                </td>
                            </tr> --}}

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="new__boxes shadow rounded p-4">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <div>
                        <h2 class="title__new2">
                            All Users
                        </h2>
                        {{-- <p class="title__new">Update Your index information in Setting</p> --}}
                    </div>
                    <div>
                        {{-- <div class="d-flex">
                            <button class="button__table active">Subscribers</button>
                            <button class="button__table">Subscriptions</button>
                        </div> --}}
                        <div class="text-right mt-4">
                            <a href="{{ route('admin.users') }}">View All</a>
                            {{-- <select class="border-0" style="color: #7a86a1">
                                <option selected disabled>Filter</option>
                                <option value="option1">option1</option>
                                <option value="option1">option2</option>
                            </select> --}}

                        </div>
                    </div>
                </div>
                <div class="new__table__wrapper">
                    <table id="dashboardTable2" class="table " style="width:100%">
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
                                                <span class="badge bg-danger">{{ __('Deactive') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex" style="gap: 0 6px">
                                                <label for="" class="me-auto text_grey_999 fs-14">
                                                    @if ($row->status == 1)
                                                        Active
                                                    @else
                                                        InActive
                                                    @endif
                                                </label>
                                                <div class="form-check form-switch ">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        onchange="changeStatus({{ $row->id }})"
                                                        id="flexSwitchCheckChecked-{{ $row->id }}"
                                                        @if ($row->status == 1) checked @endif>
                                                </div>
                                                <a href="{{ route('admin.editUser', $row->id) }}"
                                                    class="btn btn_viewall">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="" data-toggle="modal"
                                                    data-target="#deleteModal-{{ $row->id }}"
                                                    class="btn btn_viewall delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <div class="modal fade" id="statuseModal-{{ $row->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center pb-0">
                                                            Are you sure you want to change the User Status?
                                                        </div>
                                                        <div class="modal-footer border-0 justify-content-center">
                                                            <form method="post"
                                                                action="{{ route('admin.approveUser') }}"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="user_id"
                                                                    value="{{ $row->id }}" />
                                                                @if ($row->status == 1)
                                                                    <input type="hidden" name="status"
                                                                        value="0" />
                                                                @else
                                                                    <input type="hidden" name="status"
                                                                        value="1" />
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
                                            <div class="modal fade" id="deleteModal-{{ $row->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body text-center pb-0">
                                                            Are you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer border-0 justify-content-center">
                                                            <a href="{{ route('deleteUser.user', $row->id) }}"
                                                                class="btn btn_viewall delete"
                                                                style="
                                                            padding: 8px 30px !important;
                                                            font-size: 16px;
                                                        ">Yes</a>
                                                            <button type="button" class="btn btn_viewall"
                                                                data-dismiss="modal"
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
            </div>
        </div>
    </div>
</div>


{{-- <div class="mb-5 col-md-12 ">
    <div class="table-responsive shadow">
        <div class="table-header-panel">
            <div class="d-flex mb-4">
                <div class="first">
                    <h2 class="text-uppercase title-2">recent jobs</h2>
                </div>
                <div class="align-self-center text-right second mt-0">
                    <a class="btn btn-primary btn_panel" href="{{ route('admin.job') }}"> View All</a>
                </div>
            </div>
            <table id="dashboardTable" class="table table-striped table-bordered" style="width:100%">
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
                                <td>{{ ++$key }}. </td>
                                <td>{{ $row->post }}</td>
                                <td>{{ $row->job_type }}</td>
                                <td>{{ $row->experience }}</td>
                                <td>{{ $row->location }}</td>
                                <td>{{ $row->created_at->format('D/M/Y') }}</td>
                                <td>
                                    @if ($row->status == 1)
                                        Active
                                    @elseif($row->status == 0)
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.jobDetails', $row->slug) }}" class="btn btn_viewall">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <div class="text-center">
                            No data available
                        </div>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div> --}}

@endsection

@section('bottom_script')


{{-- start circle chart --}}
<script>
    $(".box-circle").each(function() {
        let i = 0,
            that = $(this),
            circleBorder = that.find(".circle-border"),
            borderColor = circleBorder.data("color1"),
            animationColor = circleBorder.data("color2"),
            percentageText = that.find(".percentage"),
            percentage = percentageText.data("percentage"),
            degrees = percentage * 3.6;

        circleBorder.css({
            "background-color": animationColor
        });

        setTimeout(function() {
            loopIt();
        }, 1);

        function loopIt() {
            i = i + 1

            if (i < 0) {
                i = 0;
            }

            if (i > degrees) {
                i = degrees;
            }

            percentage = i / 3.6;
            percentageText.text(percentage.toFixed(1) + " %");

            if (i <= 180) {
                circleBorder.css('background-image', 'linear-gradient(' + (90 + i) + 'deg, transparent 50%,' +
                    borderColor + ' 50%),linear-gradient(90deg, ' + borderColor + ' 50%, transparent 50%)');
            } else {
                circleBorder.css('background-image', 'linear-gradient(' + (i - 90) + 'deg, transparent 50%,' +
                    animationColor + ' 50%),linear-gradient(90deg, ' + borderColor +
                    ' 50%, transparent 50%)');
            }

            setTimeout(function() {
                loopIt();
            }, 1);
        }
    });
</script>


{{-- end circle chart --}}

{{-- start dounut chart --}}

<script>
    const myChartData = {
        type: 'doughnut',
        data: {
            labels: ["Marketing", "Bills", "Other", "Other2",
                // "INTERNATIONAL STOCK",
                //     "BROKERAGELINK"
            ],
            datasets: [{
                label: "Test",
                data: [47, 19, 71, 51,
                    // 22, 19
                ],
                backgroundColor: [
                    '#e0e3e9',
                    '#4dc1ba',
                    '#ffcb3b',
                    '#3c7ba7',
                    // 'rgba(97, 71, 103, 1)',
                    // 'rgba(95, 122, 118, 1)'
                ],
                borderColor: [
                    '#e0e3e9',
                    '#4dc1ba',
                    '#ffcb3b',
                    '#3c7ba7',
                    // 'rgba(97, 71, 103, 1)',
                    // 'rgba(95, 122, 118, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {

            title: {
                display: true,
                text: "Revenue",
            },
            animation: {
                animateScale: true,
                animateRotate: true
            },
            responsive: true,
            maintainAspectRatio: false,

            legend: {
                position: 'bottom',
                labels: {
                    boxWidth: 10,
                    padding: 12
                }
            },
        }
    };

    function createChart(chartId, chartData) {
        const ctx = document.getElementById(chartId);
        const myChart = new Chart(ctx, {
            type: chartData.type,
            data: chartData.data,
            options: chartData.options,
        });
    };

    $(document).ready(function() {
        createChart('myChart', myChartData);
    });
</script>


{{-- end dounut chart --}}


{{-- data table --}}
<script>
    // new DataTable('#example');

    // $('#statementTable').DataTable({
    //     select: true
    // });

    new DataTable('#statementTable', {
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }],
        select: {
            style: 'multi',
            selector: 'td:first-child'
        },
        order: [
            [1, 'asc']
        ]
    });
</script>
{{-- data table --}}
<script>
    function changeStatus(id) {
        $("#statuseModal-" + id).modal();
    }

    function cancleStatus(id) {
        $("#flexSwitchCheckChecked-" + id).click();
    }
</script>

<script>
    let labels = [];
    let run_labels = ['week1', 'week2', 'week3', 'week4'];
    let pkgUserCount = [];
    $(document).ready(function() {
        // AJAX request
        $.ajax({
            url: "{{ route('admin.dashboard') }}?api=1", // Replace with your actual API endpoint
            method: 'GET', // or 'POST' depending on your API
            dataType: 'json', // Change the dataType based on your response type
            success: function(response) {
                // Handle the successful response here
                labels = response['labels'];
                pkgUserCount = response['PkgUserCount'];
                runDoughut(labels, pkgUserCount);
                runLineChart(response['weeklyCounts'], response['appliedCount'], response[
                    'shortCandListCount'], response['hiredListCount']);
            },
            error: function(error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    });

    function subscription() {
        var interval = "";
        if ($("#interval-check").prop('checked') == true) {
            //do something
            interval = "yearly";
        } else {
            interval = "monthly";
        }
        $.ajax({
            url: "{{ route('admin.dashboard') }}?api=1&interval=" +
            interval, // Replace with your actual API endpoint
            method: 'GET', // or 'POST' depending on your API
            dataType: 'json', // Change the dataType based on your response type
            success: function(response) {
                // Handle the successful response here
                labels = response['labels'];
                pkgUserCount = response['PkgUserCount'];
                runDoughut(labels, pkgUserCount);
            },
            error: function(error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
    }

    function statistics(id) {
        $('.statistics').removeClass('active');
        $(id).addClass('active');
        var statistics = $(id).val();
        if (statistics == "last-year") {
            run_labels = ['jan', 'feb', 'march', 'april', 'may', 'june', 'july', 'aug', 'sep', 'oct', 'nov', 'dec'];
        } else {
            run_labels = ['week1', 'week2', 'week3', 'week4'];
        }
        $.ajax({
            url: "{{ route('admin.dashboard') }}?statistics=" +
                statistics, // Replace with your actual API endpoint
            method: 'GET', // or 'POST' depending on your API
            dataType: 'json', // Change the dataType based on your response type
            success: function(response) {
                // Handle the successful response here
                // labels = response['labels'];
                // pkgUserCount = response['PkgUserCount'];
                // runDoughut(labels, pkgUserCount);
                runLineChart(response['weeklyCounts'], response['appliedCount'], response[
                    'shortCandListCount'], response['hiredListCount']);
            },
            error: function(error) {
                // Handle errors here
                console.error('Error:', error);
            }
        });
        console.log();
    }
    // $("#last-30-days").click(function(){
    // });
    //Line Chart
    function runLineChart(nototalpost, appliedCount, shortCandListCount, hiredListCount) {
        new Chart(document.getElementById("line-chart"), {
            type: 'line',
            data: {
                labels: run_labels,
                datasets: [{
                    data: nototalpost,
                    label: "No of jobs posted",
                    borderColor: "#3C7BA7",
                    fill: true
                }, {
                    data: appliedCount,
                    label: "No of candidates applied",
                    borderColor: "#CFD3DD",
                    fill: true
                }, {
                    data: shortCandListCount,
                    label: "No of shortlist",
                    borderColor: "#F5BA3E",
                    fill: true
                }, {
                    data: hiredListCount,
                    label: "No off hire candidates",
                    borderColor: "#4DC1BA",
                    fill: false
                }, ]
            },
        });

    }
    //bar Chart

    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["", ""],
            datasets: [{
                label: "Open to work",
                borderColor: "#4DC1BA",
                data: [{{ $openCan }}],
                fill: '#4DC1BA'
            }, {
                label: "Not Open to work",
                borderColor: "#FFBB00",
                data: [{{ $NotOpenCan }}],
                fill: '#FFBB00'
            }, ]
        },

    });

    //Doughnut Chart
    function runDoughut(labels, pkgUserCount) {
        new Chart(document.getElementById("doughnut-chart"), {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    // label: "Population (millions)",
                    backgroundColor: ["#E0E3E9", "#4DC1BA", "#FFCB3B", "#3C7BA7"],
                    data: pkgUserCount
                }]
            },
        });

    }
</script>

@endsection
