<?php

use App\Http\Controllers\BackEnd\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\ProjectController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\BackEnd\TaskProjectController;
use App\Http\Controllers\BackEnd\BlogController;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\TestController;


Route::controller(FrontEndController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });




require __DIR__.'/auth.php';

Route::middleware(['disableBackBtn'])->group(function () {

    Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {

        Route::controller(AdminController::class)->group(function () {
            Route::get('/dashboard', 'index')->name('admin.dashboard');
            Route::get('/user', 'create')->name('admin.user');
            Route::get('/all-usser', 'allUser')->name('admin.all.user');
            Route::post('/user/store', 'userStore')->name('user.store');
            Route::delete('/user/{id}', 'deleteUser')->name('delete.user');
            Route::get('/logout', 'logout')->name('admin.logout');
        });

        // ********************* Category All Route Start ******************
        Route::resource('category', CategoryController::class);
        Route::get('/category-status/{id}', [CategoryController::class, 'categoryStatus'])->name('category.status');
        Route::get('/category-search', [CategoryController::class, 'categorySearch'])->name('category.search');
        Route::get('/category-data', [CategoryController::class, 'categoryData'])->name('category.data');
        // Route::get('/category/pagination/{id}', [CategoryController::class, 'show'])->name('category.data');
        // ********************* Category All Route End ******************


        // ********************* Project All Route Start ******************
        Route::resource('project', ProjectController::class);
        Route::get('/project-status/{id}', [ProjectController::class, 'projectStatus'])->name('project.status');
        Route::get('/project-process/{id}', [ProjectController::class, 'projectProcess'])->name('project.process');
        Route::get('/project-search', [ProjectController::class, 'projectSearch'])->name('project.search');
        Route::get('/project-data', [ProjectController::class, 'projectDate'])->name('project.data');
        // ********************* Project All Route End ******************


        // ********************* Task Project All Route Start ******************
        Route::resource('task', TaskProjectController::class);
        Route::get('/task-status/{id}', [TaskProjectController::class, 'taskStatus'])->name('task.status');
        Route::get('/task-process/{id}', [TaskProjectController::class, 'taskProcess'])->name('task.process');
        Route::get('/task-search', [TaskProjectController::class, 'taskSearch'])->name('task.search');
        Route::get('/task-data', [TaskProjectController::class, 'taskData'])->name('task.data');
        // ********************* Task Project All Route End ******************


        // ********************* Profile All Route Start ******************
        Route::resource('profile', ProfileController::class);
        // ********************* Profile All Route End ******************


        // ********************* Blog All Route Start ******************
        Route::resource('blog', BlogController::class);
        Route::get('/blog-status/{id}', [BlogController::class, 'blogStatus'])->name('blog.status');
        Route::get('/blog-process/{id}', [BlogController::class, 'blogProcess'])->name('blog.process');
        // ********************* Blog All Route End ******************


        // ********************* Role And Permission All Route Start ******************
        Route::resource('role', RoleController::class);
        // ********************* Role And Permission All Route End ******************




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


