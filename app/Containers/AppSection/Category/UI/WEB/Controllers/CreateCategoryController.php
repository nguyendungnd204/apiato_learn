<?php

namespace App\Containers\AppSection\Category\UI\WEB\Controllers;

use App\Containers\AppSection\Category\UI\WEB\Requests\CreateCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\View\View;

final class CreateCategoryController extends WebController
{
    public function __invoke(CreateCategoryRequest $request): View
    {
        return view('placeholder');
    }
}
