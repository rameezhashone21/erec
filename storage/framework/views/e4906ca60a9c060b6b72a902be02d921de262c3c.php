<?php $__env->startSection('content'); ?>
    <section class="light-bg subcription_banner">
        <div class="container ">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-8 text-center">
                    <h1 class="mb-0 fs-48 text-center fw-bold mb-4">
                        Subscription Packages
                    </h1>
                    <p class="mb-0 ">
                        Choose a package that best represents your requirements. Our subscription packages offer great value
                        for money
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class='pb-5 mt-minus-115'>
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <div class="toggleWrapper text-center">
                        <input type="checkbox" class="dn" id="dn" onchange="changePrices()" />
                        <label for="dn" class="toggle">
                            <span class="toggle__handler"></span>
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 gy-5" id="one">
                <div class="col">
                    <div class="free-trial">
                        <div class="package_header text-center">
                            <h2>
                                <?php echo e($trial->name); ?>

                            </h2>
                        </div>
                        <div class="subcription_list_box position-relative">
                            <h3
                                class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                $0</h3>
                            <div class="mb-4 top_package_button">
                                <?php if(auth()->check()): ?>
                                    <?php if(auth()->user()->package_id == '21'): ?>
                                        
                                    <?php else: ?>
                                        <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>" class="btn_package">Choose
                                            Plan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                viewBox="0 0 18 12">
                                                <g id="Group_688" data-name="Group 688"
                                                    transform="translate(18) rotate(90)">
                                                    <path id="Path_5027" data-name="Path 5027"
                                                        d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                        transform="translate(5)" fill="#fff" />
                                                    <path id="Path_5028" data-name="Path 5028"
                                                        d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                        transform="translate(0 0)" fill="#fff" />
                                                    <path id="Path_5029" data-name="Path 5029"
                                                        d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                        transform="translate(5 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <ul class='subcription_list'>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">Job Posting. (<?php echo e($trial->no_of_posts); ?>)</span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Basic Resume Parsing.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Limited Applicant Management.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Collaboration Tools.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Advanced Candidate Screening.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Video Interviews.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Customizable Workflows.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Dedicated Customer Support.
                                    </span>
                                </li>
                            </ul>
                            <?php if(auth()->check()): ?>
                                <?php if(auth()->user()->package_id == '21'): ?>
                                    
                                <?php else: ?>
                                    <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>" class="btn_package">Choose
                                        Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose
                                    Plan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                        viewBox="0 0 18 12">
                                        <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                            <path id="Path_5027" data-name="Path 5027"
                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                transform="translate(5)" fill="#fff" />
                                            <path id="Path_5028" data-name="Path 5028"
                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                transform="translate(0 0)" fill="#fff" />
                                            <path id="Path_5029" data-name="Path 5029"
                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                transform="translate(5 0)" fill="#fff" />
                                        </g>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $key = 1;
                    $key1 = 1;
                    $key2 = 2;
                    $key3 = 3;
                ?>
                <?php $__currentLoopData = $month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->id != 21): ?>
                        <div class="col">
                            <div
                                class="<?php if($key1 / $key == 1): ?> <?php $key1 = $key1+3 ?> first <?php endif; ?> <?php if($key2 / $key == 1): ?> <?php $key2 = $key2+3 ?> second <?php endif; ?> <?php if($key3 / $key == 1): ?> <?php $key3 = $key3+3 ?> third <?php endif; ?>">
                                <div class="package_header text-center">
                                    <h2>
                                        <?php echo e($row->name); ?>

                                    </h2>
                                </div>
                                <div class="subcription_list_box position-relative">
                                    <h3
                                        class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                        <?php
                                            $site = App\Models\SiteSetting::first();
                                            $tax = $site->tax_rate;
                                            $price = (int) $row->price;
                                            $tax_price = ((int) $price * $tax) / 100;
                                            $total_price = $price + $tax_price;
                                        ?>
                                        $<?php echo e((int) $total_price); ?><span class='ms-2'>/ <?php echo e($row->time_interval); ?> </span>
                                    </h3>
                                    <div class="mb-4 top_package_button">
                                        <?php if(Auth::check()): ?>
                                            <?php if(auth()->user()->package_id == $row->id): ?>
                                                <a class="btn_package cancelPayment">Renew
                                                    Plan
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                        viewBox="0 0 18 12">
                                                        <g id="Group_688" data-name="Group 688"
                                                            transform="translate(18) rotate(90)">
                                                            <path id="Path_5027" data-name="Path 5027"
                                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                transform="translate(5)" fill="#fff" />
                                                            <path id="Path_5028" data-name="Path 5028"
                                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                transform="translate(0 0)" fill="#fff" />
                                                            <path id="Path_5029" data-name="Path 5029"
                                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                transform="translate(5 0)" fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('subscriptionPayment', $row->slug)); ?>"
                                                    class="btn_package">Choose Plan
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                        viewBox="0 0 18 12">
                                                        <g id="Group_688" data-name="Group 688"
                                                            transform="translate(18) rotate(90)">
                                                            <path id="Path_5027" data-name="Path 5027"
                                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                transform="translate(5)" fill="#fff" />
                                                            <path id="Path_5028" data-name="Path 5028"
                                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                transform="translate(0 0)" fill="#fff" />
                                                            <path id="Path_5029" data-name="Path 5029"
                                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                transform="translate(5 0)" fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>

                                    <ul class='subcription_list'>
                                        <li>
                                            <?php if($row->applicantProfiling == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">Job Posting. (<?php echo e($row->no_of_posts); ?>)
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->applicantProfiling == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 1): ?>
                                                <span class="ps-3">All Free Tier features.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">All Bronze Tier features.</span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">All Silver Tier features.</span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($row->applicantTracking == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 1): ?>
                                                <span class="ps-3">
                                                    Enhanced Job Posting.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">ATS Integration.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">Premium Job Posting.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($row->erecDashboard == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>

                                            <?php if($key == 1): ?>
                                                <span class="ps-3">
                                                    Advanced Resume Parsing.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">
                                                    Comprehensive Applicant Management.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">
                                                    AI-powered Candidate Matching.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($row->erecReportingEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 1): ?>
                                                <span class="ps-3">
                                                    Customizable Application Form.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">
                                                    Candidate Screening.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">
                                                    Collaboration Tools.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($row->databaseSearch == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 1): ?>
                                                <span class="ps-3">
                                                    Candidate Communication.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">
                                                    Interview Scheduling.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">
                                                    Advanced Candidate Screening.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($row->uploadCV == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 1): ?>
                                                <span class="ps-3">
                                                    Basic Candidate Screening.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 2): ?>
                                                <span class="ps-3">
                                                    Reporting and Analytics.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span class="ps-3">
                                                    Video Interviews.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($key == 2): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                                <span class="ps-3">
                                                    Skill and Keyword Matching.
                                                </span>
                                            <?php endif; ?>
                                            <?php if($key == 3): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                                <span class="ps-3">
                                                    Customizable Workflows.
                                                </span>
                                            <?php endif; ?>
                                        </li>
                                        <li>
                                            <?php if($key == 3): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                                <span class="ps-3">
                                                    Dedicated Customer Support.
                                                </span>
                                            <?php endif; ?>
                                        </li>

                                    </ul>
                                    <?php if(Auth::check()): ?>
                                        <?php if(auth()->user()->package_id == $row->id): ?>
                                            <a class="btn_package cancelPayment">Renew
                                                Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688"
                                                        transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('subscriptionPayment', $row->slug)); ?>"
                                                class="btn_package">Choose Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688"
                                                        transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                viewBox="0 0 18 12">
                                                <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                    <path id="Path_5027" data-name="Path 5027"
                                                        d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                        transform="translate(5)" fill="#fff" />
                                                    <path id="Path_5028" data-name="Path 5028"
                                                        d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                        transform="translate(0 0)" fill="#fff" />
                                                    <path id="Path_5029" data-name="Path 5029"
                                                        d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                        transform="translate(5 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        $key++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 gy-5" id="two" style="display: none">
                <div class="col">
                    <div class="free-trial">
                        <div class="package_header text-center">
                            <h2>
                                <?php echo e($trial->name); ?>

                            </h2>
                        </div>
                        <div class="subcription_list_box position-relative">
                            <h3
                                class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                $0</h3>
                            <div class="mb-4 top_package_button">
                                <?php if(auth()->check()): ?>
                                    <?php if(auth()->user()->package_id == '21'): ?>
                                        
                                    <?php else: ?>
                                        <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>"
                                            class="btn_package">Choose
                                            Plan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                viewBox="0 0 18 12">
                                                <g id="Group_688" data-name="Group 688"
                                                    transform="translate(18) rotate(90)">
                                                    <path id="Path_5027" data-name="Path 5027"
                                                        d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                        transform="translate(5)" fill="#fff" />
                                                    <path id="Path_5028" data-name="Path 5028"
                                                        d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                        transform="translate(0 0)" fill="#fff" />
                                                    <path id="Path_5029" data-name="Path 5029"
                                                        d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                        transform="translate(5 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose
                                        Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <ul class='subcription_list'>
                                <li>
                                    <span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">Job Posting. (<?php echo e($trial->no_of_posts); ?>)</span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Basic Resume Parsing.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Limited Applicant Management.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Collaboration Tools.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Advanced Candidate Screening.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Video Interviews.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Customizable Workflows.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Dedicated Customer Support.
                                    </span>
                                </li>
                            </ul>
                            <?php if(auth()->check()): ?>
                                <?php if(auth()->user()->package_id == '21'): ?>
                                    
                                <?php else: ?>
                                    <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>" class="btn_package">Choose
                                        Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose
                                    Plan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                        viewBox="0 0 18 12">
                                        <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                            <path id="Path_5027" data-name="Path 5027"
                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                transform="translate(5)" fill="#fff" />
                                            <path id="Path_5028" data-name="Path 5028"
                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                transform="translate(0 0)" fill="#fff" />
                                            <path id="Path_5029" data-name="Path 5029"
                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                transform="translate(5 0)" fill="#fff" />
                                        </g>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $key = 1;
                    $key1 = 1;
                    $key2 = 2;
                    $key3 = 3;
                ?>
                <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->id != 21): ?>
                        <div class="col">
                            <div
                                class="<?php if($key1 / $key == 1): ?> <?php $key1 = $key1+3 ?> first <?php endif; ?> <?php if($key2 / $key == 1): ?> <?php $key2 = $key2+3 ?> second <?php endif; ?> <?php if($key3 / $key == 1): ?> <?php $key3 = $key3+3 ?> third <?php endif; ?>">
                                <div>
                                    <div class="package_header text-center ">
                                        <h2>
                                            
                                            <?php echo e($row->name); ?>

                                        </h2>
                                    </div>
                                    <div class="subcription_list_box position-relative">
                                        <h3
                                            class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                            <?php
                                                $site = App\Models\SiteSetting::first();
                                                $tax = $site->tax_rate;
                                                $price = (int) $row->price;
                                                $tax_price = ((int) $price * $tax) / 100;
                                                $total_price = $price + $tax_price;
                                            ?>
                                            $<?php echo e((int) $total_price); ?><span class='ms-2'>/ <?php echo e($row->time_interval); ?>

                                            </span></h3>
                                        </h3>
                                        <div class="mb-4 top_package_button">
                                            <?php if(Auth::check()): ?>
                                                <?php if(auth()->user()->package_id == $row->id): ?>
                                                    <a class="btn_package cancelPayment">Renew
                                                        Plan
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="12" viewBox="0 0 18 12">
                                                            <g id="Group_688" data-name="Group 688"
                                                                transform="translate(18) rotate(90)">
                                                                <path id="Path_5027" data-name="Path 5027"
                                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                    transform="translate(5)" fill="#fff" />
                                                                <path id="Path_5028" data-name="Path 5028"
                                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                    transform="translate(0 0)" fill="#fff" />
                                                                <path id="Path_5029" data-name="Path 5029"
                                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                    transform="translate(5 0)" fill="#fff" />
                                                            </g>
                                                        </svg>
                                                    </a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('subscriptionPayment', $row->slug)); ?>"
                                                        class="btn_package">Choose Plan
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="12" viewBox="0 0 18 12">
                                                            <g id="Group_688" data-name="Group 688"
                                                                transform="translate(18) rotate(90)">
                                                                <path id="Path_5027" data-name="Path 5027"
                                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                    transform="translate(5)" fill="#fff" />
                                                                <path id="Path_5028" data-name="Path 5028"
                                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                    transform="translate(0 0)" fill="#fff" />
                                                                <path id="Path_5029" data-name="Path 5029"
                                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                    transform="translate(5 0)" fill="#fff" />
                                                            </g>
                                                        </svg>
                                                    </a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                        viewBox="0 0 18 12">
                                                        <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                            <path id="Path_5027" data-name="Path 5027"
                                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                transform="translate(5)" fill="#fff" />
                                                            <path id="Path_5028" data-name="Path 5028"
                                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                transform="translate(0 0)" fill="#fff" />
                                                            <path id="Path_5029" data-name="Path 5029"
                                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                transform="translate(5 0)" fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        </div>

                                        <ul class='subcription_list'>
                                            <li>
                                                <?php if($row->applicantProfiling == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <span class="ps-3">Job Posting. (<?php echo e($row->no_of_posts); ?>)
                                                </span>
                                            </li>
                                            <li>
                                                <?php if($row->applicantProfiling == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">All Free Tier features.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">All Bronze Tier features.</span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">All Silver Tier features.</span>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if($row->applicantTracking == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">
                                                        Enhanced Job Posting.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">ATS Integration.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">Premium Job Posting.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if($row->erecDashboard == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">
                                                        Advanced Resume Parsing.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">
                                                        Comprehensive Applicant Management.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">
                                                        AI-powered Candidate Matching.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if($row->erecReportingEngine == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">
                                                        Customizable Application Form.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">
                                                        Candidate Screening.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">
                                                        Collaboration Tools.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if($row->databaseSearch == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">
                                                        Candidate Communication.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">
                                                        Interview Scheduling.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">
                                                        Advanced Candidate Screening.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>
                                                <?php if($row->uploadCV == 1): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                <?php else: ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                                transform="translate(0.061 0.061)">
                                                                <path id="Path_5079" data-name="Path 5079"
                                                                    d="M13,1,1,13M1,1,13,13" fill="none"
                                                                    stroke="#de0000" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="1.5"
                                                                    fill-rule="evenodd" />
                                                            </g>
                                                        </svg>
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 1): ?>
                                                    <span class="ps-3">
                                                        Basic Candidate Screening.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 2): ?>
                                                    <span class="ps-3">
                                                        Reporting and Analytics.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span class="ps-3">
                                                        Video Interviews.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>

                                                <?php if($key == 2): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                    <span class="ps-3">
                                                        Skill and Keyword Matching.
                                                    </span>
                                                <?php endif; ?>
                                                <?php if($key == 3): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                    <span class="ps-3">
                                                        Customizable Workflows.
                                                    </span>
                                                <?php endif; ?>
                                            </li>
                                            <li>

                                                <?php if($key == 3): ?>
                                                    <span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                            height="13.513" viewBox="0 0 18.785 13.513">
                                                            <path id="Path_5025" data-name="Path 5025"
                                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                        </svg>
                                                    </span>
                                                    <span class="ps-3">
                                                        Dedicated Customer Support.
                                                    </span>
                                                <?php endif; ?>
                                            </li>

                                        </ul>
                                        <?php if(Auth::check()): ?>
                                            <?php if(auth()->user()->package_id == $row->id): ?>
                                                <a class="btn_package cancelPayment">Renew
                                                    Plan
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                        viewBox="0 0 18 12">
                                                        <g id="Group_688" data-name="Group 688"
                                                            transform="translate(18) rotate(90)">
                                                            <path id="Path_5027" data-name="Path 5027"
                                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                transform="translate(5)" fill="#fff" />
                                                            <path id="Path_5028" data-name="Path 5028"
                                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                transform="translate(0 0)" fill="#fff" />
                                                            <path id="Path_5029" data-name="Path 5029"
                                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                transform="translate(5 0)" fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('subscriptionPayment', $row->slug)); ?>"
                                                    class="btn_package">Choose
                                                    Plan
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                        viewBox="0 0 18 12">
                                                        <g id="Group_688" data-name="Group 688"
                                                            transform="translate(18) rotate(90)">
                                                            <path id="Path_5027" data-name="Path 5027"
                                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                transform="translate(5)" fill="#fff" />
                                                            <path id="Path_5028" data-name="Path 5028"
                                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                transform="translate(0 0)" fill="#fff" />
                                                            <path id="Path_5029" data-name="Path 5029"
                                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                transform="translate(5 0)" fill="#fff" />
                                                        </g>
                                                    </svg>
                                                </a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        $key++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1 gy-5" id="two" style="display: none">
                <div class="col">
                    <div class="free-trial">
                        <div class="package_header text-center">
                            <h2>
                                <?php echo e($trial->name); ?>

                            </h2>
                        </div>
                        <div class="subcription_list_box position-relative">
                            <h3
                                class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                $0</h3>
                            <div class="mb-4 top_package_button">
                                <?php if(auth()->check()): ?>
                                    <?php if(auth()->user()->package_id == '21'): ?>
                                        
                                    <?php else: ?>
                                        <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>"
                                            class="btn_package">Choose
                                            Plan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                viewBox="0 0 18 12">
                                                <g id="Group_688" data-name="Group 688"
                                                    transform="translate(18) rotate(90)">
                                                    <path id="Path_5027" data-name="Path 5027"
                                                        d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                        transform="translate(5)" fill="#fff" />
                                                    <path id="Path_5028" data-name="Path 5028"
                                                        d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                        transform="translate(0 0)" fill="#fff" />
                                                    <path id="Path_5029" data-name="Path 5029"
                                                        d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                        transform="translate(5 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose
                                        Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688"
                                                transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>

                            <ul class='subcription_list'>
                                <li>
                                    <span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">Job Posting. (<?php echo e($trial->no_of_posts); ?>)</span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <path id="Path_5025" data-name="Path 5025"
                                                d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Basic Resume Parsing.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Limited Applicant Management.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Collaboration Tools.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Advanced Candidate Screening.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Video Interviews.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Customizable Workflows.
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18.785" height="13.513"
                                            viewBox="0 0 18.785 13.513">
                                            <g id="e664b6fb06572bcc2e016d2138ba8659" transform="translate(0.061 0.061)">
                                                <path id="Path_5079" data-name="Path 5079" d="M13,1,1,13M1,1,13,13"
                                                    fill="none" stroke="#de0000" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5" fill-rule="evenodd" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ps-3">
                                        Dedicated Customer Support.
                                    </span>
                                </li>
                            </ul>
                            <?php if(auth()->check()): ?>
                                <?php if(auth()->user()->package_id == '21'): ?>
                                    
                                <?php else: ?>
                                    <a href="<?php echo e(route('subscriptionPayment', $trial->id)); ?>" class="btn_package">Choose
                                        Plan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                            viewBox="0 0 18 12">
                                            <g id="Group_688" data-name="Group 688"
                                                transform="translate(18) rotate(90)">
                                                <path id="Path_5027" data-name="Path 5027"
                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                    transform="translate(5)" fill="#fff" />
                                                <path id="Path_5028" data-name="Path 5028"
                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                    transform="translate(0 0)" fill="#fff" />
                                                <path id="Path_5029" data-name="Path 5029"
                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                    transform="translate(5 0)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose
                                    Plan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                        viewBox="0 0 18 12">
                                        <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                            <path id="Path_5027" data-name="Path 5027"
                                                d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                transform="translate(5)" fill="#fff" />
                                            <path id="Path_5028" data-name="Path 5028"
                                                d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                transform="translate(0 0)" fill="#fff" />
                                            <path id="Path_5029" data-name="Path 5029"
                                                d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                transform="translate(5 0)" fill="#fff" />
                                        </g>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $key = 1;
                    $key1 = 1;
                    $key2 = 2;
                    $key3 = 3;
                ?>
                <?php $__currentLoopData = $month; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row->id != 21): ?>
                        <div class="col">
                            <div
                                class="<?php if($key1 / $key == 1): ?> <?php $key1 = $key1+3 ?> first <?php endif; ?> <?php if($key2 / $key == 1): ?> <?php $key2 = $key2+3 ?> second <?php endif; ?> <?php if($key3 / $key == 1): ?> <?php $key3 = $key3+3 ?> third <?php endif; ?>">
                                <div class="package_header text-center">
                                    <h2>
                                        
                                        <?php echo e($row->name); ?>

                                    </h2>
                                </div>
                                <div class="subcription_list_box position-relative">
                                    <h3 <?php
$site = App\Models\SiteSetting::first(); ?>
                                        class='subcription-prize mx-auto d-flex align-items-center flex-column justify-content-center'>
                                        $<?php echo e($row->price); ?><span class='ms-2'>/ <?php echo e($row->time_interval); ?></span></h3>
                                    <ul class='subcription_list'>
                                        <li>
                                            <?php if($row->applicantProfiling == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">Job Posting. (<?php echo e($row->no_of_posts); ?>)
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->applicantProfiling == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">Applicant Profiling</span>
                                        </li>
                                        <li>
                                            <?php if($row->applicantTracking == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Applicant Tracking
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->erecDashboard == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                E-REC Dashboard
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->erecReportingEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                E-REC Reporting Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->databaseSearch == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Database Search
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->uploadCV == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Upload CV
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->longlistAssessment == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Longlist Assessment
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->shortlistAssessment == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Shortlist Assessment
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->emailIntegration == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Email Integration
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->smsIntegration == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                SMS Integration
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->liveBasedChatting == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Live based Chatting
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->industryBasedAssessment == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Industry Based Assessment
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->aiEngineIntegration == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                AI Engine Integration
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->mlEngineIntegration == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                ML Engine Integration
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->predictiveAnalysisEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                Predictive Analysis Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->ctatEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                CTAT Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->rasvEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                RASV Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->tatiEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                TATI Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->iagmEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                IAGM Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->rtwEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                RTW Engine
                                            </span>
                                        </li>
                                        <li>
                                            <?php if($row->amiEngine == 1): ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <path id="Path_5025" data-name="Path 5025"
                                                            d="M12.907,22.792a.7.7,0,0,1-.5-.2L7.142,17.322a.7.7,0,1,1,.992-.985l4.772,4.772L24.533,9.482a.7.7,0,1,1,.985.992L13.4,22.59A.7.7,0,0,1,12.907,22.792Z"
                                                            transform="translate(-6.939 -9.279)" fill="#4dc1ba" />
                                                    </svg>
                                                </span>
                                            <?php else: ?>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18.785"
                                                        height="13.513" viewBox="0 0 18.785 13.513">
                                                        <g id="e664b6fb06572bcc2e016d2138ba8659"
                                                            transform="translate(0.061 0.061)">
                                                            <path id="Path_5079" data-name="Path 5079"
                                                                d="M13,1,1,13M1,1,13,13" fill="none" stroke="#de0000"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1.5" fill-rule="evenodd" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            <?php endif; ?>
                                            <span class="ps-3">
                                                AMI Engine
                                            </span>
                                        </li>
                                    </ul>
                                    <?php if(Auth::check()): ?>
                                        <?php if(auth()->user()->package_id == $row->id): ?>
                                            <a class="btn_package cancelPayment">Renew
                                                Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688"
                                                        transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(route('subscriptionPayment', $row->slug)); ?>"
                                                class="btn_package">Choose Plan
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                    viewBox="0 0 18 12">
                                                    <g id="Group_688" data-name="Group 688"
                                                        transform="translate(18) rotate(90)">
                                                        <path id="Path_5027" data-name="Path 5027"
                                                            d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                            transform="translate(5)" fill="#fff" />
                                                        <path id="Path_5028" data-name="Path 5028"
                                                            d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                            transform="translate(0 0)" fill="#fff" />
                                                        <path id="Path_5029" data-name="Path 5029"
                                                            d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                            transform="translate(5 0)" fill="#fff" />
                                                    </g>
                                                </svg>
                                            </a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('login')); ?>" class="btn_package">Choose Plan
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12"
                                                viewBox="0 0 18 12">
                                                <g id="Group_688" data-name="Group 688" transform="translate(18) rotate(90)">
                                                    <path id="Path_5027" data-name="Path 5027"
                                                        d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                        transform="translate(5)" fill="#fff" />
                                                    <path id="Path_5028" data-name="Path 5028"
                                                        d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                        transform="translate(0 0)" fill="#fff" />
                                                    <path id="Path_5029" data-name="Path 5029"
                                                        d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                        transform="translate(5 0)" fill="#fff" />
                                                </g>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                        $key++;
                    ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="mt-5 "><i>Note: <span class="text-grey">The pricing of our packages is inclusive of
                        <?php echo e($site->tax_rate); ?>% (GST) tax</span> </i> </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
    <script>
        $('.cancelPayment').click(function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            url: "<?php echo e(route('cancelPayment')); ?>",
                            type: "GET",
                        }).done(function(data) {

                            window.location.href = "<?php echo e(route('successPayment')); ?>";
                            // successModal("Your Package Has Been Updated Successfully...");
                        })
                        .fail(function(error) {
                            var errors = error.responseJSON;
                            console.log(errors);

                        });
                    // location.reload();
                    // 'Your have successfully unsubscribed.',
                    // 'success'
                }
            })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\erec\resources\views/subscription/package.blade.php ENDPATH**/ ?>