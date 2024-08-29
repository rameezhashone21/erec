@extends('recruterpanel.layout.app') @section('page_title', 'E-Rec Notifications')

@section('content')
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex align-items-center justify-content-between my-3 border-bottom pb-3 mb-4">
                <h2 class="fw-500 text_primary fs-5 mb-3 mb-md-0">Notifications</h2>
                <div>
                    <a href="{{route('recruiter.markNotificationsRead')}}" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block">Mark as all read</a>
                </div>
            </div>
            {{-- loop start --}}
            @if (session('message'))
            <div id="flash-message" class="alert alert-success">
                {{ session('message') }}
                <button type="button" class="close" aria-label="Close" onclick="closeMessage()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @php
            $notifications = App\Models\ExamNotification::latest('id','asc')->where('receiver_id',Auth::user()->id)->take(5)->get();
            $unread_notifications_count = App\Models\ExamNotification::latest('id','asc')->where('read',0)->where('receiver_id',Auth::user()->id)->take(5)->get();
            @endphp
            
            {{-- start this is unread --}}
            
            @foreach($notifications as $notification)
            @php
                $job = App\Models\Posts::where('id',$notification->job_id)->first();
                $sender_name = App\Models\User::where('id',$notification->sender_id)->value('name');
                $sender_image = App\Models\User::where('id',$notification->sender_id)->value('avatar');
                $date = \Carbon\Carbon::parse($notification->created_at);
            @endphp
            {{-- Unread Notifications --}}
            @if($notification->read == 0)
            @if($notification->status == "exam_status" || $notification->status == "job_apply")
                <a href="{{ route('recruiter.job.applicantsById', ['id' => $notification->job_id, 'notification_id' => $notification->id]) }}" class="notifications__wrapper unread">
            @else
                <a href="{{ route('recruiter.companyIndex.notification',['notification_id' => $notification->id]) }}" class="notifications__wrapper unread">
            @endif
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="{{asset('storage/'.$sender_image)}}" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            @if($notification->status == "exam_status" || $notification->status == "job_apply")
                            <div>
                                <span class="title fw-bold text-dark">{{$job->post}}</span>
                            </div>
                            @else
                            <div>
                                <span class="title fw-bold text-dark">{{$sender_name}}</span>
                            </div>
                            @endif
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        {{$date->diffForHumans()}}
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            {{$notification->content}}
                        </p>
                    </div>
                </div>
            </a>
            @endif
            {{-- end this is unread --}}

            {{-- start this is read --}}
            @if($notification->read != 0) 
            @if($notification->status == "exam_status" || $notification->status == "job_apply")
                <a href="{{ route('recruiter.job.applicantsById', ['id' => $notification->job_id, 'notification_id' => $notification->id]) }}" class="notifications__wrapper">
            @else
                <a href="{{ route('recruiter.companyIndex.notification', ['notification_id' => $notification->id]) }}" class="notifications__wrapper">
            @endif
                <div class="d-flex align-items-center w-100">
                    <div class='me-3'>
                        <img src="{{asset('storage/'.$sender_image)}}" alt=""
                            class="rounded-50" style='width: 50px; height: 50px; object-fit: cover;'>
                    </div>
                    <div class="w-100">
                        <div class="d-flex align-items-center justify-content-between w-100">
                            @if($notification->status == "exam_status" || $notification->status == "job_apply")
                            <div>
                                <span class="title fw-bold text-dark">{{$job->post}}</span>
                            </div>
                            @else
                            <div>
                                <span class="title fw-bold text-dark">{{$sender_name}}</span>
                            </div>
                            @endif
                            <div>
                                <div class="fs-14 text-dark my-1">
                                    <i>
                                        {{$date->diffForHumans()}}
                                    </i>
                                </div>
                            </div>
                        </div>
                        <p class="fs-14 text-dark">
                            {{$notification->content}}
                        </p>
                    </div>
                </div>
            </a>
            @endif
            @endforeach
            {{-- end this is read --}}


            {{-- loop end --}}
        </div>
    </div>
    

@endsection
@section('bottom_script')
@endsection
