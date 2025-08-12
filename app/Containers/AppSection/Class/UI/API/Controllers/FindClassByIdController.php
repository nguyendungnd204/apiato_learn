<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\FindClassByIdAction;
use App\Containers\AppSection\Class\UI\API\Requests\FindClassByIdRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/classes/{id}",
 *     tags={"Class"},
 *     summary="Get class by ID",
 *     description="Retrieve a specific class by its ID",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Class ID",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Class retrieved successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Class")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Class not found"
 *     )
 * )
 */
final class FindClassByIdController extends ApiController
{
    public function __invoke(FindClassByIdRequest $request, FindClassByIdAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->ok();
    }
}
