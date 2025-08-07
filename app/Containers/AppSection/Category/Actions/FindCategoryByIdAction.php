<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\AppSection\Category\UI\API\Requests\FindCategoryByIdRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindCategoryByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindCategoryByIdTask $findCategoryByIdTask,
    ) {
    }

    public function run(FindCategoryByIdRequest $request): Category
    {
        return $this->findCategoryByIdTask->run($request->id);
    }
}
