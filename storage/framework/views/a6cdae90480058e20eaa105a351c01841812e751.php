<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-12">
        <div class="row">
            <div class="col-lg-7">
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                    </button>
                    <ul class="d-flex cv-perse-navigation">
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.contact')); ?>" class="active">Contact</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.skills')); ?>">Skills</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.about')); ?>">About</a>

                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.experience')); ?>">Experience</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.education')); ?>">Education</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.others')); ?>">Others</a>
                        </li>
                    </ul>
                    <div class="my-4">
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">Contact</h2>
                        <h3 class="fs-3 fw-600 mb-2">Please enter your contact infos</h3>
                        <p class="color-grey-787878">It allows employers to see how they can contact you.</p>
                    </div>
                    <form method="POST" class="cv_parse_form" action="<?php echo e(route('candidates.cvParser.update.data')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="contact" value="1" />
                        <input type="hidden" name="contact_id" value="<?php echo e($contact->contact->id); ?>" />
                        <div class="row gy-4">
                            <div class="col-12">
                                <label for="imageUpload" class="avatar-upload d-inline-flex align-items-center gap-3">
                                    <div class="avatar-preview">
                                        <?php if($contact->contact->cv_profile != null): ?>
                                            <div id="imagePreview"
                                                style="background-image: url(<?php echo e(asset('storage/' . $contact->contact->cv_profile)); ?>);">
                                            </div>
                                        <?php else: ?>
                                            <div id="imagePreview"
                                                style="background-image: url(<?php echo e(asset('/images/image_preview_noimage.png')); ?>);">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="avatar-edit">
                                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg"
                                            name="profile_picture" />
                                        <div>
                                            <div class="image-upload-text">Upload A Photo</div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label for="firstName" class="cv-parse-lable mb-2">First Name</label>
                                <input type="text" id="firstName" name="name" value="<?php echo e($contact->contact->name); ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="lastName" class="cv-parse-lable mb-2">Last Name</label>
                                <input type="text" id="lastName" name="father_name"
                                    value="<?php echo e($contact->contact->father_name); ?>" class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="designationTitle" class="cv-parse-lable mb-2">Designation/Title</label>
                                <input type="text" id="designationTitle" name="title"
                                    value="<?php echo e($contact->contact->title); ?>" class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="emailAddress" class="cv-parse-lable mb-2">Email Address</label>
                                <input type="email" id="emailAddress" name="email"
                                    value="<?php echo e($contact->contact->email); ?>" class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="phoneNumber" class="cv-parse-lable mb-2">Phone Number</label>
                                <input type="text" id="phoneNumber" value="<?php echo e($contact->contact->phone); ?>"
                                    class="form-control cv-parse-input" name="phone">
                            </div>
                            <?php
                                $address = explode(',', $contact->contact->location);
                                // dd($address);
                            ?>
                            <div class="col-lg-6">
                                <label for="address" class="cv-parse-lable mb-2">Address</label>
                                <input type="text" id="address" name="address"
                                    value="<?php if(isset($address[0])): ?> <?php echo e($address[0]); ?> <?php endif; ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="postalCode" class="cv-parse-lable mb-2">Postal Code</label>
                                <input type="text" id="postalCode" name="postal"
                                    value="<?php if(isset($address[1])): ?> <?php echo e($address[1]); ?> <?php endif; ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="city" class="cv-parse-lable mb-2">City</label>
                                <input type="text" id="city" name="city"
                                    value="<?php if(isset($address[2])): ?> <?php echo e($address[2]); ?> <?php endif; ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="state" class="cv-parse-lable mb-2">State</label>
                                <input type="text" id="state" name="state"
                                    value="<?php if(isset($address[3])): ?> <?php echo e($address[3]); ?> <?php endif; ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-lg-6">
                                <label for="country" class="cv-parse-lable mb-2">Country</label>
                                <input type="text" id="country" name="country"
                                    value="<?php if(isset($address[4])): ?> <?php echo e($address[4]); ?> <?php endif; ?>"
                                    class="form-control cv-parse-input">
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <div></div>
                                <div>
                                    <button type="submit" class="cv-parse-form-button">Next To Skills</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="sticky__div">
                    <div class="cv-view position-relative" style="word-break: break-word;">
                        <img src="<?php echo e(asset('/images/cv-view-vector.png')); ?>" alt=""
                            class="cv-view-bg-voctor img-fluid">

                        <div class="cv-view-header">
                            <img src="<?php echo e(asset('/images/cv-head.png')); ?>" alt="Erec logo" class="img-fluid">
                        </div>
                        <div class="cv-view-body position-relative">
                            <?php if($contact->contact->cv_profile != null): ?>
                                <img src="https://backend.hostingladz.com/webapp/erec/public/storage/candidateAvatar/img/2024-08-23_.66.428571428571_.png" alt="prof1"
                                    class="cv-view-profile-image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('/images/image_preview_noimage.png')); ?>" alt="profile1"
                                    class="cv-view-profile-image">
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="cv-profile-name text-capitalize">
                                        <span id="firstNameView"><?php echo e($contact->contact->name); ?></span>
                                        <span id="middleNameView"></span>
                                        <span id="lastNameView"><?php echo e($contact->contact->father_name); ?></span>
                                    </h3>
                                    <h4 class="cv-profile-title" id="designationTitleView"><?php echo e($contact->contact->title); ?>

                                    </h4>
                                </div>
                                <div class="d-flex flex-column gap-2 col-lg-6">
                                    <div id="addressWrapper">
                                        <p class="cv-text-primary d-flex align-items-center gap-2" id="addressWrapper">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13.746"
                                                    viewBox="0 0 11 13.746">
                                                    <path id="Path_5639" data-name="Path 5639"
                                                        d="M45,16a5.006,5.006,0,0,0-5,5c0,4.278,4.545,7.51,4.739,7.645a.455.455,0,0,0,.522,0C45.455,28.51,50,25.278,50,21A5.006,5.006,0,0,0,45,16Zm0,3.182A1.818,1.818,0,1,1,43.182,21,1.818,1.818,0,0,1,45,19.182Z"
                                                        transform="translate(-39.5 -15.5)" fill="none"
                                                        stroke="#787878" stroke-width="1" />
                                                </svg>
                                            </span>
                                            <span id="addressView">
                                                <?php echo e($contact->contact->location); ?>

                                            </span>
                                        </p>
                                    </div>
                                    <div id="phoneNumberWrapper">
                                        <p class="cv-text-primary d-flex align-items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="11.004" height="11.004"
                                                    viewBox="0 0 11.004 11.004">
                                                    <path id="Path_5640" data-name="Path 5640"
                                                        d="M41.994,31.555A2.813,2.813,0,0,1,39.2,34,7.208,7.208,0,0,1,32,26.8a2.813,2.813,0,0,1,2.446-2.794.8.8,0,0,1,.831.476l1.056,2.358v.006a.8.8,0,0,1-.063.755c-.009.014-.019.026-.028.038L35.2,28.874A4.611,4.611,0,0,0,37.141,30.8l1.217-1.036a.406.406,0,0,1,.038-.028.8.8,0,0,1,.759-.07l.007,0,2.356,1.056A.8.8,0,0,1,41.994,31.555Z"
                                                        transform="translate(-31.5 -23.498)" fill="none"
                                                        stroke="#787878" stroke-width="1" />
                                                </svg>
                                            </span>
                                            <span id="phoneNumberView">
                                                <?php echo e($contact->contact->phone); ?>

                                            </span>
                                        </p>
                                    </div>
                                    <div id="emailAddressWrapper">
                                        <p class="cv-text-primary d-flex align-items-center gap-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13.061" height="9.1"
                                                    viewBox="0 0 13.061 9.1">
                                                    <path id="Path_5641" data-name="Path 5641"
                                                        d="M12.5,14.7V9.3s-5.46,3.81-5.991,4.008C5.987,13.119.5,9.3.5,9.3v5.4c0,.75.159.9.9.9H11.6c.759,0,.9-.132.9-.9m-.009-6.459c0-.546-.159-.741-.891-.741H1.4c-.753,0-.9.234-.9.78l.009.084s5.421,3.732,6,3.936c.612-.237,5.991-4.02,5.991-4.02Z"
                                                        transform="translate(0 -7)" fill="none" stroke="#787878"
                                                        stroke-width="1" />
                                                </svg>
                                            </span>
                                            <span id="emailAddressView">
                                                <?php echo e($contact->contact->email); ?>

                                            </span>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.cv_parse_form #imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('.cv_parse_form #imagePreview').hide();
                    $('.cv_parse_form #imagePreview').fadeIn(650);

                    $('.cv-view-profile-image').attr("src", e.target.result);
                    $('.cv-view-profile-image').hide();
                    $('.cv-view-profile-image').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(".cv_parse_form #imageUpload").change(function() {
            readURL(this);
        });

        // start cv view run time value changes
        $(document).ready(function() {

            let addressText = $('#addressView').text();


            $('#firstName').on('input', function() {
                let inputValue = $(this).val();
                $('#firstNameView').text(inputValue);
            });

            $('#middleName').on('input', function() {
                let inputValue = $(this).val();
                $('#middleNameView').text(inputValue);
            });

            $('#lastName').on('input', function() {
                let inputValue = $(this).val();
                $('#lastNameView').text(inputValue);
            });

            $('#designationTitle').on('input', function() {
                let inputValue = $(this).val();
                $('#designationTitleView').text(inputValue);
            });


            // start address wrapper logic

            if ($('#addressView').text().trim() === '') {
                $('#addressWrapper').hide();
            }

            // Input event listener for #address
            $('#address').on('input', function() {
                let inputValue = $(this).val().trim();
                $('#addressView').text(inputValue);
                if (!inputValue) {
                    $('#addressWrapper').hide();
                } else {
                    $('#addressWrapper').show();
                }
            });

            // end address wrapper logic


            // start Phone Number wrapper logic

            if ($('#phoneNumberView').text().trim() === '') {
                $('#phoneNumberWrapper').hide();
            }

            // Input event listener for #address
            $('#phoneNumber').on('input', function() {
                let inputValue = $(this).val().trim();
                $('#phoneNumberView').text(inputValue);
                if (!inputValue) {
                    $('#phoneNumberWrapper').hide();
                } else {
                    $('#phoneNumberWrapper').show();
                }
            });

            // end Phone Number wrapper logic


            // start Email Address wrapper logic

            if ($("#emailAddressView").text().trim() === '') {
                $("#emailAddressWrapper").hide()
            }

            $('#emailAddress').on('input', function() {
                let inputValue = $(this).val();
                $('#emailAddressView').text(inputValue);
                if (!inputValue) {
                    $("#emailAddressWrapper").hide()
                } else {
                    $("#emailAddressWrapper").show()
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidatepanel/pages/resumeParser/cvParserContact.blade.php ENDPATH**/ ?>