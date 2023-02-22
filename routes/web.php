<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GeneratorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinkController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/QrGeneratorForm', [GeneratorController::class, 'QrGeneratorForm'])->name('generatorForm.gerarlink');
    Route::post('/QrGenerator', [GeneratorController::class, 'QrGenerator'])->name('generator.gerarlink');
    Route::get('/QrGeneratorRead', [GeneratorController::class, 'QrGeneratorRead'])->name('generator.lerlink');

});

Route::middleware('auth')->group(function () {

    Route::get('/home', [HomeController::class, 'Home'])->name('home');
});

Route::get('/QrGeneratorShow', [GeneratorController::class, 'QrGeneratorShow'])->name('QrGeneratorShow');  

Route::middleware('auth')->group(function () {
    Route::get('/encurter', [GeneratorController::class, 'encurter'])->name('encurter');
    Route::post('/shorten', [LinkController::class, 'shorten'])->name('shorten');
    Route::get('/encurter/{short_link}', [LinkController::class, 'redirect'])->name('redirect');
});


require __DIR__.'/auth.php';
