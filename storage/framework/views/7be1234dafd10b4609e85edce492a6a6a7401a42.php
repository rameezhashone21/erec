<?php $__env->startSection('content'); ?>

  <main>
    <section>
      <div class="container pt-4">
        <div class="row justify-content-center py-4 mt-5">
          
          <div class="col-lg-8">
            <div class="row pb-3 align-items-center">
              
              <div class="col-lg-9 details">
                <?php if(Auth::check()): ?>
                  <?php if(auth()->user()->role != 'admin'): ?>
                    <div>
                      <?php if(auth()->user()->role === 'company'): ?>
                        <span>Back to </span> <a href="<?php echo e(route('company.dashboard')); ?>" class="text-primary">Dashboard</a>
                      <?php elseif(auth()->user()->role === 'rec'): ?>
                        <span>Back to </span> <a href="<?php echo e(route('dashboard')); ?>" class="text-primary">Dashboard</a>
                      <?php elseif(auth()->user()->role === 'user'): ?>
                        <span>Back to </span> <a href="<?php echo e(route('candidate.dashboard')); ?>"
                          class="text-primary">Dashboard</a>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                <?php endif; ?>
                <span class="title text-theme-primary fw-bold"><?php echo e($app->post); ?>

                  
                </span>
                <p class="fs-14 mb-3 pt-1">
                  <span class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="11.854" height="16.358" viewBox="0 0 11.854 16.358">
                      <g id="Group_424" data-name="Group 424" transform="translate(-738.406 -295.94)">
                        <path id="Path_3146" data-name="Path 3146"
                          d="M744.387,295.941a5.861,5.861,0,0,1,5.594,7.626,23.706,23.706,0,0,1-3.528,6.361q-.7,1-1.442,1.962c-.39.508-.918.554-1.279.072a35.358,35.358,0,0,1-4.9-7.956A5.9,5.9,0,0,1,744.387,295.941Zm-.035,15.76c.777-1.08,1.518-2.064,2.21-3.083a20.437,20.437,0,0,0,2.8-5.237,4.9,4.9,0,0,0-1.225-5.165,5.009,5.009,0,0,0-5.126-1.443,5.183,5.183,0,0,0-3.519,7.092A33.941,33.941,0,0,0,744.352,311.7Z"
                          transform="translate(0 0)" fill="#333" />
                        <path id="Path_3147" data-name="Path 3147"
                          d="M763.885,317.774a3.228,3.228,0,1,1-3.268,3.218A3.231,3.231,0,0,1,763.885,317.774Zm-.038,5.789a2.55,2.55,0,0,0,2.573-2.535,2.574,2.574,0,1,0-2.573,2.535Z"
                          transform="translate(-19.506 -19.175)" fill="#333" />
                      </g>
                    </svg>
                    <?php echo e($app->location); ?></span>

                  <span class="px-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16.785" height="12.194" viewBox="0 0 16.785 12.194">
                      <g id="Group_426" data-name="Group 426" transform="translate(-829.349 -242.086)">
                        <path id="Path_3150" data-name="Path 3150"
                          d="M843.625,243.989c.261-.04.5-.076.742-.114a.285.285,0,0,1,.372.267l.29,1.8h.725c.292,0,.379.087.379.381q0,3.78,0,7.559c0,.316-.081.4-.393.4H832.115a.344.344,0,0,1-.406-.3q-1.166-3.628-2.331-7.256c-.073-.226-.01-.343.23-.42l8.6-2.762,4.4-1.413c.31-.1.4-.052.5.263Zm-9.612,9.724h9.832a2.067,2.067,0,0,1,1.724-1.723v-3.767a2.032,2.032,0,0,1-1.719-1.716h-9.838a2.051,2.051,0,0,1-1.716,1.724v3.761A2.05,2.05,0,0,1,834.013,253.713Zm10.211-9.251-9.163,1.458v.012h9.4Zm-1.593-1.75-8.715,2.8.008.028,9.149-1.458ZM831.1,246.548l.6,3.778.018,0v-3.87Zm-1.123.226,1.109,3.47.033-.008-.579-3.644Zm14.445-.269a1.392,1.392,0,0,0,1.149,1.142v-1.142Zm1.153,6.07c-.529.029-1.176.682-1.134,1.138h1.134Zm-13.28-6.071v1.143a1.379,1.379,0,0,0,1.133-1.143Zm1.145,7.209c-.119-.6-.729-1.188-1.145-1.12v1.12Z"
                          transform="translate(0)" fill="#333" />
                        <path id="Path_3151" data-name="Path 3151"
                          d="M1086.366,415.824a3.72,3.72,0,0,1-.462,1.85,2.267,2.267,0,0,1-.348.454,1.188,1.188,0,0,1-1.781-.009,2.629,2.629,0,0,1-.68-1.339,4.014,4.014,0,0,1,.24-2.613,2.4,2.4,0,0,1,.416-.614,1.2,1.2,0,0,1,1.867.019,2.918,2.918,0,0,1,.691,1.6C1086.34,415.389,1086.347,415.608,1086.366,415.824Zm-.558,0a3.612,3.612,0,0,0-.216-1.232,1.743,1.743,0,0,0-.477-.735.609.609,0,0,0-.871-.008,1.744,1.744,0,0,0-.41.555,3.416,3.416,0,0,0,0,2.83,1.743,1.743,0,0,0,.409.556.594.594,0,0,0,.878-.016,2.089,2.089,0,0,0,.38-.522A3.2,3.2,0,0,0,1085.808,415.822Z"
                          transform="translate(-245.741 -165.71)" fill="#333" />
                        <path id="Path_3152" data-name="Path 3152"
                          d="M980.2,467.714c.145,0,.29-.006.435,0a.936.936,0,0,1,.892.9.922.922,0,0,1-.849.973,6.733,6.733,0,0,1-.962,0,.922.922,0,0,1-.839-.966.937.937,0,0,1,.888-.909C979.91,467.708,980.055,467.714,980.2,467.714Zm.017,1.335c.119,0,.238,0,.357,0a.383.383,0,0,0,.394-.391.376.376,0,0,0-.393-.39c-.248-.007-.5-.008-.744,0a.381.381,0,0,0-.4.389.387.387,0,0,0,.394.392C979.958,469.054,980.088,469.049,980.217,469.049Z"
                          transform="translate(-144.876 -218.605)" fill="#333" />
                        <path id="Path_3153" data-name="Path 3153"
                          d="M1210.2,467.2a4.008,4.008,0,0,1,.631.058.94.94,0,0,1-.171,1.839,7.17,7.17,0,0,1-.963,0,.926.926,0,0,1-.839-.967.938.938,0,0,1,.89-.907c.15-.008.3,0,.451,0Zm-.017.57c-.129,0-.259-.007-.387,0a.39.39,0,0,0,0,.779c.258.01.517.01.775,0a.39.39,0,0,0,0-.78C1210.447,467.766,1210.317,467.772,1210.188,467.772Z"
                          transform="translate(-367.705 -218.112)" fill="#333" />
                        <path id="Path_3154" data-name="Path 3154"
                          d="M1117.837,455.489c.085.021.151.033.215.054.189.061.2.094.13.281-.041.11-.089.124-.2.079a.686.686,0,0,0-.329-.056.28.28,0,0,0-.2.151c-.018.054.046.165.105.209a2.077,2.077,0,0,0,.333.164.6.6,0,0,1,.374.744.637.637,0,0,1-.461.414c0,.046,0,.092,0,.138,0,.181-.078.244-.247.181-.039-.014-.07-.1-.068-.159,0-.108-.024-.162-.14-.172a.884.884,0,0,1-.206-.064c-.114-.04-.141-.1-.1-.227.051-.141.1-.163.244-.1a.913.913,0,0,0,.42.05.254.254,0,0,0,.173-.165.307.307,0,0,0-.09-.225.807.807,0,0,0-.226-.131c-.087-.045-.18-.081-.262-.133a.531.531,0,0,1,.077-.954.159.159,0,0,0,.123-.194c-.016-.118.019-.18.158-.18s.189.051.172.184A.91.91,0,0,0,1117.837,455.489Z"
                          transform="translate(-278.73 -206.475)" fill="#333" />
                      </g>
                    </svg>
                    <?php echo e($app->offer_salary); ?>$</span>
                </p>
                <p class="fs-14 mb-0 pt-1">
                  <?php if($app->job_type == 'Full Time'): ?>
                    <span class="full-time">Full Time</span>
                  <?php elseif($app->job_type == 'Full Time'): ?>
                    <span class="Part Time">Part Time</span>
                  <?php endif; ?>
                </p>

              </div>
            </div>
            <img src="<?php echo e(asset('storage/' . $app->banner)); ?>" alt="" class='w-100 d-block mb-4'
              style='height: 200px; object-fit: cover;'>
            <div class="mb-4">
              <h4 class="fs-18 fw-600 mb-3">Job Description</h4>
              <p class="fs-14 text-secondary mb-0"><?php echo $app->description; ?></p>
            </div>
            <div class="mb-4">
              <h4 class="fs-18 fw-600 mb-3">Key Resposibilities</h4>
              <div class="fs-14 text-secondary list-bullet mb-0">
                <?php echo $app->key_responsibility; ?>

              </div>
            </div>

            <div class="mb-4">
              <h4 class="fs-18 fw-600 mb-3">Skills & Experience</h4>
              <div class="fs-14 text-secondary list-bullet mb-0">
                <?php echo $app->skill_exp; ?>

              </div>
            </div>

            <div class="mb-4">
              <h4 class="fs-18 fw-600 mb-3">Skill Requirements</h4>
              <ul class="tags d-flex flex-wrap align-items-center">
                <?php $__currentLoopData = $app->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <?php echo e($skills->name); ?>

                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>

            
            

            <div class="social-btn-sp social__icons__detail d-flex align-items-center">
              <span class="fs-18 fw-600 pe-3">Share on</span>
              <?php echo Share::page(route('job.listing.details', $app->slug))->facebook()->twitter()->whatsapp()->linkedin(); ?>

            </div>
          </div>
          <div class="col-lg-4 mt-3 mt-lg-0">
            <div class="d-flex justify-content-md-between text-center align-items-center pb-4">
              
              
              <?php if(auth()->check()): ?>
                
                <?php if(auth()->user()->candidate != null): ?>
                  <?php if(auth()->user()->role == 'user'): ?>
                    <?php if($app->jobApp == '[]'): ?>
                      <a class="btn open-apply-modal default-btn default-btn-swip w-100 mb-3" id="<?php echo e($app->id); ?>"
                        href="javascript:;">
                        Apply
                        Now</a>
                    <?php else: ?>
                      <button disabled="" style="opacity: 0.5;" class="btn open-apply-modal default-btn w-100 mb-3"
                        id="18" href="javascript:;">Applied</button>
                    <?php endif; ?>
                  <?php endif; ?>
                <?php endif; ?>
                
              <?php else: ?>
                <a class="btn default-btn w-100 mb-3" href="<?php echo e(route('job.session')); ?>">Apply
                  Now</a>
              <?php endif; ?>
              <?php if(Auth::check()): ?>
                <?php if(isset(auth()->user()->candidate)): ?>
                  <?php if(isset(auth()->user()->wishlist($app->id)->post_id)): ?>
                    <div class="singlePost">
                      <a href="" onclick="wishlist_singlePost(<?php echo e($app->id); ?>)"
                        class="btn default-btn-2 active mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.976" height="17.103"
                          viewBox="0 0 18.976 17.103">
                          <g id="wishlist-empty" transform="translate(0.499 0.502)">
                            <path id="Path_3141" data-name="Path 3141"
                              d="M631.778,1183.621c.153-.142.307-.268.442-.412a6.117,6.117,0,0,1,1.543-1.256,4.683,4.683,0,0,1,3.929-.37,4.378,4.378,0,0,1,2.191,1.76,5,5,0,0,1,.889,3.247,6.762,6.762,0,0,1-.687,2.43,13.113,13.113,0,0,1-1.986,2.93,28.02,28.02,0,0,1-3.865,3.625c-.774.609-1.568,1.193-2.353,1.788-.049.037-.085.058-.147.012a46.343,46.343,0,0,1-4.389-3.529,20.541,20.541,0,0,1-2.857-3.184,9.548,9.548,0,0,1-1.44-2.864,5.1,5.1,0,0,1,.055-3.249,4.872,4.872,0,0,1,2.108-2.636,4.442,4.442,0,0,1,3.765-.34,5.214,5.214,0,0,1,2.117,1.341C631.327,1183.152,631.557,1183.393,631.778,1183.621Z"
                              transform="translate(-622.811 -1181.309)" fill="none" stroke="#007ba7"
                              stroke-width="1" />
                          </g>
                        </svg>
                      </a>
                    </div>
                  <?php else: ?>
                    <div class="singlePost">
                      <a href="" onclick="wishlist_singlePost(<?php echo e($app->id); ?>)"
                        class="btn default-btn-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18.976" height="17.103"
                          viewBox="0 0 18.976 17.103">
                          <g id="wishlist-empty" transform="translate(0.499 0.502)">
                            <path id="Path_3141" data-name="Path 3141"
                              d="M631.778,1183.621c.153-.142.307-.268.442-.412a6.117,6.117,0,0,1,1.543-1.256,4.683,4.683,0,0,1,3.929-.37,4.378,4.378,0,0,1,2.191,1.76,5,5,0,0,1,.889,3.247,6.762,6.762,0,0,1-.687,2.43,13.113,13.113,0,0,1-1.986,2.93,28.02,28.02,0,0,1-3.865,3.625c-.774.609-1.568,1.193-2.353,1.788-.049.037-.085.058-.147.012a46.343,46.343,0,0,1-4.389-3.529,20.541,20.541,0,0,1-2.857-3.184,9.548,9.548,0,0,1-1.44-2.864,5.1,5.1,0,0,1,.055-3.249,4.872,4.872,0,0,1,2.108-2.636,4.442,4.442,0,0,1,3.765-.34,5.214,5.214,0,0,1,2.117,1.341C631.327,1183.152,631.557,1183.393,631.778,1183.621Z"
                              transform="translate(-622.811 -1181.309)" fill="none" stroke="#007ba7"
                              stroke-width="1" />
                          </g>
                        </svg>
                      </a>
                    </div>
                    
                  <?php endif; ?>
                <?php endif; ?>
              <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn default-btn-2 mb-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18.976" height="17.103" viewBox="0 0 18.976 17.103">
                    <g id="wishlist-empty" transform="translate(0.499 0.502)">
                      <path id="Path_3141" data-name="Path 3141"
                        d="M631.778,1183.621c.153-.142.307-.268.442-.412a6.117,6.117,0,0,1,1.543-1.256,4.683,4.683,0,0,1,3.929-.37,4.378,4.378,0,0,1,2.191,1.76,5,5,0,0,1,.889,3.247,6.762,6.762,0,0,1-.687,2.43,13.113,13.113,0,0,1-1.986,2.93,28.02,28.02,0,0,1-3.865,3.625c-.774.609-1.568,1.193-2.353,1.788-.049.037-.085.058-.147.012a46.343,46.343,0,0,1-4.389-3.529,20.541,20.541,0,0,1-2.857-3.184,9.548,9.548,0,0,1-1.44-2.864,5.1,5.1,0,0,1,.055-3.249,4.872,4.872,0,0,1,2.108-2.636,4.442,4.442,0,0,1,3.765-.34,5.214,5.214,0,0,1,2.117,1.341C631.327,1183.152,631.557,1183.393,631.778,1183.621Z"
                        transform="translate(-622.811 -1181.309)" fill="none" stroke="#007ba7" stroke-width="1" />
                    </g>
                  </svg>
                </a>
              <?php endif; ?>
            </div>

            
            <div class="search-area mb-3 p-4 mb-3 shadow">
              <!-- <h2 class="fs-5 text-dark fw-bold pb-3">Companies In Similar Industries</h2> -->
              <ul>
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/date.svg')); ?>" alt="date" style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Date Posted </p>
                    <p class=" mb-0 text-grey fs-14 "><?php echo htmlspecialchars_decode(date('j<\s\up>S</\s\up> F Y', strtotime($app->created_at))); ?></p>
                  </div>
                </li>
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/location.svg')); ?>" alt="location" style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Location </p>
                    <p class=" mb-0 text-grey fs-14 "><?php echo e($app->location); ?></p>
                  </div>
                </li>
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/money.svg')); ?>" alt="money" style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Offered Salary</p>
                    <p class=" mb-0 text-grey fs-14 "> <?php echo e($app->offer_salary); ?>$ / month</p>
                  </div>
                </li>
                
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/experience.svg')); ?>" alt="experience" style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Experience </p>
                    <p class=" mb-0 text-grey fs-14 "> <?php echo e($app->experience); ?></p>
                  </div>
                </li>
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/gender.svg')); ?>" alt="gender" style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Gender </p>
                    <p class=" mb-0 text-grey fs-14 text-capitalize"><?php echo e($app->gender); ?></p>
                  </div>
                </li>
                <li class="d-flex align-items-center pb-4">
                  <img src="<?php echo e(asset('imgs/qualification.svg')); ?>" alt="qualification"
                    style='width: 30px; height: 20px'>
                  <div class="ps-4">
                    <p class="mb-0 fw-600 fs-18"> Qualification </p>
                    <p class=" mb-0 text-grey fs-14 "><?php echo e($app->qualification); ?></p>
                  </div>
                </li>
              </ul>
            </div>

            <div class="search-area mb-3 p-4 mb-3 shadow">
              <h2 class="fs-5 text-dark fw-bold pb-3">Job Skills</h2>
              <ul class="tags d-flex flex-wrap align-items-center">
                <?php $__currentLoopData = $app->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skills): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li>
                    <?php echo e($skills->name); ?>

                  </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
            <?php if($app->company != null): ?>
              <div class="search-area mb-3 p-4 mb-3 shadow">
                <!-- <h2 class="fs-5 text-dark fw-bold pb-3">People Also Viewed</h2> -->
                <ul>
                  <?php if($app->company != null): ?>
                    <li class="d-lg-flex align-items-center">
                      <div>
                        <img src="<?php echo e(asset('storage/' . $app->company->logo)); ?>" alt="bag"
                          class="profile__image__detail">
                      </div>
                      <div class="ps-3">
                        <p class="mb-0 fw-bold"><?php echo e($app->company->name); ?></p>
                        <p class="mb-0"><?php echo e($app->company->type); ?></p>
                        <a href="<?php echo e(route('job.details', $app->company->slug)); ?>"
                          class=" mb-0 text-theme-primary fs-14 "> View Profile</a>
                      </div>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10">
            <h3 class="mb-4 fs-3 fw-bold text-theme-primary ">Related Jobs</h3>
            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="card horizontal-view py-3 mb-3 ps-3">
                <div class="card-body row align-items-center justify-content-between">
                  <div class="col-lg-7">
                    <div class="details">
                      <a href="<?php echo e(route('job.listing.details', $row->slug)); ?>">
                        <span class="title fw-bold text-theme-primary"><?php echo e($row->post); ?></span>
                      </a>
                      <h6 class="fw-bold text-theme-primary">
                        <?php if($row->company != null): ?>
                          <?php echo e($row->company->name); ?>

                        <?php endif; ?>
                      </h6>
                      <p style="font-size: 16px;">
                        <?php echo \Illuminate\Support\Str::limit($row->description, 150, $end = '...'); ?>

                      </p>
                      <ul>
                        <li class="d-lg-flex d-md-flex">
                          <div class="fs-14">Job Type </div>
                          <div class="fs-14"><?php echo e($row->job_type); ?></div>
                        </li>
                        <li class="d-lg-flex d-md-flex">
                          <div class="fs-14">Experience </div>
                          <div class="fs-14"><?php echo e($row->experience); ?></div>
                        </li>
                        <li class="d-lg-flex d-md-flex">
                          <div class="fs-14">Location </div>
                          <div class="fs-14"><?php echo e($row->location); ?> </div>
                        </li>
                        <li class="d-lg-flex d-md-flex">
                          <div class="fs-14 mb-2 mb-md-0">Skills </div>
                          <div class="fs-14 d-flex flex-wrap" style="gap: 14px 10px">
                            <?php $__currentLoopData = $row->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <span class="">
                                <span id="pointer-alt"><?php echo e($item->name); ?></span>
                              </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="col-lg-3 align-self-start mt-3 mt-md-lg-0">
                    <div class="btns d-flex flex-column">
                      
                      <?php if(auth()->check()): ?>
                        
                        <?php if(auth()->user()->candidate != null): ?>
                          <?php if(auth()->user()->role == 'user'): ?>
                            <?php if($row->jobApp == '[]'): ?>
                              <a class="btn open-apply-modal default-btn mb-3" id="<?php echo e($row->id); ?>"
                                href="javascript:;">Apply
                                Now</a>
                            <?php else: ?>
                              <button disabled="" style="opacity: 0.5;"
                                class="btn open-apply-modal default-btn w-100 mb-3" id="18"
                                href="javascript:;">Applied</button>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php endif; ?>
                        
                      <?php else: ?>
                        <a class="btn default-btn mb-3" href="<?php echo e(route('job.session')); ?>">Apply
                          Now</a>
                      <?php endif; ?>
                      <div class="social-btn-sp d-flex justify-content-between align-items-center ">
                        <?php echo Share::page(route('job.listing.details', $row->slug))->facebook()->twitter()->whatsapp()->linkedin(); ?>

                      </div>
                      
                      <div class="d-flex justify-content-center align-items-center mt-3" style="gap: 0 20px;">
                        
                        <?php if($row->company != null): ?>
                          <a href="mailto:<?php echo e($row->company->user->email); ?>" class="icons__box"><i
                              class="fas fa-envelope"></i></a>
                        <?php endif; ?>
                        <?php if(Auth::check()): ?>
                          <?php if(isset(auth()->user()->candidate)): ?>
                            <?php if(isset(auth()->user()->wishlist($row->id)->post_id)): ?>
                              <div class="wishlist_box-<?php echo e($row->id); ?>">
                                <a href="" class="icons__box active"
                                  onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                  <i class="fas fa-heart "></i>
                                </a>
                              </div>
                            <?php else: ?>
                              <div class="wishlist_box-<?php echo e($row->id); ?>">
                                <a href="" class="icons__box" onclick="wishlist_post(<?php echo e($row->id); ?>)">
                                  <i class="fas fa-heart"></i>
                                </a>
                              </div>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php else: ?>
                          <a href="<?php echo e(route('login')); ?>" class="icons__box"><i class="fas fa-heart"></i>
                          </a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <p class="text-center mb-0 py-4">
              <a href="<?php echo e(route('job.browse')); ?>" class="btn default-btn ">Other Posted Jobs</a>
            </p>
          </div>
        </div>
      </div>
    </section>

  </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/job/jobListingDetails.blade.php ENDPATH**/ ?>