 <?php $__env->startSection('content'); ?>
    <style>
        .mt-100 {
            margin-top: 100px;
        }
    </style>
    <div class="container-fluid mt-100">
        <div class="row row-cols-1 row-cols-lg-2 sign-in  ">
            <div class="col px-0 ">
                <div class="banner h-100"></div>
            </div>
            <div class="col  align-self-center">
                <div class="p-x-70 p-y-20">
                    <div class="mb-5">
                        <a href="<?php echo e(route('index')); ?>"> <img class="img-fluid"
                                src="<?php echo e(asset('images/logo.png')); ?>"alt=""></a>
                    </div>
                    <h1 class="text-theme-primary text-uppercase mb-0 fs-18 fw-bold mb-4"><?php echo e(__('Reset Password')); ?></h1>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="<?php echo e(route('password.email')); ?>" class="rig register__form">
                        <?php echo csrf_field(); ?>
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="email"
                                    class="form-label fs-14 text-theme-primary fw-bold"><?php echo e(__('E-Mail Address')); ?></label>
                                <input id="email" type="email"
                                    class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                                    value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus>

                                <?php $__errorArgs = ['email'];
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
                        <div class="col-12">
                            <button type="submit" class="btn w-100 py-3 fs-14 text-uppercase fw-bold default-btn">
                                <?php echo e(__('Send Password Reset Link')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>