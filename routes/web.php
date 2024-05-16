<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\{Dashboard, AnalyticsData, SettingData};

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