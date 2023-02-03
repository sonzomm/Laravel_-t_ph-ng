<?php $__env->startSection('content'); ?>
    <div class="container mt-3">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card shadow-sm border">
                    <div class="card-header">
                        <h2>Add Customer</h2>
                    </div>
                    <div class="card-body p-3">
                        <form  method="POST" action="<?php echo e(route('transaction.reservation.storeCustomer')); ?>">
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
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/transaction/reservation/createIdentity.blade.php ENDPATH**/ ?>