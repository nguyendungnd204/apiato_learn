<?php

use App\Containers\AppSection\Authentication\UI\API\Controllers\RevokeTokenController;
use Illuminate\Support\Facades\Route;

Route::post('logout', RevokeTokenController::class)
    ->name('api_auth_logout')
    ->middleware(['auth:api']);
