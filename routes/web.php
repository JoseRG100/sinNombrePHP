<?php

use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CoursesController;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Controlador para mandar mensajes
Route::get('/message/create', [App\Http\Controllers\MensajeController::class, 'index'])->name('mensaje');
Route::post('messages', [App\Http\Controllers\MensajeController::class, 'store'])->name('messages.store');
Route::get('messages/{id}', [App\Http\Controllers\MensajeController::class, 'show'])->name('messages.show');

//Controlador de notificaciones
Route::get('notifications', [App\Http\Controllers\NotificationsCoontroller::class, 'index'])->name('notifications.index');
Route::patch('notifications/{id}', [App\Http\Controllers\NotificationsCoontroller::class, 'read'])->name('notifications.read');
Route::delete('notifications/{id}', [App\Http\Controllers\NotificationsCoontroller::class, 'destroy'])->name('notifications.destroy');

//controlador de todo lo referente a cursos
Route::resource('courses', CoursesController::class);

//controlador de los usuarios
Route::resource('user', UserController::class);

//controlador de asignaturas
Route::resource('asignaturas', App\Http\Controllers\AsignaturaController::class);

//controlador de schedules
Route::resource('schedules', App\Http\Controllers\ScheduleController::class);

//controlador de exams
Route::resource('exams', App\Http\Controllers\ExamController::class);

//controlador de works
Route::resource('works', App\Http\Controllers\WorkController::class);

//controlador de enrollment
Route::resource('enrollment', App\Http\Controllers\EnrollmentController::class);

//controlador de percentage
Route::resource('percentage', App\Http\Controllers\PercentageController::class);

//controlador de percentage
Route::resource('calendar', App\Http\Controllers\CalendarController::class);
