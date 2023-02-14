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
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\VideoManagementController;
use App\Http\Controllers\Admin\DocumentController;

use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\UserSideController;

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
    return redirect()->route('login'); // admin side
    // return redirect()->route('user.dashboard'); // user side

});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('store-login', [LoginController::class, 'storeLogin'])->name('store-login');  //Admin12
Route::get('logouts', [LoginController::class, 'logout'])->name('logouts');

Route::get('admin-dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
Route::get('dashboard-create', [DashboardController::class, 'addDeshboard'])->name('dashboard-create');
Route::post('dashboard-store', [DashboardController::class, 'storeDeshboard'])->name('dashboard-store');



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
Route::get('edit-service/{id}', [ServiceController::class, 'editService'])->name('edit-service');
Route::post('update-service/{id}', [ServiceController::class, 'updateService'])->name('update-service');
Route::get('delete-service/{id}', [ServiceController::class, 'deleteService'])->name('delete-service');
Route::get('status-service', [ServiceController::class, 'changeStatusService'])->name('status-service');
Route::get('search-services', [ServiceController::class, 'searchService'])->name('search-service');

Route::get('index-deparment', [DepartmentController::class, 'indexDepartment'])->name('index-deparment');
Route::get('add-deparment', [DepartmentController::class, 'addDepartment'])->name('add-deparment');
Route::post('store-deparment', [DepartmentController::class, 'storeDepartment'])->name('store-deparment');
Route::get('delete-deparment/{id}', [DepartmentController::class, 'deleteDepartment'])->name('delete-deparment');
Route::get('edit-deparment/{id}', [DepartmentController::class, 'editDepartment'])->name('edit-deparment');
Route::post('update-deparment/{id}', [DepartmentController::class, 'updateDepartment'])->name('update-deparment');
Route::get('status-deparment', [DepartmentController::class, 'changeStatusDepartment'])->name('status-deparment');
Route::get('search-deparment', [DepartmentController::class, 'searchDepartment'])->name('search-deparment');

Route::get('index-city', [CityGovernemntController::class, 'indexCity'])->name('index-city');
Route::get('add-city', [CityGovernemntController::class, 'addCity'])->name('add-city');
Route::post('store-city', [CityGovernemntController::class, 'storeCity'])->name('store-city');
Route::get('delete-city/{id}', [CityGovernemntController::class, 'deleteCity'])->name('delete-city');
Route::get('edit-city/{id}', [CityGovernemntController::class, 'editCity'])->name('edit-city');
Route::post('update-city/{id}', [CityGovernemntController::class, 'updateCity'])->name('update-city');
Route::get('status-city', [CityGovernemntController::class, 'changeStatusCity'])->name('status-city');
Route::get('search-city', [CityGovernemntController::class, 'searchCity'])->name('search-city');

Route::get('index-community', [CommunityController::class, 'indexCommunity'])->name('index-community');
Route::get('add-community', [CommunityController::class, 'addCommunity'])->name('add-community');
Route::post('store-community', [CommunityController::class, 'storeCommunity'])->name('store-community');
Route::get('delete-community/{id}', [CommunityController::class, 'deleteCommunity'])->name('delete-community');
Route::get('edit-community/{id}', [CommunityController::class, 'editCommunity'])->name('edit-community');
Route::post('update-community/{id}', [CommunityController::class, 'updateCommunity'])->name('update-community');
Route::get('status-community', [CommunityController::class, 'changeStatusCommunity'])->name('status-community');
Route::get('search-community', [CommunityController::class, 'searchCommunity'])->name('search-community');

Route::get('index-video', [VideoManagementController::class, 'indexVideo'])->name('index-video');
Route::get('add-video', [VideoManagementController::class, 'addVideo'])->name('add-video');
Route::post('store-video', [VideoManagementController::class, 'storeVideo'])->name('store-video');
Route::get('delete-video/{id}', [VideoManagementController::class, 'deleteVideo'])->name('delete-video');
Route::get('edit-video/{id}', [VideoManagementController::class, 'editVideo'])->name('edit-video');
Route::post('update-video/{id}', [VideoManagementController::class, 'updateVideo'])->name('update-video');
Route::get('status-video', [VideoManagementController::class, 'changeStatusVideo'])->name('status-video');



Route::get('documents', [DocumentController::class, 'index'])->name('documents');
Route::get('documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('documents/store', [DocumentController::class, 'store'])->name('documents.store');
Route::get('documents/edit/{id}', [DocumentController::class, 'edit'])->name('documents.edit');
Route::post('documents/update/{id}', [DocumentController::class, 'update'])->name('documents.update');
Route::get('documents/delete/{id}', [DocumentController::class, 'delete'])->name('documents.delete');
Route::get('documents/view/{slug}', [DocumentController::class, 'view'])->name('documents.view');
Route::get('documents/download/{document}', [DocumentController::class, 'download'])->name('documents.download');
Route::get('documents/display/{document}', [DocumentController::class, 'display'])->name('documents.display');
Route::get('documents/changeStatus', [DocumentController::class, 'changeStatus'])->name('documents.changeStatus');





Route::post('multipleusersdelete', [DocumentController::class, 'multipleusersdelete']);
// multiple id delete
https://techsolutionstuff.com/post/how-to-delete-multiple-records-using-checkbox-in-laravel



// user side route
Route::get('user-dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');
Route::get('city/{slug}', [UserSideController::class, 'viewCity'])->name('city.slug');
Route::get('department/{slug}', [UserSideController::class, 'viewDepartment'])->name('department.slug');
Route::get('service/{slug}', [UserSideController::class, 'viewService'])->name('service.slug');
Route::get('comminity/{slug}', [UserSideController::class, 'viewCommunity'])->name('comminity.slug');
Route::get('contact/{slug}', [UserSideController::class, 'viewContact'])->name('contact.slug');
Route::get('search-data', [UserSideController::class, 'searchData'])->name('search-data');