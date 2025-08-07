<?php

/**
 * @apiGroup           Product
 *
 * @apiName            DeleteProduct
 *
 * @api                {delete} /v1/products/{id} Delete Product
 *
 * @apiVersion         1.0.0
 *
 * @apiPermission      Authenticated ['permissions' => null, 'roles' => null]
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id Product ID
 *
 * @apiSuccessExample  Success-Response:
 * HTTP/1.1 204 No Content
 */

use App\Containers\AppSection\Product\UI\API\Controllers\DeleteProductController;
use Illuminate\Support\Facades\Route;

Route::delete('products/{id}', DeleteProductController::class)
    ->middleware(['auth:api']);
