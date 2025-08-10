<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Tasks;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\FindStudentByIdTask;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindStudentByIdTask::class)]
final class FindStudentByIdTaskTest extends UnitTestCase
{
    public function testFindStudentById(): void
    {
        $student = Student::factory()->createOne();

        $foundStudent = app(FindStudentByIdTask::class)->run($student->id);

        $this->assertEquals($student->id, $foundStudent->id);
    }
}
