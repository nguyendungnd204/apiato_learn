<?php

namespace App\Containers\AppSection\Student\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Student\Actions\UpdateStudentAction;
use App\Containers\AppSection\Student\UI\API\Requests\UpdateStudentRequest;
use App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

final class UpdateStudentController extends ApiController
{
    public function __invoke(UpdateStudentRequest $request, UpdateStudentAction $action): JsonResponse
    {
        try {
            $student = $action->run($request);

            return Response::create($student, StudentTransformer::class)->ok();
        } catch (ModelNotFoundException $e) {
            return Response::error('Student not found', 404);
        } catch (ValidationException $e) {
            return Response::error('Validation failed: ' . $e->getMessage(), 422);
        } catch (\Exception $e) {
            return Response::error('An unexpected error occurred: ' . $e->getMessage(), 500);
        }
    }
}
