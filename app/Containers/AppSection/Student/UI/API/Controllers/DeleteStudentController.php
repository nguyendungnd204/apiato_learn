<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\DeleteStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\DeleteStudentRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class DeleteStudentController extends ApiController
{
    public function __invoke(DeleteStudentRequest $request, DeleteStudentAction $action): JsonResponse
    {
        $action->run($request);

        return Response::noContent();
    }
}
