<?php

namespace App\Containers\AppSection\Category\Actions;

use App\Containers\AppSection\Category\Tasks\ListCategoriesTask;
use App\Containers\AppSection\Category\UI\API\Requests\ListCategoriesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class ListCategoriesAction extends ParentAction
{
    public function __construct(
        private readonly ListCategoriesTask $listCategoriesTask,
    ) {
    }

    public function run(ListCategoriesRequest $request): mixed
    {
        return $this->listCategoriesTask->run();
    }
}
