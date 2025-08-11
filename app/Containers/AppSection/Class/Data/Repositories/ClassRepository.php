<?php

namespace App\Containers\AppSection\Class\Data\Repositories;

use App\Containers\AppSection\Class\Models\Class;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Class
 *
 * @extends ParentRepository<TModel>
 */
final class ClassRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
