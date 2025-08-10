<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class UpdateStudentTask extends ParentTask
{
    public function __construct(
        private readonly StudentRepository $repository,
    ) {
    }

    public function run(array $data, $id): Student
    {
        return $this->repository->update($data, $id);
    }
}
