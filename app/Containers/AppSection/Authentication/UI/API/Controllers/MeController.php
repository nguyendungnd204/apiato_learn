<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @OA\Get(
 *     path="/me",
 *     tags={"Authentication"},
 *     summary="Get current user profile",
 *     description="Get the authenticated user's profile information",
 *     security={{"bearer":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="User profile retrieved successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="string", example="abc123"),
 *                 @OA\Property(property="name", type="string", example="John Doe"),
 *                 @OA\Property(property="email", type="string", example="user@example.com"),
 *                 @OA\Property(property="created_at", type="string", format="date-time"),
 *                 @OA\Property(property="updated_at", type="string", format="date-time")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */
final class MeController extends ApiController
{
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user();
        
        return Response::create($user, UserTransformer::class)->ok();
    }
}
