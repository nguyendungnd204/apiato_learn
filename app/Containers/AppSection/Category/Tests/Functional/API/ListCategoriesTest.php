<?php

namespace App\Containers\AppSection\Category\Tests\Functional\API;

use App\Containers\AppSection\Category\Models\Category;
use App\Containers\AppSection\Category\Tests\Functional\ApiTestCase;
use App\Containers\AppSection\Category\UI\API\Controllers\ListCategoriesController;
use App\Containers\AppSection\User\Models\User;
use Illuminate\Testing\Fluent\AssertableJson;
use PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
final class ListCategoriesTest extends ApiTestCase
{
    public function testListCategoriesByAdmin(): void
    {
        $this->actingAs(User::factory()->createOne());
        Category::factory()->count(2)->create();

        $response = $this->getJson(action(ListCategoriesController::class));

        $response->assertOk();
        $response->assertJson(
            static fn (AssertableJson $json) =>
                $json->has('data', 2)
                    ->etc()
        );
    }
}
