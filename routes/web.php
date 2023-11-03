<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ApplicationController;





Route::middleware('guest')->group(function(){
    Route::get('/ss', [IndexController::class, 'index']);
    Route::get('/', [AuthController::class, 'render_login'])->name('login');
    Route::get('/register', [AuthController::class, 'render_register'])->name('register');
    Route::post('/store/user/v1/', [AuthController::class, 'store_user'])->name('store_user');
    Route::post('/login', [AuthController::class, 'store_login'])->name('store_login');

    Route::get('/apply-now', [ApplicationController::class, 'apply'])->name('apply');
    Route::post('/save', [ApplicationController::class, 'save'])->name('save');


    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('showForgetPasswordForm');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
  });

  Route::middleware('auth','isAdmin')->group(function(){
    Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('dashboard');
  });


  Route::middleware('isAdmin')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/admin_applications', [ApplicationController::class, 'admin_applications'])->name('admin_applications');
    Route::get('/export-applications', [ApplicationController::class, 'exportApplications']);
    Route::get('/print/each/{id}', [ApplicationController::class, 'print_each'])->name('print_each');
  });
