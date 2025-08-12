<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\UpdateClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\UpdateClassRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Put(
 *     path="/classes/{id}",
 *     tags={"Class"},
 *     summary="Update a class",
 *     description="Update an existing class with the provided information",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="Class ID",
 *         required=true,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="class_code", type="string", example="CS2025B"),
 *             @OA\Property(property="name", type="string", example="Computer Science 2025 Class B"),
 *             @OA\Property(property="description", type="string", example="Updated advanced computer science class"),
 *             @OA\Property(property="start_date", type="string", format="date", example="2025-02-01"),
 *             @OA\Property(property="end_date", type="string", format="date", example="2025-11-30")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Class updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Class")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Class not found"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 */
final class UpdateClassController extends ApiController
{
    public function __invoke(UpdateClassRequest $request, UpdateClassAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->ok();
    }
}
