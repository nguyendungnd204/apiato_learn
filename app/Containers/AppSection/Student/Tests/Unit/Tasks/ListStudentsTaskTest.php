<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Tasks;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\ListStudentsTask;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListStudentsTask::class)]
final class ListStudentsTaskTest extends UnitTestCase
{
    public function testListStudents(): void
    {
        Student::factory()->count(3)->create();

        $foundStudents = app(ListStudentsTask::class)->run();

        $this->assertCount(3, $foundStudents);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundStudents);
    }
}
