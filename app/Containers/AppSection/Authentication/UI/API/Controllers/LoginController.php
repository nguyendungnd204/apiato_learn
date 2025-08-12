<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Authentication\Actions\Api\WebClient\IssueTokenAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\LoginRequest;
use App\Containers\AppSection\Authentication\UI\API\Transformers\PasswordTokenTransformer;
use App\Containers\AppSection\Authentication\Values\UserCredential;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/login",
 *     tags={"Authentication"},
 *     summary="User Login",
 *     description="Authenticate user with email and password",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email", "password"},
 *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
 *             @OA\Property(property="password", type="string", example="password123")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Login successful",
 *         @OA\JsonContent(
 *             @OA\Property(property="token_type", type="string", example="Bearer"),
 *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGc..."),
 *             @OA\Property(property="refresh_token", type="string", example="def50200..."),
 *             @OA\Property(property="expires_in", type="integer", example=31536000)
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Invalid credentials"
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error"
 *     )
 * )
 */
final class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request, IssueTokenAction $action): JsonResponse
    {
        $result = $action->run(
            UserCredential::createFrom($request),
        );

        return Response::create($result, PasswordTokenTransformer::class)->ok()
            ->withCookie($result->refreshToken->asCookie());
    }
}
