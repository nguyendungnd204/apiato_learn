<?php

namespace App\Containers\AppSection\Class\Actions;

use App\Containers\AppSection\Class\Tasks\ListClassesTask;
use App\Containers\AppSection\Class\UI\API\Requests\ListClassesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class ListClassesAction extends ParentAction
{
    public function __construct(
        private readonly ListClassesTask $listClassesTask,
    ) {
    }

    public function run(ListClassesRequest $request): LengthAwarePaginator
    {
        return $this->listClassesTask->run();
    }
}
