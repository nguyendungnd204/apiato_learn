<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Containers\AppSection\Category\UI\API\Requests\CreateCategoryRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateCategoryAction extends ParentAction
{
    public function __construct(
        private readonly CreateCategoryTask $createCategoryTask,
    ) {
    }

    public function run(CreateCategoryRequest $request): Category
    {
        $data = $request->sanitize([
            'name',
            'description',
            'slug',
            'is_active',
            'parent_id',
            'sort_order',
        ])->all();

        return $this->createCategoryTask->run($data);
    }
}
