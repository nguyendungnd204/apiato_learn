<?php

namespace App\Containers\AppSection\Student\Tasks;

use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class ListStudentsTask extends ParentTask
{
    public function __construct(
        private readonly StudentRepository $repository,
    ) {
    }

    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
