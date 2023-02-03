<?php $__env->startSection('content'); ?>
<form method="POST" action="<?php echo e(route('room.update', ['room'=> $rooms->id])); ?>">
    <?php echo method_field('PUT'); ?>
    <?php echo csrf_field(); ?>
    <div class="card-body">
        <div class="col-md-12">
            <label for="type_id" class="form-label">Type</label>
            <select id="type_id" name="type_id" class="form-control select2">
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div id="error_type_id" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-control select2">
                <option value="0">Booking</option>
                <option value="1">Booked</option>
            </select>
            <div id="error_room_status_id" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="number" class="form-label">Room Number</label>
            <input room="text" class="form-control <?php $__errorArgs = ['number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="number" name="number"
                   value="<?php echo e($rooms->number); ?>" placeholder="ex: 1A">
            <div id="error_number" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="capacity" class="form-label">Capacity</label>
            <input room="text" class="form-control <?php $__errorArgs = ['capacity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="capacity"
                   name="capacity" value="<?php echo e($rooms->capacity); ?>" placeholder="ex: 4">
            <div id="error_capacity" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="price" class="form-label">Price</label>
            <input room="text" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="price" name="price"
                   value="<?php echo e($rooms->price); ?>" placeholder="ex: 500000">
            <div id="error_price" class="text-danger error"></div>
        </div>
        <div class="col-md-12">
            <label for="view" class="form-label">View</label>
            <textarea class="form-control" id="view" name="view" rows="3" placeholder="ex: window see beach"><?php echo e($rooms->view); ?></textarea>
            <div id="error_view" class="text-danger error"></div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/Room/edit.blade.php ENDPATH**/ ?>