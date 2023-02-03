<?php $__env->startSection('content'); ?>
    <div class="row mt-2 mb-2">
        <div class="col-lg-6 mb-2">
            <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-sm shadow-sm myBtn border rounded">
                <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="black">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
            </a>
        </div>
    </div>
    <table  id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>phone</th>
            <th>Address</th>
            <th>gender</th>
            <th>Birthdate</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $customer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($customer->id); ?></td>
                <td><?php echo e($customer->name); ?></td>
                <td><?php echo e($customer->phone); ?></td>
                <td><?php echo e($customer->address); ?></td>
                <td>
                    <?php if($customer ->gender == 0): ?>
                        <?php echo e('Male'); ?>

                    <?php elseif($customer -> gender == 1): ?>
                        <?php echo e('FeMale'); ?>

                    <?php else: ?>
                        <?php echo e('khac'); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($customer -> birthdate); ?></td>
                <td>
                    <a href="<?php echo e(route('transaction.reservation.viewCountPerson',$customer -> id)); ?>">
                        <button class="btn-primary">Transaction</button>
                    </a>
                </td>
                <td>
                    <a href="<?php echo e(route('customer.edit',$customer -> id)); ?>">
                        <button class="btn btn-warning ">Edit</button>
                    </a>
                </td>
                <td>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/Customer/index.blade.php ENDPATH**/ ?>