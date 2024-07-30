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
            // dd(app('router')->getRoutes()->match(app('request')->create(URL::previous()))->getName() == 'subscriptionPayment');
            if (
                app('router')
                    ->getRoutes()
                    ->match(app('request')->create(URL::previous()))
                    ->getName() == 'subscriptionPayment'
            ) {
                $subscribed = 'subscribed';
            } else {
                $subscribed = 'renewed';
            }
            
          @endphp
          <div class="text-center mb-4">
            <p class='w-50 mx-auto'>
              {{-- {{ dd(auth()->user()->package->time_interval) }} --}}
              {{-- Your subscription has been activated successfully. --}}
              You have successfully {{ $subscribed }} your @if (auth()->check())
                @if (auth()->user()->package != null)
                  {{ auth()->user()->package->name }} subscription Your expiry date will be @if ($users->package_expiry = !null)
                    @if (auth()->user()->package->time_interval == 'month')
                      {{ \Carbon\Carbon::parse($users->package_expiry = $current->addMonth())->isoFormat('DD/MM/YYYY') }}
                    @elseif (auth()->user()->package->time_interval == 'year')
                      {{ $users->package_expiry = $current->addYear()->format('D/M/Y') }}
                    @endif
                  @endif
                @endif
              @endif A Tax Invoice for the amount of
              @if (auth()->check())
                @if (auth()->user()->package != null)
                  ${{ auth()->user()->package->price }}
                @endif
              @endif
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
