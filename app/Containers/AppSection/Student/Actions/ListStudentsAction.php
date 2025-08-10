<?php

namespace App\Containers\AppSection\Student\Actions;

use App\Containers\AppSection\Student\Tasks\ListStudentsTask;
use App\Containers\AppSection\Student\UI\API\Requests\ListStudentsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class ListStudentsAction extends ParentAction
{
    public function __construct(
        private readonly ListStudentsTask $listStudentsTask,
    ) {
    }

    public function run(ListStudentsRequest $request): mixed
    {
        return $this->listStudentsTask->run();
    }
}
