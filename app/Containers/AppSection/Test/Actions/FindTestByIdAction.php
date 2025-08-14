<?php

namespace App\Containers\AppSection\Test\Actions;

use App\Containers\AppSection\Test\Models\Test;
use App\Containers\AppSection\Test\Tasks\FindTestByIdTask;
use App\Containers\AppSection\Test\UI\API\Requests\FindTestByIdRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class FindTestByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindTestByIdTask $findTestByIdTask,
    ) {
    }

    public function run(FindTestByIdRequest $request): Test
    {
        return $this->findTestByIdTask->run($request->id);
    }
}
