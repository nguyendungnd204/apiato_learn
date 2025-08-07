<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\UI\WEB\Requests\EditCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\View\View;

final class EditCategoryController extends WebController
{
    public function __invoke(EditCategoryRequest $request): View
    {
        return view('placeholder');
    }
}
