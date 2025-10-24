<?php

use App\Http\Controllers\Admin\AuthorPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Frontend\CustomerAuthController;
use App\Http\Controllers\Frontend\CustomerDashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\FileDownloadController;


Route::get('/clear', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    return 'Cache Cleared';
});
Route::get('/check-auth', function () {
    $isLoggedIn = Auth::guard('customer')->check();
    $customerId = Auth::guard('customer')->id();

    return response()->json([
        'logged_in' => $isLoggedIn,
        'customer_id' => $customerId,
    ]);
})->name('check.auth');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/book/category/{id}', [HomeController::class, 'bookByCategory'])->name('book.byCategory');
Route::get('/book-details/{id}', [HomeController::class, 'bookById'])->name('book.byId');
Route::post('/product/{id}/review', [CustomerDashboardController::class, 'store'])->name('review.store');

Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [CustomerAuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [CustomerAuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:customer')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');
        Route::get('/panel', [CustomerDashboardController::class, 'customerPanel'])->name('panel');
        // Product
        Route::get('/book', [CustomerDashboardController::class, 'product'])->name('book');
        Route::get('/book/add/{id?}', [CustomerDashboardController::class, 'productAdd'])->name('book.add');
        Route::get('/book/view/{id?}', [CustomerDashboardController::class, 'productView'])->name('book.view');
        Route::post('/book/store', [CustomerDashboardController::class, 'productStore'])->name('book.store');
        Route::post('/book/update/{id}', [CustomerDashboardController::class, 'productUpdate'])->name('book.update');
        Route::delete('/book/delete/{id}', [CustomerDashboardController::class, 'productDelete'])->name('book.delete');
    });
});

Route::get('/download/{product}/{format}', [FileDownloadController::class, 'download'])->name('product.download')->middleware('auth:customer');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/mini', [CartController::class, 'mini'])->name('cart.mini'); // returns mini-cart HTML and counts
Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // cart page (already implemented)
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/removed/{id}', [CartController::class, 'removed'])->name('cart.removed');

Route::post('/payment/create-intent', [PaymentController::class, 'createPaymentIntent'])->name('payment.createIntent');
Route::post('/store-payment', [PaymentController::class, 'storePayment'])->name('payment.store');
Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');

Route::get('/download-pdf', [FileDownloadController::class, 'generatePdf'])->name('download.pdf');
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::post('/contact/submit', [HomeController::class, 'submit'])->name('contact.submit');



Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/payment', [AuthorPaymentController::class, 'payment'])->name('payment');
    Route::get('/payment/{id}', [AuthorPaymentController::class, 'getPaymentDetails'])->name('payment.view');

    //Author
    Route::get('/author', [AuthorController::class, 'author'])->name('author');
    Route::get('/author/add/{id?}', [AuthorController::class, 'authorAdd'])->name('author.add');
    Route::get('/author/view/{id?}', [AuthorController::class, 'authorView'])->name('author.view');
    Route::post('/author/store', [AuthorController::class, 'authorStore'])->name('author.store');
    Route::post('/author/update/{id}', [AuthorController::class, 'authorUpdate'])->name('author.update');
    Route::delete('/author/delete/{id}', [AuthorController::class, 'authorDelete'])->name('author.delete');

    // Category
    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::get('/category/add/{id?}', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::get('/category/view/{id?}', [CategoryController::class, 'categoryView'])->name('category.view');
    Route::post('/category/store', [CategoryController::class, 'categoryStore'])->name('category.store');
    Route::post('/category/update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');

    // Product
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('/product/add/{id?}', [ProductController::class, 'productAdd'])->name('product.add');
    Route::get('/product/view/{id?}', [ProductController::class, 'productView'])->name('product.view');
    Route::post('/product/store', [ProductController::class, 'productStore'])->name('product.store');
    Route::post('/product/update/{id}', [ProductController::class, 'productUpdate'])->name('product.update');
    Route::delete('/product/delete/{id}', [ProductController::class, 'productDelete'])->name('product.delete');
    Route::post('/product/toggle-status/{id}', [ProductController::class, 'toggleStatus'])->name('product.toggleStatus');

    Route::get('/review', [AuthorPaymentController::class, 'review'])->name('review');
    Route::get('/admin/review/status/{id}', [AuthorPaymentController::class, 'changeStatus'])->name('admin.review.status');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
