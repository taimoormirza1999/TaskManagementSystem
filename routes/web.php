<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TemplateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('welcome');
})->name('home');;

Auth::routes();


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');



// Templates
Route::resource('/templates',TemplateController::class);
// Route::get('/templates/create', [TemplateController::class, 'create'])->name('templates.create');
// Route::post('/templates', [TemplateController::class, 'store'])->name('templates.store');
// Route::get('/templates/{template}', [TemplateController::class, 'show'])->name('templates.show');
// Route::put('/templates/{template}', [TemplateController::class, 'update'])->name('templates.update');
// Route::delete('/templates/{template}', [TemplateController::class, 'destroy'])->name('templates.destroy');


 // User Routes

    Route::resource('users', UserController::class);
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    // Route::post('/users', [UserController::class, 'store'])->name('users.store');
    // Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    // Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    // Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');



     // Project Routes
    //  Route::resource('/projects', [ProjectController::class, 'index'])->name('projects.index');
    //  Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    //  Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    //  Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    //  Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    //  Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
//  Route::middleware(['auth', 'role:admin'])->group(function () {
//    Route::get('admin', function (){
//     return "You are Admin";
//    });
// });
// Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('projects', ProjectController::class);
    // Route::resource('projects', ProjectController::class);
    // Route::get('projects', ProjectController::class);

    Route::get('project/{id}/note',[UserController::class, 'viewTaskNotes']);
    Route::get('user/task-board',[UserController::class, 'taskboard']);
    Route::get('user/projects/{project}/create-note', [UserController::class, 'createNote'])->name('projects.createNote');
    Route::post('user/projects/{project}/store-note', [UserController::class, 'storeNote'])->name('projects.storeNote');
    Route::post('user/projects/{project}/markcomplete', [UserController::class, 'markUserProjectStatusComplete'])->name('projects.markUserProjectStatusComplete');
    Route::get('/', function () {
        if(Auth::user()){
            
            if(Auth::user()->roles->pluck('name')->first() == 'user') {
            return redirect('user/task-board');
        }else{
            return redirect('home');
        }
        }else{
            return redirect('login');
        }
    });

// });
// // Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('user', function (){
//         return "You are User";
//        });
// // });

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
