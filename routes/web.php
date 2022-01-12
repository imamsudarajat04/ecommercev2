<?php
use App\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
});

Route::get('/shop', "ShopController@index")->name('shop.index');
Route::get('/shop/category/{category}', "ShopController@category")->name('shop.category');

Route::get('/register', "RegisterController@index")->name('register.index');
Route::post('/register/store', "RegisterController@store")->name('register.store');
Route::get('/login', "LoginController@index")->name('login');
Route::post('/login/store', "LoginController@store")->name('login.store');
Route::get('/logout', "LoginController@destroy")->name('logout.destroy');

    Route::group(['middleware' => ['auth','CekRole:admin']], function() {
    Route::get('/dashboard', "DashboardController@index")->name('dashboard.index');

    //Users
    Route::resource('/users', "UsersController");

    //Products
    Route::resource('/products', "ProductsController");

    //Categories
    Route::resource('/categories', "CategoriesController");

    //Carts
    Route::resource('/carts', "CartsController");

    //Checkout
    Route::resource('/checkout', "CheckoutController");

});

Route::group(['middleware' => ['auth','CekRole:admin,user']], function() {
    Route::get('/dashboard', "DashboardController@index");

    //Products
    Route::resource('/products', "ProductsController");

    //Categories
    Route::resource('/categories', "CategoriesController");

    //Carts
    Route::resource('/carts', "CartsController");

    //Checkout
    Route::resource('/checkout', "CheckoutController");
});

