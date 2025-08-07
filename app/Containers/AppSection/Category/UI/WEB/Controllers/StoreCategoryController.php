<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\Actions\CreateCategoryAction;
use App\Containers\AppSection\Category\UI\WEB\Requests\StoreCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class StoreCategoryController extends WebController
{
    public function __invoke(StoreCategoryRequest $request, CreateCategoryAction $action): RedirectResponse
    {
        $action->run($request);

        return back();
    }
}
