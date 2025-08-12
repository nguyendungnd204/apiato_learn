<?php

use App\Containers\AppSection\Authentication\UI\API\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post('login', LoginController::class)
    ->name('api_auth_login_public');
