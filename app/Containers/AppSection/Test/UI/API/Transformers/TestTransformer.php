<?php

namespace App\Containers\AppSection\Test\UI\API\Transformers;

use App\Containers\AppSection\Test\Models\Test;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

final class TestTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Test $test): array
    {
        return [
            'type' => $test->getResourceKey(),
            'id' => $test->getHashedKey(),
            'created_at' => $test->created_at,
            'updated_at' => $test->updated_at,
            'readable_created_at' => $test->created_at->diffForHumans(),
            'readable_updated_at' => $test->updated_at->diffForHumans(),
        ];
    }
}
