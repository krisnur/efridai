<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/criteria', [App\Http\Controllers\CriteriaController::class, 'index'])->name('criteria.index');
Route::get('/criteria/create', [App\Http\Controllers\CriteriaController::class, 'create'])->name('criteria.create');
Route::post('/criteria', [App\Http\Controllers\CriteriaController::class, 'store'])->name('criteria.store');
Route::get('/criteria/{criteria}', [App\Http\Controllers\CriteriaController::class, 'edit'])->name('criteria.edit');
Route::put('/criteria/{criteria}', [App\Http\Controllers\CriteriaController::class, 'update'])->name('criteria.update');
Route::delete('/criteria/{criteria}', [App\Http\Controllers\CriteriaController::class, 'destroy'])->name('criteria.destroy');

Route::get('/generate_prompt', [App\Http\Controllers\PromptGenearationController::class, 'generationForm'])->name('prompt.form');
Route::post('/prompt_result', [App\Http\Controllers\PromptGenearationController::class, 'result'])->name('result.prompt');
Route::post('/save_prompt', [App\Http\Controllers\PromptGenearationController::class, 'savePrompt'])->name('save.prompt');

Route::get('/saved_prompt', [App\Http\Controllers\PromptGenearationController::class, 'savedPromptList'])->name('saved.prompt.index');
Route::put('/saved_prompt/{saved_prompt}', [App\Http\Controllers\PromptGenearationController::class, 'savedPromptDelete'])->name('saved.prompt.delete');