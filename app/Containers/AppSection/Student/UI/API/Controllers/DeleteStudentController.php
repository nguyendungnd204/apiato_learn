<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\DeleteStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\DeleteStudentRequest;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;

final class DeleteStudentController extends ApiController
{
    public function __invoke(DeleteStudentRequest $request, DeleteStudentAction $action): JsonResponse
    {
        try {
            $action->run($request);

            return Response::noContent();
        } catch (ModelNotFoundException $e) {
            return Response::error('Student not found', 404);
        } catch (\Exception $e) {
            return Response::error('An unexpected error occurred: ' . $e->getMessage(), 500);
        }
    }
}
