<?php

namespace App\Containers\AppSection\Test\Actions;

use App\Containers\AppSection\Test\Models\Test;
use App\Containers\AppSection\Test\Tasks\CreateTestTask;
use App\Containers\AppSection\Test\UI\API\Requests\CreateTestRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateTestAction extends ParentAction
{
    public function __construct(
        private readonly CreateTestTask $createTestTask,
    ) {
    }

    public function run(CreateTestRequest $request): Test
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->createTestTask->run($data);
    }
}
