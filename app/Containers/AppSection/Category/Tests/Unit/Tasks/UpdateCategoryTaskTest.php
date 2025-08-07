<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Tasks;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Events\CategoryUpdated;
use App\Containers\AppSection\Category\Tasks\UpdateCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(UpdateCategoryTask::class)]
final class UpdateCategoryTaskTest extends UnitTestCase
{
    // TODO TEST
    public function testUpdateCategory(): void
    {
        Event::fake();
        $category = Category::factory()->createOne();
        $data = [
            // 'some_field' => 'new_field_data',
        ];

        $updatedCategory = app(UpdateCategoryTask::class)->run($data, $category->id);

        $this->assertEquals($category->id, $updatedCategory->id);
        // $this->assertEquals($data['some_field'], $updatedCategory->some_field);
        Event::assertDispatched(CategoryUpdated::class);
    }
}
