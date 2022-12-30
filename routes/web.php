<?php

use Illuminate\Support\Facades\App;
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

Route::get('/', [\App\Http\Controllers\LandingController::class, 'index']);

Auth::routes();

Route::match(['get', 'post'], '/register', function () {
    return redirect('login');
});

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');


// ROUTE JENJANNG
Route::get('/jenjang',[\App\Http\Controllers\JenjangController::class,'jenjang'])->name('jenjang')->middleware('auth');
Route::post('/jenjang-add',[\App\Http\Controllers\JenjangController::class,'store'])->name('jenjang.store')->middleware('auth');
Route::put('/jenjang-update/{id}',[\App\Http\Controllers\JenjangController::class,'update'])->name('jenjang.update')->middleware('auth');
Route::delete('/jenjang-delete/{id}',[\App\Http\Controllers\JenjangController::class,'delete'])->name('jenjang.delete')->middleware('auth');


// ROUTE LULUS
Route::get('/tahun-masuk',[\App\Http\Controllers\LulusController::class,'lulus'])->name('lulus')->middleware('auth');
Route::post('/tahun-add',[\App\Http\Controllers\LulusController::class,'store'])->name('tahun.store')->middleware('auth');
Route::put('/tahun-edit/{id}',[\App\Http\Controllers\LulusController::class,'edit'])->name('tahun.edit')->middleware('auth');
Route::delete('/tahun-edit/{id}',[\App\Http\Controllers\LulusController::class,'destroy'])->name('tahun.destroy')->middleware('auth');

// ROUTE ALUMNI
Route::post('/add-alumni', [\App\Http\Controllers\HomeController::class, 'addAlumni'])->name('addAlumni')->middleware('auth');
Route::get('/detail-alumni/{slug}',[\App\Http\Controllers\HomeController::class, 'detailSiswa'])->name('detailSiswa')->middleware('auth');
Route::get('/detail-add-alumni/{slug}',[\App\Http\Controllers\HomeController::class, 'viewTambahAlumni'])->name('viewTambahAlumni')->middleware('auth');
Route::get('/detail-update-alumni/{slug}',[\App\Http\Controllers\HomeController::class, 'detailUpdateAlumni'])->name('detailUpdateAlumni')->middleware('auth');
Route::post('/edit-alumni',[\App\Http\Controllers\HomeController::class, 'editAlumni'])->name('editAlumni')->middleware('auth');
Route::put('/edit-data-alumni/{id}',[\App\Http\Controllers\HomeController::class, 'editDataAlumni'])->name('editDataAlumni')->middleware('auth');
Route::delete('/delete-alumni/{id}',[\App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy')->middleware('auth');
Route::put('/update-data-alumni/{id}',[\App\Http\Controllers\HomeController::class, 'updateAlumni'])->name('updateAlumni')->middleware('auth');

Route::get('/cari-alumni/dashboard',[\App\Http\Controllers\HomeController::class,'searchAlumniDashboard'])->name('searchAlumniDashboard')->middleware('auth');


// ROUTE LOKER
Route::get('/loker',[\App\Http\Controllers\LokerController::class,'index'])->name('loker.index');
Route::get('/loker-viewAdd',[\App\Http\Controllers\LokerController::class,'viewAdd'])->name('loker.viewAdd');
Route::post('/loker-add',[\App\Http\Controllers\LokerController::class,'store'])->name('loker.store');
Route::get('/loker-view/{slug}',[\App\Http\Controllers\LokerController::class,'view'])->name('loker.view');
Route::get('/loker-edit/{slug}',[\App\Http\Controllers\LokerController::class,'edit'])->name('loker.edit');
Route::put('/loker-update/{id}',[\App\Http\Controllers\LokerController::class,'update'])->name('loker.update');
Route::delete('/loker-delete/{id}',[\App\Http\Controllers\LokerController::class,'destroy'])->name('loker.destroy');

// CHANGE PASSWORD
Route::get('/ganti-password', [\App\Http\Controllers\ChangePassword::class, 'gantiPassword'])->name('gantiPassword')->middleware('auth');
Route::put('/update-pass', [\App\Http\Controllers\ChangePassword::class, 'updatePass'])->name('updatePass')->middleware('auth');
Route::put('/reset-password/{id}', [\App\Http\Controllers\ChangePassword::class, 'resetPassword'])->name('resetPassword')->middleware('auth');


//ROUTE JABATAN
Route::get('/jabatan',[\App\Http\Controllers\StaffController::class,'index'])->name('jabatan')->middleware('auth');
Route::post('/jabatan-add',[\App\Http\Controllers\StaffController::class,'addJabatan'])->name('jabatan.add')->middleware('auth');
Route::put('/jabatan-add/{id}',[\App\Http\Controllers\StaffController::class,'editJabatan'])->name('jabatan.edit')->middleware('auth');
Route::delete('/jabatan-delete/{id}',[\App\Http\Controllers\StaffController::class,'delJabatan'])->name('jabatan.delete')->middleware('auth');


Route::get('/staff',[\App\Http\Controllers\StaffController::class,'indexStaff'])->name('staff')->middleware('auth');
Route::post('/staff-add',[\App\Http\Controllers\StaffController::class,'addStaff'])->name('staff.add')->middleware('auth');
Route::put('/staff-edit/{id}',[\App\Http\Controllers\StaffController::class,'editStaff'])->name('staff.edit')->middleware('auth');
Route::delete('/staff-delete/{id}',[\App\Http\Controllers\StaffController::class,'delStaff'])->name('staff.delete')->middleware('auth');
Route::post('/staff-create/{id}',[\App\Http\Controllers\StaffController::class,'createStaff'])->name('staff.create')->middleware('auth');
Route::put('/staff-update/{id}',[\App\Http\Controllers\StaffController::class,'updateStaff'])->name('staff.update')->middleware('auth');
Route::get('/cari-staff/dashboard',[\App\Http\Controllers\StaffController::class,'searchStaff'])->name('searchStaff')->middleware('auth');

//ROUTE GRAFIK
Route::get('/grafik-jenjang', [\App\Http\Controllers\DashBoardController::class,'grafikByJenjang'])->name('grafikByJenjang')->middleware('auth');

// ROUTE CAROUSEL
Route::get('/carousel', [\App\Http\Controllers\CarouselController::class,'index'])->name('carousel.index')->middleware('auth');
Route::post('/carousel-add', [\App\Http\Controllers\CarouselController::class,'addCarousel'])->name('carousel.add')->middleware('auth');
Route::delete('/carousel-delete/{id}', [\App\Http\Controllers\CarouselController::class,'delCarousel'])->name('carousel.delete')->middleware('auth');