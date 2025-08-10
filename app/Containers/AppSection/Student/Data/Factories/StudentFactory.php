<?php

namespace App\Containers\AppSection\Student\Data\Factories;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Student
 *
 * @extends ParentFactory<TModel>
 */
final class StudentFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Student::class;

    public function definition(): array
    {
        return [];
    }
}
