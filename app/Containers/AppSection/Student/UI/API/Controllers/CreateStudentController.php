<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\CreateStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\CreateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

final class CreateStudentController extends ApiController
{
    public function __invoke(CreateStudentRequest $request, CreateStudentAction $action): JsonResponse
    {
        try {
            $student = $action->run($request);

            return Response::create($student, StudentTransformer::class)->created();
        } catch (ValidationException $e) {
            return Response::error('Validation failed: ' . $e->getMessage(), 422);
        } catch (\Exception $e) {
            return Response::error('An unexpected error occurred: ' . $e->getMessage(), 500);
        }
    }
}
