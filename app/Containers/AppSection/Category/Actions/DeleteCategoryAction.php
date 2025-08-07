<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\DeleteCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\DeleteCategoryRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class DeleteCategoryAction extends ParentAction
{
    public function __construct(
        private readonly DeleteCategoryTask $deleteCategoryTask,
    ) {
    }

    public function run(DeleteCategoryRequest $request): bool
    {
        return $this->deleteCategoryTask->run($request->id);
    }
}
