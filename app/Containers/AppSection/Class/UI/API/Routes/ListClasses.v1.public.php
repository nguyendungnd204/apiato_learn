<?php

use App\Containers\AppSection\Class\UI\API\Controllers\ListClassesController;
use Illuminate\Support\Facades\Route;

Route::get('classes', ListClassesController::class)
    ->name('api_class_list')
    ->middleware(['auth:api']);

