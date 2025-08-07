<?php

/**
 * @apiGroup           Product
 *
 * @apiName            UpdateProduct
 *
 * @api                {patch} /v1/products/{id} Update Product
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      Authenticated ['permissions' => null, 'roles' => null]
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Product ID
 * @apiParam           {String} [name] Product name
 * @apiParam           {String} [description] Product description
 * @apiParam           {Number} [price] Product price
 * @apiParam           {Number} [stock] Product stock quantity
 *
 * @apiUse             ProductSuccessSingleResponse
 */

use App\Containers\AppSection\Product\UI\API\Controllers\UpdateProductController;
use Illuminate\Support\Facades\Route;

Route::patch('products/{id}', UpdateProductController::class)
    ->middleware(['auth:api']);
