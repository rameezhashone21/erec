@section('page_title', 'E-Rec')

@section('head_style')
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <style>
    .set_edit_del_button {
        width: 100%;
        display: flex;
        align: center;
    }
  </style>
@endsection


<div class="col-xl-9 col-lg-8">
  <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
    <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
  </button>
  <div class="dashboard_content bg-white rounded_10 p-4">
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
      <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">All Exams List</h2>

      <a href="{{ route('company.exam.create') }}" role="button"
        class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">
        Add Exam
      </a>
    </div>
    <div class="table-responsive table_height scrollbar">
      <table class="table table-striped table-payment display nowrap" style="width:100%">
        <thead>
          <tr>
            <th class="set-width-table-1">#</th>
            <th class="set-width-table-3">Exam title</th>
            <th class="set-width-table-1">Total Exam Time</th>
            <th class="set-width-table-1">Total Questions</th>
            <th class="set-width-table-1">Show Questions</th>
            <th class="set-width-table-4">Status</th>
            <th class="set-width-table-4">Action</th>
          </tr>
        </thead>
        <tbody>
          @if (count($exams) > 0)
            @foreach ($exams as $key => $row)
              <tr>
                <td class="set-width-table-1">
                  {{ $key + 1 }}.
                </td>
                <td class="set-width-table-3">{{ $row['exam_title'] }}</td>
                <td class="set-width-table-1">{{ $row['exam_completion_in_minutes'] }} minutes</td>
                <td class="set-width-table-1">{{ App\Models\ExamQuestion::where('exam_id', $row['id'])->count() }}</td>
                <td class="set-width-table-1">{{ $row['question_showto_condidate'] }}</td>
                <td class="set-width-table-4">
                  @if ($row->status == 0)
                    <p class="btn btn-danger text-center p-2">Inactive</p>
                  @else
                    <p class="btn btn-success text-center p-2" style="color:#fff;">Active</p>
                  @endif
                </td>
                <td class="set-width-table-4">
                  <div class="d-flex" style="gap: 4px;">
                    <div style="width:100%; display:flex; align-items:center;">
                    <a href="{{ route('company.exam.update', ['id' => $row->id]) }}" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Edit" class="btn btn_viewall">
                      <i class="fas fa-edit"></i>
                    </a>
                    </div>
                    <form action="{{ route('company.exam.delete', ['id' => $row->id]) }}" method="get" style="width:100%; display:flex; align-items:center;">
                        @csrf
                        <a type="button" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Delete" class="btn btn_viewall delete-exam-btn"> 
                        <i class="fas fa-trash"></i>
                        </a>
                    </form>

                    <a href="{{ route('company.exam.question.listing', ['id' => $row->id]) }}" data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Question" class="btn btn_viewall">
                      <i class="fas fa-question-circle"></i> Questions
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="6" align="center" class="text-center">
                You didn't add any exams yet
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
    {{ $exams->links() }}
  </div>
</div>

<script>
$(document).ready(function() {
    $('.delete-exam-btn').click(function() {
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
