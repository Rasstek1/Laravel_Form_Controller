<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;

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

use Illuminate\Http\Request;

Route::get('/', [FormController::class, 'showHome'])->name('show.form');
Route::get('/form', [FormController::class, 'showForm'])->name('show.form');
Route::post('/traiter-formulaire', [FormController::class, 'traiterFormulaire'])->name('traiter.formulaire');
Route::get('/formdata', [FormController::class, 'showFormulaireData'])->name('show.formulaire.data');

