<?php

/**
 * @apiGroup           Test
 * @apiName            Create
 *
 * @api                {POST} /v1/tests Invoke
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

use App\Containers\AppSection\Test\UI\API\Controllers\CreateTestController;
use Illuminate\Support\Facades\Route;

Route::post('tests', CreateTestController::class)
    ->middleware(['auth:api']);

