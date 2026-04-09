<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\FavoriteController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Shared Dashboard Route
 * Redirects users to their specific dashboard based on their role
 */
Route::get('/dashboard', [RecipeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/**
 * User Routes (Standard Authenticated Users)
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index')->middleware('auth');
    Route::post('/favorites/store', [FavoriteController::class, 'store'])->name('favorites.store')->middleware('auth');
    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])->name('favorites.destroy')->middleware('auth');
    
    // User Recipe Management
    Route::get('/my-recipes', [RecipeController::class, 'myRecipesIndex'])->name('my-recipes.index');
    Route::get('/my-recipes/create', [RecipeController::class, 'create'])->name('my-recipes.create');
    Route::post('/my-recipes', [RecipeController::class, 'store'])->name('my-recipes.store');
    Route::get('/my-recipes/{recipe}', [RecipeController::class, 'show'])->name('my-recipes.show');
    Route::get('/my-recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('my-recipes.edit');
    Route::put('/my-recipes/{recipe}', [RecipeController::class, 'update'])->name('my-recipes.update');
    Route::delete('/my-recipes/{recipe}', [RecipeController::class, 'destroy'])->name('my-recipes.destroy');
});

/**
 * Admin Routes (Protected by AdminMiddleware)
 */
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::get('/dashboard', [RecipeController::class, 'adminIndex'])->name('admin.dashboard');

    // Admin Specific Management
    Route::resource('categories', CategoryController::class);
    Route::resource('ingredients', IngredientController::class);
    Route::resource('countries', CountryController::class);
    
    // Admin Recipe Management
    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
    
    // Admin view of all recipes
    Route::get('/all-recipes', [RecipeController::class, 'adminIndex'])->name('admin.recipes.index');
});

require __DIR__.'/auth.php';