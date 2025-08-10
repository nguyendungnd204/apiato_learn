<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Tasks;

use App\Containers\AppSection\Student\Tasks\CreateStudentTask;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateStudentTask::class)]
final class CreateStudentTaskTest extends UnitTestCase
{
    public function testCreateStudent(): void
    {
        $data = [];

        $student = app(CreateStudentTask::class)->run($data);

        $this->assertModelExists($student);
    }
}
