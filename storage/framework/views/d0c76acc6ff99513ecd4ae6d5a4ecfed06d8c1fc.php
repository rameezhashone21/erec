<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        .set_edit_del_button {
            width: 100%;
            display: flex;
            align: center;
        }
    </style>
<?php $__env->stopSection(); ?>


<div class="col-xl-9 col-lg-8">
    <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
    </button>
    <div class="dashboard_content bg-white rounded_10 p-4">
        <?php if(session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>


        <div class="d-md-flex aling-items-center mb-3">
            <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">All Exams List</h2>
            <div class="ms-auto">
                <a href="<?php echo e(route('company.exam.create')); ?>" role="button"
                    class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                    Add Exam
                </a>
            </div>
        </div>

        <div class="table-responsive table_height scrollbar">
            <table class="table table-striped table-payment display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th class="set-width-table-1">#</th>
                        <th class="set-width-table-3">Exam title</th>
                        <th class="set-width-table-1">Total Exam Time</th>
                        <th class="set-width-table-1">Total Questions</th>
                        <th class="set-width-table-1">Show Questions</th>
                        <th class="set-width-table-4">Status</th>
                        <th class="set-width-table-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(count($exams) > 0): ?>
                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="set-width-table-1">
                                    <?php echo e($key + 1); ?>.
                                </td>
                                <td class="set-width-table-3"><?php echo e($row['exam_title']); ?></td>
                                <td class="set-width-table-1"><?php echo e($row['exam_completion_in_minutes']); ?> minutes</td>
                                <td class="set-width-table-1">
                                    <?php echo e(App\Models\ExamQuestion::where('exam_id', $row['id'])->count()); ?></td>
                                <td class="set-width-table-1"><?php echo e($row['question_showto_condidate']); ?></td>
                                <td class="set-width-table-4">
                                    <?php if($row->status == 0): ?>
                                        <p class="btn btn-danger text-center p-2">Inactive</p>
                                    <?php else: ?>
                                        <p class="btn btn-success text-center p-2" style="color:#fff;">Active</p>
                                    <?php endif; ?>
                                </td>
                                <td class="set-width-table-4">
                                    <div class="d-flex" style="gap: 4px;">
                                        <div style="width:100%; display:flex; align-items:center;">
                                            <a href="<?php echo e(route('company.exam.update', ['id' => $row->id])); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                                                class="btn btn_viewall">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <form action="<?php echo e(route('company.exam.delete', ['id' => $row->id])); ?>"
                                            method="get" style="width:100%; display:flex; align-items:center;">
                                            <?php echo csrf_field(); ?>
                                            <a type="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="Delete" class="btn btn_viewall delete-exam-btn">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </form>

                                        <a href="<?php echo e(route('company.exam.question.listing', ['id' => $row->id])); ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Question"
                                            class="btn btn_viewall">
                                            <i class="fas fa-question-circle"></i> Questions
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" align="center" class="text-center">
                                You didn't add any exams yet
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php echo e($exams->links()); ?>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('.delete-exam-btn').click(function() {
            var recordId = $(this).data('record-id');

            console.log("rec", recordId)
            $('#record_id').val(recordId); // Set the record ID in the hidden input field

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if user confirms
                    $(this).closest('form').submit();
                }
            });
        });
    });
</script>

<?php $__env->startSection('bottom_script'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\Users\Rameez Ali\Documents\erec1\resources\views/livewire/company/show-exams.blade.php ENDPATH**/ ?>