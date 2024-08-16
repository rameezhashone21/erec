@extends('layouts.app')

@section('content')
  <section class='subcription_banner pb-5'>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="mb-5">
            <img src="{{ asset('/images/congrates_Image.png') }}" alt="" class='img-fluid'>
          </div>
          @php
            use Carbon\Carbon;
            $current = Carbon::now();
            
            $users = \App\Models\User::where('package_expiry', 1)->get();
          @endphp
          <h1 class="mb-0 fs-48 text-center fw-bold mb-4">
            Congratulations
          </h1>
          {{-- {{ dd(Route::current()->getName()) }} --}}
          {{-- {{ dd(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'subscriptionPayment') }} --}}
          {{-- {{ dd(session(`previous-route`) == 'successPayment') }} --}}
          @php
          
            use Illuminate\Support\Facades\URL;
            use Illuminate\Support\Facades\Route;
        
            $previousUrl = URL::previous();
            $request = app('request')->create($previousUrl);
            $routeName = '';
    
            try {
                $route = app('router')->getRoutes()->match($request);
                $routeName = $route->getName();
            } catch (\Exception $e) {
                $routeName = ''; // Handle exception or set default route name
            }

            $subscribed = ($routeName === 'subscriptionPayment') ? 'subscribed' : 'renewed';
            
          @endphp
          <div class="text-center mb-4">
            <p class='w-50 mx-auto'>
              
              including GST, will be sent out to your registered email address. Thank you for your business.
            </p>
          </div>
          <div class="text-center">
            <a href="{{ route('dashboard') }}" class="btn bg-theme-secondary-2 text-white fs-18 py-3"
              style='padding-left: 60px; padding-right: 60px;'>Go to profile</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
