<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\FindClassByIdAction;
use App\Containers\AppSection\Class\UI\API\Requests\FindClassByIdRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;


final class FindClassByIdController extends ApiController
{
    public function __invoke(FindClassByIdRequest $request, FindClassByIdAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->ok();
    }
}
