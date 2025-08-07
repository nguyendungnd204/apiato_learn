<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\Actions\ListCategoriesAction;
use App\Containers\AppSection\Category\UI\WEB\Requests\ListCategoriesRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class ListCategoriesController extends WebController
{
    public function __invoke(ListCategoriesRequest $request, ListCategoriesAction $action): RedirectResponse
    {
        $action->run($request);

        return back();
    }
}
