<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/', function () {
        return to_route('instructors.create');
    });
    //Route::resource("/instructors", instructorsController::class);
    Route::prefix("instructors")->group(function () {
        Route::controller(InstructorsController::class)->group(function () {
            Route::get("/", 'index')->name('instructors.index');
            Route::get("/create", "create")->name('instructors.create');
            Route::post("/", "store")->name('instructors.store');
            Route::get("/{instructors}/edit", "edit")->name('instructors.edit');
            Route::get("/search", "search")->name('instructors.search');
            Route::post("/filter", "filter")->name('instructors.filter');
            Route::put("/{instructors}", "update")->name('instructors.update');
        });
        Route::middleware('super_admin')->group(function () {
            Route::resource('profile', ProfileController::class);
            Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');
            Route::post('register', [RegisteredUserController::class, 'store']);
            Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');
            Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
        });
    });
});
