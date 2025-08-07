<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\Actions\UpdateCategoryAction;
use App\Containers\AppSection\Category\UI\WEB\Requests\UpdateCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class UpdateCategoryController extends WebController
{
    public function __invoke(UpdateCategoryRequest $request, UpdateCategoryAction $action): RedirectResponse
    {
        $action->run($request);

        return back();
    }
}
