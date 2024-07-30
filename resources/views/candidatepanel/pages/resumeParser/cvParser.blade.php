@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')

    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
@endforeach
@endif --}}
    <div class="col-12">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-lg-8">
                <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                    <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                </button>
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    {{-- <form id="cvForm"> --}}
                    <h2 class="text-center fw-500 fs-2 mb-5">Upload Your CV</h2>
                    <form action="{{ route('candidates.parseResume') }}" method="POST" enctype="multipart/form-data"
                        id="res-perser">
                        @csrf

                        {{-- <button type="button" onclick="parseCv()">Parse CV</button> --}}
                        <input type="hidden" name="extracted_text" id="extracted_text" />
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-6" id="uploadWrapper">
                                <label class="upload__wrapper d-block" for="cvFile">
                                    <div class="mb-4">
                                        <img src="{{ asset('/images/Upload-cv-builder.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <p>
                                        Drop your files here. or <button
                                            class="border-0 bg-white text_primary">Browse</button>
                                    </p>
                                    <input type="file" id="cvFile" accept=".pdf, .doc, .docx" required
                                        name="resume_file" style="position: absolute; visibility: hidden; width: 0;">
                                </label>
                            </div>
                            <div class="col-lg-6" id="uploadContainer" style="display: none;">
                                <div class="d-flex w-100 gap-3">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41.211" height="54.73"
                                            viewBox="0 0 41.211 54.73">
                                            <g id="Group_2654" data-name="Group 2654" transform="translate(1.5 1.5)">
                                                <g id="Icon_feather-file" data-name="Icon feather-file">
                                                    <path id="Path_52" data-name="Path 52"
                                                        d="M27.493,3H10.776A4.987,4.987,0,0,0,6,8.173V49.557a4.987,4.987,0,0,0,4.776,5.173H39.434a4.987,4.987,0,0,0,4.776-5.173V21.106Z"
                                                        transform="translate(-6 -3)" fill="none" stroke="#007ba7"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                                    <path id="Path_53" data-name="Path 53" d="M19.5,3V21.106H37.606"
                                                        transform="translate(0.605 -3)" fill="none" stroke="#007ba7"
                                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                                </g>
                                                <text id="PDF" transform="translate(8 39.865)" fill="#007ba7"
                                                    font-size="12" font-family="SegoeUI-Bold, Segoe UI" font-weight="700"
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
                        {{-- <button type="button" onclick="parseCv()" class="btn btn-primary">Parse CV</button> --}}
                    </form>

                    <div id="parsedResults"></div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
    <script>
        async function extractTextFromPDF(pdfFile) {
            const loadingTask = pdfjsLib.getDocument({
                data: pdfFile
            });
            const pdfDocument = await loadingTask.promise;

            // Initialize an empty string to store extracted text
            let textContent = '';

            // Iterate through each page
            for (let pageNum = 1; pageNum <= pdfDocument.numPages; pageNum++) {
                const page = await pdfDocument.getPage(pageNum);
                const pageText = await page.getTextContent();

                // Concatenate text from each page
                textContent += pageText.items.map(item => item.str).join(' ');
            }

            return textContent;
        }
        // async function convertPdfToText(pdfUrl) {
        //     const loadingTask = pdfjsLib.getDocument(pdfUrl);
        //     const pdf = await loadingTask.promise;

        //     const textContent = await pdf.getPage(1).getTextContent();
        //     const text = textContent.items.map(item => item.str).join(' ');

        //     console.log(text);
        // }
        const pdfInput = document.getElementById('cvFile');

        pdfInput.addEventListener('change', async (event) => {
            const file = event.target.files[0];

            if (file) {
                const arrayBuffer = await file.arrayBuffer();
                const textContent = await extractTextFromPDF(arrayBuffer);
                // console.log(textContent);
                document.getElementById("extracted_text").value = textContent;
                document.getElementById("res-perser").submit();
                console.log('all', textContent);

                // Now you can pass textContent to your extraction function
                const {
                    keyValuePairs
                } = extractKeyValuePairs(textContent);
                //     console.log("Keys:", keys);
                //     console.log("Values:", values);
            }
        });

        function extractKeyValuePairs(text) {
            const keyValuePairs = {};

            // Education section
            const educationMatch = text.match(/Education([\s\S]*?)Experience/);
            if (educationMatch) {
                const educationText = educationMatch[1].trim();
                const educationLines = educationText.split('\n').map(line => line.trim());

                // Assuming the format is "Field: Value"
                educationLines.forEach(line => {
                    const [field, value] = line.split('|').map(item => item.trim());
                    keyValuePairs[field] = value;
                });
            }
            console.log('education', educationMatch);

            // Experience section
            const experienceMatch = text.match(/Experience([\s\S]*?)Projects/);
            if (experienceMatch) {
                const experienceText = experienceMatch[1].trim();
                const experienceLines = experienceText.split('\n').map(line => line.trim());

                // Assuming the format is "Role | Company | Date"
                experienceLines.forEach(line => {
                    const [role, company, date] = line.split('|').map(item => item.trim());
                    keyValuePairs[`Experience - ${role}`] = {
                        Company: company,
                        Date: date
                    };
                });
            }

            // Projects section
            const projectsMatch = text.match(/Projects([\s\S]*?)Umair Bin Ali/);
            if (projectsMatch) {
                const projectsText = projectsMatch[1].trim();
                const projectsLines = projectsText.split('\n').map(line => line.trim());

                // Assuming the format is "Project Name Link"
                projectsLines.forEach(line => {
                    const [projectName, projectLink] = line.split(' ').map(item => item.trim());
                    keyValuePairs[`Project - ${projectName}`] = projectLink;
                });
            }
            console.log('keyvaluepairs', keyValuePairs);
            return keyValuePairs;

        }
    </script>

    <script>
        $(document).ready(function() {
            // Drag over event handler
            $('#uploadWrapper').on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragover');
            });

            // Drag leave event handler
            $('#uploadWrapper').on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');

            });

            // Drop event handler
            $('#uploadWrapper').on('drop', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
                var files = e.originalEvent.dataTransfer.files;
                handleFileUpload(files);

            });

            // Click event handler for file input
            $('#cvFile').on('change', function() {
                var files = this.files;
                handleFileUpload(files);

            });

            // Function to handle file upload
            async function handleFileUpload(files) {
                if (files.length > 0) {
                    var file = files[0];
                    if (file.type === 'application/pdf') {

                        // File is a PDF, proceed with upload
                        var fileName = file.name;
                        var fileSize = file.size;
                        $('#file__name').text(fileName);
                        $('#file__size').text(formatBytes(fileSize));
                        $('#uploadContainer').show();
                        $('#file-progress').show();
                        // $('#cvFile').trigger('change');
                        const arrayBuffer = await file.arrayBuffer();
                        const textContent = await extractTextFromPDF(arrayBuffer);
                        document.getElementById("extracted_text").value = textContent;
                        document.getElementById("res-perser").submit();
                        // console.log(textContent);
                        // Implement file upload logic here

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
                        // File is not a PDF, show error message
                        alert('Only PDF files are allowed.');
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
    {{-- <script>
        function handleFileSelect(event) {
            event.preventDefault();
            const files = event.target.files || event.dataTransfer.files;

            // Handle the selected files
            handleFiles(files);
        }

        function handleDragOver(event) {
            event.preventDefault();
            const dropArea = document.getElementById('dropArea');
            dropArea.classList.add('drag-over');
        }

        function handleDragLeave(event) {
            event.preventDefault();
            const dropArea = document.getElementById('dropArea');
            dropArea.classList.remove('drag-over');
        }

        function handleDrop(event) {
            event.preventDefault();
            const dropArea = document.getElementById('dropArea');
            dropArea.classList.remove('drag-over');

            const files = event.dataTransfer.files;

            // Handle the dropped files
            handleFiles(files);
        }

        function handleFiles(files) {
            // Process the files as needed, e.g., upload to the server
            for (const file of files) {
                console.log('File name:', file.name);
                console.log('File type:', file.type);
                console.log('File size:', file.size);
                // document.getElementById('file__name').innerHTML = file.name
                const fileSizeKB = Math.round(file.size / 1024);
                console.log('File size:', fileSizeKB, 'KB');

                $("#file__name").text(file.name)
                $("#file__size").text(fileSizeKB + " KB")


                // Add additional logic based on your requirements
            }
        }

        // Add event listeners for drag-and-drop
        const dropArea = document.getElementById('dropArea');
        dropArea.addEventListener('dragover', handleDragOver, false);
        dropArea.addEventListener('dragleave', handleDragLeave, false);
        dropArea.addEventListener('drop', handleDrop, false);
    </script> --}}
@endsection
