<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\UpdateCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\UpdateCategoryRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateCategoryAction extends ParentAction
{
    public function __construct(
        private readonly UpdateCategoryTask $updateCategoryTask,
    ) {
    }

    public function run(UpdateCategoryRequest $request): Category
    {
        $data = $request->sanitize([
            'name',
            'description',
            'slug',
            'is_active',
            'parent_id',
            'sort_order',
        ])->all();

        return $this->updateCategoryTask->run($data, $request->id);
    }
}
