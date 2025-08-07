<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\Actions\DeleteCategoryAction;
use App\Containers\AppSection\Category\UI\WEB\Requests\DeleteCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class DeleteCategoryController extends WebController
{
    public function __invoke(DeleteCategoryRequest $request, DeleteCategoryAction $action): RedirectResponse
    {
        $action->run($request);

        return back();
    }
}
