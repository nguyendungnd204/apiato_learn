<?php

namespace App\Containers\AppSection\Test\Actions;

use App\Containers\AppSection\Test\Models\Test;
use App\Containers\AppSection\Test\Tasks\UpdateTestTask;
use App\Containers\AppSection\Test\UI\API\Requests\UpdateTestRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateTestAction extends ParentAction
{
    public function __construct(
        private readonly UpdateTestTask $updateTestTask,
    ) {
    }

    public function run(UpdateTestRequest $request): Test
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->updateTestTask->run($data, $request->id);
    }
}
