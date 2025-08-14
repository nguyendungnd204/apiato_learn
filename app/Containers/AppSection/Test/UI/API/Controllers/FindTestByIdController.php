<?php

namespace App\Containers\AppSection\Test\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Test\Actions\FindTestByIdAction;
use App\Containers\AppSection\Test\UI\API\Requests\FindTestByIdRequest;
use App\Containers\AppSection\Test\UI\API\Transformers\TestTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindTestByIdController extends ApiController
{
    public function __invoke(FindTestByIdRequest $request, FindTestByIdAction $action): JsonResponse
    {
        $test = $action->run($request);

        return Response::create($test, TestTransformer::class)->ok();
    }
}
