<?php

namespace App\Containers\AppSection\Test\Data\Factories;

use App\Containers\AppSection\Test\Models\Test;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of Test
 *
 * @extends ParentFactory<TModel>
 */
final class TestFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = Test::class;

    public function definition(): array
    {
        return [];
    }
}
