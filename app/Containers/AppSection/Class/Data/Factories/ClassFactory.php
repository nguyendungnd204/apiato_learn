<?php

namespace App\Containers\AppSection\Class\Data\Factories;

use App\Containers\AppSection\Class\Models\Class;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Class
 *
 * @extends ParentFactory<TModel>
 */
final class ClassFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Class::class;

    public function definition(): array
    {
        return [];
    }
}
