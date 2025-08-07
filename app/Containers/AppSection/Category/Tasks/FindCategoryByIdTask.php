<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryRequested;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class FindCategoryByIdTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    public function run($id): Category
    {
        $category = $this->repository->findOrFail($id);

        CategoryRequested::dispatch($category);

        return $category;
    }
}
