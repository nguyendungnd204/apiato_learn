<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class CreateStudentTask extends ParentTask
{
    public function __construct(
        private readonly StudentRepository $repository,
    ) {
    }

    public function run(array $data): Student
    {
        return $this->repository->create($data);
    }
}
