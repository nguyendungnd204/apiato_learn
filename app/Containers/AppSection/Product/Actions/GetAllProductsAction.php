<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Tasks\ListProductsTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

final class GetAllProductsAction extends ParentAction
{
    public function __construct(
        private readonly ListProductsTask $listProductsTask,
    ) {
    }

    public function run(): Collection|LengthAwarePaginator
    {
        return $this->listProductsTask->run();
    }
}
