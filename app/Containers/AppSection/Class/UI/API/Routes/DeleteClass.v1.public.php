<?php

use App\Containers\AppSection\Class\UI\API\Controllers\DeleteClassController;
use Illuminate\Support\Facades\Route;

Route::delete('classes/{id}', DeleteClassController::class)
    ->name('api_class_delete')
    ->middleware(['auth:api']);

