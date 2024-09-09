

<?php $__env->startSection('content'); ?>
  <section class='subcription_banner pb-5'>
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <div class="mb-5">
            <img src="<?php echo e(asset('/images/congrates_Image.png')); ?>" alt="" class='img-fluid'>
          </div>
          <?php
            use Carbon\Carbon;
            $current = Carbon::now();
            
            $users = \App\Models\User::where('package_expiry', 1)->get();
          ?>
          <h1 class="mb-0 fs-48 text-center fw-bold mb-4">
            Congratulations
          </h1>
          
          
          
          <?php
          
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
            
          ?>
          <div class="text-center mb-4">
            <p class='w-50 mx-auto'>
              
              including GST, will be sent out to your registered email address. Thank you for your business.
            </p>
          </div>
          <div class="text-center">
            <a href="<?php echo e(route('dashboard')); ?>" class="btn bg-theme-secondary-2 text-white fs-18 py-3"
              style='padding-left: 60px; padding-right: 60px;'>Go to profile</a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erec\resources\views/subscription/success.blade.php ENDPATH**/ ?>