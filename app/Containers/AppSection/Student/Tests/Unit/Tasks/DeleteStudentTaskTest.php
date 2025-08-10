<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Tasks;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\DeleteStudentTask;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteStudentTask::class)]
final class DeleteStudentTaskTest extends UnitTestCase
{
    public function testDeleteStudent(): void
    {
        $student = Student::factory()->createOne();

        $result = app(DeleteStudentTask::class)->run($student->id);

        $this->assertEquals(1, $result);
    }
}
