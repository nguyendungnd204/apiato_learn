<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\ListClassesAction;
use App\Containers\AppSection\Class\UI\API\Requests\ListClassesRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Get(
 *     path="/classes",
 *     tags={"Class"},
 *     summary="List all classes",
 *     description="Get a paginated list of all classes",
 *     @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Search term for class name or code",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="page",
 *         in="query",
 *         description="Page number",
 *         required=false,
 *         @OA\Schema(type="integer", minimum=1, default=1)
 *     ),
 *     @OA\Parameter(
 *         name="limit",
 *         in="query",
 *         description="Number of items per page",
 *         required=false,
 *         @OA\Schema(type="integer", minimum=1, maximum=100, default=10)
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Classes retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Class")),
 *             @OA\Property(property="meta", type="object")
 *         )
 *     )
 * )
 */
final class ListClassesController extends ApiController
{
    public function __invoke(ListClassesRequest $request, ListClassesAction $action): JsonResponse
    {
        $classes = $action->run($request);

        return Response::create($classes, ClassTransformer::class)->ok();
    }
}
