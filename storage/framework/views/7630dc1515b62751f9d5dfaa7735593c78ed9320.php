<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">

        <?php if(session('message')): ?>
            <div class="alert alert-success"><?php echo e(session('message')); ?></div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php
            use App\Models\User;
            $package_id = User::where('id', Auth::user()->id)->value('package_id');
        ?>

        <div class="d-md-flex aling-items-center mb-3">
            <div>
                <h2 class="fw-500 text_primary fs-3 mb-2">
                    <?php echo e($exam->exam_title); ?>

                </h2>
                <h3 class="fw-500 text_primary fs-5 mb-4">
                    Question & Answers
                </h3>
            </div>
            <div class="ms-auto">
                <button id="importButton" type="button" class="btn_viewall fw-500 px-4 py-2 d-inline-block"
                    data-value=<?php echo e($package_id); ?>>
                    Import Question
                </button>
                <a href="<?php echo e(route('company.exam.question.create', ['id' => $exam->id])); ?>" role="button"
                    class="btn_viewall fw-500 px-4 py-2 d-inline-block ">
                    Add New
                </a>
            </div>
        </div>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-4">
                    <div class="modal-header d-block border-0">
                        <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">Import Question</h2>
                        <p class="mt-3">
                            Please Ensure The File You Upload Is Similar To The Sample, And It Should Be In CSV File
                            Format.
                        </p>
                        
                    </div>
                    <div class="modal-body ">
                        <form method="post" action="<?php echo e(route('company.exam.uploadCSV')); ?>"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
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
                                        <input type="text" id="cvFile1" accept=".pdf, .doc, .docx" required=""
                                            name="exam_id" style="display: none;" value="<?php echo e($exam->id); ?>">
                                        <input type="file" id="cvFile" accept=".csv" required=""
                                            name="csv_file" style="display: none;">
                                    </label>
                                </div>
                                <div class="col-lg-6" id="uploadContainer" style="display: none;">
                                    <div class="d-flex w-100 gap-3 position-relative">
                                        
                                        <div class="position-absolute end-0 top-0">
                                            <a id="removeFileButton" type="button" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title=""
                                                class="btn btn_viewall delete-exam-btn delete_csv"
                                                data-bs-original-title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
                                                    <text id="PDF" transform="translate(8 39.865)"
                                                        fill="#007ba7" font-size="12"
                                                        font-family="SegoeUI-Bold, Segoe UI" font-weight="700"
                                                        letter-spacing="0.05em">
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
                                <p class="fw-bold mb-3" id="textDownloadSample">Download Sample Question Paper</p>
                                <a href="<?php echo e(route('downloadCSV')); ?>"
                                    class="btn_viewall bg-black fw-500 px-4 py-2 d-inline-flex align-items-center"
                                    id="downloadSample">
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
        
        <div>


            <?php echo $__env->make('modals.example-modal-6', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            <div class="accordion" id="accordionExample">
                <?php $__empty_1 = true; $__currentLoopData = $qa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-<?php echo e($key + 1); ?>">
                            <div class="d-flex ">
                                <button
                                    class="accordion-button question-title  <?php if($key + 1 > 1): ?> <?php echo e(__('collapsed')); ?> <?php endif; ?>"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-<?php echo e($key + 1); ?>" aria-expanded="true"
                                    aria-controls="collapse-<?php echo e($key + 1); ?>">
                                    <span class="pe-5">
                                        <?php echo e($loop->iteration); ?>. <?php echo e($row['question']); ?>

                                    </span>
                                </button>
                                <div class="dropdown me-3 align-self-center">
                                    <button class="bg-transparent border-0" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg id="three-dots-vertical" xmlns="http://www.w3.org/2000/svg"
                                            width="4" height="17.334" viewBox="0 0 4 17.334">
                                            <g id="Group_2837" data-name="Group 2837" transform="translate(0 0)">
                                                <path id="Path_3306" data-name="Path 3306"
                                                    d="M23.5,19.834a2,2,0,1,1-2-2A2,2,0,0,1,23.5,19.834Zm0-6.667a2,2,0,1,1-2-2A2,2,0,0,1,23.5,13.167Zm0-6.667a2,2,0,1,1-2-2A2,2,0,0,1,23.5,6.5Z"
                                                    transform="translate(-19.5 -4.5)" fill="#92929d" />
                                            </g>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li class="px-3 pb-2 pt-2">
                                            <?php if($row['type'] == 'multiple'): ?>
                                                <a data-bs-placement="top" title="Edit" data-id=<?php echo e($row['id']); ?>

                                                    class="btn btn_viewall d-block w-100 hello"
                                                    class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#myModal6">
                                                    Edit
                                                </a>
                                            <?php elseif($row['type'] == 'single'): ?>
                                                <a data-bs-placement="top" title="Edit" data-id=<?php echo e($row['id']); ?>

                                                    class="btn btn_viewall d-block w-100 hello"
                                                    class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#myModal6">
                                                    Edit
                                                </a>
                                            <?php elseif($row['type'] == 'text'): ?>
                                                <a data-bs-placement="top" title="Edit" data-id=<?php echo e($row['id']); ?>

                                                    class="btn btn_viewall d-block w-100 hello"
                                                    class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#myModal6">
                                                    Edit
                                                </a>
                                            <?php elseif($row['type'] == 'boolean'): ?>
                                                <a data-bs-placement="top" title="Edit" data-id=<?php echo e($row['id']); ?>

                                                    class="btn btn_viewall d-block w-100 hello"
                                                    class="btn btn-info btn-lg" data-toggle="modal"
                                                    data-target="#myModal6">
                                                    Edit
                                                </a>
                                            <?php endif; ?>
                                        </li>
                                        <li class="px-3 pb-3">
                                            <form action="<?php echo e(route('company.exam.question.remove')); ?>"
                                                method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="exam_id" value=<?php echo e($row['exam_id']); ?>>
                                                <input type="hidden" name="id" value=<?php echo e($row['id']); ?>>
                                                <a type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="Delete"
                                                    class="btn btn_viewall delete-exam-btn1 d-block w-100">
                                                    Delete
                                                </a>
                                            </form>


                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text_primary question-type">Question Type: <?php if($row['type'] == 'boolean'): ?>
                                    <?php echo e('True/False'); ?>

                                <?php else: ?>
                                    <?php echo e(ucfirst($row['type'])); ?>

                                <?php endif; ?>
                            </p>
                        </h2>
                        <div id="collapse-<?php echo e($key + 1); ?>"
                            class="accordion-collapse collapse <?php if($key + 1 == 1): ?> <?php echo e(__('show')); ?> <?php endif; ?>"
                            aria-labelledby="heading-<?php echo e($key + 1); ?>" data-bs-parent="#accordionExample">

                            <?php ($a = 'A'); ?>
                            <?php $__currentLoopData = $row->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="accordion-body pt-0">
                                    <p class="answer_wrap">
                                        <?php if($row['type'] == 'boolean'): ?>
                                            <span class="fw-bold">Correct Answer : <?php if($answer->is_correct == 'yes'): ?>
                                                    <?php echo e('True'); ?>

                                                <?php else: ?>
                                                    <?php echo e('False'); ?>

                                                <?php endif; ?>
                                            </span>
                                        <?php elseif($row['type'] == 'multiple' || $row['type'] == 'single'): ?>
                                            <span class="fw-bold"><?php echo e($a); ?>) </span>
                                            <?php echo e($answer['answer']); ?> <?php if($answer->is_correct == 'yes'): ?>
                                                <?php echo e('(Correct)'); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <span class="fw-bold"><?php echo e($a); ?>) </span>
                                            <?php echo e($answer['answer']); ?>

                                        <?php endif; ?>
                                    </p>
                                </div>
                                <?php ($a++); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center">
                        You didn't add any questions & answers yet
                    </p>
                <?php endif; ?>
            </div>
        </div>
        
        <?php echo e($qa->links()); ?>

    </div>
