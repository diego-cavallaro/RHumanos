<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Counter;

Route::get('/', function () 
    {
        return view('welcome');
    });

Route::get('/counter', Counter::class);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
