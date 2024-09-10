<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  
  <header class="fixed-top shadow bg-white main-header">
    <div class="container-fluid primary-padding row">
      <div class="col-md-1">
        <img class="" src="<?php echo e(asset('assets/images/test/headerdesign1.png')); ?>" alt="" />
      </div>
      <nav class="d-md-flex align-items-center justify-content-between col-md-10">
        <img src="<?php echo e(asset('assets/images/test/logo.png')); ?>" alt="logo" />
        <div class="d-flex align-items-center gap-1">
          <span class="fw-bold text-secondary">Time Left:</span>
          <span class="header-text-color header-text-bg" id="demo">00m 00s</span>
        </div>
        <button class="primary-button" id="startButton" onclick="hideInstruction()">START TEST</button>
        <button id="triggerButton" class="primary-button d-none">SUBMIT TEST</button>

      </nav>
      <div class="col-md-1 text-end">
        <img src="<?php echo e(asset('assets/images/test/headerdesign2.png')); ?>" alt="" />
      </div>
    </div>
    
  </header>
  <main class="section-margin">
     <div class='container'>
          <div class='row'>
               <div class='col-12'>
        <div id="test_instructions">          
        <h3 style="margin-bottom:15px;">Employment Test Guidelines</h3>
        <ul>
        <li>Ensure your internet connection is stable before starting the test.</li><br>
        <li>Read each question carefully.</li><br>
        <li>Provide the answer to each question to proceed with the test.</li><br>
        <li>Double-check your answers before submitting to ensure accuracy.</li><br>
        <li>If you exit the test, you cannot resume it; you must start from the beginning.</li><br>
        <li>Manage your time effectively to answer all questions within the allocated time.</li><br>
        <li>Refrain from seeking external assistance or using unauthorized resources during the test.</li><br>
        <li>Avoid distractions and find a quiet environment to take the test.</li><br>
        <li>Your answers and any other information you submit throughout the exam will be kept private.</li><br>
        <li>Contact technical support immediately if you encounter any issues during the test.</li><br>
        </ul>
        </div>
        </div> 
            </div> 
     </div> 
     
    <section id="test-section" class="container-xl shadow rounded-3 mx-auto px-5 py-5 d-none">
      <h1 class="header-text-color mb-4"><?php echo e(strtoupper($exam->exam_title)); ?> Test</h1>


      <form action="<?php echo e(route('candidate.test.submit')); ?>" method="post" id="myForm">
        <?php echo csrf_field(); ?>

        <?php ($q = 1); ?>
        <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
          <div class="py-4 divider">
            <p class="fs-5">
              <?php echo e($q); ?>. <?php echo e($question->question); ?>

            </p>
            <?php if($question->type == 'boolean'): ?>
              <div class="d-flex align-items-center my-4">
                <div class="form-check w-50">
                  <input class="form-check-input" type="radio" name="answer<?php echo e($q); ?>[answer][]" value="1"
                    id="flexRadioDefault1-<?php echo e($q); ?>" />
                  <label class="form-check-label text-secondary fw-medium" for="flexRadioDefault1-<?php echo e($q); ?>">
                    True
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer<?php echo e($q); ?>[answer][]"
                    value="0" id="flexRadioDefault2-<?php echo e($q); ?>" />
                  <label class="form-check-label text-secondary fw-medium" for="flexRadioDefault2-<?php echo e($q); ?>">
                    False
                  </label>
                </div>
                <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->type); ?>">
                <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->id); ?>">
              </div>
            <?php elseif($question->type == 'multiple'): ?>
              <?php ($a = 'A'); ?>
              <!-- <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="answer<?php echo e($q); ?>[answer][]"
                    value="<?php echo e($answer->answer); ?>" />
                  <label class="form-check-label text-secondary" for="flexCheckDefault">
                    <?php echo e($a); ?>) <?php echo e($answer->answer); ?>

                  </label>
                </div>
                <?php ($a++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
              <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="answer<?php echo e($q); ?>[answer][]" 
                          value="<?php echo e($answer->answer); ?>" id="checkbox_<?php echo e($loop->index); ?>" />
                      <label class="form-check-label text-secondary" for="checkbox_<?php echo e($loop->index); ?>">
                          <?php echo e($a); ?>) <?php echo e($answer->answer); ?>

                      </label>
                  </div>
                  <?php ($a++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->type); ?>">
              <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->id); ?>">
            <?php elseif($question->type == 'single'): ?>
              <?php ($a = 'A'); ?>
              <!-- <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer<?php echo e($q); ?>[answer][]"
                    value="<?php echo e($answer->answer); ?>" />
                  <label class="form-check-label text-secondary" for="flexCheckDefault">
                    <?php echo e($a); ?>) <?php echo e($answer->answer); ?>

                  </label>
                </div>
                <?php ($a++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> -->
              <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer<?php echo e($q); ?>[answer]" 
                      value="<?php echo e($answer->answer); ?>" id="radio_<?php echo e($loop->index); ?>" />
                  <label class="form-check-label text-secondary" for="radio_<?php echo e($loop->index); ?>">
                      <?php echo e($a); ?>) <?php echo e($answer->answer); ?>

                  </label>
              </div>
              <?php ($a++); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->type); ?>">
              <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->id); ?>">
            <?php elseif($question->type == 'text'): ?>
              <div>
                <textarea class="form-control resize" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                  name="answer<?php echo e($q); ?>[answer][]"></textarea>
                <label for="floatingTextarea2" class="text-secondary">Write Your Answer Here</label>

                <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->type); ?>">
                <input type="hidden" name="answer<?php echo e($q); ?>[]" value="<?php echo e($question->id); ?>">
              </div>
            <?php endif; ?>
          </div>
          <?php ($q++); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
        <input type="hidden" name="exam" value="<?php echo e($exam->slug); ?>">
        <input type="hidden" name="jobApplicationId" value="<?php echo e($jobApplicationId); ?>">
        <button class="primary-button px-5 py-2 rounded-1 mt-5 main">
          SUBMIT TEST
        </button>
      </form>
    </section>
  </main>
  
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    // // Disable right-click
    document.addEventListener('contextmenu', (e) => {
      e.preventDefault();
    });

    // Disable key shortcuts commonly used to open Developer Tools
    document.addEventListener('keydown', (e) => {
      // Disable F12 key
      if (e.key === 'F12') {
        e.preventDefault();
      }
      // Disable Ctrl+Shift+I, Ctrl+Shift+J, Ctrl+Shift+C
      if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'J' || e.key === 'C')) {
        e.preventDefault();
      }
      // Disable Ctrl+U
      if (e.ctrlKey && e.key === 'U') {
        e.preventDefault();
      }
    });

    window.addEventListener('load', () => {
      if (localStorage.getItem(reloadDetectKey) === 'true') {
        localStorage.removeItem(reloadDetectKey); // Reset the flag
        window.location.href =
          "<?php echo e(route('candidate.test.attempt.fail', ['exam' => $exam->slug, 'id' => $jobApplicationId])); ?>";

      } else {
        // Clear any existing flag if the page is not a reload
        localStorage.removeItem(reloadDetectKey);
      }
    });
  </script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('bottom_script'); ?>
  <script>
    let countdownStarted = false;
    let examCompletionTime = '<?php echo e($exam->exam_completion_in_minutes); ?>';
    let testSection = document.getElementById('test-section');
    let startButton = document.getElementById('startButton');
    let submitButtonClicked = false;
    let x;


    document.addEventListener('DOMContentLoaded', () => {
        const reloadDetectKey = "reloadDetected" + "<?php echo e($jobApplicationId); ?>"
      document.getElementById('startButton').addEventListener('click', () => {
        if (!countdownStarted) {
          countdownStarted = true;
          testSection.classList.remove("d-none");
          startButton.classList.add("disabled");

          // Set the date we're counting down to 70 minutes from now
          const countDownDate = new Date(Date.now() + examCompletionTime * 60 * 1000).getTime();

          // Update the countdown every 1 second
          x = setInterval(() => {
            // Get today's date and time
            const now = Date.now();

            // Find the distance between now and the countdown date
            const distance = countDownDate - now;

            // Time calculations for minutes and seconds
            const minutes = Math.floor(distance / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.getElementById("demo").innerHTML = `${minutes}m ${seconds}s`;

            // If the countdown is over, write some text
            if (distance < 0) {
              clearInterval(x);
              document.getElementById("demo").innerHTML = "EXPIRED";
              window.location.href =
                "<?php echo e(route('candidate.test.attempt.fail', ['exam' => $exam->slug, 'id' => $jobApplicationId])); ?>";
            }
          }, 1000);
        }

        document.getElementById('myForm').addEventListener('submit', () => {
          submitButtonClicked = true;
        });


        // Catch the reload event
        window.addEventListener('beforeunload', (e) => {
          if (countdownStarted && !submitButtonClicked) {
            localStorage.setItem(reloadDetectKey, 'true');
          }
        });
      });
    });

function hideInstruction() {

  var startbutton = document.getElementById('startButton');
  startbutton.style.display = 'none'; // Hides the start button
  
  
  var attemptbutton = document.getElementById('triggerButton');
  attemptbutton.classList.remove("d-none"); // Show the Submit button
  
  var show_test_instructions = document.getElementById("test_instructions");
  if (show_test_instructions.style.display === "none") {
    show_test_instructions.style.display = "block";
  } else {
    show_test_instructions.style.display = "none";
  }
}
  </script>
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // jQuery to handle the click event of the outside button
        $('#triggerButton').on('click', function() {
            // Trigger a click event on the button inside the form
            $('#myForm .main').click();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.test-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Documents\erec\resources\views/candidatepanel/pages/test/index.blade.php ENDPATH**/ ?>