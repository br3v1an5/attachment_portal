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


Auth::routes(['register' => false]);
// Auth::routes();
Route::post('/upload_file', 'FileUploadController@saveFile');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('notifications/mark_as_read/{notice}', 'HomeController@markRead')->name('mark_note_read');
    Route::get('profile', 'HomeController@profile')->name('profile');
    Route::post('change_password', 'HomeController@change_password')->name('change_password');

    // Route::apiResource('supervisor', SupervisorController::class);
    Route::prefix('student')->name('student.')->group(function () {
        Route::resource('attachment', Student\AttachmentApplicationController::class);
    });
    Route::prefix('admin')->middleware('admins')->name('admin.')->group(function () {
        Route::get('locations', 'Admin\TownController@map');
        Route::resource('users', 'Admin\UserController');
        Route::get('/attachment/graphs_data', 'GraphController@index')->name('g_data');
        Route::get('/attachment/graphs', 'GraphController@render')->name('graphs');
        Route::resource('attachments', Admin\AttachmentApplicationController::class);
        Route::get('/supervisors_attach_students', 'Admin\SupervisorAttachmentController@allocate')->name('allocate_supervisor_student');
        Route::get('/supervisors/attach_students', 'Admin\SupervisorAttachmentController@sync')->name('supervisor_student');
        Route::resource('supervisors', Admin\SupervisorController::class);
        Route::get('/towns/create', 'Admin\TownController@index')->name('towns.create');
        Route::post('/towns/allocate_funds', 'Admin\TownController@allocate')->name('towns.allocate');
        Route::post('/towns/allocate_supervisors', 'Admin\SupervisorAttachmentController@allocateSupervisors')->name('towns.allocate.supervisors');
        Route::get('towns/view', 'Admin\TownController@show')->name('towns.view');
        Route::get('towns/edit/{town}', 'Admin\TownController@edit')->name('towns.edit');
        Route::patch('towns/update/{town}', 'Admin\TownController@update')->name('towns.update');
        Route::delete('towns/delete/{town}', 'Admin\TownController@destroy')->name('towns.destroy');
        Route::resource('department', Admin\DepartmentController::class);
        Route::resource('course', Admin\CourseController::class);
        Route::prefix('reports')->name('reports.')->group(function () {
            Route::prefix('pdfs')->name('pdfs.')->group(function () {;
                Route::get('/attachments', 'ReportsController@attachments')->name('attachments');
                Route::get('/supervisor', 'ReportsController@supervisor')->name('supervisor_stude');
                Route::get('/students/{course}', 'ReportsController@student_course')->name('student_course');
            });
            Route::prefix('xlxs')->name('xlxs.')->group(function () {
                Route::get('/attachments', 'XlsReportsController@attachments')->name('attachments');
                Route::get('/supervisor', 'XlsReportsController@student_supervisor')->name('supervisor_stude');
                Route::get('/students/{course}', 'XlsReportsController@student_course')->name('student_course');
            });
        });
        Route::prefix('students')->group(function () {
            Route::get('course/{course}', 'Admin\StudentController@index')->name('students.course');
            Route::get('bulk_import', 'Admin\StudentImportController@create')->name('bulk_import');
            Route::get('download_template', 'Admin\StudentImportController@template')->name('template');
            Route::post('upload_template', 'Admin\StudentImportController@store')->name('upload_template');
        });
    });
});
