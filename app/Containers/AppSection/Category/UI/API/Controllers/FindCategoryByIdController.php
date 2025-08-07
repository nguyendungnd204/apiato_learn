<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\AppSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindCategoryByIdController extends ApiController
{
    public function __invoke(FindCategoryByIdRequest $request, FindCategoryByIdAction $action): JsonResponse
    {
        $category = $action->run($request);

        return Response::create($category, CategoryTransformer::class)->ok();
    }
}
