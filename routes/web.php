<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Checkout;

Route::get('/', function () {
  return Inertia::render('Index', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
})->name('index');

Route::get('/privacy-policy', function () {
  return Inertia::render('PrivacyPolicy');
})->name('privacy-policy');

Route::get('/terms-of-services', function () {
  return Inertia::render('TermsOfServices');
})->name('terms-of-services');

Route::prefix('/blog')->group(function () {
  Route::get('/', [BlogController::class, 'index'])->name('blog.index');
  Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
  Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog.category');
  Route::get('/author/{slug}', [BlogController::class, 'author'])->name('blog.author');
});

Route::get('/dashboard', function () {
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/checkout', function (Request $request) {
  $stripePriceId = $request->query('priceId') ?? null;

  $quantity = 1;

  $checkout = $request->user()->checkout([$stripePriceId => $quantity], [
    'success_url' => route('dashboard'),
    'cancel_url' => route('index'),
  ])->toArray();

  return response()->json($checkout['url']);
})->name('checkout');

Route::get('/checkout/success', function (Request $request) {
  $sessionId = $request->get('session_id');

  if ($sessionId === null) {
      return;
  }

  $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);

  if ($session->payment_status !== 'paid') {
      return;
  }

  /* $orderId = $session['metadata']['order_id'] ?? null;

  $order = Order::findOrFail($orderId);

  $order->update(['status' => 'completed']); */

  return Inertia::render('CheckoutSuccess');
})->name('checkout-success');

Route::stripeWebhooks('/stripe-webhook');

require __DIR__ . '/auth.php';