</div>


<script>
    $(document).on("click", ".hello", function() {
        var eventId = $(this).data('id');
        console.log("question_id", eventId);
        $('#idHolder').html(eventId)

        var url = "<?php echo e(route('get-question-data')); ?>";
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

                console.log("sda", question_type)


                if (question_type == 'multiple') {
                    document.getElementById('multiple-section').classList.remove('d-none')
                    document.getElementById('text-section').classList.add('d-none')
                    document.getElementById('true-false-section').classList.add('d-none');
                    document.getElementById('single-section').classList.add('d-none')


                    var answer_option = document.getElementById('multiple');
                    answer_option.checked = true;

                    console.log("jj", response['answers'][0]['answer']);
                    $('.is-answer-m-1').val(response['answers'][0]['answer']);
                    $('.is-answer-m-2').val(response['answers'][1]['answer']);
                    $('.is-answer-m-3').val(response['answers'][2]['answer']);
                    $('.is-answer-m-4').val(response['answers'][3]['answer']);
                    $('.question_id').val(params['id']);
                    $('.question_type').val("multiple");
                    $('.question').val(question);
                    $('.exam_id').val(exam_id);

                    //Check or uncheck checkbox based on data.checkboxValue
                    if (response['answers'][0]['is_correct'] == 'yes') {
                        $('.is-correct-m-1').prop('checked', true);
                    }
                    if (response['answers'][1]['is_correct'] == 'yes') {
                        $('.is-correct-m-2').prop('checked', true);
                    }
                    if (response['answers'][2]['is_correct'] == 'yes') {
                        $('.is-correct-m-3').prop('checked', true);
                    }
                    if (response['answers'][3]['is_correct'] == 'yes') {
                        $('.is-correct-m-4').prop('checked', true);
                    }
                } else if (question_type == 'single') {

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
                    if (response['answers'][0]['is_correct'] == 'yes') {
                        var answer_option = document.getElementById('is-correct-s-1');
                        answer_option.checked = true;
                    } else if (response['answers'][1]['is_correct'] == 'yes') {
                        console.log("cond 22 executed");
                        var answer_option = document.getElementById('is-correct-s-2');
                        answer_option.checked = true;

                    } else if (response['answers'][2]['is_correct'] == 'yes') {
                        var answer_option = document.getElementById('is-correct-s-3');
                        answer_option.checked = true;
                    } else if (response['answers'][3]['is_correct'] == 'yes') {
                        var answer_option = document.getElementById('is-correct-s-4');
                        answer_option.checked = true;
                    }
                } else if (question_type == 'text') {

                    document.getElementById('text-section').classList.remove('d-none')
                    document.getElementById('true-false-section').classList.add('d-none');
                    document.getElementById('multiple-section').classList.add('d-none')
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
                } else if (question_type == 'boolean') {

                    document.getElementById('true-false-section').classList.remove('d-none');
                    document.getElementById('text-section').classList.add('d-none')
                    document.getElementById('multiple-section').classList.add('d-none');
                    document.getElementById('single-section').classList.add('d-none')

                    var answer_option = document.getElementById('boolean');
                    answer_option.checked = true;

                    console.log("r1", response['answers'][0]['is_correct']);
                    if (response['answers'][0]['is_correct'] == 'yes') {
                        console.log("asd")
                        var answer_option = document.getElementById('is-correct-b-1');
                        answer_option.checked = true;
                    } else {
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
        $('#removeFileButton').on('click', function() {
            // Clear file input
            $('#cvFile').val('');

            // Reset the file upload UI
            $('#file__name').text('');
            $('#file__size').text('');
            $('#file-progress .progress-bar').css('width', '0%');
            $('#file-progress').hide();
            $('#uploadContainer').hide();
            $('#uploadWrapper').show();
            $('#uploadButton').hide();
            $('#downloadSample').removeClass('d-none').addClass('d-inline-flex');
            $('#textDownloadSample').removeClass('d-none');
        });

        async function handleFileUpload(files) {
            if (files.length > 0) {
                var file = files[0];
                if (file.type === 'text/csv') {
                    var fileName = file.name;
                    var fileSize = file.size;
                    $('#file__name').text(fileName);
                    $('#file__size').text(formatBytes(fileSize));
                    $('#uploadContainer').show();
                    $('#uploadWrapper').hide();
                    $('#file-progress').show();
                    $('#uploadButton').show();
                    $('#downloadSample').addClass('d-none');
                    $('#textDownloadSample').addClass('d-none');

                    var percentComplete = 0;
                    var interval = setInterval(function() {
                        percentComplete += 5;
                        $('#file-progress .progress-bar').css('width', percentComplete + '%');
                        $('#file-progress .progress-bar').text(percentComplete + '%');
                        if (percentComplete >= 100) {
                            clearInterval(interval);
                            $('#file-progress .progress-bar').text('100%');
                        }
                    }, 200);

                } else {
                    alert('Only CSV files are allowed.');
                }
            }
        }

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var importButton = document.getElementById('importButton');
        var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'));

        importButton.addEventListener('click', function(event) {
            // Replace this with your actual condition
            var condition = true; // Change this to your condition

            var value = importButton.getAttribute('data-value');

            console.log("va", value);

            if (value == "12" || value == "13") {
                // Prevent the modal from opening
                Swal.fire({
                    title: 'Upgrade Package Alert',
                    text: "Sorry, You cant use import questions functionality please upgrade your package",
                    icon: 'warning',
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if user confirms
                        $(this).closest('form').submit();
                    }
                });
            } else {
                exampleModal.show(); // Open the modal
            }
        });
    });
</script>
<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\erec\resources\views/livewire/company/show-question-answers.blade.php ENDPATH**/ ?>