<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Dashboard\ArtistController as DashboardArtistController;
use App\Http\Controllers\Dashboard\Admin\PagesController as DashboardPagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Dashboard\Admin\ProductController as DashboardProductController;
use App\Http\Controllers\Dashboard\Admin\HotProductController;
use App\Http\Controllers\Dashboard\Admin\UsersController as DashboardUsersController;
use App\Http\Controllers\Dashboard\Admin\SupplierController as DashboardSupplierController;
use App\Http\Controllers\Dashboard\Admin\OrderController as DashboardOrderController;
use App\Http\Controllers\Dashboard\Admin\SearchOrdersController as DashboardSearchOrdersController;
use App\Http\Controllers\Dashboard\Admin\SearchProductsController as DashboardSearchProductsController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you register web routes for the application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/checkout/{product}/success', [CheckoutController::class, 'success'])->name("checkout.success");
    Route::get('/checkout/{product}/cancel', [CheckoutController::class, 'cancel'])->name("checkout.cancel");
    Route::get('/upload',[PagesController::class, 'upload'])->name("upload");
    Route::get('/orders',[OrderController::class, 'index'])->name("orders");
    Route::get('/orders/{order}',[OrderController::class, 'view'])->name("orders.view");
    Route::post('/checkout/{product}/buy', [CheckoutController::class, 'stripeCheckout'])->name("checkout");
    Route::post('/dashboard/artist/store',[DashboardArtistController::class, 'store'])->name("dashboard.artist_store");
    Route::post('/enquiries', [EnquiryController::class, 'store'])->name('enquiries.store');
    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/pages"], function() {
        // routes for verified users with the site admin role relating to page content management
            Route::get('/',[DashboardPagesController::class, 'index'])->name("dashboard.admin.pages");
            Route::get('/{page}/edit',[DashboardPagesController::class, 'edit'])->name("dashboard.admin.pages.edit");
            Route::post('/update',[DashboardPagesController::class, 'update'])->name("dashboard.admin.pages.update");

        });
    });

    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/users"], function() {
        // routes for verified users with the site admin role relating to page content management
            Route::get('/',[DashboardUsersController::class, 'index'])->name("dashboard.admin.users");
            Route::get('/{user}/edit',[DashboardUsersController::class, 'edit'])->name("dashboard.admin.users.edit");
            Route::get('/{term?}',[DashboardUsersController::class, 'index'])->name("users.list");
            Route::post('/update',[DashboardUsersController::class, 'update'])->name("dashboard.admin.users.update");
            Route::delete('/{user}/destroy',[DashboardUsersController::class, 'destroy'])->name("dashboard.admin.users.delete");

        });

    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/orders"], function() {
            Route::get('/',[DashboardOrderController::class, 'index'])->name("dashboard.admin.orders");
            Route::get('/{term?}',[DashboardSearchOrdersController::class, 'orders'])->name("orders.search");
         });


    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/suppliers"], function() {
        // routes for verified users with the site admin role relating to suppliers management
            Route::get('/',[DashboardSupplierController::class, 'index'])->name("dashboard.admin.suppliers");
            Route::get('/create',[DashboardSupplierController::class, 'create'])->name("dashboard.admin.suppliers.create");
            Route::get('/{supplier}',[DashboardSupplierController::class, 'show'])->name("dashboard.admin.suppliers.view");
            Route::get('/{supplier}/edit',[DashboardSupplierController::class, 'edit'])->name("dashboard.admin.suppliers.edit");
//            Route::get('/{term?}',[DashboardSupplierController::class, 'suppliers'])->name("dashboard.admin.suppliers.list");
            Route::post('/store',[DashboardSupplierController::class, 'store'])->name("dashboard.admin.supplier_store");
            Route::post('/update',[DashboardSupplierController::class, 'update'])->name("dashboard.admin.suppliers.update");
            Route::delete('/{supplier}/destroy',[DashboardSupplierController::class, 'destroy'])->name("dashboard.admin.suppliers.delete");
        });

    Route::group(["middleware"=>"auth.site-admin", "prefix"=>"dashboard/admin/products"], function() {
        // routes for verified users with the site admin role relating to page content management
            Route::get('/',[DashboardProductController::class, 'index'])->name("dashboard.admin.products");
            Route::get('/hot',[HotProductController::class, 'index'])->name("dashboard.admin.hot_products");
            Route::post('/hot/{product}/toggle_on',[HotProductController::class, 'toggle_on'])->name("dashboard.admin.products.hot_toggle_on");
            Route::post('/hot/{product}/toggle_off',[HotProductController::class, 'toggle_off'])->name("dashboard.admin.products.hot_toggle_off");
            Route::get('/create',[DashboardProductController::class, 'create'])->name("dashboard.admin.products.create");
            Route::post('/store',[DashboardProductController::class, 'store'])->name("product_store");
            Route::get('/{product}/edit',[DashboardProductController::class, 'edit'])->name("dashboard.admin.products.edit");
            Route::get('/{term?}',[DashboardSearchProductsController::class, 'products'])->name("dashboard.admin.products.search");
            Route::post('/update',[DashboardProductController::class, 'update'])->name("dashboard.admin.products.update");
            Route::delete('/{product}/destroy',[DashboardProductController::class, 'destroy'])->name("dashboard.admin.products.delete");

        });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/',[PagesController::class, 'index'])->name("home");

Route::get('/about',[PagesController::class, 'about'])->name("about");

Route::get('/contact',[PagesController::class, 'contact'])->name("contact");


Route::get('/artists',[SearchController::class, 'artists'])->name("artists");

Route::get('/products',[ProductController::class, 'index'])->name("products");
Route::get('/products/{product}',[ProductController::class, 'view'])->name("product.view");
Route::get('/search/artists/{term?}',[SearchController::class, 'artists'])->name("search.artists");
Route::get('/search/products/{term?}',[SearchController::class, 'products'])->name("search.products");
Route::get('/{order}/view',[DashboardOrderController::class, 'show'])->name("orders.view");

require __DIR__.'/auth.php';
