<?php $__env->startSection('content'); ?>
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
    <form method="post" action="<?php echo e(route('customer.store')); ?>">
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo e(old('name')); ?>">
            </div>
            <div class="form-group">
                <label for="email">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="<?php echo e(old('phone')); ?>">
            </div>
            <div class="form-group">
                <label for="password">Address</label>
                <input type="text" name="address" class="form-control" id="password" placeholder="Enter password" value="<?php echo e(old('address')); ?>">
            </div>
            <div class="form-radio">
                <label>Gender</label>
                <input type="radio" class="form-radio-input" id="gender_male" value="0" name="gender" checked>
                <label class="form-check-label" for="gender_male">Male</label>
                <input type="radio" class="form-radio-input" id="gender_female" value="1" name="gender">
                <label class="form-check-label" for="gender_male">Female</label>
                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="gender">
                <label class="form-check-label" for="gender_other">Other</label>
            </div>
            <div class="form-group">
                <label for="birth">Birthdate</label>
                <input type="date" name="birthdate" class="form-control" id="idcard" placeholder="Enter Birthdate" value="<?php echo e(old('brithdate')); ?>">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function (){
            $('#customer').addClass('menu-open');
            $('#customer_manage').addClass('active');
            $('#customer_create').addClass('active');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/Customer/create.blade.php ENDPATH**/ ?>