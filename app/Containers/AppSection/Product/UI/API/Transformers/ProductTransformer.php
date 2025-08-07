<?php

namespace App\Containers\AppSection\Product\UI\API\Transformers;

use App\Containers\AppSection\Product\Models\Product;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

/**
 * @OA\Schema(
 *     schema="Product",
 *     type="object",
 *     required={"id","name","description","price","stock"},
 *     @OA\Property(property="id", type="string", example="abc123"),
 *     @OA\Property(property="name", type="string", example="Gaming Laptop"),
 *     @OA\Property(property="description", type="string", example="High-end gaming laptop with RTX 4080"),
 *     @OA\Property(property="price", type="number", format="float", example=1899.99),
 *     @OA\Property(property="stock", type="integer", example=15),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class ProductTransformer extends ParentTransformer
{
    protected array $availableIncludes = [];
    protected array $defaultIncludes = [];
    public function transform(Product $product): array
    {
        return [
            'type' => $product->getResourceKey(),
            'id' => $product->getHashedKey(),
            'name' => $product->name,
            'description' => $product->description,
            'price' => (float) $product->price,
            'stock' => $product->stock,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
        ];
    }
}
