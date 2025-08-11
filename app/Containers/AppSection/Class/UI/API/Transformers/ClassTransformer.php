<?php

namespace App\Containers\AppSection\Class\UI\API\Transformers;

use App\Containers\AppSection\Class\Models\Class;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

final class ClassTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Class $class): array
    {
        return [
            'type' => $class->getResourceKey(),
            'id' => $class->getHashedKey(),
            'created_at' => $class->created_at,
            'updated_at' => $class->updated_at,
            'readable_created_at' => $class->created_at->diffForHumans(),
            'readable_updated_at' => $class->updated_at->diffForHumans(),
        ];
    }
}
