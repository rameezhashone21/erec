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
            <div class="ms-auto">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="btn_viewall fw-500 px-4 py-2 d-inline-block ">
                    Import Question
                </button>
                <a href="{{ route('company.exam.create') }}" role="button"
                    class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                    Add Exam
                </a>
            </div>
        </div>

        {{-- start modal upload questions --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header d-block border-0">
                        <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">Import Question</h2>
                        <p class="mt-3">
                            Please Ensure The File You Upload Is Similar To The Sample, And It Should Be In CSV File
                            Format.
                        </p>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body ">
                        <form method="post" action="{{ route('company.exam.create') }}" enctype="multipart/form-data">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-12" id="uploadWrapper">
                                    <label class="upload__wrapper d-block" for="cvFile">
                                        <div class="mb-4">
                                            <img src="http://127.0.0.1:8000/images/Upload-cv-builder.png" alt=""
                                                class="img-fluid">
                                        </div>
                                        <p>
                                            <span class="text_primary" style="cursor: pointer;">
                                                Upload
                                            </span>
                                            Your CSV File <br> or <span class="text_primary"
                                                style="cursor: pointer;">Browse</span>
                                        </p>
                                        {{-- <input type="file" id="cvFile" accept=".pdf, .doc, .docx" required=""
                                          name="resume_file" style="display: none;"> --}}
                                        <input type="file" id="cvFile" accept=".csv" required=""
                                            name="csv_file" style="display: none;">
                                    </label>
                                </div>
                                <div class="col-lg-6" id="uploadContainer" style="display: none;">
                                    <div class="d-flex w-100 gap-3">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="41.211" height="54.73"
                                                viewBox="0 0 41.211 54.73">
                                                <g id="Group_2654" data-name="Group 2654"
                                                    transform="translate(1.5 1.5)">
                                                    <g id="Icon_feather-file" data-name="Icon feather-file">
                                                        <path id="Path_52" data-name="Path 52"
                                                            d="M27.493,3H10.776A4.987,4.987,0,0,0,6,8.173V49.557a4.987,4.987,0,0,0,4.776,5.173H39.434a4.987,4.987,0,0,0,4.776-5.173V21.106Z"
                                                            transform="translate(-6 -3)" fill="none" stroke="#007ba7"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="3">
                                                        </path>
                                                        <path id="Path_53" data-name="Path 53"
                                                            d="M19.5,3V21.106H37.606" transform="translate(0.605 -3)"
                                                            fill="none" stroke="#007ba7" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="3">
                                                        </path>
                                                    </g>
                                                    <text id="PDF" transform="translate(8 39.865)" fill="#007ba7"
                                                        font-size="12" font-family="SegoeUI-Bold, Segoe UI"
                                                        font-weight="700" letter-spacing="0.05em">
                                                        <tspan x="0" y="0">PDF</tspan>
                                                    </text>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p id="file__name"></p>
                                            <p class="text_sm mb-1" id="file__size"></p>
                                            <div class="progress" id="file-progress" style="display: none;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                    0%
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <p class="fw-bold mb-3">Download Sample Question Paper</p>
                                <a href="{{ route('downloadCSV') }}"
                                    class="btn_viewall bg-black fw-500 px-4 py-2 d-inline-flex align-items-center">
                                    <span class="me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15.994" height="14.763"
                                            viewBox="0 0 15.994 14.763">
                                            <path id="Path_5633" data-name="Path 5633"
                                                d="M12.3,12.918a.624.624,0,1,0-.183.433A.591.591,0,0,0,12.3,12.918Zm2.461,0a.624.624,0,1,0-.183.433A.591.591,0,0,0,14.763,12.918Zm1.23-2.153v3.076a.919.919,0,0,1-.923.923H.923a.89.89,0,0,1-.654-.269A.89.89,0,0,1,0,13.841V10.765a.89.89,0,0,1,.269-.654.89.89,0,0,1,.654-.269H5.392l1.3,1.307a1.856,1.856,0,0,0,2.614,0l1.307-1.307h4.46a.919.919,0,0,1,.923.923ZM12.87,5.3a.555.555,0,0,1-.135.673L8.429,10.275a.6.6,0,0,1-.865,0L3.258,5.969A.555.555,0,0,1,3.124,5.3a.575.575,0,0,1,.567-.375H6.151V.615A.591.591,0,0,1,6.334.183.591.591,0,0,1,6.767,0H9.227A.591.591,0,0,1,9.66.183a.591.591,0,0,1,.183.433V4.921H12.3A.575.575,0,0,1,12.87,5.3Z"
                                                fill="#fff" />
                                        </svg>
                                    </span>
                                    <span>
                                        Download Sample
                                    </span>
                                </a>
                                <button type="submit" class="btn_viewall disabled fw-500 px-4 py-2"
                                    id="uploadButton" style="display: none;">
                                    Upload
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- end modal upload questions --}}

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
                                <td class="set-width-table-1">
                                    {{ App\Models\ExamQuestion::where('exam_id', $row['id'])->count() }}</td>
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
                                            <a href="{{ route('company.exam.update', ['id' => $row->id]) }}"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                class="btn btn_viewall">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('company.exam.delete', ['id' => $row->id]) }}"
                                            method="get" style="width:100%; display:flex; align-items:center;">
                                            @csrf
                                            <a type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete" class="btn btn_viewall delete-exam-btn">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </form>

                                        <a href="{{ route('company.exam.question.listing', ['id' => $row->id]) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Question"
                                            class="btn btn_viewall">
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

            console.log("rec", recordId)
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


<script>
    // start Upload CSV  
    $(document).ready(function() {
        $('#uploadWrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });

        $('#uploadWrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });

        $('#uploadWrapper').on('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
            var files = e.originalEvent.dataTransfer.files;
            handleFileUpload(files);
        });

        // Trigger file input click when clicking on the label
        $('.upload__wrapper').on('click', function() {
            $('#cvFile').click();
        });

        $('#cvFile').on('change', function() {
            var files = this.files;
            handleFileUpload(files);
        });

        // Function to handle file upload
        async function handleFileUpload(files) {
            if (files.length > 0) {
                var file = files[0];
                if (file.type === 'text/csv') {

                    // File is a CSV, proceed with upload
                    var fileName = file.name;
                    var fileSize = file.size;
                    $('#file__name').text(fileName);
                    $('#file__size').text(formatBytes(fileSize));
                    $('#uploadContainer').show();
                    $('#uploadWrapper').addClass('col-lg-6');
                    $('#uploadWrapper').removeClass('col-12');
                    $('#file-progress').show();

                    // const textContent = await file.text(); // Get text content from CSV file
                    // document.getElementById("extracted_text").value = textContent;
                    // document.getElementById("res-perser").submit();

                    $('#uploadButton').show();

                    // Simulating file upload progress
                    var percentComplete = 0;
                    var interval = setInterval(function() {
                        percentComplete += 5;
                        $('#file-progress .progress-bar').css('width', percentComplete + '%');
                        $('#file-progress .progress-bar').text(percentComplete + '%');
                        if (percentComplete >= 100) {
                            clearInterval(interval);
                            $('#file-progress .progress-bar').text('100%');
                            // File upload complete
                        }
                    }, 200);

                } else {
                    // File is not a CSV, show error message
                    alert('Only CSV files are allowed.');
                }
            }
        }

        // Format bytes function
        function formatBytes(bytes, decimals = 2) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const dm = decimals < 0 ? 0 : decimals;
            const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
        }
    });
</script>

@section('bottom_script')
@endsection
