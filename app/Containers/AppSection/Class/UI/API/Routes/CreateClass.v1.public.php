<?php

use App\Containers\AppSection\Class\UI\API\Controllers\CreateClassController;
use Illuminate\Support\Facades\Route;

Route::post('classes', CreateClassController::class)
    ->name('api_class_create')
    ->middleware(['auth:api']);

