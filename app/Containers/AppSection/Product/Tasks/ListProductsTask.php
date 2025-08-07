<?php

namespace App\Containers\AppSection\Product\Tasks;

use App\Containers\AppSection\Product\Data\Repositories\ProductRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class ListProductsTask extends ParentTask
{
    public function __construct(
        private readonly ProductRepository $repository,
    ) {
    }

    public function run(): Collection|LengthAwarePaginator
    {
        return $this->repository->paginate();
    }
}
