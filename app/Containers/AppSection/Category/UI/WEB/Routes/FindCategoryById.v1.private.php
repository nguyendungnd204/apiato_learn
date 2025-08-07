<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\FindCategoryByIdController;
use Illuminate\Support\Facades\Route;

Route::get('categories/{id}', FindCategoryByIdController::class)
    ->middleware(['auth:web']);

