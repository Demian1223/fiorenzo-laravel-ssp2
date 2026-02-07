<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Shop
// Shop
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/women', [ShopController::class, 'women'])->name('shop.women');
Route::get('/men', [ShopController::class, 'men'])->name('shop.men');

Route::get('/products/{product:slug}', [ShopController::class, 'show'])->name('products.show');
Route::get('/check-stripe', function () {
    return [
        'app_env' => env('APP_ENV'),
        'railway_env' => env('RAILWAY_ENVIRONMENT'),
        'config_set' => filled(config('services.stripe.secret')),
        'env_set' => filled(env('STRIPE_SECRET')),
        'config_prefix' => substr(config('services.stripe.secret'), 0, 7),
        'env_prefix' => substr(env('STRIPE_SECRET'), 0, 7),
    ];
});
Route::get('/checkout-debug', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.debug');

// Cart & Orders
use App\Http\Controllers\CartController;

// Static Pages
Route::get('/about', function () {
    return view('static.generic', ['title' => 'About Fiorenzo']);
})->name('about');

Route::get('/services', function () {
    return view('static.generic', ['title' => 'Client Services']);
})->name('services');

Route::get('/ethics', function () {
    return view('static.generic', ['title' => 'Our Ethics']);
})->name('ethics');

Route::get('/faq', function () {
    return view('static.generic', ['title' => 'Frequently Asked Questions']);
})->name('faq');

Route::get('/contact', function () {
    return view('static.generic', ['title' => 'Contact Us']);
})->name('contact');

// Cart & Orders (Protected)
Route::middleware([
    'auth',
    config('jetstream.auth_session'),
])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');

    Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');

    // Stripe redirect returns to this route with payment_intent query param
    Route::get('/checkout/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes (Protected + Admin Role)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    \App\Http\Middleware\AdminMiddleware::class,
])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', \App\Http\Controllers\Admin\AdminUserController::class);
    Route::get('/logs', [\App\Http\Controllers\Admin\AdminLoginLogController::class, 'index'])->name('logs.index');
    Route::resource('products', \App\Http\Controllers\Admin\AdminProductController::class);
    // Future Phase 6: Products, Categories management here
});
