<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\ClientController;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




// Route::get('/', function () {
//     return view('homepage.layouts.hometemplate');
    
// });


// allproducts page hometemplate page take extend kora ace,
//  so jodi amra allproducts page call kori then hometemplate pura page show hobe 

// category k hometemplate page a dekhanor jonno homepagecontroller ar modde Categories function dia view koraice 
Route::get('/', [HomepageController::class, 'index'])->name('allproducts');




Route::controller(ClientController::class)->group(function () {

    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/', 'AllProducts')->name('allproducts');

   
    // Route::get('/checkout', 'Checkout')->name('checkout');

});




// Route::get('/userprofile', [HomepageController::class, 'index'])->name('userprofile');
Route::get('/homepage/products', [HomepageController::class, 'index'])->name('frontend.homepage');
Route::get('/homepage/products/{category}', [HomepageController::class, 'Products']);


Route::middleware(['auth','user'])->group(function(){
    Route::get('/user-profile', [ClientController::class, 'UserProfile'])->name('userprofile');
    Route::get('/user-profile/pending-orders', [ClientController::class, 'PendingOrders'])->name('pendingorders');
    Route::get('/user-profile/dashboard', [ClientController::class, 'UserDashboard'])->name('userdashboard');
    Route::get('/product-details/{id}/{slug}', [ClientController::class, 'SingleProduct'])->name('singleproduct');
    Route::post('/add-product-to-cart', [ClientController::class, 'AddProductToCart'])->name('addproducttocart');
    Route::get('/add-to-cart', [ClientController::class, 'index'])->name('addtocart');
    Route::get('/remove-cart-item/{id}', [ClientController::class, 'RemoveCartItem'])->name('removecartitem');
    Route::get('/shipping-address', [ClientController::class, 'ShippingAddress'])->name('shippingaddress');
    Route::post('/add-shipping-address', [ClientController::class, 'AddShippingAddress'])->name('addshippingaddress');
    Route::get('/checkout', [ClientController::class, 'Checkout'])->name('checkout');
    Route::post('/place-order', [ClientController::class, 'PlaceOrder'])->name('placeorder');

});





// Route::prefix('frontend')->middleware('auth', 'guest')->group(function(){

//     Route::get('/homepage', [HomepageController::class, 'index'])->name('frontend.homepage');
    
// });


Route::get('/home/products', function () {
    return view('frontend.dashboard');
});





Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    

    Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');


    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');


    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.category.delete');

    Route::get('/pending-orders', [OrderController::class, 'PendingOrders'])->name('admin.order.pendingorders');
    Route::get('/accept_order/{id}', [OrderController::class, 'AcceptOrder'])->name('acceptorder');
 


    
});



// Route::controller(ProductController::class)->group(function () {
//     Route::get('/admin/product', 'index')->name('admin.product.index');
//     Route::get('/admin/product/create', 'create')->name('admin.product.create');
//     Route::post('/admin/product/store', 'store')->name('admin.product.store');
//     Route::get('/admin/product/edit/{id}', 'edit')->name('admin.product.edit');
//     Route::post('/admin/product/update/{id}', 'update')->name('admin.product.update');
//     Route::get('/admin/product/delete/{id}', 'destroy')->name('admin.product.delete');
    
// });

// Route::controller(UserController::class)->group(function () {
//     Route::get('/admin/user', 'index')->name('admin.user.index');
//     Route::get('/admin/user/create', 'create')->name('admin.user.create');
//     Route::post('/admin/user/store', 'store')->name('admin.user.store');
//     Route::get('/admin/user/edit/{id}', 'edit')->name('admin.user.edit');
//     Route::post('/admin/user/update/{id}', 'update')->name('admin.user.update');
//     Route::get('/admin/user/delete/{id}', 'destroy')->name('admin.user.delete');
// });

// Route::controller(CategoryController::class)->group(function () {
//     Route::get('/admin/category', 'index')->name('admin.category.index');
//     Route::get('/admin/category/create', 'create')->name('admin.category.create');
//     Route::post('/admin/category/store', 'store')->name('admin.category.store');
//     Route::get('/admin/category/edit/{id}', 'edit')->name('admin.category.edit');
//     Route::post('/admin/category/update/{id}', 'update')->name('admin.category.update');
//     Route::get('/admin/category/delete/{id}', 'destroy')->name('admin.category.delete');
// });





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
