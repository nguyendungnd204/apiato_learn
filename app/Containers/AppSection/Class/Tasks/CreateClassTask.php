<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Containers\AppSection\Class\Models\Class;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class CreateClassTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run(array $data): Class
    {
        return $this->repository->create($data);
    }
}
