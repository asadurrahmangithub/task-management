<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEnd\TaskProjectController;
use App\Http\Controllers\TestController;


Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';

Route::middleware(['disableBackBtn'])->group(function () {

    Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/logout', 'logout')->name('admin.logout');
        });

        // ********************* Category All Route Start ******************

        Route::resource('category', CategoryController::class);
        Route::get('/category-status/{id}', [CategoryController::class, 'categoryStatus'])->name('category.status');

        // ********************* Category All Route End ******************


        // ********************* Project All Route Start ******************

        Route::resource('project', ProjectController::class);
        Route::get('/project-status/{id}', [ProjectController::class, 'projectStatus'])->name('project.status');
        Route::get('/project-process/{id}', [ProjectController::class, 'projectProcess'])->name('project.process');

        // ********************* Project All Route End ******************


        // ********************* Task Project All Route Start ******************

        Route::resource('task', TaskProjectController::class);
        Route::get('/task-status/{id}', [TaskProjectController::class, 'taskStatus'])->name('task.status');
        Route::get('/task-process/{id}', [TaskProjectController::class, 'taskProcess'])->name('task.process');

        // ********************* Task Project All Route End ******************




    });



    Route::middleware(['auth','role:manager'])->group(function () {
        Route::controller(ManagerController::class)->group(function () {
            Route::get('/manager/dashboard', 'index')->name('manager.dashboard');
            // Route::get('/logout', 'logout')->name('admin.logout');
        });
    });


    Route::middleware(['auth','role:member'])->group(function () {
        Route::controller(MemberController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('member.dashboard');
            Route::get('/member/logout', 'logout')->name('member.logout');
        });
    });


});


