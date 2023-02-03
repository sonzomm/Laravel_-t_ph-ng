<?php $__env->startSection('content'); ?>
    <div id="dashboard">

            <div class="col-lg-6 mb-3">
                <div class="row mb-3">
                    <div class="col-lg-6">
                        <div class="card shadow-sm border" style="border-radius: 0.5rem">
                            <div class="card-body">
                                <h5><?php echo e(count($transactions)); ?> Guests this day</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="card shadow-sm border">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-lg-12 d-flex justify-content-between">
                                        <h3>Today Guests</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

                                <table  id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Room</th>
                                        <th>Stay</th>
                                        <th>Day Left</th>
                                        <th>Debt</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td>
                                                <a
                                                    href="<?php echo e(route('customer.show', ['customer' => $transaction->customer->id])); ?>">
                                                    <?php echo e($transaction->customer->name); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('room.show', ['room' => $transaction->room->id])); ?>">
                                                    <?php echo e($transaction->room->number); ?>

                                                </a>
                                            </td>
                                            <td>
                                                <?php echo e(\App\Models\Helper::dateFormat($transaction->check_in)); ?> ~
                                                <?php echo e(\App\Models\Helper::dateFormat($transaction->check_out)); ?>

                                            </td>
                                            <td><?php echo e(\App\Models\Helper::getDateDifference(now(), $transaction->check_out) == 0 ? 'Last Day' : \App\Models\Helper::getDateDifference(now(), $transaction->check_out) . ' ' . \App\Models\Helper::plural('Day', \App\Models\Helper::getDateDifference(now(), $transaction->check_out))); ?>

                                            </td>
                                            <td>
                                                <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() <= 0 ? '-' : \App\Models\Helper::convertToRupiah($transaction->getTotalPrice() - $transaction->getTotalPayment())); ?>

                                            </td>
                                            <td>
                                                    <span
                                                        class="justify-content-center badge <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'bg-success' : 'bg-warning'); ?>">
                                                        <?php echo e($transaction->getTotalPrice() - $transaction->getTotalPayment() == 0 ? 'Hoàn thành' : 'Chưa hoàn thành'); ?>

                                                    </span>
                                                <?php if(\App\Models\Helper::getDateDifference(now(), $transaction->check_out) < 1): ?>
                                                    <span class="justify-content-center badge bg-danger">
                                                            chuẩn bị trả phòng
                                                        </span>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                There's no data in this table
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/dashboard/index.blade.php ENDPATH**/ ?>