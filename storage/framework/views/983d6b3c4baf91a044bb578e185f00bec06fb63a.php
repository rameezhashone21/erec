<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <link rel="stylesheet" href="<?php echo e(asset('assets/css/test/style.css')); ?>" />
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <!-- customer component styles -->
  <?php echo $__env->yieldContent('styles'); ?>
  <?php echo $__env->yieldPushContent('scripts'); ?>
</head>

<body>
  
  <?php echo $__env->yieldContent('content', $slot ?? ''); ?>
  

  <?php echo $__env->yieldContent('bottom_script'); ?>
</body>

</html>
<?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidatepanel/layout/test-app.blade.php ENDPATH**/ ?>