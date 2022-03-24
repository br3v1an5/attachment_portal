<?php

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

Auth::routes(['register' => false]);
// Auth::routes();


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('/notifications/mark_as_read/{notice}', 'HomeController@markRead')->name('mark_note_read');
    // Route::apiResource('supervisor', SupervisorController::class);
    Route::prefix('student')->name('student.')->group(function () {
        Route::resource('attachment', Student\AttachmentApplicationController::class);
    });
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/attachment/graphs_data', 'GraphController@index')->name('g_data')->middleware('ilo');
        Route::get('/attachment/graphs', 'GraphController@render')->name('graphs')->middleware('ilo');
        Route::resource('attachments', Admin\AttachmentApplicationController::class)->middleware(['ilo']);
        Route::get('/supervisors/attach_students', 'Admin\SupervisorAttachmentController@sync')->name('supervisor_student')->middleware('admin');
        Route::resource('supervisors', Admin\SupervisorController::class)->middleware('admin');
        Route::get('/towns/create', 'Admin\TownController@index')->name('towns.create')->middleware('ilo');
        Route::post('/towns/allocate_funds', 'Admin\TownController@allocate')->name('towns.allocate')->middleware('ilo');
        Route::get('towns/view', 'Admin\TownController@show')->name('towns.view')->middleware('supervisor');
        Route::get('towns/edit/{town}', 'Admin\TownController@edit')->name('towns.edit')->middleware('ilo');
        Route::patch('towns/update/{town}', 'Admin\TownController@update')->name('towns.update')->middleware('admin');
        Route::delete('towns/delete/{town}', 'Admin\TownController@destroy')->name('towns.destroy')->middleware('super_admin');
        Route::resource('department', Admin\DepartmentController::class)->middleware('admin');
        Route::resource('course', Admin\CourseController::class)->middleware('admin');
        Route::prefix('students')->group(function () {
            Route::get('bulk_import', 'Admin\StudentImportController@create')->name('bulk_import')->middleware(['admin']);
            Route::get('download_template', 'Admin\StudentImportController@template')->name('template')->middleware(['admin']);
            Route::post('upload_template', 'Admin\StudentImportController@store')->name('upload_template')->middleware(['admin']);
        });
    });
});
