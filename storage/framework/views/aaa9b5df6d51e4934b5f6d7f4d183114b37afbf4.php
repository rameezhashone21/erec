<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="heading">
        <h2 class="fw-500 text_primary fs-3 mb-2">
          Exam Title: <?php echo e($exam->exam_title); ?>


        </h2>
        <h3 class="fw-500 text_primary fs-5 mb-4">
          Add Question
        </h3>

        <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
              <?php echo e($error); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>
      <form class="dashboard-form needs-validation" method="POST"
        action="<?php echo e(route('recruiter.exam.question.create', ['id' => $exam->id])); ?>">
        <?php echo csrf_field(); ?>

        <div class="row gy-4">
          <div class="col-12">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Question*</label>
              <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="question" required>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group gender-labels">
              <div class="mb-2">
                <label for="question_type" class="form-label fs-14 text-theme-primary fw-bold">
                  Question Type*
                </label>
              </div>
              <div class="d-flex gap-2">
                <input type="radio" class="btn-check" name="question_type" id="multiple" value="multiple"
                  autocomplete="off" checked>
                <label class="btn btn-outline-primary w-100 fs-14" for="multiple">Multiple</label>

                <input type="radio" class="btn-check" name="question_type" id="single" value="single"
                  autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="single">Single</label>

                <input type="radio" class="btn-check" name="question_type" id="text" value="text"
                  autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="text">Text</label>

                <input type="radio" class="btn-check" name="question_type" id="boolean" value="boolean"
                  autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="boolean">True/False</label>
              </div>
            </div>
          </div>

          <div class="col-12" id="multiple-section">
            <div class="row gy-4">
              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    1</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" id="is-correct-m-1" name="is_correct_m_1" value="1" autocomplete="off"
                      checked>
                    <label for="is-correct-m-1">correct</label>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    2</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" id="is-correct-m-2" name="is_correct_m_2" value="2" autocomplete="off">
                    <label for="is-correct-m-2">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    3</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer[]">

                  <div class="mt-2">
                    <input type="checkbox" id="is-correct-m-3" name="is_correct_m_3" value="3"
                      autocomplete="off">
                    <label for="is-correct-m-3">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    4</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" id="is-correct-m-4" name="is_correct_m_4" value="4"
                      autocomplete="off">
                    <label for="is-correct-m-4">correct</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 d-none" id="single-section">
            <div class="row gy-4">
              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    1</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct" name="is_correct" value="1" autocomplete="off"
                      checked>
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    2</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct" name="is_correct" value="2" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    3</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct" name="is_correct" value="3" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    4</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct" name="is_correct" value="4" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 d-none" id="text-section">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group position-relative">
                  <label for="answer_2" class="form-label fs-14 text-theme-primary fw-bold">Answer*</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px" name="answer_2">
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 d-none" id="true-false-section">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group position-relative">
                  <div class="mt-2">
                    <input type="radio" id="is-correct-b-1" name="is_correct" value="1" autocomplete="off">
                    <label for="is-correct-b-1">True</label>

                    <input type="radio" id="is-correct-b-2" name="is_correct" value="0" autocomplete="off">
                    <label for="is-correct-b-2">False</label>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                Save
              </button>
              <button type="submit" name="submit" value="addmore"
                class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                Save & add more
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
  <script>
    // Change to single
    let signle = document.getElementById('single');
    signle.addEventListener('change', function() {
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('single-section').classList.remove('d-none')
    });

    // Change to multiple
    let multiple = document.getElementById('multiple');
    multiple.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.remove('d-none')

    });

    // Change to text
    let text = document.getElementById('text');
    text.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.remove('d-none')
    });

    // Change boolean
    let boolean = document.getElementById('boolean');
    boolean.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.remove('d-none')
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('recruterpanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/recruterpanel/pages/exam-question/add.blade.php ENDPATH**/ ?>