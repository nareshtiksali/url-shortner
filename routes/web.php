<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UrlController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*  Route::middleware(['auth'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'index']);
    Route::get('/admin/dashboard', [AdminController::class, 'index']);
    Route::get('/member/dashboard', [MemberController::class, 'index']);

}); */

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminController::class, 'index'])->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:member'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'index'])->name('member.dashboard');
});

//routes made to invite company/client by superadmin
Route::middleware(['auth'])->group(function () {

    Route::get('/superadmin/invite-company', [SuperAdminController::class, 'createCompany'])
        ->name('superadmin.company.create');

    Route::post('/superadmin/invite-company', [SuperAdminController::class, 'storeCompany'])
        ->name('superadmin.company.store');

});

//super admin createing admins under company :)

Route::middleware(['auth', 'superadmin'])->group(function () {

    Route::get('/superadmin/create-admin', [SuperAdminController::class, 'createAdmin'])
        ->name('superadmin.admin.create');

    Route::post('/superadmin/create-admin', [SuperAdminController::class, 'storeAdmin'])
        ->name('superadmin.admin.store');

});

//URL generate 

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/generate-url', [UrlController::class, 'create'])
        ->name('url.create');

    Route::post('/dashboard/generate-url', [UrlController::class, 'store'])
        ->name('url.store');

});

//view all routes for clients and urls

// Companies
Route::get('/superadmin/companies', [SuperAdminController::class, 'allCompanies'])
    ->name('superadmin.companies');

// URLs
Route::get('/superadmin/urls', [SuperAdminController::class, 'allUrls'])
    ->name('superadmin.urls');

//admin create member routes going here

Route::middleware(['auth'])->group(function () {

    Route::get('/admin/create-user', [AdminController::class, 'createUser'])
        ->name('admin.user.create');

    Route::post('/admin/create-user', [AdminController::class, 'storeUser'])
        ->name('admin.user.store');
});

//member create urls
Route::middleware(['auth'])->group(function () {
    Route::get('/member/create-url', [MemberController::class, 'createUrl'])
        ->name('member.url.create');

    Route::post('/member/create-url', [MemberController::class, 'storeUrl'])
        ->name('member.url.store');
});

//hash password for testing & dev
Route::get('/generate-password', function () {
    return \Illuminate\Support\Facades\Hash::make('123456');
});

//route for short url redirection and incrementing hits
Route::get('/{short_code}', [UrlController::class, 'redirect'])
    ->where('short_code', '[A-Za-z0-9]+'); 