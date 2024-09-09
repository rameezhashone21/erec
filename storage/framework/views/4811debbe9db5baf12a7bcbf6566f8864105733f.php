

<?php $__env->startSection('content'); ?>
  <main>

    <section class="banner pt-5 mt-5 pt-md-0 mt-md-0">
      <div class="container">
        <div class="row">
          <div class="col-md-7 my-auto">
            <div class="banner-content">
              <span>Solution for Recruiter, Employer and Applicant</span>
              <h1>Post a Job and find the best candidate</h1>
              <p>E-REC is about fusing technology with the latest recruitment knowledge to help
                applicants, recruiters, and Employers engage with each other with ease.</p>
              <a class="default-btn btn" href="<?php echo e(route('recruiter.list')); ?>">Find Recruiters</a>
            </div>
          </div>
          <div class="col-md-5">
            <img src="<?php echo e(asset('imgs/recruitercir.png')); ?>" class="img-fluid" alt="">
          </div>
        </div>
      </div>
      <div class="bubbles">
        <svg class="rat-rect" xmlns="http://www.w3.org/2000/svg" width="75" height="75" viewBox="0 0 269 269">
          <circle id="Ellipse_6" data-name="Ellipse 6" cx="134.5" cy="134.5" r="134.5" fill="#a8e1a1">
          </circle>
        </svg>

        <svg class="rat-rect-2" xmlns="http://www.w3.org/2000/svg" width="146" height="146" viewBox="0 0 146 146">
          <circle id="Ellipse_7" data-name="Ellipse 7" cx="73" cy="73" r="73" fill="#4dc1ba">
          </circle>
        </svg>

        <svg class="rat-rect-3" xmlns="http://www.w3.org/2000/svg" width="122" height="122" viewBox="0 0 122 122">
          <circle id="Ellipse_8" data-name="Ellipse 8" cx="61" cy="61" r="61" fill="#007ba7">
          </circle>
        </svg>
        <svg class="rat-rect-4" xmlns="http://www.w3.org/2000/svg" width="122" height="122" viewBox="0 0 122 122">
          <circle id="Ellipse_8" data-name="Ellipse 8" cx="61" cy="61" r="61" fill="#000">
          </circle>
        </svg>
        <svg class="rat-rect-5" xmlns="http://www.w3.org/2000/svg" width="122" height="122" viewBox="0 0 122 122">
          <circle id="Ellipse_8" data-name="Ellipse 8" cx="61" cy="61" r="61" fill="#333">
          </circle>
        </svg>
      </div>
    </section>
    <section class="socialism mt-5 mt-md-0">
      <div class="container">
        <div class="row py-md-5 py-4">
          <div class="col-12">
            <span>Browse Jobs By</span>
            <h2>Categories</h2>
            <p><?php echo e($postsCount); ?> jobs live - <?php echo e($postsToday); ?> added today</p>
          </div>
        </div>
        <div class="row g-md-5 gy-3">
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <div class="panel  d-flex justify-content-start align-items-center">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="37"
                    height="37" viewBox="0 0 37 37">
                    <defs>
                      <clipPath id="clip-path">
                        <rect id="Rectangle_98" data-name="Rectangle 98" width="37" height="37"
                          transform="translate(307 931)" fill="#333" />
                      </clipPath>
                    </defs>
                    <g id="Group_127" data-name="Group 127" transform="translate(-307 -931)" clip-path="url(#clip-path)">
                      <path id="Path_280" data-name="Path 280"
                        d="M341.973,949.7a.543.543,0,0,0-.543.543v14.676a1,1,0,0,1-1,1H327.641a1,1,0,0,1-1-1V963.47a.543.543,0,0,0-1.086,0v1.444a2.073,2.073,0,0,0,.256,1H309.267a.181.181,0,0,1-.181-.181v-13.1a.543.543,0,0,0-1.086,0v13.1A1.268,1.268,0,0,0,309.267,967H340.43a2.089,2.089,0,0,0,2.086-2.086V950.238A.543.543,0,0,0,341.973,949.7Z"
                        fill="#333" />
                      <path id="Path_281" data-name="Path 281"
                        d="M340.431,941.662h-5.25v-4.39a.544.544,0,0,0-.159-.384l-6.729-6.729a.547.547,0,0,0-.384-.159H309.268A1.268,1.268,0,0,0,308,931.267v19.192a.543.543,0,1,0,1.086,0V931.267a.181.181,0,0,1,.181-.181h18.1v4.738a1.993,1.993,0,0,0,1.991,1.991H334.1v3.847h-6.453a2.089,2.089,0,0,0-2.086,2.087v.085H316.95a.543.543,0,1,0,0,1.086h8.606v3.689H316.95a.543.543,0,1,0,0,1.086h8.606v3.688H316.95a.543.543,0,0,0,0,1.087h8.606v3.688H316.95a.543.543,0,0,0,0,1.087h8.606V961.3a.543.543,0,1,0,1.086,0V943.749a1,1,0,0,1,1-1h12.789a1,1,0,0,1,1,1v4.317a.544.544,0,0,0,1.087,0v-4.317A2.09,2.09,0,0,0,340.431,941.662Zm-11.979-5.838v-3.97l4.875,4.875h-3.97A.906.906,0,0,1,328.452,935.824Z"
                        fill="#333" />
                      <path id="Path_282" data-name="Path 282"
                        d="M339.858,945.433a1.269,1.269,0,0,0-1.267-1.267h-9.016a1.269,1.269,0,0,0-1.268,1.267V948.5a1.27,1.27,0,0,0,1.268,1.268h9.016a1.269,1.269,0,0,0,1.267-1.268Zm-1.086,3.066a.181.181,0,0,1-.181.181h-9.016a.181.181,0,0,1-.181-.181v-3.066a.181.181,0,0,1,.181-.181h9.016a.181.181,0,0,1,.181.181Z"
                        fill="#333" />
                      <path id="Path_283" data-name="Path 283"
                        d="M328.307,954.226a1.214,1.214,0,0,0,1.213,1.213h1.034a1.214,1.214,0,0,0,1.212-1.213v-1.034a1.214,1.214,0,0,0-1.212-1.212H329.52a1.214,1.214,0,0,0-1.213,1.212Zm1.087-1.034a.126.126,0,0,1,.126-.126h1.034a.126.126,0,0,1,.126.126v1.034a.126.126,0,0,1-.126.127H329.52a.126.126,0,0,1-.126-.127Z"
                        fill="#333" />
                      <path id="Path_284" data-name="Path 284"
                        d="M335.812,953.192a1.214,1.214,0,0,0-1.212-1.212h-1.034a1.214,1.214,0,0,0-1.213,1.212v1.034a1.214,1.214,0,0,0,1.213,1.213H334.6a1.214,1.214,0,0,0,1.212-1.213Zm-1.086,1.034a.126.126,0,0,1-.126.127h-1.034a.126.126,0,0,1-.126-.127v-1.034a.126.126,0,0,1,.126-.126H334.6a.126.126,0,0,1,.126.126v1.034Z"
                        fill="#333" />
                      <path id="Path_285" data-name="Path 285"
                        d="M339.858,953.192a1.214,1.214,0,0,0-1.212-1.212h-1.034a1.214,1.214,0,0,0-1.213,1.212v1.034a1.214,1.214,0,0,0,1.213,1.213h1.034a1.214,1.214,0,0,0,1.212-1.213Zm-1.086,1.034a.126.126,0,0,1-.126.127h-1.034a.127.127,0,0,1-.127-.127v-1.034a.127.127,0,0,1,.127-.126h1.034a.126.126,0,0,1,.126.126Z"
                        fill="#333" />
                      <path id="Path_286" data-name="Path 286"
                        d="M328.307,958.654a1.214,1.214,0,0,0,1.213,1.213h1.034a1.214,1.214,0,0,0,1.212-1.213V957.62a1.214,1.214,0,0,0-1.212-1.212H329.52a1.214,1.214,0,0,0-1.213,1.212Zm1.087-1.034a.125.125,0,0,1,.126-.126h1.034a.125.125,0,0,1,.126.126v1.034a.126.126,0,0,1-.126.127H329.52a.126.126,0,0,1-.126-.127Z"
                        fill="#333" />
                      <path id="Path_287" data-name="Path 287"
                        d="M335.812,957.62a1.214,1.214,0,0,0-1.212-1.212h-1.034a1.214,1.214,0,0,0-1.213,1.212v1.034a1.214,1.214,0,0,0,1.213,1.213H334.6a1.214,1.214,0,0,0,1.212-1.213Zm-1.086,1.034a.126.126,0,0,1-.126.127h-1.034a.126.126,0,0,1-.126-.127V957.62a.125.125,0,0,1,.126-.126H334.6a.125.125,0,0,1,.126.126v1.034Z"
                        fill="#333" />
                      <path id="Path_288" data-name="Path 288"
                        d="M328.307,963.082a1.214,1.214,0,0,0,1.213,1.212h1.034a1.214,1.214,0,0,0,1.212-1.212v-1.034a1.214,1.214,0,0,0-1.212-1.213H329.52a1.214,1.214,0,0,0-1.213,1.213Zm1.087-1.034a.126.126,0,0,1,.126-.127h1.034a.126.126,0,0,1,.126.127v1.034a.126.126,0,0,1-.126.126H329.52a.125.125,0,0,1-.126-.126Z"
                        fill="#333" />
                      <path id="Path_289" data-name="Path 289"
                        d="M334.6,960.835h-1.034a1.214,1.214,0,0,0-1.213,1.213v1.034a1.214,1.214,0,0,0,1.213,1.212H334.6a1.214,1.214,0,0,0,1.212-1.212v-1.034A1.214,1.214,0,0,0,334.6,960.835Zm.126,2.247a.126.126,0,0,1-.126.126h-1.034a.126.126,0,0,1-.126-.126v-1.034a.126.126,0,0,1,.126-.127H334.6a.126.126,0,0,1,.126.127v1.034Z"
                        fill="#333" />
                      <path id="Path_290" data-name="Path 290"
                        d="M338.543,956.408h-.829a1.317,1.317,0,0,0-1.315,1.315v5.256a1.316,1.316,0,0,0,1.315,1.315h.829a1.316,1.316,0,0,0,1.315-1.315v-5.256A1.317,1.317,0,0,0,338.543,956.408Zm.229,6.571a.228.228,0,0,1-.229.229h-.829a.229.229,0,0,1-.229-.229v-5.256a.229.229,0,0,1,.229-.229h.829a.228.228,0,0,1,.229.229Z"
                        fill="#333" />
                      <path id="Path_291" data-name="Path 291"
                        d="M312.338,940.145h2.167a.543.543,0,1,0,0-1.086h-2.167a.543.543,0,1,0,0,1.086Z"
                        fill="#333" />
                      <path id="Path_292" data-name="Path 292"
                        d="M316.949,940.145H327.4a.543.543,0,1,0,0-1.086H316.949a.543.543,0,1,0,0,1.086Z"
                        fill="#333" />
                      <path id="Path_293" data-name="Path 293"
                        d="M312.338,944.92h2.167a.543.543,0,1,0,0-1.086h-2.167a.543.543,0,1,0,0,1.086Z"
                        fill="#333" />
                      <path id="Path_294" data-name="Path 294"
                        d="M312.338,949.7h2.167a.543.543,0,1,0,0-1.086h-2.167a.543.543,0,1,0,0,1.086Z" fill="#333" />
                      <path id="Path_295" data-name="Path 295"
                        d="M312.338,954.47h2.167a.543.543,0,1,0,0-1.087h-2.167a.543.543,0,0,0,0,1.087Z"
                        fill="#333" />
                      <path id="Path_296" data-name="Path 296"
                        d="M312.338,959.244h2.167a.543.543,0,1,0,0-1.086h-2.167a.543.543,0,1,0,0,1.086Z"
                        fill="#333" />
                    </g>
                  </svg>

                </div>
                <div class="icon-text">
                  <h6><?php echo e($row['class_name']); ?></h6>
                  <?php
                    $temp = $row['class_id'];
                    $count = \App\Models\Posts::where('status', 1)
                        ->where('class_id', $temp)
                        ->count();
                  ?>
                  <span>(<?php echo e($count); ?> open positions)</span>
                </div>
                <i class="fas fa-angle-right"></i>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </div>
      </div>
      <div class="blue-box"></div>
    </section>

    
    

    <section id="employers" class="employers">
      <div class="container-fluid">
        <div class="row py-5 justify-content-end">
          <div class="col-md-6">
            <div class="accordion-main">
              <span>What We Do</span>
              <h2 class="mb-3"> We Find Best Candidate
                For You Company</h2>
              <div class="accordion" id="accordionPanelsStayOpenExample">
                <?php if(count($faqs) > 0): ?>
                  <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button btn" type="button" data-bs-toggle="collapse"
                          data-bs-target="#panelsStayOpen-collapseOne<?php echo e($faq->id); ?>" aria-expanded="true"
                          aria-controls="panelsStayOpen-collapseOne<?php echo e($faq->id); ?>">
                          <img src="assets/imgs/Ellipse 1.svg" alt="">
                          <?php echo e($faq->heading); ?>

                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne<?php echo e($faq->id); ?>"
                        class="accordion-collapse collapse <?php if($key == 0): ?> show <?php endif; ?>"
                        aria-labelledby="panelsStayOpen-headingOne">
                        <div class="accordion-body">
                          <?php echo e($faq->subject); ?>

                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="col-md-5 my-auto">
            <img class="img-fluid" src="assets/imgs/Group 344.png" alt="">
          </div>
        </div>
      </div>
    </section>

    <section class="daily-progress">
      <div class="container">
        <div class="row py-md-5 mb-3 mb-md-0">
          <div class="col-12 text-center">
            <h2>OUR STATISTICS</h2>
          </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-4 g-0 bg-custom">
          <div class="col=">
            <div class="progress-box text-center">
              <span>Registering</span>
              <h2><?php echo e(count($user)); ?></h2>
              <p>DAILY</p>
            </div>
          </div>
          <div class="col=">
            <div class="progress-box text-center">
              <span>Jobs</span>
              <h2><?php echo e(count($posts)); ?></h2>
              <p>ADVERTISED</p>
            </div>
          </div>
          <div class="col=">
            <div class="progress-box text-center">
              <span>Number OF</span>
              <h2><?php echo e(count($jobApps)); ?></h2>
              <p>APPLICANTS</p>
            </div>
          </div>
          <div class="col=">
            <div class="progress-box text-center">
              <span>Number OF</span>
              <h2><?php echo e(count($company)); ?></h2>
              <p>EMPLOYERS</p>
            </div>
          </div>
        </div>
      </div>
      <div class="blue-box"></div>
    </section>

  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/recruiter/index.blade.php ENDPATH**/ ?>