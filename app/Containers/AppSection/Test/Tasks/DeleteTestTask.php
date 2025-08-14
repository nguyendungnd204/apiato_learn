<?php

namespace App\Containers\AppSection\Test\Tasks;

use App\Containers\AppSection\Test\Data\Repositories\TestRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class DeleteTestTask extends ParentTask
{
    public function __construct(
        private readonly TestRepository $repository,
    ) {
    }

    public function run($id): bool
    {
        return $this->repository->delete($id);
    }
}
