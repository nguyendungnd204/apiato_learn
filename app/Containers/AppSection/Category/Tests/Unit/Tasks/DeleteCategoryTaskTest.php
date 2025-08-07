<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Tasks;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Events\CategoryDeleted;
use App\Containers\AppSection\Category\Tasks\DeleteCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(DeleteCategoryTask::class)]
final class DeleteCategoryTaskTest extends UnitTestCase
{
    public function testDeleteCategory(): void
    {
        Event::fake();
        $category = Category::factory()->createOne();

        $result = app(DeleteCategoryTask::class)->run($category->id);

        $this->assertEquals(1, $result);
        Event::assertDispatched(CategoryDeleted::class);
    }
}
