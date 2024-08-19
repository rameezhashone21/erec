@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

<div class="col-xl-9 col-lg-8">
  <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
    <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
  </button>
  <div class="dashboard_content bg-white rounded_10 p-4">
      
     @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    
    @if (session('error'))
      <div class="alert alert-danger" role="alert">
        {{ session('error') }}
      </div>
    @endif

    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="d-md-flex aling-items-center mb-3">
      <div>
        <h2 class="fw-500 text_primary fs-3 mb-2">
          {{ $exam->exam_title }}
        </h2>
        <h3 class="fw-500 text_primary fs-5 mb-4">
          Question & Answers
        </h3>
      </div>
      <div class="ms-auto">
        <a href="{{ route('company.exam.question.create', ['id' => $exam->id]) }}" role="button"
          class="btn_viewall fw-500 px-4 py-2 d-inline-block ">
          Add New
        </a>
      </div>
    </div>
    <div>
        
            
    @include('modals.example-modal-6')
        

      <div class="accordion" id="accordionExample">
        @forelse ($qa as $key => $row)
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-{{ $key + 1 }}">
              <div class="d-flex ">
                <button
                  class="accordion-button question-title  @if ($key + 1 > 1) {{ __('collapsed') }} @endif"
                  type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $key + 1 }}"
                  aria-expanded="true" aria-controls="collapse-{{ $key + 1 }}">
                  <span class="pe-5">
                    {{ $loop->iteration }}. {{ $row['question'] }}
                  </span>
                </button>
                <div class="dropdown me-3 align-self-center">
                  <button class="bg-transparent border-0" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <svg id="three-dots-vertical" xmlns="http://www.w3.org/2000/svg" width="4" height="17.334"
                      viewBox="0 0 4 17.334">
                      <g id="Group_2837" data-name="Group 2837" transform="translate(0 0)">
                        <path id="Path_3306" data-name="Path 3306"
                          d="M23.5,19.834a2,2,0,1,1-2-2A2,2,0,0,1,23.5,19.834Zm0-6.667a2,2,0,1,1-2-2A2,2,0,0,1,23.5,13.167Zm0-6.667a2,2,0,1,1-2-2A2,2,0,0,1,23.5,6.5Z"
                          transform="translate(-19.5 -4.5)" fill="#92929d" />
                      </g>
                    </svg>
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="px-3 pb-2 pt-2">
                      @if($row['type'] == "multiple")
                      <a data-bs-placement="top" title="Edit" data-id={{$row['id']}}
                        class="btn btn_viewall d-block w-100 hello" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">
                        Edit
                      </a>
                      @elseif($row['type'] == "single")
                      <a data-bs-placement="top" title="Edit" data-id={{$row['id']}}
                        class="btn btn_viewall d-block w-100 hello" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">
                        Edit
                      </a>
                      @elseif($row['type'] == "text")
                      <a data-bs-placement="top" title="Edit" data-id={{$row['id']}}
                        class="btn btn_viewall d-block w-100 hello" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">
                        Edit
                      </a>
                      @elseif($row['type'] == "boolean")
                      <a data-bs-placement="top" title="Edit" data-id={{$row['id']}}
                        class="btn btn_viewall d-block w-100 hello" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal6">
                        Edit
                      </a>
                      @endif
                    </li>
                    <li class="px-3 pb-3">
                    <form action="{{ route('company.exam.question.remove') }}" method="post">
                        @csrf
                        <input type="hidden" name="exam_id" value={{$row['exam_id']}}> 
                        <input type="hidden" name="id" value={{$row['id']}}>
                        <a type="button" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Delete" class="btn btn_viewall delete-exam-btn1 d-block w-100"> 
                        Delete
                        </a>
                    </form>
                    
                    
                    </li>
                  </ul>
                </div>
              </div>
              <p class="text_primary question-type">Question Type: @if ($row['type'] == 'boolean')
                  {{ 'True/False' }}
                @else
                  {{ ucfirst($row['type']) }}
                @endif
              </p>
            </h2>
            <div id="collapse-{{ $key + 1 }}"
              class="accordion-collapse collapse @if ($key + 1 == 1) {{ __('show') }} @endif"
              aria-labelledby="heading-{{ $key + 1 }}" data-bs-parent="#accordionExample">

              @php($a = 'A')
              @foreach ($row->answers as $answer)
                <div class="accordion-body pt-0">
                  <p class="answer_wrap">
                    @if ($row['type'] == 'boolean')
                      <span class="fw-bold">Correct Answer : @if ($answer->is_correct == 'yes')
                          {{ 'True' }}
                        @else
                          {{ 'False' }}
                        @endif
                      </span>
                    @elseif($row['type'] == 'multiple' || $row['type'] == 'single')
                      <span class="fw-bold">{{ $a }}) </span>
                      {{ $answer['answer'] }} @if ($answer->is_correct == 'yes')
                        {{ '(Correct)' }}
                      @endif
                    @else
                      <span class="fw-bold">{{ $a }}) </span>
                      {{ $answer['answer'] }}
                    @endif
                  </p>
                </div>
                @php($a++)
              @endforeach

            </div>
          </div>
        @empty
          <p class="text-center">
            You didn't add any questions & answers yet
          </p>
        @endforelse
      </div>
    </div>
    {{-- <div class="table-responsive table_height scrollbar">
      <table class="table table-striped table-payment display nowrap" style="width:100%">
        <thead>
          <tr>
            <th class="set-width-table-1">#</th>
            <th class="set-width-table-3">Question</th>
            <th class="set-width-table-1">Type</th>
            <th class="set-width-table-4">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (count($qa) > 0)
            @foreach ($qa as $key => $row)
              <tr>
                <td class="set-width-table-1">
                  {{ $key + 1 }}.
                </td>
                <td class="set-width-table-3">{{ $row['question'] }}</td>

                <td class="set-width-table-1">{{ $row['type'] }}</td>
                <td class="set-width-table-4">
                  <div class="d-flex" style="gap: 4px;">
                    <a href="{{ route('company.exam.question.update', ['id' => $row->id]) }}" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Edit" class="btn btn_viewall">
                      <i class="fas fa-edit"></i>
                    </a>

                    <a href="{{ route('company.exam.question.delete', ['id' => $row->id]) }}" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Delete" class="btn btn_viewall">
                      <i class="fas fa-trash"></i>
                    </a>
                  </div>
                </td>
              </tr>
              <tr>
                @foreach ($row->answers as $answer)
                  <td>{{ $answer['answer'] }}</td>
                @endforeach
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="5" align="center" class="text-center">
                You didn't add any question & answers yet
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div> --}}
    {{ $qa->links() }}
  </div>
