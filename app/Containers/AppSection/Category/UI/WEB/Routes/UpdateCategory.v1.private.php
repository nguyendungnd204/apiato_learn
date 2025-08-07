<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\UpdateCategoryController;
use Illuminate\Support\Facades\Route;

Route::patch('categories/{id}', UpdateCategoryController::class)
    ->middleware(['auth:web']);

