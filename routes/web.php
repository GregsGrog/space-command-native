<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AgentController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');



Route::post('/create-agent', [AgentController::class, 'create'])->name('agent.create');
Route::post('/delete-agent', [AgentController::class, 'delete'])->name('agent.delete');
Route::post('/refresh-agent', [AgentController::class, 'refresh'])->name('agent.refresh');

Route::get('/agent/{id}', [AgentController::class, 'view'])->name('agent.view');
