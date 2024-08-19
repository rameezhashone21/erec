<div class="modal fade" id="myModal6" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content" style="background-color: transparent;">
        
      <div class="dashboard_content bg-white rounded_10 p-4">
      <div class="heading">
        <h2 class="fw-500 text_primary fs-3 mb-2">
          Exam Title: {{ $exam->exam_title }}

        </h2>
        <h3 class="fw-500 text_primary fs-5 mb-4">
          Add Question
        </h3>

              </div>
        <form class="dashboard-form needs-validation" action="{{ route('update-question-data') }}" method="post">
        @csrf
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px exam_id" name="exam_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px question_id" name="question_id" required>
        <input type="hidden" autocomplete="off" class="form-control fs-14 h-50px question_type" name="question_type" required>

        <div class="row gy-4">
          <div class="col-12">
            <div class="form-group position-relative">
              <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Question*</label>
              <input type="text" autocomplete="off" class="form-control fs-14 h-50px question" name="question" required="">
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
                <input type="radio" class="btn-check" name="question_type1" id="multiple" value="multiple" autocomplete="off" checked="">
                <label class="btn btn-outline-primary w-100 fs-14" for="multiple">Multiple</label>

                <input type="radio" class="btn-check" name="question_type1" id="single" value="single" autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="single">Single</label>

                <input type="radio" class="btn-check" name="question_type1" id="text" value="text" autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="text">Text</label>

                <input type="radio" class="btn-check" name="question_type1" id="boolean" value="boolean" autocomplete="off">
                <label class="btn btn-outline-primary w-100 fs-14" for="boolean">True/False</label>
              </div>
            </div>
          </div>

          <div class="col-12 d-none" id="multiple-section">
            <div class="row gy-4">
              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    1</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-m-1" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" name="is_correct_m_1" class="is-correct-m-1" value="1" autocomplete="off">
                    <label for="is-correct-m-1">correct</label>

                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    2</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-m-2" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox" name="is_correct_m_2" class="is-correct-m-2" value="2" autocomplete="off">
                    <label for="is-correct-m-2">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    3</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-m-3" name="answer[]">

                  <div class="mt-2">
                    <input type="checkbox" name="is_correct_m_3" class="is-correct-m-3" value="3" autocomplete="off">
                    <label for="is-correct-m-3">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    4</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-m-4" name="answer[]">
                  <div class="mt-2">
                    <input type="checkbox"  name="is_correct_m_4" class="is-correct-m-4" value="4" autocomplete="off">
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
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-s-1" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct-s-1" name="is_correct" value="1" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    2</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-s-2" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct-s-2" name="is_correct" value="2" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    3</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-s-3" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct-s-3" name="is_correct" value="3" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group position-relative">
                  <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Answer
                    4</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-s-4" name="answer2[]">
                  <div class="mt-2">
                    <input type="radio" id="is-correct-s-4" name="is_correct" value="4" autocomplete="off">
                    <label for="is-correct">correct</label>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12" id="text-section">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group position-relative">
                  <label for="answer_2" class="form-label fs-14 text-theme-primary fw-bold">Answer*</label>
                  <input type="text" autocomplete="off" class="form-control fs-14 h-50px is-answer-text" name="answer_2">
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
              <button type="submit" name="submit" value="addmore" class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                Save &amp; add more
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
      
      </div>
    </div>
</div>

  <script>

    console.log("56456");
    // Change to single
    let signle = document.getElementById('single');
    signle.addEventListener('change', function() {
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('single-section').classList.remove('d-none')
      $('.question_type').val("single");
    });

    // Change to multiple
    let multiple = document.getElementById('multiple');
    multiple.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.remove('d-none')
      $('.question_type').val("multiple");
    });

    // Change to text
    let text = document.getElementById('text');
    text.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.add('d-none')
      document.getElementById('text-section').classList.remove('d-none')
      $('.question_type').val("text");
    });

    // Change boolean
    let boolean = document.getElementById('boolean');
    boolean.addEventListener('change', function() {
      document.getElementById('single-section').classList.add('d-none')
      document.getElementById('multiple-section').classList.add('d-none')
      document.getElementById('text-section').classList.add('d-none')
      document.getElementById('true-false-section').classList.remove('d-none')
      $('.question_type').val("boolean");
    });
  </script>

