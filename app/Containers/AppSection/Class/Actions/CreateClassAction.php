<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Models\Class;
use App\Containers\AppSection\Class\Tasks\CreateClassTask;
use App\Containers\AppSection\Class\UI\API\Requests\CreateClassRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class CreateClassAction extends ParentAction
{
    public function __construct(
        private readonly CreateClassTask $createClassTask,
    ) {
    }

    public function run(CreateClassRequest $request): Class
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->createClassTask->run($data);
    }
}
