

<?php $__env->startSection('content'); ?>
  <div class="container-fluid">
    <div class="row row-cols-1 row-cols-lg-2 sign-in  ">
      <div class="col px-0 ">
        <div class="banner"></div>
      </div>
      <div class="col d-flex justify-content-center align-items-center">

        <div class="p-x-70 p-y-20 ">
          <?php if(session($key ?? 'error')): ?>
            <div class="alert alert-danger" role="alert">
              <?php echo session($key ?? 'error'); ?>

            </div>
          <?php endif; ?>
          <?php if(session('message')): ?>
            <!-- <div class="account-title"><?php echo e(session('message')); ?></div> -->
            <div class="account-title">

              <p class="alert alert-danger"><?php echo e(session('message')); ?></p>

            </div>
          <?php endif; ?>
          <div class="text-center mb-4">
            <a href="<?php echo e(route('index')); ?>"> <img class="img-fluid" src="<?php echo e(asset('images/logo.png')); ?>"
                alt=""></a>
          </div>
          <h1 class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">
            
            Welcome to the Employment - Realtime Engagement Centre (E-REC). Bridging the digital experience in Real Time
          </h1>
          <p class="text-theme-primary text-uppercase mb-0 text-center fs-18 fw-bold">
            
            Please Sign in or Register a new account to access the E-REC Portal.
          </p>
          <ul class="d-flex justify-content-center align-items-center list-unstyled py-3">
            <li>
              <a href="<?php echo e(route('google.login')); ?>"><img src="<?php echo e(asset('images/google.svg')); ?>" alt="google"
                  class="img-fluid"></a>
            </li>
            <li>
              <a href="<?php echo e(route('linkedin.login')); ?>"><img src="<?php echo e(asset('images/linkedin.svg')); ?>" alt="linkedin"
                  class="img-fluid"></a>
            </li>
            <li>
              <a href="<?php echo e(route('facebook.login')); ?>"><img src="<?php echo e(asset('images/facebook.png')); ?>" alt="facebook"
                  class="img-fluid" style="width: 30px; height: 30px;"></a>
            </li>
          </ul>
          <div id="captcha-error"></div>
          <p class="text-grey fs-14 mb-0 text-center or"> Or</p>
          <form method="POST" action="<?php echo e(route('login')); ?>" class="row g-3 register__form">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="latitude" value="" name="latitude" />
            <input type="hidden" id="longitude" value="" name="longitude" />
            <div class="col-12">
              <label for="email"
                class="form-label fs-14 text-theme-primary fw-bold"><?php echo e(__('E-Mail Address')); ?></label>
              <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>
              <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert"> <strong><?php echo e($message); ?></strong> </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="col-12">
              <label for="password" class="form-label fs-14 text-theme-primary fw-bold"><?php echo e(__('Password')); ?></label>
              <div class="position-relative">
                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                  name="password" required autocomplete="current-password">
                <i class="far fa-eye position-absolute password-icon" id="togglePassword"></i>
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                  <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                  </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <div>

              <div class="g-recaptcha mt-4" data-sitekey=<?php echo e(config('services.recaptcha.key')); ?>></div>

            </div>
            <div class="col-12">
              <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">Sign
                In</button>
            </div>
            <div class="col-12 text-center">
              <div>
                <label class="form-check-label text-grey text-center  fs-14" for="gridCheck">
                  Don't have an account? <a href="<?php echo e(route('register')); ?>"
                    class="text-theme-primary text-decoration-underline"> Sign Up</a>
                </label>

              </div>
              <div>
                <?php if(Route::has('password.request')): ?>
                  <a class="btn btn-link" style="font-size: 14px;" href="<?php echo e(route('password.request')); ?>">
                    <?php echo e(__('Forgot Your Password?')); ?>

                  </a>
                <?php endif; ?>

              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
  <script>
    // show/hide pass
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye slash icon
      this.classList.toggle('fa-eye-slash');
    });
  </script>
  

<script>
function onSubmit(e) {
    e.preventDefault(); // Prevent form from submitting immediately

    // Check if reCAPTCHA is completed
    var recaptchaResponse = grecaptcha.getResponse();
    if (recaptchaResponse.length === 0) {
        $('#captcha-error').html('<div class="alert alert-danger"> reCAPTCHA verification failed. </div>')
        return false; // Prevent form submission
    }

    // If reCAPTCHA is completed, submit the form
    e.target.submit();
}

document.addEventListener('DOMContentLoaded', function() {
    var form = document.querySelector('form');
    form.addEventListener('submit', onSubmit);
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/auth/login.blade.php ENDPATH**/ ?>