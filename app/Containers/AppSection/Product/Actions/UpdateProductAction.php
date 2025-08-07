<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\UpdateProductTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateProductAction extends ParentAction
{
    public function __construct(
        private readonly UpdateProductTask $updateProductTask,
    ) {
    }

    public function run(int $id, array $data): Product
    {
        return $this->updateProductTask->run($id, $data);
    }
}
