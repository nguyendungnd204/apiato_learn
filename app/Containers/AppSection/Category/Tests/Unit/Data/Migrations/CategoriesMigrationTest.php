<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Data\Migrations;

use App\Containers\AppSection\Category\Tests\UnitTestCase;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class CategoriesMigrationTest extends UnitTestCase
{
    public function testCategoriesTableHasExpectedColumns(): void
    {
        $columns = [
            'id' => 'int8',
            'created_at' => 'timestamp',
            'updated_at' => 'timestamp',
        ];

        $this->assertDatabaseTable('categories', $columns);
    }
}
