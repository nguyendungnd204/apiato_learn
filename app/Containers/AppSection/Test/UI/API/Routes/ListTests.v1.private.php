<?php

/**
 * @apiGroup           Test
 * @apiName            List
 *
 * @api                {GET} /v1/tests Invoke
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

use App\Containers\AppSection\Test\UI\API\Controllers\ListTestsController;
use Illuminate\Support\Facades\Route;

Route::get('tests', ListTestsController::class)
    ->middleware(['auth:api']);

