<?php

namespace App\Containers\AppSection\Student\Data\Repositories;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Student
 *
 * @extends ParentRepository<TModel>
 */
final class StudentRepository extends ParentRepository
{
    protected $fieldSearchable = [
        // 'id' => '=',
    ];
}
