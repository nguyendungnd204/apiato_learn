<?php

namespace App\Containers\AppSection\Test\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Test\Actions\CreateTestAction;
use App\Containers\AppSection\Test\UI\API\Requests\CreateTestRequest;
use App\Containers\AppSection\Test\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateTestController extends ApiController
{
    public function __invoke(CreateTestRequest $request, CreateTestAction $action): JsonResponse
    {
        $test = $action->run($request);

        return Response::create($test, TestTransformer::class)->created();
    }
}
