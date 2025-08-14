<?php

namespace App\Containers\AppSection\Test\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Test\Actions\ListTestsAction;
use App\Containers\AppSection\Test\UI\API\Requests\ListTestsRequest;
use App\Containers\AppSection\Test\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListTestsController extends ApiController
{
    public function __invoke(ListTestsRequest $request, ListTestsAction $action): JsonResponse
    {
        $tests = $action->run($request);

        return Response::create($tests, TestTransformer::class)->ok();
    }
}
