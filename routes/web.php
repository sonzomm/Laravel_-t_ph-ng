<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['Middleware' => ['auth','checkRole:Super,Admin,Customer']], function () {
    Route::resource('user',\App\Http\Controllers\UserController::class)->only([
        'show'
    ]);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [\App\Http\Controllers\DashboradController::class, 'index'])->name('dashboard.index');

});

Route::view('/login', 'auth.login')->name('login');
Route::post('/postLogin', [\App\Http\Controllers\AuthController::class, 'postLogin'])->name('postlogin');



Route::group(['middleware' => ['auth']], function () {
    Route::name('transaction.reservation.')->group(function () {
        Route::get('/createIdentity', [\App\Http\Controllers\TransactionRoomReservationController::class, 'createIdentity'])->name('createIdentity');
        Route::get('/pickFromCustomer', [\App\Http\Controllers\TransactionRoomReservationController::class, 'pickFromCustomer'])->name('pickFromCustomer');
        Route::post('/storeCustomer', [\App\Http\Controllers\TransactionRoomReservationController::class, 'storeCustomer'])->name('storeCustomer');
        Route::get('/{customer}/viewCountPerson', [\App\Http\Controllers\TransactionRoomReservationController::class, 'viewCountPerson'])->name('viewCountPerson');
        Route::get('/{customer}/chooseRoom', [\App\Http\Controllers\TransactionRoomReservationController::class, 'chooseRoom'])->name('chooseRoom');
        Route::get('/{customer}/{room}/{from}/{to}/confirmation', [\App\Http\Controllers\TransactionRoomReservationController::class, 'confirmation'])->name('confirmation');
        Route::post('/{customer}/{room}/payDownPayment', [\App\Http\Controllers\TransactionRoomReservationController::class, 'payDownPayment'])->name('payDownPayment');
    });

    Route::get('/index',[\App\Http\Controllers\index::class,'index']) ->name('index');
//home
    Route::get('/home',[\App\Http\Controllers\Home::class,'index']) ->name('home');


    Route::get('/user',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');
    Route::get('/user/create',[\App\Http\Controllers\UserController::class,'create']) ->name('user.create');
//thêm dl vào database
    Route::post('/user/store',[\App\Http\Controllers\UserController::class,'store']) ->name('user.store');
// edit
    Route::get('/user/{user}/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
// luu dl lên data
    Route::put('/user/{user}/edit',[\App\Http\Controllers\UserController::class,'update'])->name('user.update');
// xao
    Route::delete('/user/{user}/delete',[\App\Http\Controllers\UserController::class,'destroy'])->name('user.destroy');
    Route::get('/user/{user}/show',[\App\Http\Controllers\UserController::class,'show'])->name('user.show');

//hien thi phong
    Route::get('/room',[\App\Http\Controllers\RoomController::class,'index'])->name('room.index');

    Route::get('/room/create',[\App\Http\Controllers\RoomController::class,'create']) ->name('room.create');
// thêm dl vào database
    Route::post('/room/store',[\App\Http\Controllers\RoomController::class,'store']) ->name('room.add');
// edit
    Route::get('/room/{room}/edit',[\App\Http\Controllers\RoomController::class,'edit'])->name('room.edit');
// luu dl lên data

    Route::put('/room/{room}/edit',[\App\Http\Controllers\RoomController::class,'update'])->name('room.update');

    Route::get('/room/{room}/show',[\App\Http\Controllers\RoomController::class,'show'])->name('room.show');


//loai phong
    Route::resource('type', \App\Http\Controllers\TypeController::class);


    Route::get('/customer',[\App\Http\Controllers\CustomerController::class,'index'])->name('customer.index');
    Route::get('/customer/create',[\App\Http\Controllers\CustomerController::class,'create']) ->name('customer.create');
// thêm dl vào database
    Route::post('/customer/store',[\App\Http\Controllers\CustomerController::class,'store']) ->name('customer.store');
// edit
    Route::get('/customer/{customer}/edit',[\App\Http\Controllers\CustomerController::class,'edit'])->name('customer.edit');
// luu dl lên data
    Route::put('/customer/{customer}/edit',[\App\Http\Controllers\CustomerController::class,'update'])->name('customer.update');
    Route::put('/customer/{customer}/show',[\App\Http\Controllers\CustomerController::class,'show'])->name('customer.show');
// xao
    Route::delete('/customer/{customer}',[\App\Http\Controllers\CustomerController::class,'destroy'])->name('customer.destroy');

    Route::get('/dashbroad',[\App\Http\Controllers\DashboradController::class,'dashbroad'])->name('dashbroad');


    Route::get('/transaction',[\App\Http\Controllers\TransactionController::class,'index'])->name('transaction.index');
    Route::get('/transaction/create',[\App\Http\Controllers\TransactionController::class,'create']) ->name('transaction.create');
// thêm dl vào database
    Route::post('/transaction/store',[\App\Http\Controllers\TransactionController::class,'store']) ->name('transaction.add');
// edit
    Route::get('/transaction/{transaction}/edit',[\App\Http\Controllers\TransactionController::class,'edit'])->name('transaction.edit');
// luu dl lên data
    Route::put('/transaction/{transaction}/edit',[\App\Http\Controllers\TransactionController::class,'update'])->name('transaction.update');
// xao
    Route::delete('/transaction/{transaction}',[\App\Http\Controllers\TransactionController::class,'destroy'])->name('transaction.destroy');
    Route::get('/transaction/{transaction}/show',[\App\Http\Controllers\TransactionController::class,'show'])->name('transaction.show');


    Route::get('/payment', [\App\Http\Controllers\PaymentController::class, 'index'])->name('payment.index');
    Route::get('/payment/{payment}/invoice', [\App\Http\Controllers\PaymentController::class, 'invoice'])->name('payment.invoice');

    Route::get('/transaction/{transaction}/payment/create', [\App\Http\Controllers\PaymentController::class, 'create'])->name('transaction.payment.create');
    Route::post('/transaction/{transaction}/payment/store', [\App\Http\Controllers\PaymentController::class, 'store'])->name('transaction.payment.store');

    Route::get('/get-dialy-guest-chart-data', [\App\Http\Controllers\ChartController::class, 'dialyGuestPerMonth']);
    Route::get('/get-dialy-guest', [\App\Http\Controllers\ChartController::class, 'dialyGuest'])->name('chart.dialyGuest');


});
