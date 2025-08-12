<?php

namespace App\Containers\AppSection\Class\UI\API\Transformers;

use App\Containers\AppSection\Class\Models\ClassModel;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

/**
 * @OA\Schema(
 *     schema="Class",
 *     type="object",
 *     required={"id","class_code","name"},
 *     @OA\Property(property="id", type="string", example="abc123"),
 *     @OA\Property(property="class_code", type="string", example="CS2025A"),
 *     @OA\Property(property="name", type="string", example="Computer Science 2025 Class A"),
 *     @OA\Property(property="description", type="string", example="Advanced computer science class"),
 *     @OA\Property(property="start_date", type="string", format="date", example="2025-01-01"),
 *     @OA\Property(property="end_date", type="string", format="date", example="2025-12-31"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
final class ClassTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [];

    protected array $availableIncludes = ['students'];

    public function transform(ClassModel $class): array
    {
        return [
            'type' => $class->getResourceKey(),
            'id' => $class->getHashedKey(),
            'class_code' => $class->class_code,
            'name' => $class->name,
            'description' => $class->description,
            'start_date' => $class->start_date?->format('Y-m-d'),
            'end_date' => $class->end_date?->format('Y-m-d'),
            'created_at' => $class->created_at,
            'updated_at' => $class->updated_at,
        ];
    }

    public function includeStudents(ClassModel $class)
    {
        return $this->collection($class->students, new \App\Containers\AppSection\Student\UI\API\Transformers\StudentTransformer());
    }
}
