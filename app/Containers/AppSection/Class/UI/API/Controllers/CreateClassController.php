<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\CreateClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\CreateClassRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/classes",
 *     tags={"Class"},
 *     summary="Create a new class",
 *     description="Creates a new class with the provided information",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"class_code", "name"},
 *             @OA\Property(property="class_code", type="string", example="CS2025A"),
 *             @OA\Property(property="name", type="string", example="Computer Science 2025 Class A"),
 *             @OA\Property(property="description", type="string", example="Advanced computer science class"),
 *             @OA\Property(property="start_date", type="string", format="date", example="2025-01-01"),
 *             @OA\Property(property="end_date", type="string", format="date", example="2025-12-31")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Class created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Class")
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 */
final class CreateClassController extends ApiController
{
    public function __invoke(CreateClassRequest $request, CreateClassAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->created();
    }
}
