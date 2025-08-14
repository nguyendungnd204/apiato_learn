<?php

namespace App\Containers\AppSection\Student\Tasks;

use Illuminate\Support\Collection;
use App\Containers\AppSection\Student\Data\Repositories\StudentRepository;
use App\Containers\AppSection\Student\Models\Student;
use App\Ship\Parents\Tasks\Task as ParentTask;

final class SearchStudentTask extends ParentTask
{
    public function __construct(
        private readonly StudentRepository $repository,
    ) {}

    public function run(array $filters): Collection
    {
        $query = $this->repository->newQuery();

        if (!empty($filters['student_code'])) {
            $query->where('student_code', 'like', '%' . $filters['student_code'] . '%');
        }

        if (!empty($filters['first_name']) || !empty($filters['last_name'])) {
            $query->where(function ($q) use ($filters) {
                if (!empty($filters['first_name'])) {
                    $q->where('first_name', 'like', '%' . $filters['first_name'] . '%');
                }
                if (!empty($filters['last_name'])) {
                    $q->orWhere('last_name', 'like', '%' . $filters['last_name'] . '%');
                }
            });
        }


        return $query->get();
    }
}
