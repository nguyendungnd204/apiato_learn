<?php

namespace App\Containers\AppSection\Product\Data\Repositories;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Repositories\Repository as ParentRepository;

/**
 * @template TModel of Product
 *
 * @extends ParentRepository<TModel>
 */
final class ProductRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
        'description' => 'like',
        'price' => '=',
        'stock' => '=',
        'created_at' => 'like',
        'updated_at' => 'like',
    ];

    public function model(): string
    {
        return Product::class;
    }
}
