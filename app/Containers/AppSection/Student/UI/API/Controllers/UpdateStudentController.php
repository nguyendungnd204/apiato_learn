<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\UpdateStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\UpdateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class UpdateStudentController extends ApiController
{
    public function __invoke(UpdateStudentRequest $request, UpdateStudentAction $action): JsonResponse
    {
        $student = $action->run($request);

        return Response::create($student, StudentTransformer::class)->ok();
    }
}
