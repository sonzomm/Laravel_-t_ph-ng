<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-md-8 mt-2">
                <div class="card shadow-sm border">
                    <div class="card-body p-3">
                        <h2><?php echo e($roomsCount); ?> Room Available for:</h2>
                        <p><?php echo e(request()->input('count_person')); ?>

                            <?php echo e(\App\Models\Helper::plural('People', request()->input('count_person'))); ?> on
                            <?php echo e(\App\Models\Helper::dateFormat(request()->input('check_in'))); ?> to
                            <?php echo e(\App\Models\Helper::dateFormat(request()->input('check_out'))); ?></p>
                        <hr>
                        <form method="GET"
                            action="<?php echo e(route('transaction.reservation.chooseRoom', ['customer' => $customer->id])); ?>">
                            <div class="row mb-2">
                                <input type="text" hidden name="count_person"
                                    value="<?php echo e(request()->input('count_person')); ?>">
                                <input type="date" hidden name="check_in" value="<?php echo e(request()->input('check_in')); ?>">
                                <input type="date" hidden name="check_out" value="<?php echo e(request()->input('check_out')); ?>">
                            </div>
                        </form>
                        <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-lg-12">
                                    <div
                                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                        <div class="col p-4 d-flex flex-column position-static">
                                            <strong class="d-inline-block mb-2 text-secondary"><?php echo e($room->capacity); ?>

                                                <?php echo e(Str::plural('Person', $room->capacity)); ?></strong>
                                            <h3 class="mb-0"><?php echo e($room->number); ?> ~ <?php echo e($room->type->name); ?></h3>
                                            <div class="mb-1 text-muted"><?php echo e(\App\Models\Helper::convertToRupiah($room->price)); ?> /
                                                Day
                                            </div>



                                            <a href="<?php echo e(route('transaction.reservation.confirmation', ['customer' => $customer->id, 'room' => $room->id, 'from' => request()->input('check_in'), 'to' => request()->input('check_out')])); ?>"
                                                class="btn myBtn shadow-sm border w-100 m-2">Choose</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h3>Theres no available room for <?php echo e(request()->input('count_person')); ?> or more
                                    person
                                </h3>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php echo e($rooms->onEachSide(1)->appends([
        'count_person' => request()->input('count_person'),
        'check_in' => request()->input('check_in'),
        'check_out' => request()->input('check_out'),
        'sort_name' => request()->input('sort_name'),
        'sort_type' => request()->input('sort_type'),
    ])->links('template.paginationlinks')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table>
                            <tr>
                                <td style="text-align: center; width:50px">
                                    <span>
                                        <i class="fas <?php echo e($customer->gender == 'Male' ? 'fa-male' : 'fa-female'); ?>">
                                        </i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->name); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-user-md"></i>
                                    </span>
                                </td>
                                <td><?php echo e($customer->gender); ?></td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-birthday-cake"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->birthdate); ?>

                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: center; ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e($customer->address); ?>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/transaction/reservation/chooseRoom.blade.php ENDPATH**/ ?>