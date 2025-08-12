<?php

namespace App\Containers\AppSection\Class\Data\Repositories;

use App\Containers\AppSection\Class\Models\ClassModel;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of ClassModel
 *
 * @extends ParentRepository<TModel>
 */
final class ClassRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'class_code' => 'like',
        'name' => 'like',
        'description' => 'like',
    ];
}
