<?php

namespace App\Containers\AppSection\Test\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Test\Actions\DeleteTestAction;
use App\Containers\AppSection\Test\UI\API\Requests\DeleteTestRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteTestController extends ApiController
{
    public function __invoke(DeleteTestRequest $request, DeleteTestAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
