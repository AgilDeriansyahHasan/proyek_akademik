<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', Controllers\HomeController::class)->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [Controllers\VotingController::class, 'index'])->name('voting');
    Route::post('/users', [Controllers\VotingController::class, 'store'])->name('users.store');
    Route::get('/users/result', [Controllers\VotingController::class, 'result'])->name('result');
    Route::get('/users/show', [Controllers\VotingController::class, 'show'])->name('history');
    Route::get('/users/search', [Controllers\VotingController::class, 'search'])->name('users.search');
    Route::delete('/users/{id}', [Controllers\VotingController::class, 'destroy'])->name('users.destroy');
    Route::post('/', [Controllers\HomeController::class, 'store'])->name('feedback');
    Route::get('/admin/{id}/edit', [Controllers\HomeController::class, 'edit'])->name('feedback.edit');
    Route::delete('/admin/{id}', [Controllers\VotingController::class, 'destroyfeed'])->name('feedback.destroy');
});

Route::get('/users/result', [Controllers\VotingController::class, 'result'])->name('result');
Route::resource('candidate', Controllers\CandidateController::class);

require __DIR__.'/auth.php';
