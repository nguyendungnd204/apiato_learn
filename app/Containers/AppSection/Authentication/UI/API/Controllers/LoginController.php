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
 * Class LoginController
 *
 * @package App\Containers\AppSection\Authentication\UI\API\Controllers
 */
final class LoginController extends ApiController
{
    public function __invoke(LoginRequest $request, IssueTokenAction $action): JsonResponse
    {
        $result = $action->run(
            UserCredential::createFrom($request),
        );

        //dd($result);

        return Response::create($result, PasswordTokenTransformer::class)->ok()
            ->withCookie($result->refreshToken->asCookie());
    }
}
