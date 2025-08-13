<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ShiftEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/theme', [ProfileController::class, 'updateTheme'])->name('profile.update.theme');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // User management
    Route::resource('users', UserController::class);
    
    // Shift management
    Route::resource('shifts', ShiftController::class);
    
    // Shift Entry management
    Route::resource('shift_entries', ShiftEntryController::class);
    Route::get('/shift-schedule/{date?}', [ShiftEntryController::class, 'daily'])->name('shift_entries.daily');
    
    // Role and Permission management (restricted to super-admin)
    Route::middleware('can:manage-roles')->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
});

require __DIR__.'/auth.php';
