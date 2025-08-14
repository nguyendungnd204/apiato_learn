<?php

namespace App\Containers\AppSection\Test\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Test\Actions\UpdateTestAction;
use App\Containers\AppSection\Test\UI\API\Requests\UpdateTestRequest;
use App\Containers\AppSection\Test\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateTestController extends ApiController
{
    public function __invoke(UpdateTestRequest $request, UpdateTestAction $action): JsonResponse
    {
        $test = $action->run($request);

        return Response::create($test, TestTransformer::class)->ok();
    }
}
