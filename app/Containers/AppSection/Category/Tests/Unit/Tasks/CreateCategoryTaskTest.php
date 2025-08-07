<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Tasks;

use App\Containers\AppSection\Category\Events\CategoryCreated;
use App\Containers\AppSection\Category\Tasks\CreateCategoryTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(CreateCategoryTask::class)]
final class CreateCategoryTaskTest extends UnitTestCase
{
    public function testCreateCategory(): void
    {
        Event::fake();
        $data = [];

        $category = app(CreateCategoryTask::class)->run($data);

        $this->assertModelExists($category);
        Event::assertDispatched(CategoryCreated::class);
    }
}
