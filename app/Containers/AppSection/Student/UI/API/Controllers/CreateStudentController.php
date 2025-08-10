<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\CreateStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\CreateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class CreateStudentController extends ApiController
{
    public function __invoke(CreateStudentRequest $request, CreateStudentAction $action): JsonResponse
    {
        $student = $action->run($request);

        return Response::create($student, StudentTransformer::class)->created();
    }
}
