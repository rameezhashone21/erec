@extends('recruterpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

    @section('content')

        {{-- <section> --}}
            <div class="container">
                <div class="card" style="width: 100%">
                    <div class="card-header">
                        @if($comp->logo != NULL)
                            <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$comp->logo) }});">
                            </div>
                        @else
                            <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                            </div>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h6 class="card-subtitle  text-muted">Name</h6>
                        <p class="ml-4 card-text">{{ $comp->name }}</p>
                        <h6 class="card-subtitle  text-muted">Description</h6>
                        <p class="ml-4 card-text">{{ $comp->description }}</p>
                        {{-- <h6 class="card-subtitle  text-muted">Email</h6>
                        <p class="ml-4 card-text">{{ $leads->email }}</p>
                        <h6 class="card-subtitle  text-muted">Phone</h6>
                        <p class="ml-4 card-text">{{ $leads->phone }}</p>
                        <h6 class="card-subtitle  text-muted">Message</h6>
                        <p class="ml-4 card-text">{{ $leads->message }}</p>
                        <h6 class="card-subtitle  text-muted">Source</h6>
                        <p class="ml-4 card-text">{{ $leads->status }}</p> --}}
                    </div>
                  </div>
           </div>
        {{-- </section> --}}

    @endsection

@section('bottom_script')
@endsection
