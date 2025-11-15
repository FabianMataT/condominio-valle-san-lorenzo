<?php

use Illuminate\Support\Facades\Route;

// ========================== Forms
use App\Livewire\Pages\Admins\Forms\Index as IndexForms;
use App\Livewire\Pages\Admins\Forms\Create as CreateForms;
use App\Livewire\Pages\Admins\Forms\Edit as EditForms;
use App\Livewire\Pages\Admins\Forms\Show as ShowForms;

// ================================== My Forms
use App\Livewire\Pages\Admins\Forms\Myforms\Index as IndexMyForms;
use App\Livewire\Pages\Admins\Forms\Myforms\Edit as EditMyForms;
use App\Livewire\Pages\Admins\Forms\Myforms\Show as ShowMyForms;

// ================================== Responses
use App\Livewire\Pages\Admins\Forms\Responses\Index as IndexResponses;
use App\Livewire\Pages\Admins\Forms\Responses\Edit as EditResponses;
use App\Livewire\Pages\Admins\Forms\Responses\Show as ShowResponses;



// ========================== Forms
Route::get('/forms', IndexForms::class)->name('forms.index')->middleware('permission:forms.index');
Route::get('/forms/create', CreateForms::class)->name('forms.create')->middleware('permission:forms.create');
Route::get('/forms/edit/{form}', EditForms::class)->name('forms.edit')->middleware('permission:forms.edit');
Route::get('/forms/show/{form}', ShowForms::class)->name('forms.show')->middleware('permission:forms.show');

// // Especialidades
// Route::get('/specialties', IndexSpecialties::class)->name('specialties.index')->middleware('permission:specialties.index');
// Route::get('/specialties/create', CreateSpecialties::class)->name('specialties.create')->middleware('permission:specialties.create');