<?php

namespace App\Containers\AppSection\Student\UI\API\Transformers;

use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

final class StudentTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = [];

    public function transform(Student $student): array
    {
        return [
            'type' => $student->getResourceKey(),
            'id' => $student->getHashedKey(),
            'created_at' => $student->created_at,
            'updated_at' => $student->updated_at,
            'readable_created_at' => $student->created_at->diffForHumans(),
            'readable_updated_at' => $student->updated_at->diffForHumans(),
        ];
    }
}
