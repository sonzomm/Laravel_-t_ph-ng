<?php $__env->startSection('title', 'Room'); ?>
<?php $__env->startSection('head'); ?>
    <style>
        .text {
            display: block;
            width: 150px;
            height: 100px;
            overflow: hidden;
            /* white-space: nowrap; */
            text-overflow: ellipsis;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="row mt-2 mb-2">
                <div class="col-lg-12 mb-2">
                    <div class="d-grid gap-2 d-md-block">
                        <button id="add-button" type="button" class="btn btn-sm shadow-sm myBtn border rounded">
                            <svg width="25" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="black">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="room-table" class="table table-sm table-hover" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th scope="col">Number</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Capacity</th>
                                            <th scope="col">Price / Day</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php $__empty_1 = true; $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($room->number); ?></td>

                                                <td><?php echo e($room->capacity); ?></td>
                                                <td><?php echo e(Helper::convertToRupiah($room->price)); ?></td>
                                                <td><?php echo e($room->name); ?></td>
                                                <td>
                                                    <button class="btn btn-light btn-sm rounded shadow-sm border"
                                                        data-action="edit-room" data-room-id="<?php echo e($room->id); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit room">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <form class="btn btn-sm delete-room" method="POST"
                                                        id="delete-room-form-<?php echo e($room->id); ?>"
                                                        action="<?php echo e(route('room.destroy', ['room' => $room->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <a class="btn btn-light btn-sm rounded shadow-sm border delete"
                                                            href="#" room-id="<?php echo e($room->id); ?>" room-role="room"
                                                            room-name="" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete room">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </form>
                                                    <a class="btn btn-light btn-sm rounded shadow-sm border"
                                                        href="<?php echo e(route('room.show', ['room' => $room->id])); ?>"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Room detail">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
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
                        <div class="card-footer">
                            <h3>Room</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('template.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel-Hotel-main\Laravel-Hotel-main\resources\views/room/index.blade.php ENDPATH**/ ?>