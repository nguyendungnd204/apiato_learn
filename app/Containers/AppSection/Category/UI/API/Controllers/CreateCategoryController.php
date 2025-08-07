<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Category\Actions\CreateCategoryAction;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateCategoryController extends ApiController
{
    public function __invoke(CreateCategoryRequest $request, CreateCategoryAction $action): JsonResponse
    {
        $category = $action->run($request);

        return Response::create($category, CategoryTransformer::class)->created();
    }
}
