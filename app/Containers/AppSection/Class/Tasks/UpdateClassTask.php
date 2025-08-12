<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Containers\AppSection\Class\Models\ClassModel;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class UpdateClassTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run(array $data, int $id): ClassModel
    {
        return $this->repository->update($data, $id);
    }
}
