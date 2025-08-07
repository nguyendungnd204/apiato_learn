<?php

namespace App\Containers\AppSection\Category\Tasks;

use App\Containers\AppSection\Category\Data\Repositories\CategoryRepository;
use App\Containers\AppSection\Category\Events\CategoriesListed;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class ListCategoriesTask extends ParentTask
{
    public function __construct(
        private readonly CategoryRepository $repository,
    ) {
    }

    public function run(): mixed
    {
        $result = $this->repository->addRequestCriteria()->paginate();

        CategoriesListed::dispatch($result);

        return $result;
    }
}
