

<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <form <?php echo e(route('search.Keyword.view')); ?> method="get">
                <div class="container pt-5 mt-4">
                    <h1 class="fs-48 text-center fw-bold text-uppercase my-5">Search Results</h1>
                    <div class="row">
                        <div class="col-lg-3">
                            <?php if(Auth::check()): ?>
                                <?php if(auth()->user()->role != 'admin'): ?>
                                    <p class="fs-14">
                                        <?php if(auth()->user()->role === 'company'): ?>
                                            <a href="<?php echo e(route('company.dashboard')); ?>" class="text-primary">Dashboard</a>
                                            <span>> Search Keyword </span>
                                        <?php elseif(auth()->user()->role === 'rec'): ?>
                                            <a href="<?php echo e(route('dashboard')); ?>" class="text-primary">Dashboard</a>
                                            <span>>Search Keyword </span>
                                        <?php elseif(auth()->user()->role === 'user'): ?>
                                            <a href="<?php echo e(route('candidate.dashboard')); ?>" class="text-primary">Dashboard</a>
                                            <span>> Search Keyword </span>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="row row-cols-1 form__search__box search-area mb-3 py-4 px-3 d-block">
                                
                                
                                <div class="col ">
                                    <div class="position-relative">
                                        <input type="text" name="searchKeyword" id="search-title" autocomplete="off"
                                            class="w-100 fs-14 bg-theme-secondary text-dark h-50px mb-3"
                                             placeholder="Enter name to search"
                                            value="<?php echo e($request); ?>">
                                        <img src="<?php echo e(asset('images/icon-search.svg')); ?>" alt=""
                                            class="img-fluid position-absolute">
                                        <div id="search-title-search"
                                            class="search-suggestion-bar position-absolute shadow-lg d-none search-title-hide">
                                        </div>
                                    </div>
                                </div>
                                <div class="search-area mb-3 py-lg-4 py-3 px-3 mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h2 class="fs-18 mb-0">Choose Role</h2>
                                        
                                        <a data-bs-toggle="collapse" href="#Experience" role="button"
                                            aria-expanded="<?php if(count($cand) > 0 || count($comp) > 0 || count($rec) > 0): ?> true <?php else: ?> false <?php endif; ?>"
                                            aria-controls="Experience" id="collapseButtonOne" class="">
                                            
                                            <i class="fas fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <div class="show" id="Experience">
                                        <div class="mt-3">
                                            <ul>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="all" type="radio"
                                                            name="role" id="jt4"
                                                            <?php if($cand != null && $comp != null && $rec != null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" for="jt4">
                                                            All
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="user" type="radio"
                                                            name="role" id="jt1"
                                                            <?php if($cand != null && $comp == null && $rec == null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" for="jt1">
                                                            Candidate
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="company" type="radio"
                                                            name="role" id="jt2"
                                                            <?php if($cand == null && $comp != null && $rec == null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" for="jt2">
                                                            Employer
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                                <li class="d-flex justify-content-between align-items-center py-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" value="rec" type="radio"
                                                            name="role" id="jt3"
                                                            <?php if($cand == null && $rec != null && $comp == null): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label" for="jt3">
                                                            Recruiter
                                                        </label>
                                                    </div>
                                                    <span>
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <button class="login-btn default-btn btn w-100" type="submit">
                                    <i class="fas fa-filter" aria-hidden="true"></i>
                                    Click here-Filter Search
                                </button>
                                <div class="mt-2 text-end">
                                    <a href="javascript:void(0)" class="fs-14" id="searchPageReset">
                                        Reset<i class="fas fa-sync ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9" id="msg-btn">
                            <div class="row align-items-center justify-content-between gy-3 mb-4">
                                <div class="col-lg-4">
                                    <h3 class="view_profile_description fs-16 mb-0" id="searchCount">
                                        
                                    </h3>
                                </div>
                                
                            </div>
                            <div class="row gy-lg-5 gy-4" id="allContent">
                                <?php if(count($cand) > 0 || count($comp) > 0 || count($rec) > 0): ?>
                                    <?php if(count($cand) > 0): ?>
                                        <?php $__currentLoopData = $cand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 hiddenDiv">
                                                <div class="new_candidate_box ">
                                                    
                                                    <?php
                                                        $url = asset('storage/' . $row->user->avatar);
                                                        $response = Http::head($url);
                                                    ?>
                                                    <?php if($response->status() != 404 && isset($row->user->avatar)): ?>
                                                        <img src="<?php echo e(asset('storage/' . $row->user->avatar)); ?>"
                                                            alt="profile-img" class="profile img-fluid">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/profile-img.png')); ?>" alt="profile-img"
                                                            class="profile img-fluid">
                                                    <?php endif; ?>
                                                    
                                                    <div class="content">
                                                        <div class="user__info">
                                                            <h3 class="title">
                                                                <a href="<?php echo e(route('candidate.detail', $row->slug)); ?>"
                                                                    class=""><?php echo e($row->first_name . ' ' . $row->last_name); ?></a>
                                                            </h3>
                                                            <p class="designation">
                                                                <?php if($row->user->role == 'user'): ?>
                                                                    Candidate
                                                                <?php endif; ?>
                                                                <br>
                                                                <?php echo \Illuminate\Support\Str::limit($row->tagline, 20, $end = '...'); ?>

                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="<?php echo e(route('candidate.detail', $row->slug)); ?>"
                                                                class="d-flex aling-items-center button">
                                                                <span>
                                                                    View Profile
                                                                </span>
                                                                <span>
                                                                    <svg id="arrow-left"
                                                                        xmlns="http://www.w3.org/2000/svg" width="16.997"
                                                                        height="9.916" viewBox="0 0 16.997 9.916">
                                                                        <path id="Path_3242" data-name="Path 3242"
                                                                            d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                                            transform="translate(6.831 -10.123)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                        <path id="Path_3243" data-name="Path 3243"
                                                                            d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                                            transform="translate(-5.625 -12.625)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <open-box :openBoxFunction="openBox"
                                                                :id="<?php echo e($row->user->id); ?>"></open-box>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if(count($comp) > 0): ?>
                                        <?php $__currentLoopData = $comp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 hiddenDiv">
                                                <div class="new_candidate_box ">
                                                    
                                                    <?php
                                                        $url = asset('storage/' . $row->logo);
                                                        $response = Http::head($url);
                                                    ?>
                                                    <?php if($response->status() != 404 && isset($row->logo)): ?>
                                                        <img src="<?php echo e(asset('storage/' . $row->logo)); ?>"
                                                            alt="profile-img" class="profile img-fluid">
                                                    <?php else: ?>
                                                        <img src="<?php echo e(asset('images/profile-img.png')); ?>"
                                                            alt="profile-img" class="profile img-fluid">
                                                    <?php endif; ?>
                                                    
                                                    <div class="content">
                                                        <div class="user__info">
                                                            <h3 class="title">
                                                                <a href="<?php echo e(route('job.details', $row->slug)); ?>"
                                                                    class=""><?php echo e($row->name); ?></a>
                                                            </h3>
                                                            <p class="designation">
                                                                <?php if($row->user->role == 'company'): ?>
                                                                    Employer
                                                                <?php endif; ?>
                                                                <?php echo $row->head_line; ?>

                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="<?php echo e(route('job.details', $row->slug)); ?>"
                                                                class="d-flex aling-items-center button">
                                                                <span>
                                                                    View Profile
                                                                </span>
                                                                <span>
                                                                    <svg id="arrow-left"
                                                                        xmlns="http://www.w3.org/2000/svg" width="16.997"
                                                                        height="9.916" viewBox="0 0 16.997 9.916">
                                                                        <path id="Path_3242" data-name="Path 3242"
                                                                            d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                                            transform="translate(6.831 -10.123)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                        <path id="Path_3243" data-name="Path 3243"
                                                                            d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                                            transform="translate(-5.625 -12.625)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <?php if(count($rec) > 0): ?>
                                        <?php $__currentLoopData = $rec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-lg-4 hiddenDiv">
                                                <div class="new_candidate_box ">
                                                    <a href="" class="">
                                                        <?php if(isset($row->avatar)): ?>
                                                            <img src="<?php echo e(asset('storasge/' . $row->avatar)); ?>"
                                                                alt="profile-img" class="profile img-fluid">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('images/profile-img.png')); ?>"
                                                                alt="profile-img" class="profile img-fluid">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="content">
                                                        <div class="user__info">
                                                            <h3 class="title">
                                                                <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>"
                                                                    class=""><?php echo e($row->name); ?></a>
                                                            </h3>
                                                            <p class="designation">
                                                                <?php if($row->user->role == 'rec'): ?>
                                                                    Recruiter
                                                                <?php endif; ?>
                                                                <?php echo $row->head_line; ?>

                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <a href="<?php echo e(route('recruiter.detail', $row->slug)); ?>"
                                                                class="d-flex aling-items-center button">
                                                                <span>
                                                                    View Profile
                                                                </span>
                                                                <span>
                                                                    <svg id="arrow-left"
                                                                        xmlns="http://www.w3.org/2000/svg" width="16.997"
                                                                        height="9.916" viewBox="0 0 16.997 9.916">
                                                                        <path id="Path_3242" data-name="Path 3242"
                                                                            d="M4.707,10.332a.708.708,0,0,0,0,1l3.748,3.747L4.706,18.829a.709.709,0,1,0,1,1l4.249-4.249a.708.708,0,0,0,0-1L5.709,10.332a.708.708,0,0,0-1,0Z"
                                                                            transform="translate(6.831 -10.123)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                        <path id="Path_3243" data-name="Path 3243"
                                                                            d="M21.913,17.583a.708.708,0,0,0-.708-.708H6.333a.708.708,0,1,0,0,1.416H21.2A.708.708,0,0,0,21.913,17.583Z"
                                                                            transform="translate(-5.625 -12.625)"
                                                                            fill="#007ba7" fill-rule="evenodd"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                            <a href="#" class="d-flex aling-items-center button">
                                                                <span>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.95"
                                                                        height="14.95" viewBox="0 0 14.95 14.95">
                                                                        <path id="Icon_feather-message-square"
                                                                            data-name="Icon feather-message-square"
                                                                            d="M18.25,13.667a1.528,1.528,0,0,1-1.528,1.528H7.556L4.5,18.25V6.028A1.528,1.528,0,0,1,6.028,4.5H16.722A1.528,1.528,0,0,1,18.25,6.028Z"
                                                                            transform="translate(-3.9 -3.9)"
                                                                            fill="none" stroke="#007ba7"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="1.2"></path>
                                                                    </svg>
                                                                </span>
                                                                <span>
                                                                    Message
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    <div class="text-center mt-5 col-12">
                                        <a href="#" class="btn_viewall fw-500 px-4 py-2" id="loadMore">Load
                                            More</a>
                                    </div>
                                <?php else: ?>
                                    <h3 class="nomargin">
                                        No Results Found For: "<?php echo e($request); ?>"
                                    </h3>
                                <?php endif; ?>
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
        $(document).ready(function() {
            htmlCount = "";

            if ($('#jt4').is(':checked')) {
                if (<?php echo e(count($cand) > 0 || count($comp) || count($rec)); ?>) {
                    htmlCount = "Showing " + <?php echo e(count($cand) + count($comp) + count($rec)); ?> + " Results";
                }
            } else if ($('#jt1').is(':checked')) {
                if (<?php echo e(count($cand)); ?>) {
                    htmlCount = "Showing " + <?php echo e(count($cand)); ?> + " Results";
                }
            } else if ($('#jt2').is(':checked')) {
                if (<?php echo e(count($comp)); ?>) {
                    htmlCount = "Showing " + <?php echo e(count($comp)); ?> + " Results";
                }
            } else if ($('#jt3').is(':checked')) {
                if (<?php echo e(count($rec)); ?>) {
                    htmlCount = "Showing " + <?php echo e(count($rec)); ?> + " Results";
                }
            }

            $("#searchCount").html(htmlCount);
        });

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
                url: "<?php echo e(route('search.Keyword')); ?>",
                data: {
                    value: $('#search-title').val(),
                    for: 'users',
                },
                dataType: "json",
                encode: true,
            }).done(function(data) {
                console.log(data);
                $("#search-title-search").removeClass('d-none');
                $("#search-title-search").html('');
                html = '';
                if (data['can'].length == 0 && data['comp'].length == 0 && data['rec'].length == 0) {
                    $("#search-title-search").html("No Record Found");
                } else {
                    $.each(data['can'], function(index, value) {
                        html +=
                            "<a class='d-block border-bottom py-2 fs-14' href='<?php echo e(route('candidate.detail', '')); ?>/" +
                            value['slug'] +
                            "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")'>" +
                            value['first_name'] + ' ' + value['last_name'] + "</a>";
                    });
                    $.each(data['comp'], function(index, value) {
                        html +=
                            "<a class='d-block border-bottom py-2 fs-14' href='<?php echo e(route('job.details', '')); ?>/" +
                            value['slug'] +
                            "' id='para-" + value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")'>" +
                            value['name'] + "</a>";
                    });
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

    <script>
        $(document).ready(function() {
            let content = $("#allContent .hiddenDiv");
            if (content.length <= 9) {
                $("#loadMore").hide();
            }
            $("#allContent .hiddenDiv").slice(0, 9).show();
            $("#loadMore").on("click", function(e) {
                e.preventDefault();
                $("#allContent .hiddenDiv:hidden").slice(0, 9).slideDown();
                if ($("#allContent .hiddenDiv:hidden").length == 0) {
                    $("#loadMore").hide();
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/pages/searchKeywordView.blade.php ENDPATH**/ ?>