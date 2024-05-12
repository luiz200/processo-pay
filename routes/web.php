<?php

use App\Http\Controllers\CurriculoController;

Route::get('/', [CurriculoController::class, 'create'])->name('curricolos.create');

Route::post('/curricolos', [CurriculoController::class, 'store'])->name('curricolos.store');

Route::get('/curricolo-enviado', function () {
    return view('emails.curriculo-enviado');
})->name('curricolo.enviado');
