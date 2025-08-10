<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Factories;

use App\Containers\AppSection\Student\Data\Factories\StudentFactory;
use App\Containers\AppSection\Student\Models\Student;
use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(StudentFactory::class)]
final class StudentFactoryTest extends UnitTestCase
{
    public function testCreateStudent(): void
    {
        $student = Student::factory()->make();

        $this->assertInstanceOf(Student::class, $student);
    }
}
