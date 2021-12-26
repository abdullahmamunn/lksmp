<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Auth\AuthController;
use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\Menu\MenuController;
use App\Http\Controllers\Backend\Post\PostController;

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

Route::get('/', function () {
    return view('frontend.home');
});
Route::post('/register', [AuthController::class, 'registerRequest'])->name('admin.register');
Route::post('/login', [AuthController::class, 'loginRequest'])->name('admin.login');
Route::get('logout',[AuthController::class, 'logout'])->name('admin.logout');


Route::group(['middleware'=>'AuthCheck'],function(){

    Route::get('register', [AuthController::class, 'register']);
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::prefix('menu')->group(function(){
        Route::get('/view', [MenuController::class, 'index'])->name('menu');
        Route::get('/add',  [MenuController::class, 'add'])->name('menu.add');
        Route::post('/store',  [MenuController::class, 'store'])->name('menu.store');
        Route::get('/edit/{id}',  [MenuController::class, 'edit'])->name('menu.edit');
        Route::post('/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::get('/subparent', [MenuController::class, 'getSubParent'])->name('menu.getajaxsubparent');

        // Route::get('/icon','Backend\Menu\MenuIconController@index')->name('menu.icon');
        // Route::post('icon/store','Backend\Menu\MenuIconController@store')->name('menu.icon.store');
        // Route::get('icon/edit','Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
        // Route::post('icon/update/{id}','Backend\Menu\MenuIconController@update')->name('menu.icon.update');
        // Route::post('icon/delete','Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
    });

    Route::resource('category',CategoryController::class);
    Route::resource('post',PostController::class);
   
});
