<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\FindStudentByIdAction;
use App\Containers\AppSection\Student\UI\API\Requests\FindStudentByIdRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class FindStudentByIdController extends ApiController
{
    public function __invoke(FindStudentByIdRequest $request, FindStudentByIdAction $action): JsonResponse
    {
        $student = $action->run($request);

        return Response::create($student, StudentTransformer::class)->ok();
    }
}
