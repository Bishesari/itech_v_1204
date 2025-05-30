<?php


use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Volt::route('institutes', 'institutes.index')->name('institutes.index');
Volt::route('institute/{id}/classrooms', 'institutes.classrooms.index')->name('institute.classrooms.index');

Volt::route('fields', 'fields.index')->name('fields.index');
Volt::route('skills', 'skills.index')->name('skills.index');

require __DIR__.'/auth.php';
