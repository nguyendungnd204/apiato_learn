<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\ListCategoriesController;
use Illuminate\Support\Facades\Route;

Route::get('categories', ListCategoriesController::class)
    ->middleware(['auth:web']);

