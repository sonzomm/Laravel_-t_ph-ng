<?php $__env->startSection('content'); ?>
    <div class="container mt-5 mb-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                    <hr>
                    <div class="table-responsive p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>From</td>
                                    <td>To</td>
                                </tr>
                                <tr class="content">
                                    <td class="font-weight-bold"> <?php echo e(\App\Models\Helper::dateDayFormat($payment->transaction->check_in)); ?></td>
                                    <td class="font-weight-bold"> <?php echo e(\App\Models\Helper::dateDayFormat($payment->transaction->check_out)); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="products p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>Description</td>
                                    <td class="text-center">Days</td>
                                    <td class="text-center">Room Price / Day</td>
                                    <td class="text-center">Total Price</td>
                                </tr>
                                <tr class="content">
                                    <td><?php echo e($payment->transaction->room->type->name); ?> -
                                        <?php echo e($payment->transaction->room->number); ?></td>
                                    <td class="text-center"><?php echo e($payment->transaction->getDateDifferenceWithPlural()); ?>

                                    </td>
                                    <td class="text-center">
                                        <?php echo e(\App\Models\Helper::convertToRupiah($payment->transaction->room->price)); ?></td>
                                    <td class="text-center">
                                        <?php echo e(\App\Models\Helper::convertToRupiah($payment->transaction->getTotalPrice())); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="products p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td></td>
                                    <td class="text-center">Minimum DownPayment</td>
                                    <td class="text-center">Paid Off</td>
                                    <td class="text-center">
                                        insufficient payment</td>
                                </tr>
                                <tr class="content">
                                    <td></td>
                                    <td class="text-center">
                                        <?php echo e(\App\Models\Helper::convertToRupiah($payment->transaction->getMinimumDownPayment())); ?></td>
                                    <td class="text-center"><?php echo e(\App\Models\Helper::convertToRupiah($payment->price)); ?></td>
                                    <td class="text-center">
                                        <?php echo e($payment->transaction->getTotalPrice() - $payment->transaction->getTotalPayment() <= 0 ? '-' : \App\Models\Helper::convertToRupiah($payment->transaction->getTotalPrice($payment->transaction->room->price, $payment->transaction->check_in, $payment->transaction->check_out) - $payment->transaction->getTotalPayment())); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="address p-2">
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="add">
                                    <td>Customer Details</td>
                                </tr>
                                <tr class="content">
                                    <td>
                                        Customer ID : <?php echo e($payment->transaction->customer->id); ?>

                                        <br>Customer Name : <?php echo e($payment->transaction->customer->name); ?>

                                        <br> Customer Address : <?php echo e($payment->transaction->customer->address); ?>

                                        <br>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\new\resources\views/payment/invoice.blade.php ENDPATH**/ ?>