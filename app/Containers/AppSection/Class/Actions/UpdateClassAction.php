<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Models\Class;
use App\Containers\AppSection\Class\Tasks\UpdateClassTask;
use App\Containers\AppSection\Class\UI\API\Requests\UpdateClassRequest;
use App\Ship\Parents\Actions\Action as ParentAction;

final class UpdateClassAction extends ParentAction
{
    public function __construct(
        private readonly UpdateClassTask $updateClassTask,
    ) {
    }

    public function run(UpdateClassRequest $request): Class
    {
        $data = $request->sanitize([
            // add your request data here
        ]);

        return $this->updateClassTask->run($data, $request->id);
    }
}
