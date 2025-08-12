<?php

namespace App\Containers\AppSection\Class\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Class\Actions\CreateClassAction;
use App\Containers\AppSection\Class\UI\API\Requests\CreateClassRequest;
use App\Containers\AppSection\Class\UI\API\Transformers\ClassTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;


final class CreateClassController extends ApiController
{
    public function __invoke(CreateClassRequest $request, CreateClassAction $action): JsonResponse
    {
        $class = $action->run($request);

        return Response::create($class, ClassTransformer::class)->created();
    }
}
