<?php

namespace App\Containers\AppSection\Test\Actions;

use App\Containers\AppSection\Test\Tasks\ListTestsTask;
use App\Containers\AppSection\Test\UI\API\Requests\ListTestsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class ListTestsAction extends ParentAction
{
    public function __construct(
        private readonly ListTestsTask $listTestsTask,
    ) {
    }

    public function run(ListTestsRequest $request): mixed
    {
        return $this->listTestsTask->run();
    }
}
