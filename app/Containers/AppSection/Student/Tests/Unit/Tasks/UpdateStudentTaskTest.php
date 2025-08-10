<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Tasks;

use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tasks\UpdateStudentTask;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateStudentTask::class)]
final class UpdateStudentTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateStudent(): void
    {
        $student = Student::factory()->create([
            // 'some_field' => 'new_field_value',
        ]);
        $data = [
            // 'some_field' => 'new_field_value',
        ];

        $updatedStudent = app(UpdateStudentTask::class)->run($data, $student->id);

        $this->assertEquals($student->id, $updatedStudent->id);
        // $this->assertEquals($data['some_field'], $updatedStudent->some_field);
    }
}
