<?php

namespace App\Containers\AppSection\Category\Tests\Unit\Tasks;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Events\CategoriesListed;
use App\Containers\AppSection\Category\Tasks\ListCategoriesTask;
use App\Containers\AppSection\Category\Tests\UnitTestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\Attributes\CoversClass;

#[CoversClass(ListCategoriesTask::class)]
final class ListCategoriesTaskTest extends UnitTestCase
{
    public function testListCategories(): void
    {
        Event::fake();
        Category::factory()->count(3)->create();

        $foundCategories = app(ListCategoriesTask::class)->run();

        $this->assertCount(3, $foundCategories);
        $this->assertInstanceOf(LengthAwarePaginator::class, $foundCategories);
        Event::assertDispatched(CategoriesListed::class);
    }
}
