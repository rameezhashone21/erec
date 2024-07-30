@extends('candidatepanel.layout.test-app')

@section('page_title', 'E-Rec')

@section('head_style')
@endsection

@section('content')
  {{-- <section> --}}
  <header class="fixed-top shadow bg-white main-header">
    <div class="container-fluid primary-padding row">
      <div class="col-md-1">
        <img class="" src="{{ asset('assets/images/test/headerdesign1.png') }}" alt="" />
      </div>
      <nav class="d-md-flex align-items-center justify-content-between col-md-10">
        <img src="{{ asset('assets/images/test/logo.png') }}" alt="logo" />
        <div class="d-flex align-items-center gap-1">
          <span class="fw-bold text-secondary">Time Left:</span>
          <span class="header-text-color header-text-bg" id="demo">00m 00s</span>
        </div>
        <button class="primary-button" id="startButton">START TEST</button>
      </nav>
      <div class="col-md-1 text-end">
        <img src="{{ asset('assets/images/test/headerdesign2.png') }}" alt="" />
      </div>
    </div>
  </header>
  <main class="section-margin">
    <section id="test-section" class="container-xl shadow rounded-3 mx-auto px-5 py-5 d-none">
      <h1 class="header-text-color mb-4">{{ strtoupper($exam->exam_title) }} Test</h1>

      <form action="{{ route('candidate.test.submit') }}" method="post" id="myForm">
        @csrf

        @php($q = 1)
        @forelse ($questions as $question)
          <div class="py-4 divider">
            <p class="fs-5">
              {{ $q }}. {{ $question->question }}
            </p>
            @if ($question->type == 'boolean')
              <div class="d-flex align-items-center my-4">
                <div class="form-check w-50">
                  <input class="form-check-input" type="radio" name="answer{{ $q }}[answer][]" value="1"
                    id="flexRadioDefault1-{{ $q }}" />
                  <label class="form-check-label text-secondary fw-medium" for="flexRadioDefault1-{{ $q }}">
                    True
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer{{ $q }}[answer][]"
                    value="0" id="flexRadioDefault2-{{ $q }}" />
                  <label class="form-check-label text-secondary fw-medium" for="flexRadioDefault2-{{ $q }}">
                    False
                  </label>
                </div>
                <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->type }}">
                <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->id }}">
              </div>
            @elseif ($question->type == 'multiple')
              @php($a = 'A')
              @foreach ($question->answers as $answer)
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="answer{{ $q }}[answer][]"
                    value="{{ $answer->answer }}" />
                  <label class="form-check-label text-secondary" for="flexCheckDefault">
                    {{ $a }}) {{ $answer->answer }}
                  </label>
                </div>
                @php($a++)
              @endforeach
              <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->type }}">
              <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->id }}">
            @elseif ($question->type == 'single')
              @php($a = 'A')
              @foreach ($question->answers as $answer)
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="answer{{ $q }}[answer][]"
                    value="{{ $answer->answer }}" />
                  <label class="form-check-label text-secondary" for="flexCheckDefault">
                    {{ $a }}) {{ $answer->answer }}
                  </label>
                </div>
                @php($a++)
              @endforeach
              <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->type }}">
              <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->id }}">
            @elseif ($question->type == 'text')
              <div class="form-floating">
                <textarea class="form-control resize" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                  name="answer{{ $q }}[answer][]"></textarea>
                <label for="floatingTextarea2" class="text-secondary">Write Your Answer Here</label>

                <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->type }}">
                <input type="hidden" name="answer{{ $q }}[]" value="{{ $question->id }}">
              </div>
            @endif
          </div>
          @php($q++)
        @empty
        @endforelse
        <input type="hidden" name="exam" value="{{ $exam->slug }}">
        <input type="hidden" name="jobApplicationId" value="{{ $jobApplicationId }}">
        <button class="primary-button px-5 py-2 rounded-1 mt-5">
          SUBMIT TEST
        </button>
      </form>
    </section>
  </main>
  {{-- </section> --}}
@endsection

@push('scripts')
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
          "{{ route('candidate.test.attempt.fail', ['exam' => $exam->slug, 'id' => $jobApplicationId]) }}";

      } else {
        // Clear any existing flag if the page is not a reload
        localStorage.removeItem(reloadDetectKey);
      }
    });
  </script>
@endpush
@section('bottom_script')
  <script>
    let countdownStarted = false;
    let examCompletionTime = '{{ $exam->exam_completion_in_minutes }}';
    let testSection = document.getElementById('test-section');
    let startButton = document.getElementById('startButton');
    let submitButtonClicked = false;
    let x;


    document.addEventListener('DOMContentLoaded', () => {
        const reloadDetectKey = "reloadDetected" + "{{ $jobApplicationId }}"
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
                "{{ route('candidate.test.attempt.fail', ['exam' => $exam->slug, 'id' => $jobApplicationId]) }}";
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
  </script>
@endsection
