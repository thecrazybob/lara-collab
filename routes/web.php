<?php

use App\Http\Controllers\Account\NotificationController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MyWork\ActivityController;
use App\Http\Controllers\MyWork\TaskController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Settings\CompanyController;
use App\Http\Controllers\Settings\LabelController;
use App\Http\Controllers\Settings\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:sanctum']], function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Projects
    Route::resource('projects', ProjectController::class)->except(['show']);

    // My Work
    Route::group(['prefix' => 'my-work', 'as' => 'my-work.'], function () {
        Route::resource('tasks', TaskController::class)->except(['show']);
        Route::get('activity', [ActivityController::class, 'index'])->name('activity.index');
    });

    // Users
    Route::resource('users', UserController::class)->except(['show']);

    // Invoices
    Route::resource('invoices', InvoiceController::class)->except(['show']);

    // Reports
    Route::resource('reports', ReportController::class)->except(['show']);

    // Settings
    Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
        Route::resource('company', CompanyController::class)->except(['show']);
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('labels', LabelController::class)->except(['show']);
    });

    // Account
    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        Route::resource('profile', ProfileController::class)->except(['show']);
        Route::resource('notifications', NotificationController::class)->except(['show']);
    });
});