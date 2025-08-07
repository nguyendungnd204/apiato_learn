<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\DeleteCategoryController;
use Illuminate\Support\Facades\Route;

Route::delete('categories/{id}', DeleteCategoryController::class)
    ->middleware(['auth:web']);

