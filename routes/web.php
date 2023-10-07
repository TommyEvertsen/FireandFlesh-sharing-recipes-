<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Recipe;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('recipe', RecipeController::class)
    ->only(['index', 'store', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);

Route::get('/myrecipes', function () {
    return Inertia::render('Recipe/MyRecipes', [
        'recipes' => Recipe::where('user_id', auth()->id())->with('user:id,name')->latest()->get()]);
})->middleware(['auth', 'verified'])->name('myrecipes');

Route::get('createrecipe', function () {
    return Inertia::render('Recipe/CreateRecipe');
})->middleware(['auth', 'verified'])->name('createrecipe');


Route::get('/randomrecipe', function () {
    return Inertia::render('Recipe/RandomRecipe', [
        'recipes' => [Recipe::with('user:id,name')->inRandomOrder()->first()]
    ]);
})->middleware(['auth', 'verified'])->name('randomrecipe');

Route::post('/recipes/{recipe}/like', [RecipeController::class, 'like'])->name('recipe.like');

Route::get('/mostpopular', function(){
    return Inertia::render('Recipe/MostPopular', [
        'recipes' => Recipe::with('user:id,name') 
                           ->orderBy('likes', 'desc')
                           ->get()
    ]);
})->middleware(['auth', 'verified'])->name('mostpopular');

Route::get('/news', function () {
    return Inertia::render('Recipe/News');
})->name('news');

require __DIR__ . '/auth.php';
