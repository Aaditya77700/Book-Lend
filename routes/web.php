<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserRolePermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\AuthFormController;


Route::resource('users', UserController::class);

Route::get('/login', [AuthFormController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthFormController::class, 'showRegisterForm'])->name('register');
Route::get('/logout', [AuthFormController::class, 'logout'])->name('logout');

Route::post('/web-login', [AuthFormController::class, 'login'])->name('web.login');
Route::post('/web-register', [AuthFormController::class, 'register'])->name('web.register');



// Public route (optional)
Route::get('/', fn () => view('welcome'));

// Authenticated routes


    // Dashboard (for admin/librarian)
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/books', [BookController::class, 'index']);

    // Books (admin only)
  
        Route::resource('books', BookController::class);
    

    // Lending (admin or librarian)
   
        Route::resource('lendings', LendingController::class)->only(['index', 'create', 'store']);
        Route::patch('lendings/{lending}/return', [LendingController::class, 'returnBook'])->name('lendings.return');


    // Members can only view their borrowed books (optional)
   
        Route::get('my-books', [LendingController::class, 'myBorrowedBooks'])->name('lendings.mine');


        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('roles', \App\Http\Controllers\RoleController::class)->except(['show']);


        Route::get('/user-role', [UserRolePermissionController::class, 'index'])->name('user-role.index');
        Route::get('/user-role/{user}/edit', [UserRolePermissionController::class, 'edit'])->name('user-role.edit');
        Route::put('/user-role/{user}', [UserRolePermissionController::class, 'update'])->name('user-role.update');

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/{id}/borrowings', [UserController::class, 'viewBorrowings'])->name('users.borrowings');
            Route::post('/{id}/reset-password', [UserController::class, 'resetPassword'])->name('users.resetPassword');
        });

        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
