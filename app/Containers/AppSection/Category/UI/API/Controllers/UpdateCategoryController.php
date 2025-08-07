<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Category\Actions\UpdateCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateCategoryController extends ApiController
{
    public function __invoke(UpdateCategoryRequest $request, UpdateCategoryAction $action): JsonResponse
    {
        $category = $action->run($request);

        return Response::create($category, CategoryTransformer::class)->ok();
    }
}
