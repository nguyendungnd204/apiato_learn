<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\AppSection\Category\UI\WEB\Requests\FindCategoryByIdRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

final class FindCategoryByIdController extends WebController
{
    public function __invoke(FindCategoryByIdRequest $request, FindCategoryByIdAction $action): RedirectResponse
    {
        $action->run($request);

        return back();
    }
}
