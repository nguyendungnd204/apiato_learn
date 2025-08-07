<?php

/**
 * @apiGroup           Product
 *
 * @apiName            ListProducts
 *
 * @api                {get} /v1/products List All Products
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      Authenticated ['permissions' => null, 'roles' => null]
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiUse             ProductSuccessMultipleResponse
 */

use App\Containers\AppSection\Product\UI\API\Controllers\ListProductsController;
use Illuminate\Support\Facades\Route;

Route::get('products', ListProductsController::class);