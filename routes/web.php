<?php

use Spatie\Sitemap\SitemapGenerator;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
  return Inertia::render('Index', [
    'canLogin' => Route::has('login'),
    'canRegister' => Route::has('register'),
    'laravelVersion' => Application::VERSION,
    'phpVersion' => PHP_VERSION,
  ]);
});

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

Route::get('sitemap.xml', function () {
  SitemapGenerator::create('http://')->writeToFile('sitemap.xml');
  return response()->file('sitemap.xml');
});


require __DIR__ . '/auth.php';
