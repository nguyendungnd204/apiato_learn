<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryDeleted;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class DeleteCategoryTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    public function run($id): bool
    {
        $result = $this->repository->delete($id);

        CategoryDeleted::dispatch($result);

        return $result;
    }
}
