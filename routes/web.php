<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Category;
use App\Http\Controllers\OdersController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Checklogin;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main.login');
});
Route::post('/login',[UsersController::class,'login']);

// Route::middleware(Checklogin::class)->group(function () {

    Route::controller(Category::class)->group(function(){
        Route::get('/cate','index');
        Route::post('/addcate','store');
        Route::delete('/deleteCate', 'destroy');
        Route::post('/{id}/updateCate', 'update');
        Route::get('/export', 'export')->name('exportexcel');

        // Route::delete('{formId}/delete', [AbcController::class, 'delete'])->name('delete');
    });

    Route::controller(UsersController::class)->group(function () {
        Route::get('/users','index');
        Route::post('/CreateUser','store');
        Route::post('/DeleteUser','destroy');
        Route::get('/{id}/editUser','edit')->name( 'EditUser' );
        Route::post('/UpdateUser','update')->name('UpdateUser');
        Route::get('/logout','logout');

    });

    Route::controller(RoleController::class)->group(function () {
        Route::get('/role','index')->name('role');
        // Route::get('/createRoles','create');
        Route::post('/createRole','store');
        Route::post('/deleteRole','destroy');
        Route::post('/{id}/updateRole','update');

    });

    Route::controller(CarController::class)->group(function () {
        Route::get('/cars','index')->name('cars');
        // Route::get('/createRoles','create');
        Route::post('/createCar','store');
        Route::post('/DeleteCar','destroy');
        Route::post('/importcars','import');
        Route::post('/test','test')->name('test');
        Route::get('/{id}/editCar','edit')->name( 'EditCar' );
        Route::get('/{id}/oderCar','oder')->name( 'OderCar' );
        Route::post('/UpdateCar','update')->name( 'UpdateCar' );

    });
    // Route::get('users/index/abc', [ABCController::class, 'index'])->name('users.abc');
    // {{route("users.abc")}};

// });

Route::controller(OdersController::class)->group(function () {
    Route::get('/Oder','index');
    // Route::get('/createRoles','create');
    Route::post('/getOder','store')->name('getOder');
    Route::post('/getCart','show');
    Route::post('/deleteOder','destroy');
    Route::post('/addtocart','update')->name('AddtoCart');

});

Route::controller(BillController::class)->group(function () {
    // Route::get('/Oder','index');
    Route::post('/paybill','update')->name('PayBill');
    Route::get('/{id}/getBill','index')->name('getBill');
    // Route::post('/deleteOder','destroy');
    // Route::post('/addBill','update');

});
