<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class CreateProductTask extends ParentTask
{
    public function __construct(
        private readonly ProductRepository $repository,
    ) {
    }

    public function run(array $data): Product
    {
        return $this->repository->create($data);
    }
}
