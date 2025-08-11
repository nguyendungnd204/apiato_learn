<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\DeleteClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\DeleteClassRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteClassController extends ApiController
{
    public function __invoke(DeleteClassRequest $request, DeleteClassAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
