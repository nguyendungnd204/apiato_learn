<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\ListClassesAction;
use App\Containers\AppSection\Class\UI\API\Requests\ListClassesRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListClassesController extends ApiController
{
    public function __invoke(ListClassesRequest $request, ListClassesAction $action): JsonResponse
    {
        $classes = $action->run($request);

        return Response::create($classes, ClassTransformer::class)->ok();
    }
}
