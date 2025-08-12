<?php

namespace App\Containers\AppSection\Class\Tasks;

use App\Containers\AppSection\Class\Data\Repositories\ClassRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ListClassesTask extends ParentTask
{
    public function __construct(
        private readonly ClassRepository $repository,
    ) {
    }

    public function run(): LengthAwarePaginator
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