</div>


<script>
$(document).on("click", ".hello", function () {
     var eventId = $(this).data('id');
     console.log("question_id",eventId);
     $('#idHolder').html(eventId)
     
     var url = "{{ route('get-question-data') }}";
        var params = {
            id: eventId
        };

        // Make AJAX GET request
        $.ajax({
            url: url,
            method: 'GET',
            data: params,
            success: function(response) {
                
                // Handle successful response
                
                question_type = response['question_type']['type'];
                question = response['question_type']['question'];
                exam_id = response['question_type']['exam_id'];

                console.log("sda",question_type)

                
                if(question_type == 'multiple')
                {
                  document.getElementById('multiple-section').classList.remove('d-none')
                  document.getElementById('text-section').classList.add('d-none')
                  document.getElementById('true-false-section').classList.add('d-none');
                  document.getElementById('single-section').classList.add('d-none')


                  var answer_option = document.getElementById('multiple');
                  answer_option.checked = true;

                  console.log("jj",response['answers'][0]['answer']);
                    $('.is-answer-m-1').val(response['answers'][0]['answer']);
                    $('.is-answer-m-2').val(response['answers'][1]['answer']);
                    $('.is-answer-m-3').val(response['answers'][2]['answer']);
                    $('.is-answer-m-4').val(response['answers'][3]['answer']);
                    $('.question_id').val(params['id']);
                    $('.question_type').val("multiple");
                    $('.question').val(question);
                    $('.exam_id').val(exam_id);
                    
                    //Check or uncheck checkbox based on data.checkboxValue
                    if (response['answers'][0]['is_correct']=='yes') {
                      $('.is-correct-m-1').prop('checked', true);
                    } 
                    if(response['answers'][1]['is_correct']=='yes') {
                      $('.is-correct-m-2').prop('checked', true);
                    }
                    if(response['answers'][2]['is_correct']=='yes') {
                      $('.is-correct-m-3').prop('checked', true);
                    }
                    if(response['answers'][3]['is_correct']=='yes') {
                      $('.is-correct-m-4').prop('checked', true);
                    }
                }
                else if(question_type == 'single'){

                  document.getElementById('single-section').classList.remove('d-none')
                  document.getElementById('text-section').classList.add('d-none')
                  document.getElementById('true-false-section').classList.add('d-none');
                  document.getElementById('multiple-section').classList.add('d-none')
                  
                  var answer_option = document.getElementById('single');
                  answer_option.checked = true;

                    
                    $('.is-answer-s-1').val(response['answers'][0]['answer']);
                    $('.is-answer-s-2').val(response['answers'][1]['answer']);
                    $('.is-answer-s-3').val(response['answers'][2]['answer']);
                    $('.is-answer-s-4').val(response['answers'][3]['answer']);
                    $('.question_id').val(params['id']);
                    $('.question_type').val("single");
                    $('.question').val(question);
                    $('.exam_id').val(exam_id);
                    
                     //Check or uncheck checkbox based on data.checkboxValue
                    if (response['answers'][0]['is_correct']=='yes') {
                        var answer_option = document.getElementById('is-correct-s-1');
                        answer_option.checked = true;
                    } 
                    else if(response['answers'][1]['is_correct']=='yes') {
                        console.log("cond 22 executed");
                        var answer_option = document.getElementById('is-correct-s-2');
                        answer_option.checked = true;
                        
                    }
                    else if(response['answers'][2]['is_correct']=='yes') {
                        var answer_option = document.getElementById('is-correct-s-3');
                        answer_option.checked = true;
                    }
                    else if(response['answers'][3]['is_correct']=='yes') {
                        var answer_option = document.getElementById('is-correct-s-4');
                        answer_option.checked = true;
                    }
                }
                else if(question_type == 'text'){

                  document.getElementById('text-section').classList.remove('d-none')
                  document.getElementById('true-false-section').classList.add('d-none');
                  document.getElementById('mutiple-section').classList.add('d-none')
                  document.getElementById('single-section').classList.add('d-none')


                  var answer_option = document.getElementById('text');
                  answer_option.checked = true;

                    console.log('Response:', response['answers']['0']['answer'], params['id']);
                    $('.question_id').val(params['id']);
                    $('.question_type').val("text");
                    $('.question').val(question);
                    $('.exam_id').val(exam_id);
                    $('.is-answer-text').val(response['answers'][0]['answer']);

                    
                    $('.f').val(response['answers'][0]['answer']);
                }
                else if(question_type == 'boolean'){

                  document.getElementById('true-false-section').classList.remove('d-none');
                  document.getElementById('text-section').classList.add('d-none')
                  document.getElementById('true-false-section').classList.add('d-none');
                  document.getElementById('single-section').classList.add('d-none')

                  var answer_option = document.getElementById('boolean');
                  answer_option.checked = true;
                    
                    console.log("r1", response['answers'][0]['is_correct']);
                    if (response['answers'][0]['is_correct']=='yes') {
                        console.log("asd")
                        var answer_option = document.getElementById('is-correct-b-1');
                        answer_option.checked = true;
                    } 
                    else{
                      var answer_option = document.getElementById('is-correct-b-2');
                        answer_option.checked = true;
                    }
                    
                    $('.question_id').val(params['id']);
                    $('.question_type').val("boolean");
                    $('.question').val(question);
                    $('.is-answer-single').val(response['answers'][0]['answer']);
                    $('.exam_id').val(exam_id);
                }
                // // Example: Update UI with response data
                // $('#result').html('<p>Data received: ' + JSON.stringify(response) + '</p>');
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error:', error);
                // Example: Show error message on UI
                $('#result').html('<p>Error occurred: ' + error + '</p>');
            }
        });
});

$(document).ready(function() {
    $('.delete-exam-btn1').click(function() {
        var recordId = $(this).data('record-id');
        
        console.log("rec",recordId)
        $('#record_id').val(recordId); // Set the record ID in the hidden input field
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit the form if user confirms
                $(this).closest('form').submit();
            }
        });
    });
});
</script>
@section('bottom_script')
@endsection
