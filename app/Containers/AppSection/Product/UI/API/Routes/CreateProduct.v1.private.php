<?php

/**
 * @apiGroup           Product
 *
 * @apiName            CreateProduct
 *
 * @api                {post} /v1/products Create Product
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      Authenticated ['permissions' => null, 'roles' => null]
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} name Product name
 * @apiParam           {String} description Product description
 * @apiParam           {Number} price Product price
 * @apiParam           {Number} stock Product stock quantity
 *
 * @apiUse             ProductSuccessSingleResponse
 */

use App\Containers\AppSection\Product\UI\API\Controllers\CreateProductController;
use Illuminate\Support\Facades\Route;

Route::post('products', CreateProductController::class);
