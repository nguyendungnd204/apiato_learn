<?php

namespace App\Containers\AppSection\Test\Tasks;

use App\Containers\AppSection\Test\Data\Repositories\TestRepository;
use App\Containers\AppSection\Test\Models\Test;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class UpdateTestTask extends ParentTask
{
    public function __construct(
        private readonly TestRepository $repository,
    ) {
    }

    public function run(array $data, $id): Test
    {
        return $this->repository->update($data, $id);
    }
}
