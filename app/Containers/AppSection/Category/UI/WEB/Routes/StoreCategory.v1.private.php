<?php

use App\Containers\AppSection\Category\UI\WEB\Controllers\StoreCategoryController;
use Illuminate\Support\Facades\Route;

Route::post('categories/store', StoreCategoryController::class)
    ->middleware(['auth:web']);

