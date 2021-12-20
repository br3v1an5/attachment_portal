<?php

use App\Http\Controllers\Admin\TownController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/notifications/mark_as_read/{notice}', 'HomeController@markRead')->name('mark_note_read');
    Route::apiResource('supervisor', SupervisorController::class);
    Route::prefix('student')->name('student.')->group(function () {
        Route::resource('attachment', Student\AttachmentApplicationController::class);
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/attachment/graphs_data', 'GraphController@index')->name('g_data');
        Route::get('/attachment/graphs', 'GraphController@render')->name('graphs');
        Route::resource('attachments', Admin\AttachmentApplicationController::class);
        Route::get('/supervisors/attach_students', 'Admin\SupervisorAttachmentController@sync')->name('supervisor_student');
        Route::resource('supervisors', Admin\SupervisorController::class);
        Route::get('/towns/create', 'Admin\TownController@index')->name('towns.create');
    });
});
