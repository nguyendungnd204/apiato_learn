<?php

use App\Containers\AppSection\Class\UI\API\Controllers\UpdateClassController;
use Illuminate\Support\Facades\Route;

Route::put('classes/{id}', UpdateClassController::class)
    ->name('api_class_update')
    ->middleware(['auth:api']);

