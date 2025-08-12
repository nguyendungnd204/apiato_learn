<?php

use App\Containers\AppSection\Class\UI\API\Controllers\FindClassByIdController;
use Illuminate\Support\Facades\Route;

Route::get('classes/{id}', FindClassByIdController::class)
    ->name('api_class_find')
    ->middleware(['auth:api']);

