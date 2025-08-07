<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Category\Actions\DeleteCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteCategoryController extends ApiController
{
    public function __invoke(DeleteCategoryRequest $request, DeleteCategoryAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
