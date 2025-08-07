<?php

namespace App\Containers\AppSection\Category\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Category\Actions\ListCategoriesAction;
use App\Containers\AppSection\Category\UI\API\Requests\ListCategoriesRequest;
use App\Containers\AppSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListCategoriesController extends ApiController
{
    public function __invoke(ListCategoriesRequest $request, ListCategoriesAction $action): JsonResponse
    {
        $categories = $action->run($request);

        return Response::create($categories, CategoryTransformer::class)->ok();
    }
}
