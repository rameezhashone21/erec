<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5 mb-4">Candidate Details</h1>
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li></li>
                        </ul>
                        <?php if(count($errors) > 0): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <?php echo e($error); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>
                        <!-- fieldsets -->
                        <form id="msform" class="avatar-form" method="post"
                            action="<?php echo e(route('store.candidateEducation')); ?>" name="change_avatar"
                            enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <fieldset class="mb-5">
                                
                                <div class="d-flex align-items-md-center">
                                    <div class="me-4">
                                        <div class="avatar-upload avatar-upload-sm">
                                            <div class="avatar-edit position-static">
                                                <input type="file" id="imageUpload" name="avatar"
                                                    class="input_type_file file-upload" max="32154"
                                                    class="input_type_file file-upload" required>
                                                <label for="imageUpload">
                                                    <i
                                                        class="fas fa-camera position-absolute d-flex justify-content-center align-items-center uplaod__camera__icon"></i>
                                                    <div class="avatar-preview avatar-preview-sm">

                                                        <?php if($avatar == null): ?>
                                                            <div>
                                                                <img src="<?php echo e(asset('adminpanel/images/avatar/dummy.png')); ?>"
                                                                    alt="" class="img-fluid" id="imagePreview">
                                                            </div>
                                                        <?php else: ?>
                                                            <div>
                                                                <img src="<?php echo e(asset('public/storage/' . $avatar)); ?>"
                                                                    alt="" class="img-fluid" id="imagePreview">

                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload Profile Picture
                                        </h2>
                                        <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                        <form id="msform" class="personalDetail" method="POST"
                            action="<?php echo e(route('store.candidateEducation')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <fieldset class="mb-5 mt-3">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">About*</h2>
                                    </div>
                                    <div class="col">
                                        <label for="taglineRegisterPro" class="form-label fs-14 text-theme-primary fw-bold">
                                            Give one line description to your profile
                                        </label>
                                        <input type="text" maxlength="500" id="taglineRegisterPro"
                                            class="form-control fs-14 h-50px" value="<?php echo e($head_line); ?>" name="head_line"
                                            required>
                                        <div class="text_primary characters" style="font-size: 12px;">
                                            <span id="taglineRegisterProChars"></span>
                                            Character(s) Remaining
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="mb-5 mt-3">
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">headline*</h2>
                                    </div>
                                    <div class="col">
                                        
                                        <input type="text" maxlength="150" id="taglineRegisterPro1"
                                            class="form-control fs-14 h-50px" value="" name="tageLine" required>
                                        <div class="text_primary characters" style="font-size: 12px;">
                                            <span id="taglineRegisterProChars1"></span>
                                            Character(s) Remaining
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Personal Details
                                        </h2>
                                    </div>
                                    <div class="col">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                            Visa Status for Current Location*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" value="Citizen" name="visa_status"
                                            id="Citizen-Saudi" <?php if($visa_status == 'Citizen'): ?> checked <?php endif; ?>
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-primary fs-14" for="Citizen-Saudi">Citizen</label>

                                        <input type="radio" class="btn-check" value="Permanent Resident"
                                            name="visa_status" id="Permanent-Resident-Saudi"
                                            <?php if($visa_status == 'Permanent Resident'): ?> checked <?php endif; ?> autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14"
                                            for="Permanent-Resident-Saudi">Permanent Resident</label>

                                        <input type="radio" class="btn-check" value="Visit Visa" name="visa_status"
                                            id="Visit" <?php if($visa_status == 'Visit Visa'): ?> checked <?php endif; ?>
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Visit">Visit
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Student Visa" name="visa_status"
                                            id="Student" <?php if($visa_status == 'Student Visa'): ?> checked <?php endif; ?>
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Student">Student
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Business Visa" name="visa_status"
                                            id="Business" <?php if($visa_status == 'Business Visa'): ?> checked <?php endif; ?>
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Business">Business
                                            Visa</label>

                                        <input type="radio" class="btn-check" value="Employee Visa" name="visa_status"
                                            id="Employee" <?php if($visa_status == 'Employee Visa'): ?> checked <?php endif; ?>
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Employee">Employee
                                            Visa</label>


                                        <input type="radio" class="btn-check" value="Spousal Visa" name="visa_status"
                                            id="Spousal" <?php if($visa_status == 'Spousal Visa'): ?> checked <?php endif; ?>
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Spousal">Spousal Visa</label>
                                    </div>

                                    <div class="col">
                                        <label class="mt-3 form-label fs-14 text-theme-primary fw-bold">Date of
                                            Birth*</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control datepicker fs-14 h-50px w-100"
                                                placeholder="dd-mm-yyyy" autocomplete="off" value="<?php echo e($dob); ?>"
                                                id="dateOfBirth" name="dob" required readonly>
                                            <label class="calender-icon d-block" for="dateOfBirth">
                                                <i class="far fa-calendar-alt"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col languages__select__box">
                                        <label for=""
                                            class="form-label fs-14 text-theme-primary fw-bold">Languages Known
                                            (Max
                                            3)*</label>
                                        <?php
                                        $languages = explode(',', $languages);
                                        // dd($languages);
                                        ?>
                                        <select id="role" multiple
                                            class="form-select fs-14 languages__select h-50px mb-4" name="languages[]"
                                            required>
                                            
                                            <option value="English"
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'English'): ?>
                                            selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                English
                                            </option>
                                            <option value="Spanish"
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Spanish'): ?>
                                            selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                Spanish
                                            </option>
                                            <option value="French"
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'French'): ?>
                                            selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                French
                                            </option>
                                            <option value="German"
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'German'): ?>
                                            selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                German
                                            </option>
                                        </select>
                                        
                                        
                                    </div>

                                    <div class="col">
                                        <label for=""
                                            class="mt-4 form-label fs-14 text-theme-primary fw-bold">Religion*</label>
                                        <select id="role" class="form-select fs-14  h-50px mb-4" name="religion"
                                            required>
                                            <option disabled selected>Select Religion</option>
                                            <option value="Christianity"
                                                <?php if($religion == 'Christianity'): ?> selected <?php endif; ?>>Christianity</option>
                                            <option value="Islam" <?php if($religion == 'Islam'): ?> selected <?php endif; ?>>
                                                Islam</option>
                                            <option value="Hinduism" <?php if($religion == 'Hinduism'): ?> selected <?php endif; ?>>
                                                Hinduism</option>
                                            <option value="Buddhism" <?php if($religion == 'Buddhism'): ?> selected <?php endif; ?>>
                                                Buddhism</option>
                                            <option value="Sikhism" <?php if($religion == 'Sikhism'): ?> selected <?php endif; ?>>
                                                Sikhism</option>
                                            <option value="Judaism" <?php if($religion == 'Judaism'): ?> selected <?php endif; ?>>
                                                Judaism</option>
                                            <option value="Bahá'í Faith"
                                                <?php if($religion == "Bahá'í Faith"): ?> selected <?php endif; ?>>Bahá'í Faith</option>
                                            <option value="Jainism" <?php if($religion == 'Jainism'): ?> selected <?php endif; ?>>
                                                Jainism</option>
                                            <option value="Shintoism" <?php if($religion == 'Shintoism'): ?> selected <?php endif; ?>>
                                                Shintoism</option>
                                            <option value="Taoism" <?php if($religion == 'Taoism'): ?> selected <?php endif; ?>>
                                                Taoism</option>
                                            <option value="Confucianism"
                                                <?php if($religion == 'Confucianism'): ?> selected <?php endif; ?>>Confucianism</option>
                                            <option value="Zoroastrianism"
                                                <?php if($religion == 'Zoroastrianism'): ?> selected <?php endif; ?>>Zoroastrianism</option>
                                            <option value="Other" <?php if($religion == 'Other'): ?> selected <?php endif; ?>>
                                                Other</option>
                                            
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                            Marital Status*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" name="marital_status" value="Single"
                                            checked <?php if($marital_status === 'Single'): ?>  <?php endif; ?> id="Single"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Single">Single</label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Married"
                                            checked <?php if($marital_status === 'Married'): ?>  <?php endif; ?> id="Married"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Married">Married</label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Divorced"
                                            checked <?php if($marital_status === 'Divorced'): ?>  <?php endif; ?> id="Divorced"
                                            autocomplete="off">
                                        <label class="btn btn-outline-primary fs-14" for="Divorced">Divorced </label>

                                        <input type="radio" class="btn-check" name="marital_status" value="Others"
                                            checked <?php if($marital_status === 'Others'): ?>  <?php endif; ?> id="other"
                                            autocomplete="on">
                                        <label class="btn btn-outline-primary fs-14" for="other">Others </label>
                                    </div>

                                    <div class="col">
                                        <label for="" class="mt-4 form-label fs-14 text-theme-primary fw-bold">
                                            Do you have a driving license?*
                                        </label>
                                        <br>
                                        <input type="radio" class="btn-check" name="driving_license" value="1"
                                            <?php if($driving_license == '1'): ?> checked <?php endif; ?> id="Yes">
                                        <label class="btn btn-outline-primary fs-14" for="Yes">Yes</label>

                                        <input type="radio" class="btn-check" name="driving_license" value="0"
                                            <?php if($driving_license == '0'): ?> checked <?php endif; ?> id="no">
                                        <label class="btn btn-outline-primary fs-14" for="no">No</label>
                                    </div>

                                    <div class="col">
                                        <label for="" class="mt-4 form-label fs-14 text-theme-primary fw-bold">
                                            Attach Resume
                                        </label>
                                        
                                        
                                        
                                        
                                        
                                        
                                        

                                        <div class="file-uploader">
                                            <div class="drop-area">
                                                <p>Drag and drop files here or click to <label for="file-input"
                                                        class="text-decoration-underline text-primary text-link"
                                                        style="cursor: pointer;">browse</label><br>
                                                    Only .docs, .pdf file are accepted
                                                    Size : 200kb
                                                </p>
                                                <input type="file" name="document[]" id="file-input"
                                                    style="display: none;" accept="application/pdf,application/msword"
                                                    multiple />
                                            </div>
                                            <ul class="file-list" id="file-list"></ul>
                                        </div>
                                    </div>
                            </fieldset>

                            
                            <div class="row justify-content-center pt-5">
                                <div class="col-lg-6 text-center">
                                    <button type="submit" class="next action-button default-btn"> Next </button>
                                    <br />
                                    <br />
                                    
                                    <a href="<?php echo e(route('candidates.details.next')); ?>" class="fs-6 fw-normal">
                                        << Go Back</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        function submitForm() {
            //    var elem = document.getElementsByClassName("personalDetail");
            //    elem.forEach(element => {
            //        element.submit();
            //    });
        }
    </script>

    <script>
        // document.addEventListener("DOMContentLoaded", function(event) {
        //     var numb = 1;
        //     do {
        //         ClassicEditor
        //             .create(document.querySelector('#body' + numb), {
        //                 removePlugins: ['insertImage', 'insertMedia', 'Link', 'blockQuote'],
        //                 toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', ]
        //             })
        //             .catch(error => {
        //                 console.error(error);
        //             })
        //         numb++;
        //     }
        //     while (numb < 6);
        // });

        function form_submit() {
            const collection = document.getElementsByName("change_avatar");
            for (let i = 0; i < collection.length; i++) {
                collection[i].submit();
            }
        }

        $(".file-upload").on('change', function() {

            // formSubmit();
            // $("#loader").hide();
            // var profilefilename = document.getElementById('imageUpload');
            //         readURL(profilefilename);
            var frmData = new FormData($(".avatar-form")[0]);
            // console.log(frmData);
            // $("#loader").show();
            // console.log('here');
            $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('store.candidateEducation')); ?>",
                    data: frmData,
                    dataType: "json",
                    encode: true,
                    contentType: false,
                    cache: false,
                    processData: false,
                })
                .done(function(data) {
                    // console.log(data);
                    // $("#loader").hide();
                    var profilefilename = document.getElementById('imageUpload');
                    if (profilefilename.files && profilefilename.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            console.log(e);
                            $('#imagePreview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(profilefilename.files[0]);
                    }
                }).fail(function(error) {
                    // $("#loader").hide();
                    console.log(error['responseText']);
                    var url = "<?php echo e(asset('public/storage/')); ?>";

                    // console.log();
                    // $('#imagePreview').css({"background-image": url+error['responseText']});
                    // document.getElementById('imagePreview').style.style.backgroundImage = "url("+url+error['responseText']+")";
                    var profilefilename = document.getElementById('imageUpload');
                    // readURL(profilefilename);
                    if (profilefilename.files && profilefilename.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            console.log(e);
                            $('#imagePreview').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(profilefilename.files[0]);
                    }

                    // successModal(data.message);
                    // var errors = error.responseJSON;

                    // if (errors.errors.avatar) {
                    //     errorModal(errors.errors.avatar);
                    // }

                });


        });
    </script>
    <script>
        // start taglineRegister count textarea word
        var taglineRegisterPro = $('#taglineRegisterPro').val().length;
        $('#taglineRegisterProChars').text(500 - taglineRegisterPro);
        var maxLength = 500;
        $('#taglineRegisterPro').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#taglineRegisterProChars').text(textlen);
        });

        var taglineRegisterPro1 = $('#taglineRegisterPro1').val().length;
        $('#taglineRegisterProChars1').text(150 - taglineRegisterPro1);
        var maxLength1 = 150;
        $('#taglineRegisterPro1').keyup(function() {
            var textlen1 = maxLength1 - $(this).val().length;
            $('#taglineRegisterProChars1').text(textlen1);
        });
        // end taglineRegister count textarea word


        // $("#msformAll").on('submit', function(e) {
        //     if ($("input[name=driving_license]").val(); == "") {
        //         e.preventDefault();
        //         errorModal("Please fill driving license field");
        //     } else {
        //         $("#msformAll").submit();
        //     }
        // });
    </script>
    <script>
        $(document).ready(function() {
            // Prevent default behavior for file drag and drop
            $(document).on('dragenter', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            $(document).on('dragover', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            $(document).on('drop', function(e) {
                e.stopPropagation();
                e.preventDefault();
            });

            // Handle file drop on the drop area
            $('.drop-area').on('drop', function(e) {
                e.preventDefault();
                var files = e.originalEvent.dataTransfer.files;
                handleFiles(files);
            });

            // Handle file selection from the file input
            $('#file-input').on('change', function(e) {
                var files = e.target.files;
                handleFiles(files);
            });

            // Handle removing files
            $(document).on('click', '.remove-file', function() {
                var index = $(this).data('index');
                removeFile(index);
            });

            var fileList = [];

            function handleFiles(files) {
                var newFiles = Array.from(files);

                for (var i = 0; i < newFiles.length; i++) {
                    var file = newFiles[i];
                    fileList.push(file);
                }

                updateFileList();
            }

            function removeFile(index) {
                fileList.splice(index, 1);
                updateFileList();
            }

            function updateFileList() {
                var fileListElement = $('#file-list');
                fileListElement.empty();

                for (var i = 0; i < fileList.length; i++) {
                    var file = fileList[i];
                    var listItem = $('<li class="file-item">' + file.name +
                        '<span class="remove-file" data-index="' + i + '">&times;</span></li>');
                    fileListElement.append(listItem);
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidates/profile.blade.php ENDPATH**/ ?>