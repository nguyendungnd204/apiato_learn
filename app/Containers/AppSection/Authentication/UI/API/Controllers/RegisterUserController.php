<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Authentication\Actions\RegisterUserAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\RegisterUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/register",
 *     tags={"Authentication"},
 *     summary="User Registration",
 *     description="Register a new user account",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password", "name"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", example="Password123@"),
 *             @OA\Property(property="name", type="string", example="John Doe"),
 *             @OA\Property(property="gender", type="string", enum={"male", "female", "unspecified"}, example="male"),
 *             @OA\Property(property="birth", type="string", format="date", example="1990-01-01")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User registered successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="string", example="abc123"),
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="email", type="string", example="user@example.com")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 */
final class RegisterUserController extends ApiController
{
    public function __invoke(RegisterUserRequest $request, RegisterUserAction $action): JsonResponse
    {
        $user = $action->transactionalRun($request->sanitizeInput());

        return Response::create($user, UserTransformer::class)->ok();
    }
}
