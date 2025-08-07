<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoryCreated;
use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class CreateCategoryTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    public function run(array $data): Category
    {
        $category = $this->repository->create($data);

        CategoryCreated::dispatch($category);

        return $category;
    }
}
