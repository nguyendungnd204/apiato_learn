<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\DeleteClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\DeleteClassRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Delete(
 *     path="/classes/{id}",
 *     tags={"Class"},
 *     summary="Delete a class",
 *     description="Delete an existing class by its ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Class ID",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=204,
 *         description="Class deleted successfully"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Class not found"
 *     )
 * )
 */
final class DeleteClassController extends ApiController
{
    public function __invoke(DeleteClassRequest $request, DeleteClassAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
