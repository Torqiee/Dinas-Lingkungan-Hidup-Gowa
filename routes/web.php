<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PihakController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DataFileController;
use App\Http\Controllers\PenanggungController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DataKegiatanController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\DocumentationController;

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

Route::group(['middleware' => ['role:Admin|Sekretariat|Pemrakarsa']], function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Data User
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    // Data Pemohon
    Route::get('categories/{kegiatanId}/kegiatan', [DataKegiatanController::class, 'index']);
    Route::get('/categories/{kegiatanId}/create-kegiatan', [DataKegiatanController::class, 'create'])->name('categories.create');
    // Route::get('categories/{kegiatanId}/kegiatan/create', [DataKegiatanController::class,'create']);
    Route::get('categories/{kegiatanId}/edit-kegiatan', [DataKegiatanController::class,'edit']);
    Route::post('categories/{kegiatanId}/kegiatan', [DataKegiatanController::class, 'store']);
    Route::put('categories/{kegiatanId}/edit-kegiatan', [DataKegiatanController::class,'update']);
    Route::get('categories/{kegiatanId}/delete-kegiatan', [DataKegiatanController::class,'destroy']);

    Route::post('/data-file/{fileDataId}/add-comment', [DataFileController::class, 'addComment'])->name('data-file.add-comment');
    Route::delete('/data-file/{fileDataId}/delete-comment', [DataFileController::class, 'deleteComment'])->name('data-file.delete-comment');

    Route::get('categories/{fileId}/upload-data-kegiatan', [DataFileController::class, 'index']);
    Route::post('categories/{fileId}/upload-data-kegiatan', [DataFileController::class, 'store']);
    Route::get('data-file/{fileDataId}/delete', [DataFileController::class, 'destroy']);

    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/create', [CategoryController::class,'create']);
    Route::post('categories/create', [CategoryController::class,'store']);
    Route::get('categories/{id}/edit', [CategoryController::class,'edit']);
    Route::put('categories/{id}/edit', [CategoryController::class,'update']);
    Route::get('categories/{id}/delete', [CategoryController::class,'destroy']);

    // Layout Website
    Route::get('/dashboard-website', function () {
        return view('edit-utama.dashboard');
    });
    Route::resource('edit-doc', DocumentationController::class);
    Route::get('edit-doc/create', [DocumentationController::class,'create']);
    Route::post('edit-doc/create', [DocumentationController::class,'store']);
    Route::get('edit-doc/{id}/delete', [DocumentationController::class,'destroy']);

    Route::resource('edit-penanggung', PenanggungController::class);
    Route::get('edit-penanggung/create', [PenanggungController::class,'create']);
    Route::post('edit-penanggung/create', [PenanggungController::class,'store']);
    Route::get('edit-penanggung/{id}/delete', [PenanggungController::class,'destroy']);

    Route::resource('edit-pihak', PihakController::class);
    Route::get('edit-pihak/create', [PihakController::class,'create']);
    Route::post('edit-pihak/create', [PihakController::class,'store']);
    Route::get('edit-pihak/{id}/delete', [PihakController::class,'destroy']);

    Route::resource('edit-proker', ProgramKerjaController::class);
    Route::get('edit-proker/create', [ProgramKerjaController::class,'create']);
    Route::post('edit-proker/create', [ProgramKerjaController::class,'store']);
    Route::get('edit-proker/{id}/delete', [ProgramKerjaController::class,'destroy']);

});
Route::get('/', [WebsiteController::class, 'index']);

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('login', function () {
        return view('dashboard'); // Replace with your login view
    })->name('login');
});

require __DIR__.'/auth.php';
