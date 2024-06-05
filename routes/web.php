<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RombelController;

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

// Route::get('/dashboard', function () {
//     return view('index');
// });

Auth::routes();

// Pembimbing Siswa Routes
Route::middleware(['auth', 'user-access:pembimbing-siswa'])->group(function () {
    Route::get('/pembimbing-siswa/dashboard', [HomeController::class, 'pembimbingSiswaDashboard'])
        ->name('pembimbing.siswa.dashboard');
});

// Administrator Routes
Route::middleware(['auth', 'user-access:administrator'])->group(function () {
    Route::get('/administrator/dashboard', [HomeController::class, 'administratorDashboard'])
        ->name('administrator.dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/statistics/{role}', [HomeController::class, 'dashboardStatistics'])
    ->name('dashboard.statistics');

    // Data Rombel
    Route::get('/data-rombel', [RombelController::class, 'show'])->name('data.rombel.page');
    Route::resource('rombels', RombelController::class);

    // Data Rayon
    Route::get('/data-rayon', [RayonController::class, 'index'])->name('data.rayon.page');
    Route::resource('rayons', RayonController::class);

    // Data Siswa
    Route::get('/data-siswa', [SiswaController::class, 'index'])->name('data.siswa.page');
    Route::resource('students', SiswaController::class);

    // Data User
    Route::get('/data-user', [UserController::class, 'show'])->name('data.user.page');
    Route::resource('users', UserController::class);

    // Data Keterlambatan
    Route::get('/data-keterlambatan', [LateController::class, 'index'])->name('data.keterlambatan.page');
    Route::get('lates/{name}/detail', [LateController::class, 'detail'])->name('lates.detail');
    Route::get('/lates/cetak-surat/{id}', [LateController::class, 'cetakSurat'])->name('lates.cetak-surat');
    Route::get('/lates/export', [LateController::class, 'export'])->name('lates.export');
    Route::resource('lates', LateController::class);
});

// Route::middleware(['auth', 'user-access:pembimbing-siswa'])->group(function () {
//         // Dashboard for Pembimbing Siswa
//         Route::get('/pembimbing-siswa/dashboard', [HomeController::class, 'pembimbingSiswaDashboard'])
//             ->name('pembimbing.siswa.dashboard');
//         // Additional view-only routes can be added here
//     });