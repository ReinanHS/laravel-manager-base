<?php

use Illuminate\Support\Facades\Route;
use Reinanhs\LaravelManagerBase\Controllers\HealthController;

Route::get('health', HealthController::class)->name('health');