<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\SearchStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\SearchStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class SearchStudentController extends ApiController
{
    public function __invoke(SearchStudentRequest $request, SearchStudentAction $action): JsonResponse
    {
        $students = $action->run($request);

        return Response::create($students, StudentTransformer::class)->ok();
    }
}
