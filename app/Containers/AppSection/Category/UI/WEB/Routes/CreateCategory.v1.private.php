<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\CreateCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('categories/create', CreateCategoryController::class)
    ->middleware(['auth:web']);

