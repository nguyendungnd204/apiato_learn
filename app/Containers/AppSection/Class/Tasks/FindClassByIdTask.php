<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Containers\AppSection\Class\Models\Class;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class FindClassByIdTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run($id): Class
    {
        return $this->repository->findOrFail($id);
    }
}
