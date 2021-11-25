<?php

use Illuminate\Support\Facades\Route;
use Khokon\Installer\Controllers\DatabaseManagerController;
use Khokon\Installer\Controllers\EnvironmentController;
use Khokon\Installer\Controllers\InstallerController;
use Khokon\Installer\Controllers\PermissionController;
use Khokon\Installer\Controllers\UserSetupController;

Route::group(['middleware' => ['not_install', 'web']], function () {

    Route::get('install', [InstallerController::class, 'index'])
        ->name('install.view');

    Route::get('folder/permission', [PermissionController::class, 'index'])
        ->name('folder.permission');

    Route::get('environment', [EnvironmentController::class, 'index'])->name('environment.setup');
    Route::post('database-connect', [DatabaseManagerController::class, 'setConnect'])
        ->name('database.connect');
    Route::get('user-information', [UserSetupController::class, 'index'])->name('user.information');
    Route::post('user-store', [UserSetupController::class, 'store'])->name('user.store');

});

