<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{Dashboard, AnalyticsData, SettingData, TargetData, TargetCreate, NabungForm, TargetDetail};

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

Route::get('/', Dashboard::class);
Route::get('/analytics', AnalyticsData::class);
Route::get('/setting', SettingData::class);
Route::get('/target', TargetData::class);
Route::get('/target/create', TargetCreate::class);
Route::get('/target/{id}/view', TargetDetail::class)->name('target-view');
Route::get('/nabung', NabungForm::class);
