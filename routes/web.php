<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TournamentPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    return redirect()->route('tournament-posts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('tournament-posts', TournamentPostController::class)
    ->middleware('auth')
    ->except('index', 'show');

Route::resource('tournament-posts', TournamentPostController::class)
    ->only(['index', 'show']);


require __DIR__ . '/auth.php';
