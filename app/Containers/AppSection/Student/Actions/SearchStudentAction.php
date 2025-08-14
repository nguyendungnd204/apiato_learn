<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\SearchStudentTask;
use App\Containers\AppSection\Student\UI\API\Requests\FindStudentByIdRequest;
use App\Containers\AppSection\Student\UI\API\Requests\SearchStudentRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Collection;

final class SearchStudentAction extends ParentAction
{
    public function __construct(
        private readonly SearchStudentTask $searchStudentTask,
    ) {
    }

    public function run(SearchStudentRequest $request): Collection
    {
        $filters = $request->only(['student_code', 'first_name', 'last_name']);
        return $this->searchStudentTask->run($filters);
    }
}
