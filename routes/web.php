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
Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('user.home');
Route::get('/about_us', [App\Http\Controllers\UserController::class, 'about_us'])->name('about_us');
Route::get('/services', [App\Http\Controllers\UserController::class, 'services'])->name('services');
Route::get('/projects', [App\Http\Controllers\UserController::class, 'projects'])->name('projects');
Route::get('/careers', [App\Http\Controllers\UserController::class, 'careers'])->name('careers');
Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');
Route::post('/contact-submit', [App\Http\Controllers\UserController::class, 'store_contact'])->name('contact.store');
Route::post('/career-submit', [App\Http\Controllers\UserController::class, 'store_career'])->name('career.store');


Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
Route::get('/change-password',  [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
Route::post('/change-password',  [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.update');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**************** Contact admin  *************/

Route::get('/contact-list', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact-list');
Route::get('/deletecontact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'delete'])->name('deletecontact');
Route::get('/export-contact', [App\Http\Controllers\Admin\ContactController::class, 'exportToExcel'])->name('export.contact');

/**************** Career admin  *************/

Route::get('/career-list', [App\Http\Controllers\Admin\CareerController::class, 'index'])->name('career-list');
Route::get('/deletecareer/{id}', [App\Http\Controllers\Admin\CareerController::class, 'delete'])->name('deletecareer');
Route::get('/export-career', [App\Http\Controllers\Admin\CareerController::class, 'exportToExcel'])->name('export.career');

/**************** Services admin  *************/

Route::get('/services-list', [App\Http\Controllers\Admin\ServicesController::class, 'index'])->name('services-list');
Route::get('/deleteservices/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'delete'])->name('deleteservices');
Route::get('/add-services', [App\Http\Controllers\Admin\ServicesController::class, 'create'])->name('add_services');
Route::post('/store-services', [App\Http\Controllers\Admin\ServicesController::class, 'store'])->name('store_services');
Route::get('/edit-services/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'edit'])->name('edit_services');
Route::post('/update-services/{id}', [App\Http\Controllers\Admin\ServicesController::class, 'update'])->name('update_services');

/**************** Clients admin  *************/

Route::get('/clients-list', [App\Http\Controllers\Admin\ClientController::class, 'index'])->name('clients-list');
Route::get('/deleteclients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'delete'])->name('deleteclients');
Route::get('/add-clients', [App\Http\Controllers\Admin\ClientController::class, 'create'])->name('add_clients');
Route::post('/store-clients', [App\Http\Controllers\Admin\ClientController::class, 'store'])->name('store_clients');
Route::get('/edit-clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('edit_clients');
Route::post('/update-clients/{id}', [App\Http\Controllers\Admin\ClientController::class, 'update'])->name('update_clients');

/***************** Clients Projects ****************************/

Route::get('/client/{client_id}/projects', [App\Http\Controllers\Admin\ClientController::class, 'manage'])->name('client.projects');
Route::post('/client/{client_id}/projects', [App\Http\Controllers\Admin\ClientController::class, 'storeOrUpdate'])->name('client.projects.store');
Route::get('/client/project/{id}/edit', [App\Http\Controllers\Admin\ClientController::class, 'editprojects'])->name('client.projects.edit');
Route::delete('/client/project/{id}', [App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('client.projects.delete');






