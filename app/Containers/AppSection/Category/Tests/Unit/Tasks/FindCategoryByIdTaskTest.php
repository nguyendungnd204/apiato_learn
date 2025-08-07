<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Tasks;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Events\CategoryRequested;
use App\Containers\AppSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(FindCategoryByIdTask::class)]
final class FindCategoryByIdTaskTest extends UnitTestCase
{
    public function testFindCategoryById(): void
    {
        Event::fake();
        $category = Category::factory()->createOne();

        $foundCategory = app(FindCategoryByIdTask::class)->run($category->id);

        $this->assertEquals($category->id, $foundCategory->id);
        Event::assertDispatched(CategoryRequested::class);
    }
}
