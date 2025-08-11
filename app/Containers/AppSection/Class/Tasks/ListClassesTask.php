<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class ListClassesTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
