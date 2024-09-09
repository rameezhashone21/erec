<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('content'); ?>
  <div class="col-xl-6 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
      <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
      <form class="firstform">
        <?php echo csrf_field(); ?>
        <div class="border-bottom" id="editAbout">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">About</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editAbout" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil "></i>
            </a>
            <div class="me-2" id='saveBtn6' style='display: none;'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" id="cancel-btn-6"
                class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>

          <div class="fs-14 fs-14 mb-3 text">
            <?php if(isset(auth()->user()->company)): ?>
              <?php echo $user->company->description; ?>

            <?php endif; ?>
          </div>

          <textarea name="description" class="form-control descriptionTextareaCompany" maxlength="200" id="summernote-about"
            style="display: none;"><?php echo e($user->company->description); ?></textarea>
          <input type="hidden" name="source" value="api" />
          <div class="text_primary characters characters-about pb-3" style="font-size: 12px; display: none;">
            <span id="descriptionCharacters"></span>
            Character(s) Remaining
          </div>
        </div>
      </form>
      <form class="firstform">
        <?php echo csrf_field(); ?>
        <div class="border-bottom my-3" id="editTagline">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Tagline</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editTagline" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil "></i>
            </a>
            <div class="me-2" id='saveBtntagline' style='display: none;'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                id="cancel-btn-tagline" class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>

          <div class="fs-14 fs-14 mb-3 text">
            <?php if(isset(auth()->user()->company)): ?>
              <?php echo $user->company->tagline; ?>

            <?php endif; ?>
          </div>

          <textarea name="tagline" class="form-control tagline-company-textarea" maxlength="100" id="summernote-tagline"
            style="display: none;"><?php echo e($user->company->tagline); ?></textarea>
          <input type="hidden" name="source" value="api" />

          <div class="text_primary characters characters-tagline pb-3" style="font-size: 12px; display: none;">
            <span id="taglineCharacters"></span>
            Character(s) Remaining
          </div>

        </div>
      </form>
      <form class="firstform">
        <?php echo csrf_field(); ?>
        <div class="border-bottom py-3" id="editMission">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Mission</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editMission" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil "></i>
            </a>
            <div class="me-2" id='saveBtn7' style='display: none;'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" type="button"
                id="cancel-btn-7" class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <div class="fs-14 fs-14 text">
            <?php echo $user->company->mission; ?>

          </div>
          <input type="hidden" name="source" value="api" />
          <textarea name="mission" class="form-control" id="summernote-missionNote" style="display: none;"><?php echo $user->company->mission; ?></textarea>

        </div>
      </form>
      <form class="firstform">
        <?php echo csrf_field(); ?>
        <div class="border-bottom py-3" id="editVision">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Vision</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editVision" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil"></i>
            </a>
            <div class="me-2" style='display: none;' id='saveBtn8'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" type="button"
                id="cancel-btn-8" class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <input type="hidden" name="source" value="api" />
          <textarea name="whatWeDo" class="form-control" id="summernote-whatWeDo" style="display: none;"><?php echo $user->company->whatWeDo; ?></textarea>

          <div class="fs-14 fs-14 text">
            <?php echo $user->company->whatWeDo; ?>

          </div>
        </div>
      </form>
      <form class="firstform">
        <?php echo csrf_field(); ?>
        <div class="border-bottom py-3" id="editSpecialties">
          <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Specialities</h2>
            <a href="javascript:;" class="text_grey_999 me-2 editSpecialties" role="button" data-bs-toggle="tooltip"
              data-bs-placement="top" title="Edit Info">
              <i class="fa-solid fa-pencil "></i>
            </a>
            <div class="me-2" id='saveBtn5' style='display: none;'>
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Update" type="submit"
                class="text_grey_999 border-0 bg-transparent p-0">
                <i class="fas fa-check"></i>
              </button>
            </div>
            <div class="">
              <button data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel" type="button"
                id="cancel-btn-5" class="text_grey_999 border-0 bg-transparent p-0" style="display: none;">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </div>
          </div>
          <div class="fs-14 fs-14 text">
            <?php if(isset(auth()->user()->company)): ?>
              <?php echo $user->company->specialties; ?>

            <?php endif; ?>
          </div>
          <textarea name="specialties" class="form-control" id="summernote-specialties" style='display: none;'><?php echo e($user->company->specialties); ?></textarea>
          <input type="hidden" name="source" value="api" />
        </div>
      </form>

      <div class="mb-4 py-3 border-bottom">
        <form id="skillsForm">
          <?php echo csrf_field(); ?>
          <div id="skills">
            <div class="d-flex aling-items-center mb-4">
              <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Industry Skilled in</h2>
              <a href="javascript:;" class="text_grey_999 editSkill" role="button" data-bs-toggle="tooltip"
                data-bs-placement="top" title="Edit Info">
                <i class="fa-solid fa-pencil "></i>
              </a>
              <div class="" style='display: none' id='skills-save'>
                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"
                  class="text_grey_999 border-0 bg-transparent p-0 me-2"><i class="fas fa-check"></i></button>
              </div>
              <div class="" style='display: none;' id='skills-cancel'>
                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                  class="text_grey_999 border-0 bg-transparent p-0"><i class="fa-solid fa-xmark"></i></button>
              </div>
            </div>
            <input type="hidden" name="source" value="api" />
            <input type="hidden" value="<?php echo e($user->company->features); ?>" id="skills-hidden-input" />
            <input type="hidden" value="<?php echo e($category); ?>" id="skills-all-hidden-input" />
            <ul class="tags text">
              <?php if(isset(auth()->user()->skills)): ?>

                <?php $__currentLoopData = $user->company->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <a href="javascript:void 0;" return false;"><?php echo e($row->name); ?></a>
                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </ul>
            <div class="txt-editor">

              <select name="category[]" class="select2-multiple form-control skilled-select__2" id="select2"
                multiple>
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($row->id); ?>"
                    <?php $__currentLoopData = $user->company->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row->id == $col->id): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                    <?php echo e($row->name); ?>

                  </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>

          </div>
        </form>
      </div>
      <div id="recentjobs">
        <?php if(count($post) > 0): ?>
          <div class="row my-3 justify-content-between align-items-center">
            <div class="col-md-8 mb-3 mb-md-0">
              <h2 class="fw-500 text_primary fs-5">Recently Posted Jobs</h2>
            </div>
            <div class="col-md-4 text-md-end">
              <a href="<?php echo e(route('company.jobs')); ?>" class="btn_viewall fw-500 px-4 py-2 d-inline-block">View
                All</a>
            </div>
          </div>
          <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>" class="recentlyPostedJobsContent">
              <div class="theme_box_2 p-3 mb-4 ">
                <div>
                  <div class="d-md-flex mb-3">
                    <div class="me-3">
                      <?php if(isset($row->banner)): ?>
                        <img src="<?php echo e(asset('storage/' . $row->banner)); ?>" alt=""
                          class="candidate_thumb rounded-50"s>
                      <?php else: ?>
                        <img src="<?php echo e(asset('images/profile-img.svg')); ?>" alt=""
                          class="candidate_thumb rounded-50"s>
                      <?php endif; ?>
                    </div>
                    <div>
                      <p class="view_profile_destination mb-1">
                        <?php echo e($row->post); ?>

                      </p>
                      <h4 class="view_profile_description">
                        <?php echo \Illuminate\Support\Str::limit($row->description, 150, $end = '...'); ?>

                      </h4>
                    </div>
                  </div>
                  <ul
                    class="d-flex flex-column flex-wrap flex-md-row align-items-lg-center justify-content-center profile_view_info"
                    style='gap: 16px'>
                    <li class=" fs-14 d-flex align-items-center text_black">
                      <i class="text_grey_999 fa-solid fa-calendar me-2"></i>
                      <span><?php echo e(\Carbon\Carbon::parse($row->created_at)->isoFormat('MMM DD YYYY')); ?></span>
                    </li>
                    <li class="fs-14 d-flex align-items-center text_black">
                      <i class="text_grey_999 fa-solid fa-location-dot me-2"></i>
                      <span class="shortName d-block"><?php echo e($row->location); ?></span>
                    </li>
                    <li class="text_black fs-14 d-flex align-items-center">
                      <span class="me-2">Posted by :</span>
                      <span class="me-2"><img src="<?php echo e(asset('storage/' . $row->company->logo)); ?>"
                          alt="" class="rounded-50 rounded_img_xxm"></span>
                      <span class="text_primary"><?php echo e($row->company->name); ?></span>
                    </li>
                  </ul>
                </div>
              </div>
            </a>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <div class="text-center mt-5">
            <a href="#" class="btn_viewall fw-500 px-4 py-2" id="loadMore">Load
              More</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-4 offset-lg-0 mt-3 mt-xl-0">
    <div class="dashboard_content bg-white rounded_10 ">
      <div class="border-bottom p-3 ">
        <div class="d-flex aling-items-center ">
          <h2 class="fw-500 fs-14 align-self-center ">Contact Details</h2>
          <a href="javascript:;" role="button" data-bs-toggle="modal" data-bs-target="#editContactInfo"
            class="d-inline-block ms-auto text_grey_999 ">
            <i class="fa-solid fa-pencil"></i>
          </a>
          <!-- Modal -->
          <div class="modal fade" id="editContactInfo" tabindex="-1" aria-labelledby="editContactInfoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Contact Details</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="<?php echo e(route('company.profile.update')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="row gy-3">
                      <div class="col-lg-6">
                        <label for="address" class="form-label">Company
                          Name</label>
                        <input type="text" class="form-control" name="name" value="<?php echo e($user->company->name); ?>">
                      </div>
                      
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Phone</label>
                        <div class="single-field full-width phone-input-flag d-flex ">
                          
                          <input type="tel" class="mobile-number form-control fs-14 h-50px"
                            style="color: transparent;" name="country_code"
                            value="<?php echo e(auth()->user()->company->country_code); ?>" required>
                          <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                            placeholder="Phone Number" name="phone" maxlength="11"
                            value="<?php echo e(auth()->user()->company->phone); ?>" required>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">ABN</label>
                        <input type="text" maxlength="11" class="form-control" name="abn"
                          value="<?php echo e($user->company->abn); ?>">
                      </div>
                      <div class="col-lg-6">
                        <label for="acn" class="form-label ">ACN</label>
                        <input type="text" maxlength="11" class="form-control" name="acn"
                          value="<?php echo e($user->company->acn); ?>">
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Industry</label>
                        <input type="text" class="form-control" name="industry"
                          value="<?php echo e($user->company->industry); ?>">
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label">Company Size</label>
                        <select class="form-control" name="cSizeFrom">
                          <option value="10-25">10-25</option>
                          <option value="26-50">26-50</option>
                          <option value="51-100">51-100</option>
                          <option value="101-300">101-300</option>
                          <option value="301-500">301-500</option>
                          <option value="500+">500+</option>
                        </select>
                        
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Type</label>
                        
                        <select name="type" id="" class="form-select">
                          <option selected disabled>Please select company type</option>
                          <option value="Sole Proprietorship" <?php if($user->company->type == 'Sole Proprietorship'): ?> selected <?php endif; ?>>Sole
                            Proprietorship</option>
                          <option value="General Partnership" <?php if($user->company->type == 'General Partnership'): ?> selected <?php endif; ?>>General
                            Partnership</option>
                          <option value="Limited Partnership (LP)" <?php if($user->company->type == 'Limited Partnership (LP)'): ?> selected <?php endif; ?>>
                            Limited
                            Partnership (LP)</option>
                          <option value="Corporation" <?php if($user->company->type == 'Corporation'): ?> selected <?php endif; ?>>Corporation
                          </option>
                          <option value="Limited Liability Company (LLC)"
                            <?php if($user->company->type == 'Limited Liability Company (LLC)'): ?> selected <?php endif; ?>>Limited Liability
                            Company (LLC)</option>
                          <option value="Nonprofit Organization" <?php if($user->company->type == 'Nonprofit Organization'): ?> selected <?php endif; ?>>
                            Nonprofit
                            Organization</option>
                          <option value="Cooperative" <?php if($user->company->type == 'Cooperative'): ?> selected <?php endif; ?>>Cooperative
                          </option>
                        </select>
                      </div>
                      <div class="col-lg-6">
                        <label for="dateOfBirth" class="form-label ">Company Registered
                          Date</label>
                        <div class="position-relative">
                          
                          <input type="text" class="form-control datepicker fs-14 h-50px w-100" autocomplete="off"
                            value="<?php echo e($user->company->founded); ?>" id="dateOfBirth" name="founded" required=""
                            readonly>
                          <label class="calender-icon d-block modal-inner" for="dateOfBirth">
                            <i class="far fa-calendar-alt" aria-hidden="true"></i>
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Company Url</label>
                        <input type="text" class="form-control" name="website"
                          value="<?php echo e($user->company->website); ?>">
                      </div>
                      
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Facebook Url</label>
                        <input type="url" class="form-control" name="facebook"
                          value="<?php echo e($user->company->facebook); ?>">
                      </div>
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">Twitter Url</label>
                        <input type="url" class="form-control" name="twitter"
                          value="<?php echo e($user->company->twitter); ?>">
                      </div>
                      
                      <div class="col-lg-6">
                        <label for="address" class="form-label ">LinkedIn Url</label>
                        <input type="url" class="form-control" name="linkedIn"
                          value="<?php echo e($user->company->linkedIn); ?>">
                      </div>
                      <div class="col-lg-6">
                        <label for="instagramUrl" class="form-label ">Instagram Url</label>
                        <input type="url" class="form-control" id="instagramUrl" name="insta"
                          value="<?php echo e($user->company->insta); ?>">
                      </div>
                      
                      <div class="col-lg-6">
                        <label for="address" class="form-label fs-14 text-theme-primary fw-bold">Address*</label>
                        

                        <input id="searchInput" value="<?php echo e($user->company->headQuarter); ?>"
                          class="controls form-control input-login searchInput" name="headQuarter" type="text"
                          placeholder="" required autocomplete="off">
                        <input type="hidden" id="latitude" value="<?php echo e($user->company->lat); ?>" name="lat" />
                        <input type="hidden" id="longitude" value="<?php echo e($user->company->lng); ?>" name="lng" />
                      </div>
                      <div class="col-sm-4">
                        <label for="country" class="form-label fs-14 text-theme-primary fw-bold">Country</label>
                        <input type="text" class="form-control input-login" id="country" name="country"
                          value="<?php echo e($user->company->country); ?>" placeholder="" required>
                      </div>
                      <div class="col-sm-4">
                        <label for="city" class="form-label fs-14 text-theme-primary fw-bold">City</label>
                        <input type="text" class="form-control input-login" id="city" name="city"
                          placeholder="" value="<?php echo e($user->company->city); ?>" required>
                      </div>
                      <div class="col-sm-4">
                        <label for="zip_code" class="form-label fs-14 text-theme-primary fw-bold">Zip/Postal
                          Code</label>
                        <input type="text" class="form-control input-login" value="" id="zip_code"
                          name="postal_code" placeholder="<?php echo e($user->company->postal_code); ?>">
                      </div>
                      
                      <div class="col-lg-6" style="cursor: pointer;">
                        <label for="banner" class="form-label " style="cursor: pointer;">Company Banner</label>
                        <input type='file' id="bannerUpload" class="file-upload" name="banner"
                          accept=".png, .jpg, .jpeg" />
                      </div>
                      <div class="col-12 text-center">
                        <button type="submit" class="btn_viewall fw-500 px-4 py-2 d-inline-block">Save
                          changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-3 ">
        <ul class="row row-cols-1 gy-3 ">
          <li class="fs-14">
            <i class="fa-solid fa-building text_grey_999 me-2 "></i><?php echo e(auth()->user()->company->name); ?>

          </li>
          <li class="fs-14">
            <i class="fa-solid fa-envelope text_grey_999 me-2 "></i><?php echo e(auth()->user()->email); ?>

          </li>
          <li class="fs-14">
            <i class="fa-solid fa-phone text_grey_999 me-2 "></i><?php echo e(auth()->user()->company->country_code); ?>

            <?php echo e(auth()->user()->company->phone); ?>

          </li>
        </ul>
      </div>
      <div class="border-bottom p-3 ">
        <div class="d-flex aling-items-center ">
          <h2 class="fw-500 fs-14 align-self-center ">Others Details</h2>
        </div>
      </div>
      <div class="border-bottom p-3 ">
        <ul class="row row-cols-1 gy-3 ">
          <li class="d-flex fs-14 align-items-center text_black" style="gap: 6px;">
            <span>ABN : </span><?php echo e($user->company->abn); ?>

            
          </li>
          <li class="d-flex fs-14 align-items-center text_black" style="gap: 6px;">
            <span>ACN : </span><?php echo e($user->company->acn); ?>

          </li>
          <li class="d-flex fs-14 align-items-center text_black" style="gap: 6px;">
            <span>Industry : </span><?php echo e($user->company->industry); ?>

            
          </li>
          <li class="d-flex fs-14 align-items-center text_black" style="gap: 6px;">
            <span>Type : </span><?php echo e($user->company->type); ?>

            
          </li>
          <?php if($user->company->cSizeFrom != null): ?>
            <li class="d-flex fs-14 align-items-center text_black" style="gap: 6px;">
              <span>Company Size :
              </span><?php echo e($user->company->cSizeFrom); ?>

              
            </li>
          <?php else: ?>
          <?php endif; ?>
          <li class="fs-14">
            <?php if($user->company->headQuarter != null): ?>
              <span>Address : </span><?php echo e($user->company->headQuarter); ?>

              
          </li>
        <?php else: ?>
          <?php endif; ?>
          
        </ul>
      </div>
      <ul class="d-flex justify-content-between px-5 py-3 ">
        <li>
          <?php if($user->company->facebook != null): ?>
            <a href="<?php echo e($user->company->facebook); ?>" target="_blank"><i
                class="fa-brands fa-facebook-f text_primary "></i></a>
            
          <?php endif; ?>
        </li>
        <li>
          <?php if($user->company->twitter != null): ?>
            <a href="<?php echo e($user->company->twitter); ?>" target="_blank"><i
                class="fa-brands fa-twitter text_primary "></i></a>
            
          <?php endif; ?>
        </li>
        <li>
          <?php if($user->company->website != null): ?>
            <a href="<?php echo e($user->company->website); ?>" target="_blank"><i
                class="fa-solid fa-globe text_primary "></i></a>
            
          <?php endif; ?>
        </li>
        <li>
          <?php if($user->company->linkedIn != null): ?>
            <a href="<?php echo e($user->company->linkedIn); ?>" target="_blank"><i
                class="fa-brands fa-linkedin-in text_primary "></i></a>
            
          <?php endif; ?>
        </li>
        <li>
          <?php if($user->company->insta != null): ?>
            <a href="<?php echo e($user->company->insta); ?>" target="_blank">
              <img src="<?php echo e(asset('dashboard/images/instagram.svg')); ?>"alt=""></a>
            
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
  <script>
    $(document).ready(function() {
      let content = $(".recentlyPostedJobsContent");
      if (content.length <= 4) {
        $("#loadMore").hide();
      }
      $(".recentlyPostedJobsContent").slice(0, 4).show();
      $("#loadMore").on("click", function(e) {
        e.preventDefault();
        $(".recentlyPostedJobsContent:hidden").slice(0, 4).slideDown();
        if ($(".recentlyPostedJobsContent:hidden").length == 0) {
          $("#loadMore").hide();
        }
      });
    })
  </script>
  <script>
    $(document).ready(function() {

      $('.firstform').on('submit', function(e) {
        e.preventDefault();
        var userFormData = $(this).serialize();
        console.log(userFormData);
        $.ajax({
            url: "<?php echo e(route('company.profile.update')); ?>",
            type: "POST",
            data: userFormData,
            dataType: "json",
            encode: true,
          }).done(function(data) {
            successModal("Your Data Has Been Successfully Updated...");

          })
          .fail(function(error) {
            console.log(error);
            var errors = error.responseJSON;
            console.log(errors);

          });
      });
    });
  </script>

  <script>
    const createOption = ({
      value,
      name,
      selected
    }) => {
      if (selected) {
        return `<option value="${value}" selected="">${name}</option>`
      }
      return `<option value="${value}">${name}</option>`
    }

    $('.editSkill').click(function() {
      $.ajax({
          type: "GET",
          url: "<?php echo e(route('company.getCompCategory')); ?>",
        }).done(function(data) {
          console.log(data);
          const allSkills = data.skill
          const candidateSkills = data.candSkills
          const mapped = candidateSkills.map(skill => allSkills.find(allSkill => allSkill.id === skill
            .comp_cat_id).name)

          $('#skills .text').hide();
          $('#skills .txt-editor').show();
          $('#skills .txt-editor').focus();

          $('.txt-editor .select2-multiple').html(allSkills.map(skill => {
            return createOption({
              value: skill.id,
              name: skill.name,
              selected: mapped.includes(skill.name)
            })
          }).join(""))

          $('.txt-editor .select2-multiple').select2({
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
          });
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);
        });

      $(this).hide();
      $('#skills-cancel').click(function() {
        const skills = JSON.parse(document.querySelector("#skills-hidden-input").value)
        const allSkills = JSON.parse(document.querySelector("#skills-all-hidden-input").value)
        const mapped = skills.map(skill => skill.name)
        $('#skills .editSkill').show();
        $('#skills .text').show();
        $(this).hide();
        $('#skills .txt-editor').hide();
        $('#skills-save').hide();
        try {
          $('.txt-editor .select2-multiple').select2('destroy');
        } catch (errors) {
          console.log(errors)
        }

        $('.txt-editor .select2-multiple').html(allSkills.map(skill => {
          return createOption({
            value: skill.id,
            name: skill.name,
            selected: mapped.includes(skill.name)
          })
        }).join(""))

      }).show();
      $('#skills #skills-save').click(function() {
        $('#skills .editSkill').show();
        $('#skills-cancel').hide();
        $('#skills .text').show();
        $(this).hide();
        $('#secondform .txt-editor').hide();
        // $('.editSkill').show();
        $('#secondform .tags').show();
        // $('#skills-save').hide();
        $('#skills .txt-editor').hide();
        const items = document.querySelector('#skills .select2-selection__rendered')
        const spans = Array.from(items.querySelectorAll('li > span')).map((span) =>
          `<li><a>${span.innerText}</a></li>`).join("")
        $("#skills .tags").html(spans);
      }).show();
    });

    $('#skillsForm').on('submit', function(e) {
      e.preventDefault();
      var userFormData = $(this).serialize();
      // console.log(userFormData);
      $.ajax({
          type: "POST",
          url: "<?php echo e(route('company.profile.update')); ?>",
          data: userFormData,
          dataType: "json",
          encode: true,
        }).done(function(data) {
          successModal("Your Data Has Been Successfully Updated...");
        })
        .fail(function(error) {
          var errors = error.responseJSON;
          console.log(errors);

        });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('companypanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/companypanel/pages/profileSetup.blade.php ENDPATH**/ ?>