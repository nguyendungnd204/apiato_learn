<?php

namespace App\Containers\AppSection\Product\Actions;

use App\Containers\AppSection\Product\Tasks\DeleteProductTask;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteProductAction extends ParentAction
{
    public function __construct(
        private readonly DeleteProductTask $deleteProductTask,
    ) {
    }

    public function run(int $id): bool
    {
        return $this->deleteProductTask->run($id);
    }
}
