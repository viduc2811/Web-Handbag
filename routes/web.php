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
use App\Http\Controllers\Admin\Users\RegisterController;
use  \App\Http\Controllers\Admin\MainController;
use  \App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Users\UserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Client\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Client\Auth\RegisteredUserController;

// Đăng nhập
Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store'])->name('login.store');
// Đăng xuất
Route::post('/logout', function () {
    Auth::logout();
    return redirect('admin/users/login');
})->name('logout');

// Đăng ký admin
Route::get('admin/users/register', [RegisterController::class, 'index'])->name('register');
Route::post('admin/users/register', [RegisterController::class, 'store']);


//Đăng nhập đăng ký khách hàng
// Route::get('client/register', [ClientLoginController::class, 'showRegistrationForm'])->name('client.register');
// Route::post('client/register', [ClientLoginController::class, 'register']);
// Route::post('client/logout', [ClientLoginController::class, 'logout'])->name('client.logout')->middleware('auth.client');
Route::get('/client/login', [ClientController::class, 'showLoginForm'])->name('client.login');
Route::post('/client/login', [ClientController::class, 'store'])->name('client.login.store');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function (){
        Route::get('main', [MainController::class,'index'])->name('admin.main');
        Route::get('/', [MainController::class,'index']);
        Route::get('users', [UserController::class,'index'])->name('users');
        
        Route::prefix('menus')->group(function (){
            Route::get('add', [MenuController::class,'create'])->name('menus.add');
            Route::post('add', [MenuController::class,'store']);
            Route::get('list', [MenuController::class,'index'])->name('menus.list');
            Route::get('edit/{menu}', [MenuController::class,'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update'])->name('menus.edit');
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
            Route::get('search', [MenuController::class, 'search'])->name('menus.search');
        });

        Route::prefix('products')->group(function (){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store'])->name('products.add');
            Route::get('list', [ProductController::class, 'index'])->name('products.list');
            Route::get('edit/{product}', [ProductController::class, 'show'])->name('products.edit');
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('search', [ProductController::class, 'search'])->name('products.search');
        });

        Route::prefix('sliders')->group(function (){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store'])->name('sliders.add');
            Route::get('list', [SliderController::class, 'index'])->name('sliders.list');
            Route::get('edit/{slider}', [SliderController::class, 'show'])->name('sliders.edit');
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });
        Route::post('upload/services', [\App\Http\Controllers\Admin\UploadController::class, 'store']);
        
        Route::get('customers', [\App\Http\Controllers\Admin\CartController::class, 'index'])->name('customers');;
        Route::get('customers/view/{customer}', [\App\Http\Controllers\Admin\CartController::class, 'show']);
    });
});

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
Route::middleware(['client'])->group(function () {
    // Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
// Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
// Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
// Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{cart_id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

// Tìm kiếm sản phẩm
Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');

Route::get('order-detail/{customer}',[\App\Http\Controllers\Admin\CartController::class, 'order'])->name('order-detail/{customer}');


Route::get('/orders',[\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
// Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'createOrder'])->name('order.create');
Route::get('/orders/search', [\App\Http\Controllers\OrderController::class, 'search'])->name('orders.search');

});
// Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('/');
Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

// Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
// Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
// Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
// Route::get('carts/delete/{cart_id}', [App\Http\Controllers\CartController::class, 'remove']);
// Route::post('carts', [App\Http\Controllers\CartController::class, 'addCart']);

// // Tìm kiếm sản phẩm
// Route::get('/search', [\App\Http\Controllers\ProductController::class, 'search'])->name('search');

// Route::get('order-detail/{customer}',[\App\Http\Controllers\Admin\CartController::class, 'order'])->name('order-detail/{customer}');


// Route::get('/orders',[\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
// // Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'createOrder'])->name('order.create');
// Route::get('/orders/search', [\App\Http\Controllers\OrderController::class, 'search'])->name('orders.search');


Route::prefix('client')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('client.login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('client.register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('client.logout'); // Thêm route đăng xuất

});