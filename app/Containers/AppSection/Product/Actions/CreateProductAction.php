<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\AppSection\Product\Tasks\CreateProductTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateProductAction extends ParentAction
{
    public function __construct(
        private readonly CreateProductTask $createProductTask,
    ) {
    }

    public function run(array $data): Product
    {
        return $this->createProductTask->run($data);
    }
}
