<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-md-flex aling-items-center justify-content-between">
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">All Job Posts List</h2>
                <div>
                    
                    
                    
                    
                    <?php
                        if (auth()->user()->package->id == 21) {
                            $package_expiry = auth()->user()->package_expiry;
                            $postCheck = \App\Models\Posts::where('rec_id', auth()->user()->recruiter->id)
                            ->where('created_at', '>=', $package_expiry)
                            ->get();
                            if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                                if (auth()->user()->posts_count > 0) {

                                    ?>
                                        <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                            onclick="existingJobs()"
                                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job
                                        </a>
                                    <?php


                                } else {
                                    ?>
                                        <a href="javascript:void(0);" role="button"
                                            data-bs-target="#error_modal" data-bs-toggle="modal"
                                            class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job</a>
                                    <?php
                                }
                            } else {
                                if (auth()->user()->posts_count > 0) {
                                    $current = \Carbon\Carbon::now();
                                    $userUpdate = auth()->user();
                                    $userUpdate->package_expiry = $current->addMonth()->format('Y-m-d');
                                    $userUpdate->save();

                                ?>
                                    <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                        onclick="existingJobs()"
                                        class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                <?php


                                } else {
                                    ?>
                                        <a href="javascript:void(0);" role="button"
                                            data-bs-target="#error_modal" data-bs-toggle="modal"
                                            class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job</a>
                                    <?php
                                }

                            }
                            // dd(count($postCheck));
                            // dd('ok');
                            // dd(auth()->user()->posts_count);
                        } else {
                            if (auth()->user()->package_id != 0) {
                                $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

                                $customerdata = $stripe->subscriptions->retrieve(auth()->user()->package_buy_stripe_token, []);
                                if ($customerdata->status == 'trialing' || $customerdata->status == 'paid' || $customerdata->status == 'active') {
                                    if (auth()->user()->posts_count > 0) {
                                        // dd($customerdata->toArray());
                                        ?>
                                        <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                            onclick="existingJobs()"
                                            class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job</a>
                                        <?php
                                    } else {
                                        if (auth()->user()->package_expiry <= \Carbon\Carbon::today()) {
                                            $user = auth()->user();
                                            $user->posts_count = auth()->user()->package->no_of_posts;
                                            $user->package_expiry = date('Y-m-d H:i:s', $customerdata->current_period_end);
                                            // dd($user->toArray());
                                            $user->save();

                                            ?>
                                            <a href="" role="button" data-bs-toggle="modal" data-bs-target="#postJob"
                                                onclick="existingJobs()"
                                                class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="javascript:void(0);" role="button"
                                                data-bs-target="#error_modal" data-bs-toggle="modal"
                                                class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                            Job</a>
                                            <?php
                                        }
                                    }
                                } else {
                                    ?>
                                        <a href="javascript:void(0);" role="button"
                                            data-bs-target="#error_modal" data-bs-toggle="modal"
                                            class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                        Job</a>
                                    <?php
                                }
                            } else {
                                ?>
                                    <a href="javascript:void(0);" role="button"
                                        data-bs-target="#error_modal" data-bs-toggle="modal"
                                        class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Post A
                                    Job</a>
                                <?php
                            }
                        }
                    ?>

                    <!-- Modal -->
                    <div class="modal fade" id="error_modal" tabindex="-1" aria-labelledby="error_modalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="<?php echo e(asset('imgs/fav-icon.png')); ?>" alt="" width="100" height="100"
                                    class="img-fluid">
                                <p>
                                    We hope you've been enjoying the benefits of our premium subscription plan and making the most of your job postings. At E-REC, we are committed to helping you find the best talent effortlessly, seamlessly and in the least time possible. We noticed that you've used up your allocated job post credits for this subscription level, but don't worry, we've got you covered! You can now renew your monthly subscription plan to unlock more job post credits and continue your search for top-notch candidates.

                                </p>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn_viewall fw-500 px-4 py-2"
                                    data-bs-dismiss="modal">Cancel</button>
                                <a href="<?php echo e(route('subscription')); ?>" class="btn_viewall fw-500 px-4 py-2">Upgrade</a>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-6 text-right">
                <div class="px-3">
                    
                    <form id="" action="<?php echo e(route('recruiter.csv')); ?>" method="POST" class="btn" name="csv_form"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        
                    </form>
                </div>
            </div>
            <!-- <div class="table-responsive table_height scrollbar"> -->
            <div class="table-responsive scrollbar">
                <table id="example" class="table table-striped table-payment display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th class="set-width-table-1">#</th>
                            <th class="set-width-table-2">Job title</th>
                            <th class="set-width-table-2">Experience</th>
                            <th class="set-width-table-3">Company</th>
                            <th class="set-width-table-4">Active/Inactive</th>
                            
                            <th class="set-width-table-2">Status</th>
                            <th class="set-width-table-2">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($post) > 0): ?>
                            <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="remove-<?php echo e($row->id); ?>">
                                    <td class="set-width-table-1">
                                        <?php echo e($key + 1); ?>.
                                    </td>
                                    <td class="set-width-table-2"><?php echo e($row->post); ?></td>
                                    <td class="set-width-table-2">
                                        <?php echo e(\Illuminate\Support\Str::limit($row->experience, 15, '...')); ?>

                                    </td>
                                    <td class="set-width-table-3">
                                        <?php if($row->comp_id != 0): ?>
                                            <?php echo e(\Illuminate\Support\Str::limit($row->company->name, 15, '...')); ?>

                                        <?php else: ?>
                                            No Company
                                        <?php endif; ?>
                                    </td>
                                    <?php if($row->status != 5): ?>
                                    <td class="set-width-table-4" id="statusChangeBox-<?php echo e($row->id); ?>">
                                        
                                            <?php if($row->status == 0): ?>
                                                <p onclick="statusChange(<?php echo e($row->id); ?>)"
                                                    id="buttonID(<?php echo e($row->id); ?>)"
                                                    class="btn btn_viewall text-center p-2 ">
                                                    Inactive</p>
                                            <?php elseif($row->rec_delete == 1): ?>
                                                <p class="btn btn-success text-center p-2">Archived</p>
                                            <?php else: ?>
                                                
                                                <p onclick="statusDeactive(<?php echo e($row->id); ?>)"
                                                    id="buttonID(<?php echo e($row->id); ?>)"
                                                    class="btn btn_viewall text-center p-2 ">
                                                    Active</p>
                                            <?php endif; ?>
                                        
                                    </td>
                                    <?php else: ?>
                                        <td>
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="" class="btn btn-danger disabled">
                                                    Disabled by Admin
                                                </a>
                                            </div>
                                        </td>
                                    <?php endif; ?>
                                    <td class="set-width-table-2" id="realStatus-<?php echo e($row->id); ?>">
                                        <?php if($row->status == 0): ?>
                                            <p class="btn btn-danger text-center p-2" style="color:#fff;">Inactive</p>
                                        <?php elseif($row->rec_delete == 1): ?>
                                            Archived
                                        <?php else: ?>
                                            <p class="btn btn-success text-center p-2" style="color:#fff;">Posted</p>
                                        <?php endif; ?>
                                    </td>
                                    <td class="set-width-table-2">
                                        <?php if($row->status != 5): ?>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View"
                                                href="<?php echo e(route('recruiter.job.details', $row->slug)); ?>"
                                                class="btn btn_viewall"><i class="fas fa-eye"></i></a>
                                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                href="<?php echo e(route('recruiter.jobs.edit', $row->slug)); ?>"
                                                class="btn btn_viewall"><i class="fas fa-edit"></i></a>
                                        <?php else: ?>
                                            <div class="d-flex" style="gap: 4px;">

                                                <a href="" class="btn btn-danger disabled">
                                                    Disabled by Admin
                                                </a>
                                            </div>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                
                                
                                
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" align="center">You haven't posted any job yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div class="d-flex justify-content-center mt-2">
                    
                </div>
            </div>
            <!-- Modal -->
            
            <!-- End Modal -->
        </div>
    </div>
    
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
    <script>
        function statusChange(value) {
            var url = '<?php echo e(route('rec.change.status.job', ':id')); ?>';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                }
            }).done(function() {
                // $('#buttonID').html('Approved');
                $('#statusChangeBox-' + value).html('');
                var html = "";
                var htmlSecond = "";
                var htmlSecond = "<p class='btn btn-success text-center p-2' style='color:#fff;'>Posted</p>";
                html += "<p onclick='statusDeactive(" + value + ")' id='buttonID" + value + "'";
                html += "class='btn btn_viewall text-center p-2 '>Active</p>";
                $('#statusChangeBox-' + value).html(html);
                $('#realStatus-' + value).html(htmlSecond);
            });

        }

        function statusDeactive(value) {
            var url = '<?php echo e(route('rec.change.deactive.job', ':id')); ?>';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                }
            }).done(function() {
                $('#statusChangeBox-' + value).html('');
                var html = "";
                var htmlSecond = "";
                var htmlSecond = "<p class='btn btn-danger text-center p-2' style='color:#fff;'>Inactive</p>";
                html += "<p onclick='statusChange(" + value + ")' id='buttonID" + value + "'";
                html += "class='btn btn_viewall text-center p-2 '>Inactive</p>";
                $('#statusChangeBox-' + value).html(html);
                $('#realStatus-' + value).html(htmlSecond);
            });

        }

        function callModal(id) {
            var href = '<?php echo e(route('companys.jobs.delete', ':id')); ?>';
            newhref = href.replace(':id', id);
            $('#delete-edu').attr('href', newhref);
            // $("#remove-" + id).remove();
            // var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            //     keyboard: false
            // });
            // myModal.toggle();
            // $('#staticBackdrop').modal('show');
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this job? All the data will be removed",
                // text: "Do you really want to delete?",
                icon: 'error',
                iconColor: '#64262f',
                showCancelButton: true,
                confirmButtonColor: '#007ba7',
                cancelButtonColor: '#64262f',
                customClass: "delete-sweet-alert",
                confirmButtonText: "<span id='delete-edu'><a class='text-white' href='<?php echo e(route('recruiter.jobs.delete', '')); ?>/" +
                    id +
                    "'>Yes</a></span>",
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success',
                    )
                }

            })
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('recruterpanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/recruterpanel/pages/jobs/index.blade.php ENDPATH**/ ?>