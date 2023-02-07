<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CalendarManagementController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\CityGovernemntController;

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


Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('store-login', [LoginController::class, 'storeLogin'])->name('store-login');  //Admin12
Route::get('logouts', [LoginController::class, 'logout'])->name('logouts');
Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

Route::get('index-contact', [ContactController::class, 'indexContactDetails'])->name('index-contact');
Route::get('add-contact', [ContactController::class, 'addContactDetails'])->name('add-contact');
Route::post('store-contact', [ContactController::class, 'storeContactDetails'])->name('store-contact');
Route::get('edit-contact/{id}', [ContactController::class, 'editContactDetails'])->name('edit-contact');
Route::post('update-contact/{id}', [ContactController::class, 'updateContactDetails'])->name('update-contact');
Route::get('delete-contact/{id}', [ContactController::class, 'disableContactDetails'])->name('delete-contact');
Route::get('status-contact', [ContactController::class, 'changeStatusContact'])->name('status-contact');

Route::get('index-event', [CalendarManagementController::class, 'indexEvent'])->name('index-event');
Route::get('add-event', [CalendarManagementController::class, 'addEvent'])->name('add-event');
Route::post('store-event', [CalendarManagementController::class, 'storeEvent'])->name('store-event');
Route::get('edit-event/{id}', [CalendarManagementController::class, 'editEvent'])->name('edit-event');
Route::post('update-event/{id}', [CalendarManagementController::class, 'updateEvent'])->name('update-event');
Route::get('delete-event/{id}', [CalendarManagementController::class, 'deleteEvent'])->name('delete-event');
Route::get('status-event', [CalendarManagementController::class, 'changeStatusEvent'])->name('status-event');


Route::get('index-service', [ServiceController::class, 'indexService'])->name('index-service');
Route::get('add-service', [ServiceController::class, 'addService'])->name('add-service');
Route::post('store-service', [ServiceController::class, 'storeService'])->name('store-service');
Route::get('edit-service/{slug}', [ServiceController::class, 'editService'])->name('edit-service');
Route::post('update-service/{slug}', [ServiceController::class, 'updateService'])->name('update-service');
Route::get('delete-service/{slug}', [ServiceController::class, 'deleteService'])->name('delete-service');
Route::get('status-service', [ServiceController::class, 'changeStatusService'])->name('status-service');
Route::get('search-services', [ServiceController::class, 'searchService'])->name('search-service');

Route::get('index-deparment', [DepartmentController::class, 'indexDepartment'])->name('index-deparment');
Route::get('add-deparment', [DepartmentController::class, 'addDepartment'])->name('add-deparment');
Route::post('store-deparment', [DepartmentController::class, 'storeDepartment'])->name('store-deparment');
Route::get('delete-deparment/{slug}', [DepartmentController::class, 'deleteDepartment'])->name('delete-deparment');
Route::get('edit-deparment/{slug}', [DepartmentController::class, 'editDepartment'])->name('edit-deparment');
Route::post('update-deparment/{slug}', [DepartmentController::class, 'updateDepartment'])->name('update-deparment');
Route::get('status-deparment', [DepartmentController::class, 'changeStatusDepartment'])->name('status-deparment');
Route::get('search-deparment', [DepartmentController::class, 'searchDepartment'])->name('search-deparment');

Route::get('index-city', [CityGovernemntController::class, 'indexCity'])->name('index-city');
Route::get('add-city', [CityGovernemntController::class, 'addCity'])->name('add-city');
Route::post('store-city', [CityGovernemntController::class, 'storeCity'])->name('store-city');
Route::get('delete-city/{slug}', [CityGovernemntController::class, 'deleteCity'])->name('delete-city');
Route::get('edit-city/{slug}', [CityGovernemntController::class, 'editCity'])->name('edit-city');
Route::post('update-city/{slug}', [CityGovernemntController::class, 'updateCity'])->name('update-city');
Route::get('status-city', [CityGovernemntController::class, 'changeStatusCity'])->name('status-city');
Route::get('search-city', [CityGovernemntController::class, 'searchCity'])->name('search-city');

