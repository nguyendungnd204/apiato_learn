<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\ListStudentsAction;
use App\Containers\AppSection\Student\UI\API\Requests\ListStudentsRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class ListStudentsController extends ApiController
{
    public function __invoke(ListStudentsRequest $request, ListStudentsAction $action): JsonResponse
    {
        $students = $action->run($request);

        return Response::create($students, StudentTransformer::class)->ok();
    }
}
