<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content" style="background-color: transparent;">
        <form action="<?php echo e(route('update-question-data')); ?>" method="post">
            <?php echo csrf_field(); ?>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px exam_id" name="exam_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px" id='question_id' name="question_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px" name="question_type" value="multiple" required>
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
          Edit Question
        </h3>

        <?php if(count($errors) > 0): ?>
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-danger" role="alert">
              <?php echo e($error); ?>

            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
      </div>

        <div class="row gy-4">
          <div class="col-12">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Question*</label>
              <input type="text" autocomplete="off" class="form-control fs-14 h-50px question" name="question" readonly>
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
                <label class="btn btn-outline-primary w-100 fs-14" for="multiple">Multiple</label>
              </div>
            </div>
          </div>

          <div class="col-12" id="multiple-section">
            <div class="row gy-4">
              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    1</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-a-1" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" class="is-correct-m-1" name="is_correct_m_1" value="1" autocomplete="off"
                      checked>
                    <label for="is-correct-m-1">correct</label>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    2</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-a-2" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" class="is-correct-m-2" name="is_correct_m_2" value="2" autocomplete="off">
                    <label for="is-correct-m-2">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    3</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-a-3" name="answer[]">

                  <div class="mt-2">
                    <input type="checkbox" class="is-correct-m-3" name="is_correct_m_3" value="3"
                      autocomplete="off">
                    <label for="is-correct-m-3">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    4</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-a-4" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" class="is-correct-m-4" name="is_correct_m_4" value="4"
                      autocomplete="off">
                    <label for="is-correct-m-4">correct</label>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="form-group">
              <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                Update
              </button>
            </div>
          </div>
        </div>
      
    </div>
  </div>
        </form>
      </div>
    </div>
  </div>
  
<script>
    $(document).ready(function() {
        // Intercept form submission
        $('#myForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submit

            // Serialize form data
            var formData = $(this).serialize();

            // Submit form via Ajax
            $.ajax({
                url: "<?php echo e(route('update-question-data')); ?>", // Replace with your Laravel route that handles form submission
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log("h",response);
                    successModal("Question Has Been Successfully Updated...");
                    $("myModal").removeClass("show")
                    $('#myModal').modal('hide'); // Hide the modal
                    // Optionally update UI or do other tasks upon success
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    // Optionally display error messages to user
                }
            });
        });
    });
</script>  
<?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/modals/example-modal.blade.php ENDPATH**/ ?>