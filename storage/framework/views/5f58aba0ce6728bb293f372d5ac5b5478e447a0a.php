<?php $__env->startSection('content'); ?>
    <form method="post" action="<?php echo e(route('customer.edit',$customer->id)); ?>">
        <?php echo method_field('PUT'); ?>
        <?php echo csrf_field(); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="<?php echo e($customer->name); ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo e($customer->phone); ?>">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" id="password" placeholder="Password" value="<?php echo e($customer->address); ?>">
            </div>
            <div class="form-radio">
                <label>Gender</label>
                <input type="radio" class="form-radio-input" id="gender_male" value="0" name="gender" <?php if($customer->gender == 0): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="gender_male">Male</label>
                <input type="radio" class="form-radio-input" id="gender_female" value="1" name="gender" <?php if($customer->gender == 1): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="gender_male">Female</label>
                <input type="radio" class="form-radio-input" id="gender_other" value="2" name="gender" <?php if($customer->gender == 2): ?> checked <?php endif; ?>>
                <label class="form-check-label" for="gender_other">Other</label>
            </div>
            <div class="form-group">
                <label for="birth">Birthdate</label>
                <input type="text" name="brithdate" class="form-control" id="birth" placeholder="birthday" value="<?php echo e($customer->birthdate); ?>">
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

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/customer/edit.blade.php ENDPATH**/ ?>