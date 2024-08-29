@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-8">
                <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                    <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                </button>
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    <h2 class="text-center fw-500 fs-2 mb-5">Upload Your CV</h2>
                    <form action="{{ route('candidates.parseResume') }}" method="POST" enctype="multipart/form-data" id="res-perser">
                        @csrf
                        <input type="hidden" name="extracted_text" id="extracted_text" />
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6" id="uploadWrapper">
                                <label class="upload__wrapper d-block" for="cvFile">
                                    <div class="mb-4">
                                        <img src="{{ asset('/images/Upload-cv-builder.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <p>
                                        Only Word or PDF format is allowed
                                    </p>
                                    <p>
                                        Drop your files here. or <span class="text_primary" style="cursor: pointer;">Browse</span>
                                    </p>
                                    <input type="file" id="cvFile" accept=".pdf, .doc, .docx" required name="resume_file" style="display: none;">
                                </label>
                            </div>
                            <div class="col-lg-6" id="uploadContainer" style="display: none;">
                                <div class="d-flex w-100 gap-3">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41.211" height="54.73" viewBox="0 0 41.211 54.73">
                                            <g id="Group_2654" data-name="Group 2654" transform="translate(1.5 1.5)">
                                                <g id="Icon_feather-file" data-name="Icon feather-file">
                                                    <path id="Path_52" data-name="Path 52" d="M27.493,3H10.776A4.987,4.987,0,0,0,6,8.173V49.557a4.987,4.987,0,0,0,4.776,5.173H39.434a4.987,4.987,0,0,0,4.776-5.173V21.106Z" transform="translate(-6 -3)" fill="none" stroke="#007ba7" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                                    <path id="Path_53" data-name="Path 53" d="M19.5,3V21.106H37.606" transform="translate(0.605 -3)" fill="none" stroke="#007ba7" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                                </g>
                                                <text id="PDF" transform="translate(8 39.865)" fill="#007ba7" font-size="12" font-family="SegoeUI-Bold, Segoe UI" font-weight="700" letter-spacing="0.05em">
                                                    <tspan x="0" y="0">PDF</tspan>
                                                </text>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="flex-grow-1">
                                        <p id="file__name"></p>
                                        <p class="text_sm mb-1" id="file__size"></p>
                                        <div class="progress" id="file-progress" style="display: none;">
                                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div id="parsedResults"></div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom_script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.4.2/mammoth.browser.min.js"></script>
<script>
    async function extractTextFromPDF(pdfFile) {
        const loadingTask = pdfjsLib.getDocument({ data: pdfFile });
        const pdfDocument = await loadingTask.promise;

        let textContent = '';

        for (let pageNum = 1; pageNum <= pdfDocument.numPages; pageNum++) {
            const page = await pdfDocument.getPage(pageNum);
            const pageText = await page.getTextContent();
            textContent += pageText.items.map(item => item.str).join(' ');
        }

        return textContent;
    }

    async function extractTextFromDOCX(docxFile) {
        const arrayBuffer = await docxFile.arrayBuffer();
        const result = await mammoth.extractRawText({ arrayBuffer });
        return result.value;
    }

    const fileInput = document.getElementById('cvFile');

    fileInput.addEventListener('change', async (event) => {
        event.preventDefault();  // Prevent the default form submission behavior
        const file = event.target.files[0];

        if (file) {
            let textContent = '';

            if (file.type === 'application/pdf') {
                const arrayBuffer = await file.arrayBuffer();
                textContent = await extractTextFromPDF(arrayBuffer);
            } else if (file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                textContent = await extractTextFromDOCX(file);
            } else {
                alert('Unsupported file type. Only PDF and DOCX files are allowed.');
                return;
            }

            // Set the extracted text and submit the form
            document.getElementById("extracted_text").value = textContent;
            document.getElementById("res-perser").submit();
        }
    });

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

        $('.upload__wrapper').on('click', function() {
            $('#cvFile').click();
        });

        $('#cvFile').on('change', function() {
            var files = this.files;
            handleFileUpload(files);
        });

        async function handleFileUpload(files) {
            if (files.length > 0) {
                var file = files[0];
                if (file.type === 'application/pdf' || file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                    var fileName = file.name;
                    var fileSize = file.size;
                    $('#file__name').text(fileName);
                    $('#file__size').text(formatBytes(fileSize));
                    $('#uploadContainer').show();
                    $('#file-progress').show();

                    let textContent = '';

                    if (file.type === 'application/pdf') {
                        const arrayBuffer = await file.arrayBuffer();
                        textContent = await extractTextFromPDF(arrayBuffer);
                    } else if (file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document') {
                        textContent = await extractTextFromDOCX(file);
                    }

                    document.getElementById("extracted_text").value = textContent;
                    document.getElementById("res-perser").submit();

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
                    alert('Unsupported file type. Only PDF or DOCX file is allowed.');
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

@endsection