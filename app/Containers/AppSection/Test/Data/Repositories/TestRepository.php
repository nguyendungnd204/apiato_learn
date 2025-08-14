<?php

namespace App\Containers\AppSection\Test\Data\Repositories;

use App\Containers\AppSection\Test\Models\Test;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Test
 *
 * @extends ParentRepository<TModel>
 */
final class TestRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
