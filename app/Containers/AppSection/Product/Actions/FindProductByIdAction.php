<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\FindProductByIdTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindProductByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindProductByIdTask $findProductByIdTask,
    ) {
    }

    public function run(int $id): Product
    {
        return $this->findProductByIdTask->run($id);
    }
}
