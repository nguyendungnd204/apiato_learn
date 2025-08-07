<?php

/**
 * @apiGroup           Product
 *
 * @apiName            FindProductById
 *
 * @api                {get} /v1/products/{id} Find Product by ID
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
 * @apiUse             ProductSuccessSingleResponse
 */

use App\Containers\AppSection\Product\UI\API\Controllers\FindProductByIdController;
use Illuminate\Support\Facades\Route;

Route::get('products/{id}', FindProductByIdController::class);
