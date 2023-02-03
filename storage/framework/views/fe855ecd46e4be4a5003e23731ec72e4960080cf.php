<?php $__env->startSection('content'); ?>
    <div class="row">





    </div>
    <div class="row">
        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <div
                    class="row card g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">
                            <a class="bg-dark p-3 text-center align-middle text-white" style="border-bottom-right-radius: 1rem"
                                href="<?php echo e(route('room.show', ['room' => $transaction->room->id])); ?>">
                                <?php echo e($transaction->room->number); ?>

                            </a>
                        </strong>
                        <div class="p-4">
                            <h3 class="mb-0">
                                <a href="<?php echo e(route('customer.show', ['customer' => $transaction->customer->id])); ?>">
                                    <?php echo e($transaction->customer->name); ?>

                                </a>
                            </h3>
                            <div class="mb-1 text-muted">
                                <?php echo e(\App\Models\Helper::dateFormat($transaction->check_in)); ?> -
                                <?php echo e(\App\Models\Helper::dateFormat($transaction->check_out)); ?>

                            </div>
                            <p class="card-text mb-auto">Room Status: <?php echo e($transaction->room->roomStatus->name); ?></p>
                        </div>
                    </div>

                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/Chart/chart_detail.blade.php ENDPATH**/ ?>