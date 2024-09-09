<?php $__env->startSection('content'); ?>
  <main>
    <section>
      <form action="<?php echo e(route('recruiter.list')); ?>">
        <div class="container pt-5 mt-4">
          <h1 class="fs-48 text-center fw-bold text-uppercase my-md-5 pb-4 pb-md-0">All recruiters</h1>
          <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4">
              <?php if(Auth::check()): ?>
                <?php if(auth()->user()->role != 'admin'): ?>
                  <p class="fs-14">
                    <a href="<?php echo e(route('company.dashboard')); ?>" class="text-primary">Dashboard</a>
                    <span>> Recruiters </span>
                  </p>
                <?php endif; ?>
              <?php endif; ?>
              <div class="row row-cols-1 form__search__box search-area mb-3 py-4 px-3 d-block" id="search_rec">
                

                <div class="col ">
                  <div class="position-relative">
                    <input type="text" name="search_rec" id="search-title" autocomplete="off"
                      class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3" 
                      placeholder="Enter recruiter name here" value="<?php echo e($search_word); ?>">
                    <img src="<?php echo e(asset('images/icon-search.svg')); ?>" alt="" class="img-fluid position-absolute">
                    <div id="search-title-search"
                      class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                    </div>
                  </div>
                </div>
                <div class="search-area mb-3 py-3 px-3 mb-3">
                  <div class="d-flex justify-content-between align-items-center">
                    <h2 class="fs-18 mb-0">
                      Features
                    </h2>
                    <a data-bs-toggle="collapse" href="#Designation" role="button"
                      aria-expanded="<?php if(count($value) > 0): ?> true <?php else: ?> false <?php endif; ?>"
                      aria-controls="Designation" id="collapseButtonOne"  class="">
                      <i class="fas fa-plus" aria-hidden="true"></i>
                    </a>
                  </div>
                  <div class="show" id="Designation">
                    <div class="mt-3">
                      <ul>
                        <?php $__currentLoopData = $comp_fea; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li class="d-flex justify-content-between align-items-center py-2">
                            <div class="form-check">
                              <input class="form-check-input rounded-pill" type="checkbox" value="<?php echo e($row->id); ?>"
                                name="search_skills[]" id="Laravel PHP Developer-<?php echo e($row->id); ?>"
                                <?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row->id == $col): ?>
                                            checked=checked
                                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                              <label class="form-check-label" for="Laravel PHP Developer-<?php echo e($row->id); ?>">
                                <?php echo e($row->name); ?>

                              </label>
                            </div>

                            
                          </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>

                <button class="login-btn default-btn btn w-100">
                  <i class="fas fa-filter" aria-hidden="true"></i>
                  Click here-Filter Search
                </button>
                <div class="mt-2 text-end">
                  <a href="javascript:void(0)" class="fs-14" id="recruiterReset">
                    Reset<i class="fas fa-sync ms-2" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-8">
              <div class="row align-items-center justify-content-between gy-3 mb-4">
                <div class="col-lg-4">
                  <h3 class="view_profile_description fs-16 mb-0">Showing
                    
                    <?php if(count($rec) > 0): ?>
                      1-
                    <?php endif; ?>
                    <?php echo e(count($rec)); ?> Of <?php echo e($rec->total()); ?> Recruiters
                  </h3>
                </div>
                <div class="col-lg-7">
                  <form action="<?php echo e(route('recruiter.list')); ?>" method="get">
                    <div class="d-flex justify-content-end">
                      <div class="me-3">
                        <select id="role" onchange="this.form.submit()" name="sort_by"
                          class="sort_input form-select">
                          <option selected value="">All</option>
                          <option value="1" <?php if($sort == 1): ?> selected <?php endif; ?>>
                            Last 24 hours</option>
                          <option value="3" <?php if($sort == 3): ?> selected <?php endif; ?>>
                            Last 3 Days</option>
                          <option value="7" <?php if($sort == 7): ?> selected <?php endif; ?>>
                            Last 7 Days</option>
                          <option value="14" <?php if($sort == 14): ?> selected <?php endif; ?>>
                            Last 14 Days</option>
                          <option value="30" <?php if($sort == 30): ?> selected <?php endif; ?>>
                            Last 30 Days</option>
                        </select>
                      </div>
                      <div>
                        <select id="role" onchange="this.form.submit()" name="per_page"
                          class="sort_input form-select">
                          <option value="">-Select-</option>
                          <option value="10" <?php if($pg == 10): ?> selected <?php endif; ?>>10
                            Per Page</option>
                          <option value="25" <?php if($pg == 25): ?> selected <?php endif; ?>>25
                            Per Page</option>
                          <option value="50" <?php if($pg == 50): ?> selected <?php endif; ?>>50
                            Per Page</option>
                          <option value="100" <?php if($pg == 100): ?> selected <?php endif; ?>>
                            100
                            Per Page</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-1 gy-lg-5 gy-4">
                <?php if(count($rec) > 0): ?>
                  <?php $__currentLoopData = $rec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                      <div class="new-recruter-box">
                        <?php if($row->user->banner != null): ?>
                          <img src="<?php echo e(asset('storage/' . $row->user->banner)); ?>" alt="profile-img"
                            class="user_banner img-fluid">
                        <?php else: ?>
                          <img src="<?php echo e(asset('dashboard/images/RecruiterSM.png')); ?>" alt=""
                            class="user_banner img-fluid">
                        <?php endif; ?>
                        <div class="text-center px-3 pb-4">
                          <?php if($row->avatar != null): ?>
                            <img src="<?php echo e(asset('storage/' . $row->avatar)); ?>" alt="profile-img" class="user_logo">
                          <?php else: ?>
                            <img src="<?php echo e(asset('images/profile-img.png')); ?>" alt="profile-img" class="user_logo">
                          <?php endif; ?>
                          
                          <h2 class="title"><?php echo e($row->name . ' ' . $row->lastName); ?></h2>
                          <?php if(isset($row->location)): ?>
                            <p class="location d-flex align-items-center justify-content-center">
                              <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10.858" height="14.605"
                                  viewBox="0 0 10.858 14.605">
                                  <g id="location-pin" transform="translate(-5.627 -1.238)">
                                    <path id="Path_3244" data-name="Path 3244"
                                      d="M15.352,8.971a2,2,0,1,0,2,2A2,2,0,0,0,15.352,8.971Zm0,3a1,1,0,1,1,1-1,1,1,0,0,1-1,1Z"
                                      transform="translate(-4.297 -4.3)" fill="#c4c4c4" />
                                    <path id="Path_3245" data-name="Path 3245"
                                      d="M14.894,2.827a5.429,5.429,0,0,0-8.388,6.8l3.774,5.794a.925.925,0,0,0,1.549,0L15.6,9.629a5.429,5.429,0,0,0-.71-6.8Zm-.127,6.257-3.712,5.7-3.712-5.7a4.43,4.43,0,1,1,7.424,0Z"
                                      transform="translate(0 0)" fill="#c4c4c4" />
                                  </g>
                                </svg>
                              </span>
                              <span><?php echo e($row->location); ?></span>
                            </p>
                          <?php endif; ?>
                          <?php if(isset($row->openPosts) and count($row->openPosts) > 0): ?>
                            <p class="job_type">
                              Open Jobs - (<?php echo e(count($row->openPosts)); ?>)
                            </p>
                          <?php else: ?>
                            
                            <p class="job_type">No Open Jobs</p>
                          <?php endif; ?>
                          <div class="d-flex justify-content-center button">
                            <a  href="<?php echo e(route('recruiter.detail', $row->slug)); ?>"
                              class="view_profile_button d-block w-100 text-center">View
                              Profile</a>
                            

                            <?php if(Auth::check()): ?>
                              <?php if(auth()->user()->role == 'company'): ?>
                                <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id) != null): ?>
                                  <?php if($row->CompRecRelation(auth()->user()->company->id, $row->id)->status == 1): ?>
                                    <a type="button" class="default-btn w-100 text-center btn-disabled"
                                      disabled>Connected</a>
                                  <?php else: ?>
                                    <a type="button" class="default-btn w-100 text-center btn-disabled"
                                      disabled>Request Sent </a>
                                  <?php endif; ?>
                                <?php else: ?>
                                  <a href="<?php echo e(route('company.recruiters.send', $row->id)); ?>"
                                    class="default-btn w-100 text-center">Connect</a>
                                <?php endif; ?>
                              <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="default-btn w-100 text-center">Connect</a>
                              <?php endif; ?>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <p>Recruiter not found</p>
                <?php endif; ?>

              </div>

              <div class="d-flex justify-content-center pt-5">
                <?php echo e($rec->appends(request()->except(['page', '_token']))->links()); ?>

              </div>

            </div>
          </div>
        </div>
      </form>
    </section>

  </main>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
  <script>
    function fitTextTitle(id) {
      var value = $("#para-" + id).html();
      console.log(value);
      $("#search-title").val(value);
    }

    const searchLogic = function() {

      $("#search-title-search").append("");

      formData = {
        value: $(this).val(),
      }
      // console.log(formData);
      $("#search-title-select").addClass('d-none');
      $("#search-title-location").addClass('d-none');
      $.ajax({
        type: "GET",
        url: "<?php echo e(route('searchRecruiterSmart')); ?>",
        data: {
          value: $('#search-title').val(),
        },
        dataType: "json",
        encode: true,
      }).done(function(data) {
        console.log(data);
        $("#search-title-search").removeClass('d-none');
        $("#search-title-search").html('');
        html = '';
        if (data['rec'].length == 0) {
          $("#search-title-search").html("No Record Found");
        } else {
          $.each(data['rec'], function(index, value) {
            html +=
              "<a class='d-block border-bottom py-2 fs-14' href='<?php echo e(route('recruiter.detail', '')); ?>/" +
              value['slug'] +
              "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
              ")'>" +
              value['name'] + "</a>";
          });
        }
        if ($("#search-title").val().length == 0) {
          $("#search-title-search").addClass('d-none');
        }
        $("#search-title-search").append(html);
        this.value = "";
      });
    }
    const getInterval = setInterval(() => {
      if ($('#search-title').length) {
        $('#search-title').unbind("keydown", searchLogic);
        $('#search-title').on("keydown", searchLogic);
      }
    }, 1000);


    $(function() {
      $("#search-title-hide").on("click", function(a) {
        // $("#search-title-search").addClass("d-none");
        a.stopPropagation()
      });
      $(document).on("click", function(a) {
        if ($(a.target).is("#search-title-search") === false) {
          $("#search-title-search").addClass("d-none");
        }
      });
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/recruiter/list.blade.php ENDPATH**/ ?>