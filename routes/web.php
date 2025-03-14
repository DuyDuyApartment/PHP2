<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('user.index');
});
Route::get('Home', function () {
    return view('user.index');
});

Route::get('manager', function () {
    return view('backend.index');
});
//phong

//admin.

Route::get('admin', 'AdminController@index')->name('admin');

//booking backend khach khong dat phong
Route::get('admin/{id}/create', 'Backend\HoadonController@create')->name('admin.create');
Route::post('admin/store', 'Backend\HoadonController@store')->name('admin.store');
Route::get('admin/{id}/edit', 'Backend\HoadonController@edit')->name('admin.edit');
Route::get('admin/{id}/show', 'Backend\HoadonController@show')->name('admin.show');
Route::get('admin/{id}/update', 'Backend\HoadonController@update')->name('admin.update');
Route::get('admin/{id}/delete', 'Backend\HoadonController@destroy')->name('admin.destroy');
Route::post('admin/pay', 'Backend\HoadonController@pay')->name('admin.pay');
//loại phòng
Route::resource('/backend/loaiphong', 'Backend\LoaiPhongController');
//phong
Route::get('/backend/phong/pdf', 'Backend\PhongController@pdf')->name('phong.pdf');
Route::get('/backend/phong/print', 'Backend\PhongController@print')->name('phong.print');
Route::resource('/backend/phong', 'Backend\PhongController');

//xac thuc tai khoang
Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::get('/home', 'HomeController@index')->name('home');

//frontend
//khachhang
Route::resource('/user', 'Frontend\UserController');

//booking backend khach dat phong
Route::get('/Backend/booking', 'Frontend\BookingController@index')->name('backend.booking.index')->middleware(['web', 'auth:admin']);
Route::put('/Backend/booking/update/{bk_ma}', 'Frontend\BookingController@update')->name('backend.booking.update')->middleware(['web', 'auth:admin']);
Route::patch('/Backend/booking/edit/{bk_ma}', 'Frontend\BookingController@edit')->name('backend.booking.edit')->middleware(['web', 'auth:admin']);
Route::get('/Backend/booking/{id}/checkin', 'Frontend\BookingController@checkin')->name('backend.booking.checkin')->middleware(['web', 'auth:admin']);
Route::get('/Backend/booking/active', 'Frontend\BookingController@active')->name('backend.booking.active')->middleware(['web', 'auth:admin']);

//booking user
Route::get('orders', 'ExampleController@index')->name('orders');
Route::get('orders/{id}/create', 'ExampleController@create')->name('orders.create');
Route::post('orders/store', 'ExampleController@store')->name('orders.store');
Route::post('orders/{id}/update', 'ExampleController@update')->name('orders.update');

// admin manager
Route::group(['prefix' => 'manager', 'as' => 'manager.', 'namespace' => 'Admin', 'middleware' => ['auth:admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    // khachhang
    Route::resource('khachhang', 'KhachHangController');
    // Room Types
    Route::delete('room-types/destroy', 'RoomTypesController@massDestroy')->name('room-types.massDestroy');
    Route::resource('room-types', 'RoomTypesController');
    // Rooms
    Route::delete('rooms/destroy', 'RoomsController@massDestroy')->name('rooms.massDestroy');
    Route::resource('rooms', 'RoomsController');
    // Bookings
    Route::delete('bookings/destroy', 'BookingsController@massDestroy')->name('bookings.massDestroy');
    Route::resource('bookings', 'BookingsController');
});

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.listlp');
    Route::get('/create/{id}', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/my-bookings', [OrderController::class, 'myBookings'])->name('orders.mybookings');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('orders.update');
})->middleware('auth');