<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CargaExtras\ExtraController;

Route::middleware
    (
        [
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
        ]
    )->group
        (
            function () 
                {
                    Route::get('/Extras/Show', [ExtraController::class, 'index'])->name('extras.show');
                    Route::post('/Extras/Filter/', [ExtraController::class, 'filter'])->name('extras.filter');
                    Route::get('/Extras/Carga', [ExtraController::class, 'carga'])->name('extras.carga');
                    Route::get('/Extras/Edicion/{rowId}', [ExtraController::class, 'edicion'])->name('extras.edicion');
                    Route::post('/Extras/Store', [ExtraController::class, 'store'])->name('extras.store');
                    Route::post('/Extras/Update', [ExtraController::class, 'update'])->name('extras.update');
                    Route::get('/Extras/Eliminar/{rowId}', [ExtraController::class, 'eliminar'])->name('extras.eliminar');
                    Route::get('/Extras/Aprobacion', [ExtraController::class, 'aprobacion'])->name('extras.aprobacion');
                    Route::get('/Extras/Cierre', [ExtraController::class, 'cierre'])->name('extras.cierre');
                    // Route::get('/Certificados/Show/{tipoCertificadoId}', [PlantillaParserController::class, 'index'])->name('certificados.show');
                    // Route::post('/Certificados/Filter/{tipoCertificadoId}', [PlantillaParserController::class, 'filter'])->name('certificados.filter');
                    // Route::get('/Certificados/Create/{nroPieza}/{tipoCertificadoId}', [PlantillaParserController::class, 'create'])->name('certificados.create');
                    // Route::post('/Certificados/Store', [PlantillaParserController::class, 'store'])->name('certificados.store');
                    // Route::get('/Certificados/Edit/{certificadoId}', [PlantillaParserController::class, 'edit'])->name('certificados.edit');
                    // Route::post('/Certificados/Update/', [PlantillaParserController::class, 'update'])->name('certificados.update');
                    // Route::get('/Certificados/VistaPreliminar/{certificadoId}', [PlantillaParserController::class, 'vistaPreliminar'])->name('certificados.vistaPreliminar');
                }
            );