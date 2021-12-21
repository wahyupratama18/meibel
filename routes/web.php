<?php

use App\Http\Controllers\Admin\{
    CategoryController,
    ExerciseController,
    ExerciseFileController,
    FacultyController,
    MaterialController,
    MaterialFileController,
    SavingController,
    StudyController,
    UniversityController
};
use App\Http\Controllers\{
    DownloadController,
    HomeController,
    ListController
};
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

    Route::middleware('role:1')->group(function() {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::resource('category', CategoryController::class)->except('show');
        Route::resource('category.exercise', ExerciseController::class)->except('show');
        Route::resource('category.exercise.file', ExerciseFileController::class);
        Route::resource('faculty', FacultyController::class);
        Route::resource('category.material', MaterialController::class)->except('show');
        Route::resource('category.material.file', MaterialFileController::class)->except('show');
        Route::resource('study', StudyController::class);
        Route::resource('university', UniversityController::class);

        Route::post('saving', [SavingController::class, 'store'])->name('saving.store');
        Route::delete('saving', [SavingController::class, 'delete'])->name('saving.delete');
    });

    Route::prefix('categories/{category:slug}')->name('categories.')->group(function() {
        Route::get('materials', [ListController::class, 'materials'])->name('materials.index');
        Route::get('exercises', [ListController::class, 'exercises'])->name('exercises.index');
    });

    Route::prefix('downloads')->name('download.')->group(function() {
        Route::get('/materials/{files:slug}', [DownloadController::class, 'material'])->name('material');
        Route::get('/exercise/{files:exercise_slug}', [DownloadController::class, 'exercise'])->name('exercise');
        Route::get('/discussion/{files:discussion_slug}', [DownloadController::class, 'discussion'])->name('discussion');
    });
    
    /* Route::prefix('exercises/{exercise:slug}')->name('exercises.')->group(function() {
        Route::get('/', [ListExerciseController::class, 'show'])->name('show');
        Route::get('/exercise/{file}', [ListExerciseController::class, 'exercise'])->name('exercise');
        Route::get('/discussion/{file}', [ListExerciseController::class, 'discussion'])->name('discussion');
    });

    Route::prefix('materials/{material:slug}')->name('materials.')->group(function() {
        Route::get('/', [ListMaterialController::class, 'show'])->name('show');
        Route::get('/material/{file}', [ListMaterialController::class, 'material'])->name('material');
    }); */

});