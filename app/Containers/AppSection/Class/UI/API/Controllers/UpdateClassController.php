<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\UpdateClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\UpdateClassRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;


final class UpdateClassController extends ApiController
{
    public function __invoke(UpdateClassRequest $request, UpdateClassAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->ok();
    }
}
