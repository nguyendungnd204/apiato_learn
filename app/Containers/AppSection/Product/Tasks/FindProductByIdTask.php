<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class FindProductByIdTask extends ParentTask
{
    public function __construct(
        private readonly ProductRepository $repository,
    ) {
    }

    public function run(int $id): Product
    {
        return $this->repository->findOrFail($id);
    }
}
