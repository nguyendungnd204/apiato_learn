<?php

use App\Containers\AppSection\Authentication\UI\API\Controllers\MeController;
use Illuminate\Support\Facades\Route;

Route::get('me', MeController::class)
    ->name('api_auth_me')
    ->middleware(['auth:api']);
