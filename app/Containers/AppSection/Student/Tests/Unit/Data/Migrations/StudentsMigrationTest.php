<?php

namespace App\Containers\AppSection\Student\Tests\Unit\Data\Migrations;

use App\Containers\AppSection\Student\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class StudentsMigrationTest extends UnitTestCase
{
    public function testStudentsTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'int8',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        $this->assertDatabaseTable('students', $columns);
    }
}
