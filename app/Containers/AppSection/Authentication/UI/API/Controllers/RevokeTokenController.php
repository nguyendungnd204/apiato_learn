<?php

namespace App\Containers\AppSection\Authentication\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Authentication\Actions\Api\RevokeTokenAction;
use App\Containers\AppSection\Authentication\UI\API\Requests\RevokeTokenRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Post(
 *     path="/logout",
 *     tags={"Authentication"},
 *     summary="User Logout",
 *     description="Revoke user's access token and logout",
 *     security={{"bearer":{}}},
 *     @OA\Response(
 *         response=202,
 *         description="Token revoked successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Token revoked successfully.")
 *         )
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthorized"
 *     )
 * )
 */
final class RevokeTokenController extends ApiController
{
    public function __invoke(RevokeTokenRequest $request, RevokeTokenAction $action): JsonResponse
    {
        $cookies = $action->run($request->user());

        return Response::accepted([
            'message' => 'Token revoked successfully.',
        ])->withCookie($cookies);
    }
}
