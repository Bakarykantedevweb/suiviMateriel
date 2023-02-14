<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\MaterielController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartementController;
use App\Http\Controllers\Admin\FournisseurController;
use App\Http\Controllers\Admin\SortiMaterielController;
use App\Http\Controllers\Admin\MaterielRecupererController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[DashboardController::class, 'index']);
Route::prefix('admin')->middleware(['auth'])->group( function () {

    //Materiel Routes
    Route::controller(MaterielController::class)->group(function () {
        Route::get('materiel', 'index');
        Route::get('materiel/create', 'create');
        Route::post('materiel/create', 'store');
        Route::get('materiel/{id}/edit', 'edit');
        Route::post('materiel/{id}/edit', 'update');
        Route::get('materiel/{id}/delete', 'delete');
    });

    // Agences Routes
    Route::controller(AgenceController::class)->group(function () {
        Route::get('agence', 'index');
        Route::get('agence/create', 'create');
        Route::post('agence/create', 'store');
        Route::get('agence/{id}/edit', 'edit');
        Route::post('agence/{id}/edit', 'update');
        Route::get('agence/{id}/delete', 'delete');
    });

    // Fournisseur Routes
    Route::controller(FournisseurController::class)->group(function () {
        Route::get('fournisseur', 'index');
        Route::get('fournisseur/create','create');
        Route::post('fournisseur/create','store');
        Route::get('fournisseur/{id}/edit', 'edit');
        Route::post('fournisseur/{id}/edit', 'update');
        Route::get('fournisseur/{id}/delete', 'delete');
    });

    // Departements Routes
    Route::controller(DepartementController::class)->group(function () {
        Route::get('departement', 'index');
        Route::get('departement/create', 'create');
        Route::post('departement/create', 'store');
        Route::get('departement/{id}/edit', 'edit');
        Route::post('departement/{id}/edit', 'update');
        Route::get('departement/{id}/delete', 'delete');
    });

    //Sorti Materiel Routes
    Route::controller(SortiMaterielController::class)->group(function () {
        Route::get('sortimateriel', 'index');
        Route::get('sortimateriel/create', 'create');
        Route::post('sortimateriel/create', 'store');
        Route::get('sortimateriel/{id}/print', 'print');
    });

    // Materiel Reciperer Routes
     Route::controller(MaterielRecupererController::class)->group(function () {
        Route::get('materiel/recuperer', 'index');
        Route::get('materiel/recuperer/create','create');
        Route::post('materiel/recuperer/create','store');
        Route::get('materiel/recuperer/rapport','rapport');
        Route::get('materiel/recuperer/{id}/detail','detail');
        Route::get('materiel/recuperer/{id}/edit','edit');
    });
});

