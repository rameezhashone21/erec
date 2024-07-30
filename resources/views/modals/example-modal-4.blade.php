<div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content"style="background-color: transparent;">
        <form action="{{ route('update-question-data') }}" method="post">
            @csrf
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px exam_id" name="exam_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px question_id" name="question_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px" name="question_type" value="boolean" required>
        
        <div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="heading">
        <h2 class="fw-500 text_primary fs-3 mb-2">
          Exam Title: {{ $exam->exam_title }}

        </h2>
        <h3 class="fw-500 text_primary fs-5 mb-4">
          Edit Question
        </h3>

        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>
          @endforeach
        @endif
      </div>
      
      <div class="row gy-4">
          <div class="col-12">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Question*</label>
              <input type="text" autocomplete="off" class="form-control fs-14 h-50px question" name="question" required readonly>
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
                <label class="btn btn-outline-primary w-100 fs-14" for="boolean">True/False</label>
              </div>
            </div>
          </div>

          <div class="col-12" id="true-false-section">
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
                Update
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
        
        </form>
        
      </div>
    </div>
  </div>

<script>
    $(document).ready(function() {
        // Intercept form submission
        $('#text-question-update-Form').submit(function(e) {
            e.preventDefault(); // Prevent the default form submit

            // Serialize form data
            var formData = $(this).serialize();

            // Submit form via Ajax
            $.ajax({
                url: "{{ route('update-question-data') }}", // Replace with your Laravel route that handles form submission
                method: 'POST',
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log(response);
                       successModal("Question Has Been Successfully Updated...");
                    $("myModal4").removeClass("show")
                    $('#myModal4').modal('hide');
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