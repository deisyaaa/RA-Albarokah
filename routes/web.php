<?php

use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PPDController;
use App\Http\Controllers\HomeController;

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

// ======= FRONTEND ======= \\

Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'index']);

///// MENU \\\\\
    //// PROFILE SEKOLAH \\\\
    Route::get('profile-sekolah',[App\Http\Controllers\Frontend\IndexController::class,'profileSekolah'])->name('profile.sekolah');

    //// VISI dan MISI
    Route::get('visi-dan-misi',[App\Http\Controllers\Frontend\IndexController::class,'visimisi'])->name('visimisi.sekolah');

    //// PROGRAM STUDI \\\\
    Route::get('program/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'programStudi']);
    //// PROGRAM STUDI \\\\
    Route::get('kegiatan/{slug}', [App\Http\Controllers\Frontend\MenuController::class, 'kegiatan']);

    /// BERITA \\\
    Route::get('berita',[App\Http\Controllers\Frontend\IndexController::class,'berita'])->name('berita');
    Route::get('berita/{slug}',[App\Http\Controllers\Frontend\IndexController::class,'detailBerita'])->name('detail.berita');

    /// EVENT \\\
    Route::get('event/{slug}',[App\Http\Controllers\Frontend\IndexController::class,'detailEvent'])->name('detail.event');
    Route::get('event',[App\Http\Controllers\Frontend\IndexController::class,'events'])->name('event');

// ======= AUTH ROUTES ======= \\
Auth::routes(['register' => false]);

// Forgot Password Routes (harus di luar middleware auth)
Route::get('forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// ======= BACKEND ======= \\
Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /// PROFILE \\\
    Route::resource('profile-settings', Backend\ProfileController::class);
    /// SETTINGS \\\
    Route::prefix('settings')->group(function () {
        // BANK
        Route::get('/', [App\Http\Controllers\Backend\SettingController::class, 'index'])->name('settings');
        // TAMBAH BANK
        Route::post('add-bank', [App\Http\Controllers\Backend\SettingController::class, 'addBank'])->name('settings.add.bank');
        // NOTIFICATIONS
        Route::put('notifications/{id}', [SettingController::class, 'notifications']);
    });

    /// CHANGE PASSWORD
    Route::put('profile-settings/change-password/{id}', [App\Http\Controllers\Backend\ProfileController::class, 'changePassword'])->name('profile.change-password');

    Route::prefix('/')->middleware('role:Admin')->group(function () {
        ///// WEBSITE \\\\\
        Route::resources([
            /// PROFILE SEKOLAH \\\
            'backend-profile-sekolah' => Backend\Website\ProfilSekolahController::class,
            /// VISI & MISI \\\
            'backend-visimisi' => Backend\Website\VisidanMisiController::class,
            //// PROGRAM STUDI \\\\
            'program-studi' => Backend\Website\ProgramController::class,
            /// KEGIATAN \\\
            'backend-kegiatan' => Backend\Website\KegiatanController::class,
            /// IMAGE SLIDER \\\
            'backend-imageslider' => Backend\Website\ImageSliderController::class,
            /// ABOUT \\\
            'backend-about' => Backend\Website\AboutController::class,
            /// VIDEO \\\
            'backend-video' => Backend\Website\VideoController::class,
            /// KATEGORI BERITA \\\
            'backend-kategori-berita' => Backend\Website\KategoriBeritaController::class,
            /// BERITA \\\
            'backend-berita' => Backend\Website\BeritaController::class,
            /// EVENT \\\
            'backend-event' => Backend\Website\EventsController::class,
            /// FOOTER \\\
            'backend-footer' => Backend\Website\FooterController::class,
        ]);

        ///// PENGGUNA \\\\\
        Route::resources([
            /// PENGAJAR \\\
            'backend-pengguna-pengajar' => Backend\Pengguna\PengajarController::class,
            /// STAF \\\
            'backend-pengguna-staf' => Backend\Pengguna\StafController::class,
            /// MURID \\\
            'backend-pengguna-murid' => Backend\Pengguna\MuridController::class,
            /// PPDB \\\
            'backend-pengguna-ppdb' => Backend\Pengguna\PPDBController::class,
            /// PERPUSTAKAAN \\\
            'backend-pengguna-perpus' => Backend\Pengguna\PerpusController::class,
            /// BENDAHARA \\\
            'backend-pengguna-bendahara' => Backend\Pengguna\BendaharaController::class,
        ]);
        ///// ppdb \\\\\
        Route::middleware('auth', 'role:Admin', )->group(function () {
            Route::get('/ppd', [PPDController::class, 'index'])->name('ppd.index');
            Route::post('/ppd/open', [PPDController::class, 'openPPD'])->name('ppd.open');
            Route::post('/ppd/close', [PPDController::class, 'closePPD'])->name('ppd.close');
            Route::get('/ppd/closed', function() {
                return view('ppd.closed');
            })->name('ppd.closed');
        });

        /// hapus event \\\
        Route::delete('backend-event/{id}', [App\Http\Controllers\Backend\Website\EventsController::class, 'destroy'])->name('backend-event.destroy');
    });

    // ======= RUTE UNTUK GURU ======= \\
    Route::middleware('role:Guru')->group(function () {
        // Rute untuk melihat jadwal pelajaran sesuai kelas
        Route::get('daftar-murid-A', [App\Http\Controllers\Backend\Website\ProgramController::class, 'muridA'])->name('muridA');
        Route::get('daftar-murid-B', [App\Http\Controllers\Backend\Website\ProgramController::class, 'muridB'])->name('muridB');

        // Rute untuk melihat jadwal pelajaran sesuai kelas
        Route::get('jadwal-pelajaranA', [App\Http\Controllers\Backend\Website\ProgramController::class, 'showKelasA'])->name('kelasA');
        Route::get('jadwal-pelajaranB', [App\Http\Controllers\Backend\Website\ProgramController::class, 'showKelasB'])->name('kelasB');
    });

    Route::middleware('role:Murid')->group(function () {
        Route::get('/murid/dashboard', [HomeController::class, 'dashboard'])->name('murid.dashboard');
    });
    
    Route::get('/murid/jurusan/{kelas_id}', [HomeController::class, 'showForMurid'])->name('murid.jurusan');
});