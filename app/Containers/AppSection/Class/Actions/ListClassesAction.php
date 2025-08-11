<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Tasks\ListClassesTask;
use App\Containers\AppSection\Class\UI\API\Requests\ListClassesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class ListClassesAction extends ParentAction
{
    public function __construct(
        private readonly ListClassesTask $listClassesTask,
    ) {
    }

    public function run(ListClassesRequest $request): mixed
    {
        return $this->listClassesTask->run();
    }
}
