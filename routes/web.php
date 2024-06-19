<?php



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

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\Users\LoginController;
use  \App\Http\Controllers\Admin\MainController;
use  \App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;

Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')->group(function (){
        Route::get('main', [MainController::class,'index'])->name('admin');
        Route::get('/', [MainController::class,'index']);
        
        Route::prefix('menus')->group(function (){
            Route::get('add', [MenuController::class,'create'])->name('menus.add');
            Route::post('add', [MenuController::class,'store']);
            Route::get('list', [MenuController::class,'index'])->name('menus.list');
            Route::get('edit/{menu}', [MenuController::class,'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update'])->name('menus.edit');
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });

        Route::prefix('products')->group(function (){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store'])->name('products.add');
            Route::get('list', [ProductController::class, 'index'])->name('products.list');
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('products.edit');
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
        });

        Route::prefix('sliders')->group(function (){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store'])->name('products.add');
            Route::get('list', [SliderController::class, 'index'])->name('sliders.list');
            Route::get('edit/{slider}', [SliderController::class, 'show'])->name('sliders.edit');
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
    });
});
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);