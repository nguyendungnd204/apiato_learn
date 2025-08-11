<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class DeleteClassTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
