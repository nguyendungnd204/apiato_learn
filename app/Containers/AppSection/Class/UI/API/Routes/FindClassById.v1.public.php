<?php

/**
 * @apiGroup           Class
 * @apiName            FindById
 *
 * @api                {GET} /v1/classes/:id Invoke
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
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

use App\Containers\AppSection\Class\UI\API\Controllers\FindClassByIdController;
use Illuminate\Support\Facades\Route;

Route::get('classes/{id}', FindClassByIdController::class)
    ->middleware(['auth:api']);

