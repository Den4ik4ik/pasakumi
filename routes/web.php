<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumuController;
use App\Http\Controllers\TelpasController;
use App\Http\Controllers\LietotajuController;
use App\Http\Controllers\RezervesKopijuController;

Route::get('/', function () {
    // on the start page we also show the list of pasakumi so users can manage them
    $items = \App\Models\Pasakumi::orderBy('ID', 'asc')->get();
    return view('Home', ['data' => $items]);
});

// resourceful routes for pasakumi (similar to old DataController functionality)
Route::resource('pasakumi', PasakumuController::class);
// additional resources for other tables
Route::resource('telpas', TelpasController::class);
Route::resource('lietotaji', LietotajuController::class);
Route::resource('rezerveskopijas', RezervesKopijuController::class);
