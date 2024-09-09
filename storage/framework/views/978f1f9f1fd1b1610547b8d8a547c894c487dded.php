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
                            <a href="<?php echo e(route('candidates.cvParser.contact')); ?>">Contact</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.skills')); ?>" class="active">Skills</a>
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
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">Skills</h2>
                        <h3 class="fs-3 fw-600 mb-2">Tell us about your skills</h3>
                        <p class="color-grey-787878">Start with the one you are most experienced at</p>
                    </div>
                    <form method="POST" class="cv_parse_form" action="<?php echo e(route('candidates.cvParser.update.data')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="skills" value="1" />
                        <input type="hidden" name="cv_builder_id" value="<?php echo e($skills->id); ?>" />

                        <div class="row gy-4">
                            <div class="col-12">
                                <label for="jobTitle" class="cv-parse-lable mb-2">Skill</label>
                                <select id="jobTitle" name="skill[]" class="select-2-skills-cv form-select fs-14 h-50px"
                                    multiple="multiple">
                                    <?php $__currentLoopData = $skills->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->skill); ?>" selected><?php echo e($row->skill); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $otherSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($row->name); ?>"><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="<?php echo e(route('candidates.cvParser.contact')); ?>"
                                        class="cv-parse-form-button back-button">Back</a>
                                </div>
                                <div>
                                    <button class="cv-parse-form-button" type="submit">Next To About</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="sticky__div">
                    <div class="cv-view position-relative">
                        <img src="<?php echo e(asset('/images/cv-view-vector.png')); ?>" alt=""
                            class="cv-view-bg-voctor img-fluid">
                        <div class="cv-view-header">
                            <img src="<?php echo e(asset('/images/cv-head.png')); ?>" alt="Erec logo" class="img-fluid">
                        </div>
                        <div class="cv-view-body position-relative">
                            <?php if($skills->contact->cv_profile != null): ?>
                                <img src="<?php echo e(asset('storage/' . $skills->contact->cv_profile)); ?>" alt="profile7"
                                    class="cv-view-profile-image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('/images/image_preview_noimage.png')); ?>" alt="profile7"
                                    class="cv-view-profile-image">
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="cv-profile-name"><?php echo e($skills->contact->name); ?>

                                        <?php echo e($skills->contact->father_name); ?>

                                    </h3>
                                    <h4 class="cv-profile-title"> <?php echo e($skills->contact->title); ?></h4>
                                </div>
                                <div class="d-flex flex-column gap-2 col-lg-6">
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13.746"
                                                viewBox="0 0 11 13.746">
                                                <path id="Path_5639" data-name="Path 5639"
                                                    d="M45,16a5.006,5.006,0,0,0-5,5c0,4.278,4.545,7.51,4.739,7.645a.455.455,0,0,0,.522,0C45.455,28.51,50,25.278,50,21A5.006,5.006,0,0,0,45,16Zm0,3.182A1.818,1.818,0,1,1,43.182,21,1.818,1.818,0,0,1,45,19.182Z"
                                                    transform="translate(-39.5 -15.5)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo e($skills->contact->location); ?>

                                        </span>
                                    </p>
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.004" height="11.004"
                                                viewBox="0 0 11.004 11.004">
                                                <path id="Path_5640" data-name="Path 5640"
                                                    d="M41.994,31.555A2.813,2.813,0,0,1,39.2,34,7.208,7.208,0,0,1,32,26.8a2.813,2.813,0,0,1,2.446-2.794.8.8,0,0,1,.831.476l1.056,2.358v.006a.8.8,0,0,1-.063.755c-.009.014-.019.026-.028.038L35.2,28.874A4.611,4.611,0,0,0,37.141,30.8l1.217-1.036a.406.406,0,0,1,.038-.028.8.8,0,0,1,.759-.07l.007,0,2.356,1.056A.8.8,0,0,1,41.994,31.555Z"
                                                    transform="translate(-31.5 -23.498)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            <?php echo e($skills->contact->phone); ?>

                                        </span>
                                    </p>
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
                                        <span>
                                            <?php echo e($skills->contact->email); ?>

                                        </span>
                                    </p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4" id="skillsItemsUl">
                                <?php $__currentLoopData = $skills->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php echo e($row->skill); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
    <script>
        $(document).ready(function() {
            $('.select-2-skills-cv').select2();
            // Function to update skills list
            function updateSkillsList() {
                let selectedSkills = $('.select-2-skills-cv').val();
                let skillsList = selectedSkills.map(function(skill) {
                    return '<li>' + skill + '</li>';
                });
                $('#skillsItemsUl').html(skillsList.join(''));
            }

            // Event listener for skill selection
            $('.select-2-skills-cv').on('select2:select select2:unselect', function() {
                updateSkillsList();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidatepanel/pages/resumeParser/cvParserSkill.blade.php ENDPATH**/ ?>