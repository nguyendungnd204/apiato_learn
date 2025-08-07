<?php

/**
 * @apiGroup           Category
 * @apiName            Delete
 *
 * @api                {DELETE} /vyes/categories/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         yes.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Category\UI\API\Controllers\DeleteCategoryController;
use Illuminate\Support\Facades\Route;

Route::delete('categories/{id}', DeleteCategoryController::class);

