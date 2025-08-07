<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\EditCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories/{id}/edit', EditCategoryController::class)
    ->middleware(['auth:web']);

